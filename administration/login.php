<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../helpers/Constants.php';
    require_once '../helpers/AuthHelper.php';

    try {
        session_start();

        if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $res = AuthHelper::login($_POST['user'], $_POST['password']);
                if ($res['status'] == true) {
                    $_SESSION['user'] = $_POST['user']; $_SESSION['password'] = $_POST['password'];
                    echo "  <script>
                                alert('" . $res['message'] . "!');
                                window.location.href = 'panelAdministracion.php';   
                            </script>";
                    exit;
                } else {
                    echo "  <script>
                                alert('" . $res['message'] . "!');
                                window.location.href = 'login.php';
                            </script>";
                    exit;
                }
            }
        } else {
            echo "  <script>
                        alert('Ya te has logueado!');
                        window.location.href = 'panelAdministracion.php';   
                    </script>";
            exit;
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Login - Radio Isla Cristina</title>
        <link rel="icon" type="image/x-icon" href="../imgs/radio.png">
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: 'Courier', sans-serif;
            }

            .formulario {
                text-align: left;
            }

            .formulario img {
                display: block; /* Para asegurarse de que la imagen no cause espacios no deseados */
                margin: 0 auto; /* Centra la imagen horizontalmente */
            }

            .formulario form {
                margin-top: 20px; /* Espacio entre la imagen y el formulario */
            }

            .formulario .form-label {
                display: block; /* Muestra las etiquetas en una línea separada */
                margin-top: 10px; /* Espacio entre las etiquetas y los campos de entrada */
            }

            .formulario .form-control {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
            }

            .formulario #login {
                width: 100%;
            }
            
            /* Estilo boton Acceder */
            .btnLogin {
              margin: 0;
              height: auto;
              background: transparent;
              padding: 0;
              border: none;
            }

            /* button styling */
            .btnLogin {
              --border-right: 6px;
              --text-stroke-color: black;
              --animation-color: #01005d;
              --fs-size: 2em;
              letter-spacing: 3px;
              text-decoration: none;
              font-size: var(--fs-size);
              font-family: "Arial";
              position: relative;
              text-transform: uppercase;
              color: transparent;
              -webkit-text-stroke: 1px var(--text-stroke-color);
            }
            /* this is the text, when you hover on button */
            .hover-text {
              position: absolute;
              box-sizing: border-box;
              content: attr(data-text);
              color: var(--animation-color);
              width: 0%;
              inset: 0;
              border-right: var(--border-right) solid var(--animation-color);
              overflow: hidden;
              transition: 0.5s;
              -webkit-text-stroke: 1px var(--animation-color);
            }
            /* hover */
            .btnLogin:hover .hover-text {
              width: 100%;
              filter: drop-shadow(0 0 23px var(--animation-color))
            }
            
            /* Estilo inputs */
            .form-control {
              position: relative;
              margin: 20px 0 40px;
              width: 190px;
            }

            .form-control input {
              background-color: transparent;
              border: 0;
              border-bottom: 2px black solid;
              display: block;
              width: 100%;
              padding: 15px 0;
              font-size: 18px;
              color: black;
            }

            .form-control input:focus,
            .form-control input:valid {
              outline: 0;
              border-bottom-color: black;
            }

            .form-control label {
              position: absolute;
              top: 15px;
              left: 0;
              pointer-events: none;
            }

            .form-control label span {
              display: inline-block;
              font-size: 18px;
              min-width: 5px;
              color: black;
              transition: 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            }

            .form-control input:focus+label span,
            .form-control input:valid+label span {
              color: black;
              transform: translateY(-30px);
            }
        </style>
    </head>
    <body>
        <div class="formulario">
            <img src="../imgs/radio.png">
            <form method="POST" action="login.php">
                <h3>Login - Formulario de Subida de Archivos - Radio Isla Cristina</h3>
                <div class="form-control">
                    <input type="text" required="" name="user">
                    <label>
                        <span style="transition-delay:0ms">U</span><span style="transition-delay:50ms">s</span><span style="transition-delay:100ms">u</span><span style="transition-delay:150ms">a</span><span style="transition-delay:200ms">r</span><span style="transition-delay:250ms">i</span><span style="transition-delay:300ms">o</span>
                    </label>
                </div>
                <div class="form-control">
                    <input type="password" required="" name="password">
                    <label>
                        <span style="transition-delay:0ms">C</span><span style="transition-delay:50ms">o</span><span style="transition-delay:100ms">n</span><span style="transition-delay:150ms">t</span><span style="transition-delay:200ms">r</span><span style="transition-delay:250ms">a</span><span style="transition-delay:300ms">s</span><span style="transition-delay:350ms">e</span><span style="transition-delay:400ms">ñ</span><span style="transition-delay:450ms">a</span>
                    </label>
                </div>
                <button data-text="Awesome" type="submit" class="btnLogin">
                    <span class="actual-text">&nbsp;Acceder&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Acceder&nbsp;</span>
                </button>
            </form>
        </div>
    </body>
</html>