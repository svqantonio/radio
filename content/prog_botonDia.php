<?php
    $dia = isset($_GET['dia']) ? $_GET['dia'] : null;

    if ($dia != null) {
        $servername = "lldn292.servidoresdns.net";  // Nombre del servidor de la base de datos
        $username = "qaid011";     // Nombre de usuario de la base de datos
        $password = "AntonioGay01";   // Contraseña de la base de datos
        $dbname = "qaid011";  // Nombre de la base de datos

        //Realiza la conexión a la base de datos
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        mysqli_set_charset($conn, "utf8mb4");
        
        //echo "<script>alert('Día: ', $dia);</script>";

        if (!$conn)
            die("Error en la conexión: " . mysqli_connect_error());
        else {
            $sql = "SELECT * FROM tarjetas WHERE dia LIKE '%$dia%'";
            $result = $conn->query($sql);
            
            $data = array();
            
             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            if (empty($data)) {
                echo "No se encontraron datos para el día proporcionado.";
            } else {
                //echo "Response: " . var_dump($data);
                header('Content-Type: application/json');                
                echo json_encode($data);
            }

            $conn->close();
        }
    }
?>  