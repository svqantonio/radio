<?php 
    class AuthHelper {

        public static function login ($user, $password) {
            global $conn;
            $password = md5($password);
            $stmt = $conn->prepare("SELECT user, password FROM usuarios WHERE user = :user AND password = :password;");
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':password', $password);   
            $stmt->execute();

            $result = $stmt->fetchAll();

            if (count($result) > 0) 
                return [
                    "status" => true,
                    "message" => "Logueado correctamente"
                ]; 
            else 
                return [
                    "status" => false,
                    "message" => "Error al loguearte"
                ];
        }

        public static function logued() {
            if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) 
                return [
                    "status" => false,
                    "message" => "No estás logueado!"
                ];
            else
                return [
                    "status" => true,
                    "message" => ""
                ];
        }
    }