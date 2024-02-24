<?php
    $servername = "lldn292.servidoresdns.net";  // Nombre del servidor de la base de datos
    $username = "qaid011";     // Nombre de usuario de la base de datos
    $password = "AntonioGay01";   // Contraseña de la base de datos
    $dbname = "qaid011";  // Nombre de la base de datos

    //Realiza la conexión a la base de datos
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, "utf8mb4");

    if (!$conn)
        die("Error en la conexión: " . mysqli_connect_error());
    else {
        $sql = "SELECT * FROM usuarios WHERE id = 1";
        
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if($row['logueado'] == 0) {
                header("Location: login.php");
                exit();
            } else {
                if (isset($_POST['enviar'])) {
                    $titulo = $_POST['titulo']; $presentador = $_POST['presentador']; $dia = $_POST['dia']; $hora = $_POST['hora']; $descripcion = $_POST['descripcion']; $foto = $_POST['foto'];
                    
                    $sql2 = "INSERT INTO tarjetas (titulo, presentador, hora, dia, descripcion, foto) VALUES ('$titulo', '$presentador', '$hora', '$dia', '$descripcion', '$foto')";
                    
                    if(mysqli_query($conn, $sql2)) 
                        echo "<script>alert('Tarjeta subida correctamente!')</script>";
                    else
                        echo "<script>alert('Error al subir tarjeta: " . mysqli_error($conn) . "')</script>";
                        
                    mysqli_close($conn);
                }
            } 
        }
    }
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario Creación Tarjetas - Radio Isla Cristina</title>
        <link rel="icon" type="image/x-icon" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <style>
            form {
                margin-top: 20px;
            }
            input, label {
                margin-bottom: 10px;
            }
            .form-label {
                font-weight: bold;
                font-family:  'Courier', sans-serif;
            }

            p{
                text-align: center;
                margin-top: 20px;
            }
            .container {
                background-color: #f0ec24;
                border: 1px solid black;
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
                font-family:  'Roboto', sans-serif;;
            }
            
            .btn-primary {
                background-color:#08045c;
            }
            
            /* Botón de volver */
            .btn-shine {
              position: relative;
              margin: 0;
              padding: 17px 35px;
              outline: none;
              text-decoration: none;
              display: flex;
              justify-content: center;
              align-items: center;
              cursor: pointer;
              text-transform: uppercase;
              background-color: #fff;
              border: 1px solid rgba(22, 76, 167, 0.6);
              border-radius: 10px;
              color: #1d89ff;
              font-weight: 400;
              font-family: inherit;
              z-index: 0;
              overflow: hidden;
              transition: all 0.3s cubic-bezier(0.02, 0.01, 0.47, 1);
            }

            .btn-shine .spn-shine {
              color: #164ca7;
              font-size: 14px;
              font-weight: 500;
              letter-spacing: 0.7px;
            }

            .btn-shine:hover {
              animation: rotate624 0.7s ease-in-out both;
            }

            .btn-shine:hover .spn-shine {
              animation: storm1261 0.7s ease-in-out both;
              animation-delay: 0.06s;
            }

            @keyframes rotate624 {
              0% {
                transform: rotate(0deg) translate3d(0, 0, 0);
              }

              25% {
                transform: rotate(3deg) translate3d(0, 0, 0);
              }

              50% {
                transform: rotate(-3deg) translate3d(0, 0, 0);
              }

              75% {
                transform: rotate(1deg) translate3d(0, 0, 0);
              }

              100% {
                transform: rotate(0deg) translate3d(0, 0, 0);
              }
            }

            @keyframes storm1261 {
              0% {
                transform: translate3d(0, 0, 0) translateZ(0);
              }

              25% {
                transform: translate3d(4px, 0, 0) translateZ(0);
              }

              50% {
                transform: translate3d(-3px, 0, 0) translateZ(0);
              }

              75% {
                transform: translate3d(2px, 0, 0) translateZ(0);
              }

              100% {
                transform: translate3d(0, 0, 0) translateZ(0);
              }
            }

            .btn-shine {
              border: 1px solid;
              overflow: hidden;
              position: relative;
            }

            .btn-shine .spn-shine {
              z-index: 20;
            }

            .btn-shine:after {
              background: #38ef7d;
              content: "";
              height: 155px;
              left: -75px;
              opacity: 0.4;
              position: absolute;
              top: -50px;
              transform: rotate(35deg);
              transition: all 550ms cubic-bezier(0.19, 1, 0.22, 1);
              width: 50px;
              z-index: -10;
            }

            .btn-shine:hover:after {
              left: 120%;
              transition: all 550ms cubic-bezier(0.19, 1, 0.22, 1);
            }
            
            ion-icon {
                font-size: 1.5em;
                transform: translateY(5px);
            }
            .buttons-container {
                display: flex; /* Para que los botones estén en línea */
                justify-content: space-between; /* Para separar los botones con espacio entre ellos */
                align-items: center; /* Para alinear los botones verticalmente en el centro */
                margin-bottom: 20px; /* Margen inferior para separar de otros elementos si es necesario */
            }
        </style>
    </head>
    <body style="background-color:#08045c;">
        <div class="container modal-body">
            <div class="buttons-container">
                <button class="btn-shine" onclick="window.location.href='panelAdministracion.php'">
                    <span class="spn-shine"><ion-icon class="volver" name="arrow-back-circle-outline"></ion-icon>Volver</span>
                </button>
            </div>
            <div>
                <img class= "radioIcon "src= "https://radio.islacristina.org/wp-content/uploads/2021/07/Logo-Reducido.jpg"> 
                <h1 id="cabecera"><u>Formulario de creación de nuevas tarjetas para la programación de Radio Isla Cristina</u></h1>
            </div>
        <br>
        <br>
            <form action="form_nuevasTarjetas.php" method="POST">
                <label for="titulo" class="form-label">Título del programa</label>
                <input type="text" class="form-control" name="titulo" onkeypress="return /[0-9\/\-\.\_\a-z\ñ\ \]/i.test(event.key)" required><br>
                <label for="persona2" class="form-label">Quien presenta</label>
                <input type="text" class="form-control" name="presentador" onkeypress="return /[a-z ñ]/i.test(event.key)"><br>
                <label for="titulo" class="form-label">Día / Días (Introduce todos los días en los que este podcast se emite)</label>
                <input type="text" class="form-control" name="dia" onkeypress="return /[a-z,]/i.test(event.key)" required><br>
                <label for="principal" class="form-label">Hora</label>
                <input type="text" class="form-control" name="hora" onkeypress="return /[0-9:- ]/.test(event.key)" required><br>
                <label for="persona1" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" onkeypress="return /[a-z\ñ\ \]/i.test(event.key)" required><br>
                <label for="tematica" class="form-label">Foto (Introduce el nombre de la foto)</label>
                <input type="text" class="form-control" name="foto" onkeypress="return /[a-z\ñ\ \]/i.test(event.key)" required><br>
                <input type="submit" class="btn btn-primary" name="enviar" value="Nueva tarjeta"> 
            </form>
        </div>  
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>