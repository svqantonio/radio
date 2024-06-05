<?php
    $servername = "lldn292.servidoresdns.net";  // Nombre del servidor de la base de datos
    $username = "qaid011";     // Nombre de usuario de la base de datos
    $password = "AntonioGay01";   // Contraseña de la base de datos
    $dbname = "qaid011";  // Nombre de la base de datos

    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);