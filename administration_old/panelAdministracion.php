<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../helpers/Constants.php';
    require_once '../helpers/AuthHelper.php';

    session_start();

    $res = AuthHelper::logued();
    if ($res['status'] == false) {
        echo "  <script>
                    alert('" . $res['message'] . "');
                    window.location.href = 'login.php';   
                </script>";
        exit;
    } 

    if (isset($_GET['function']) && $_GET['function'] == 'logout') {
        session_destroy();
        echo "  <script>
                    alert('Deslogueado correctamente!');
                    window.location.href = 'login.php';   
                </script>";
        exit;
    }

?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Panel de Administración - Radio Isla Cristina</title>

        <link rel="icon" type="image/x-icon" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <style>
            .contenido {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 5%;
            }  
            
            .button-name {
                align-items: center;
                appearance: none;
                background-color: #FCFCFD;
                border-radius: 4px;
                border-width: 0;
                box-shadow: rgba(45, 35, 66, 0.2) 0 2px 4px,rgba(45, 35, 66, 0.15) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
                box-sizing: border-box;
                color: #36395A;
                cursor: pointer;
                display: inline-flex;
                font-family: "JetBrains Mono",monospace;
                height: 48px;
                justify-content: center;
                line-height: 1;
                list-style: none;
                overflow: hidden;
                padding-left: 16px;
                padding-right: 16px;
                position: relative;
                text-align: left;
                text-decoration: none;
                transition: box-shadow .15s,transform .15s;
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;
                white-space: nowrap;
                will-change: box-shadow,transform;
                font-size: 18px;
                margin: auto;
            }

            .button-name:focus {
                box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
            }

            .button-name:hover {
                box-shadow: rgba(45, 35, 66, 0.3) 0 4px 8px, rgba(45, 35, 66, 0.2) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
                transform: translateY(-2px);
            }

            .button-name:active {
                box-shadow: #D6D6E7 0 3px 7px inset;
                transform: translateY(2px);
            }
                
            .Btnn {
              display: flex;
              align-items: center;
              justify-content: flex-start;
              width: 45px;
              height: 45px;
              border: none;
              border-radius: 50%;
              cursor: pointer;
              position: relative;
              overflow: hidden;
              transition-duration: .3s;
              box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
              background-color: rgb(255, 65, 65);
            }

            .sign {
              width: 100%;
              transition-duration: .3s;
              display: flex;
              align-items: center;
              justify-content: center;
            }

            .sign svg {
              width: 17px;
            }

            .sign svg path {
              fill: white;
            }

            .text {
              position: absolute;
              right: 0%;
              width: 0%;
              opacity: 0;
              color: white;
              font-size: 15px;
              font-weight: 600;
              transition-duration: .3s;
            }

            .Btnn:hover {
              width: 125px;
              border-radius: 40px;
              transition-duration: .3s;
            }

            .Btnn:hover .sign {
              width: 30%;
              transition-duration: .3s;
              padding-left: 20px;
            }

            .Btnn:hover .text {
              opacity: 1;
              width: 70%;
              transition-duration: .3s;
              padding-right: 10px;
            }

            .Btnn:active {
              transform: translate(2px ,2px);
            }
            
            .centrar {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                margin-top: 5%;
            }
            
            .radioIcon {
                float: left;
                height: 100px;
                width: 100px;
                display: block;
            }
            
            #cabecera {
                position: relative;
                top: 18px;
                left: 10px;
            }
        </style>
    </head>
    <body>
        <script>
            window.onbeforeunload = function() {
                return null;
            }
        </script>
        <div class="centrar">
            <button class="Btnn" onclick="if(confirm('¿Estás seguro de que quieres cerrar sesión?')) window.location.href='panelAdministracion.php?function=logout';">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Cerrar sesión</div>
            </button>
            <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                <h1 id="cabecera" style="font-family: 'Courier', sans-serif; font-size: 2em;">Este es el <u>panel de administración</u> de Radio Isla Cristina</h1>
                <img class="radioIcon" src="../imgs/radio.png" style="width: 150px; height: auto; margin-top: 5%;" onclick="if(confirm('¿Quieres ir a la página de la radio?')) { window.location.href='../content/index.php'; }">
            </div>
        </div>
        <div class="contenido">
            <button class="button-name" onclick="window.location.href='tabla_podcasts.php'"> Tabla con todos los podcast</button>
            <button class="button-name" onclick="window.location.href='form_nuevosPodcasts.php'">Inserción de nuevos podcasts</button>
            <button class="button-name" onclick="window.location.href='tabla_tarjetas.php'"> Tabla con todas las tarjetas</button>
            <button class="button-name" onclick="window.location.href='form_nuevasTarjetas.php'"> Inserción de nuevas tarjetas</button>
        </div>   
    </body>
</html>