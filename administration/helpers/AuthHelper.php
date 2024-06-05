<?php

    class AuthHelper {

        public static function login($usr, $pwd) {
            global $conn; global $timer;

            $redirection = 'index.html';
            $pwd_hs = md5($pwd);
            $stmt = $conn->prepare('SELECT id, name, role FROM users WHERE username = :username AND password = :password'); //Necesito pasarle id por la consulta porque luego dentro del insertToken le paso ese id para meterle el registro del token al usuario correspondiente. El name para ponerlo arriba junto al boton de cerrar sesion y el role para dejar que el usuario haga ciertas acciones o no
            $stmt->bindParam(':username', $usr);
            $stmt->bindParam(':password', $pwd_hs);
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $result = $stmt->fetch();
                    $response = self::insertToken($result, 'logueado');
                    return array_merge($result, $response);
                } else {
                    $response = [
                        "status" => "error",
                        "message" => "No se ha encontrado al usuario",
                        "redirection" => $redirection,
                        "timer" => $timer
                    ];
                    return $response;
                }
            } else {
                $response = [
                    "status" => "error",
                    "message" => "Ha habido un error ejecutando la consulta",
                    "redirection" => $redirection,
                    "timer" => $timer
                ];
                return $response;
            }
        }

        public static function register($usr, $name, $pwd, $role) {
            global $conn;

            $pwd_hs = md5($pwd);
            $stmt = $conn->prepare('INSERT INTO users SET username = :username AND name = :name AND role = :role AND password = :password');
            $stmt->bindParam(':username', $usr);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':password', $pwd_hs);
        
            if ($stmt->execute()) {
                $usr_id = $conn->lastInsertId();
                $response = self::insertToken($usr_id, 'registrado'); 
                return $response;
            }
        }

        public static function insertToken($result, $type_user) {
            global $conn; global $timer;

            if ($result) {
                $random = random_bytes(32);
                $token = bin2hex($random);
                
                if (isset($result['id']))
                    $usr_id = $result['id'];
                else 
                    $usr_id = $result;

                $expiration_time = date('Y-m-d H:i:s', strtotime('+1 hour'));
                //$expiration_time = date('Y-m-d H:i:s', strtotime('+1 minute'));

                $stmt = $conn->prepare("INSERT INTO tokens SET token = :token, user_id = :user_id, token_expiration = :token_expiration;");
                $stmt->bindParam(':token', $token);
                $stmt->bindParam(':user_id', $usr_id);
                $stmt->bindParam(':token_expiration', $expiration_time);

                if ($stmt->execute()) {
                    return [
                        "status" => "success",
                        "message" => 'Usuario ' . $type_user . ' correctamente!',
                        "token" => $token,
                        "redirection" => "main.html",
                        "timer" => $timer,
                        
                    ];
                } else {
                    return [
                        "status" => "error",
                        "message" => "Ha habido un error al insertar un token!",
                        "token" => null,
                        "redirection" => "login.html",
                        "timer" => $timer
                    ];
                }
            } else {
                if ($type_user == 'logueado') {
                    return [
                        "status" => "error",
                        "message" => "No existe ese usuario!",
                        "token" => null,
                        "redirection" => null,
                        "timer" => null
                    ];
                } else {
                    return [
                        "status" => "error",
                        "message" => 'Ha habido un error intentando registrar el usuario',
                        "token" => null,
                        "redirection" => null,
                        "timer" => null
                    ];
                }
            }
        }
        
        public static function loadAllTables($dbname) {
            global $conn;

            $stmt = $conn->prepare("SELECT table_name AS TABLE_NAME FROM information_schema.tables WHERE table_schema = :dbname order by table_name;");
            $stmt->bindValue(':dbname', $dbname);
            $stmt->execute();
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public static function getNameUserWithToken($token) {
            global $conn;

            $stmt = $conn->prepare("SELECT user_id FROM tokens WHERE token = :token");
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($result) {
                $user_id = $result['user_id'];
                $stmt = $conn->prepare('SELECT name FROM users WHERE id = :id');
                $stmt->bindParam(':id', $user_id);
                $stmt->execute();
                $result_user_id = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result_user_id) 
                    return $result_user_id['name'];
                else 
                    return "Usuario no encontrado";
            } else
                return "Token no encontrado";
            
        }

        public static function logOut($token) {
            global $conn; global $timer;

            $stmt = $conn->prepare("DELETE FROM tokens WHERE token = :token");
            $stmt->bindParam(':token', $token);
            if ($stmt->execute()) {
                return [
                    "status" => "success",
                    "message" => "Cerrado sesion correctamente!",
                    "redirection" => "index.html",
                    "timer" => $timer
                ];
            } else {
                return [
                    "status" => "error",
                    "message" => "Ha habido un error borrando el token",
                    "timer" => $timer,
                ];
            }
        }

        public static function getUserData($token) {
            global $conn;

            $stmt = $conn->prepare("SELECT user_id FROM tokens WHERE token = :token");
            $stmt->bindParam(':token', $token);
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $id = $result['user_id'];
                $stmt = $conn->prepare('SELECT name, role FROM users WHERE id = :id');
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return [
                    "status" => "error",
                    "message" => "Ha habido un error buscando el token"
                ]; 
            }
        }

        public static function deleteOldTokens($token) {
            global $conn; global $timer;
                
            //$stmt = $conn->prepare("DELETE FROM tokens WHERE token_expiration < DATE_ADD(NOW(), INTERVAL 2 HOUR);"); //Este sirve para mi servidor privado
            $stmt = $conn->prepare("DELETE FROM tokens WHERE token_expiration < NOW();");
            if ($stmt->execute()) {
                $stmt = $conn->prepare('SELECT * FROM tokens WHERE token = :token');
                $stmt->bindParam(':token', $token);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result)
                    return [
                        "status" => "success",
                        "reason" => "Token aún vigente"
                    ];
                else
                    return [
                        "status" => "error",
                        "reason" => "Token expirado"
                    ];
                
            }
        }

    }