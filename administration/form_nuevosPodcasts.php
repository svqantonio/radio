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
  if(isset($_POST['enviar'])) {
      $titulo = $_POST['titulo']; $principal = $_POST['principal']; $persona1 = $_POST['persona1']; $persona2 = $_POST['persona2']; $tematica = $_POST['tematica']; $enlace = $_POST['enlace']; $fecha = $_POST['fecha'];
      
      $stmt = $conn->prepare("INSERT INTO podcasts (titulo, principal, persona1, persona2, tematica, enlace, fecha) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bindParam(1, $titulo); $stmt->bindParam(2, $principal); $stmt->bindParam(3, $persona1); $stmt->bindParam(4, $persona2); $stmt->bindParam(5, $tematica); $stmt->bindParam(6, $enlace); $stmt->bindParam(7, $fecha);
      if ($stmt->execute()) {
        echo "  <script>
                  alert('Consulta insertada correctamente!');
                  window.location.href = 'form_nuevosPodcasts.php';
                </script>";
        exit;
      } else {
        echo "  <script>
                  alert('Error al insertar la consulta!');
                  window.history.back();
                </script>";
        exit;
      }
  }           
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario de Subida - Radio Isla Cristina</title>
        <link rel="icon" type="image/x-icon" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

            p {
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
                display: flex; 
                justify-content: space-between; 
                align-items: center; 
                margin-bottom: 20px; 
            }
        </style>
    </head>
    <body style="background-color:#08045c;" onload="actualizarFechaMaxima()">
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
            <form action="form_nuevosPodcasts.php" method="POST">
                <label for="titulo" class="form-label">Título del programa *</label>
                <input type="text" class="form-control" name="titulo" onkeypress="return /[0-9\/\-\.\_\a-z\ñ\ \]/i.test(event.key)" required><br>
                <label for="principal" class="form-label">Persona principal *</label>
                <input type="text" class="form-control" name="principal" onkeypress="return /[a-z\ñ\ \]/i.test(event.key)" required><br>
                <label for="persona1" class="form-label">Persona 1</label>
                <input type="text" class="form-control" name="persona1" onkeypress="return /[a-z\ñ\ \]/i.test(event.key)"><br>
                <label for="persona2" class="form-label">Persona 2</label>
                <input type="text" class="form-control" name="persona2" onkeypress="return /[a-z\ñ\ \]/i.test(event.key)"><br>
                <label for="tematica" class="form-label">Temática *</label>
                <input type="text" class="form-control" name="tematica" onkeypress="return /[a-z\ñ\ \]/i.test(event.key)" required><br>
                <label for="fecha" class="form-label">Fecha *</label>
                <input type="Date" class="form-control" id="fecha" name="fecha" min="1950-01-01" max="" required><br>
                <script>
                  function actualizarFechaMaxima() {
                    var fechaInput = document.getElementById('fecha');
                    var fechaActual = new Date();

                    var day = fechaActual.getDate();
                    var month = fechaActual.getMonth() + 1;
                    var year = fechaActual.getFullYear();

                    if (day < 10) 
                      day = '0' + day;
                    
                    if (month < 10) 
                      month = '0' + month;

                    var fechaMaxima = year + "-" + month + "-" + day;
                    fechaInput.setAttribute('max', fechaMaxima);
                    console.log("Fecha máxima: ", fechaInput);
                  }
                </script>

                <label for="enlace" class="form-label">Enlace *</label>
                <input type="text" class="form-control" name="enlace" required><br>
                <input type="submit" class="btn btn-primary" name="enviar" value="Enviar datos"> 
            </form>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>