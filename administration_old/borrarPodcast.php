<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["id"])) {
            $servername = "lldn292.servidoresdns.net";  // Nombre del servidor de la base de datos
            $username = "qaid011";     // Nombre de usuario de la base de datos
            $password = "AntonioGay01";   // Contraseña de la base de datos
            $dbname = "qaid011";  // Nombre de la base de datos

            //Realiza la conexión a la base de datos
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            mysqli_set_charset($conn, "utf8mb4");

            //Si no está bien realizada la conexión a la bbdd no te deja continuar
            if (!$conn) {
                die("Error en la conexión: " . mysqli_connect_error());
            } else {
                $id = $_POST["id"];
                
                $sql = "DELETE FROM podcasts WHERE id = $id";

                $result = $conn->query($sql);
                if ($conn->query($sql) === TRUE) {
                    echo "!!";
                } else {
                    echo "Error al ejecutar la primera consulta: " . $conn->error;
                }
            }
        } else {
            echo "No se proporcionó el parámetro 'id'.";
        }
    } else {
        echo "Esta página solo admite solicitudes POST.";
    }

?>