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

    if (isset($_GET['id'])) {
      $stmt = $conn->prepare($sql = "SELECT * FROM tarjetas WHERE id = :id;");
      $stmt->bindParam(':id', $_GET['id']);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($result) {
        foreach($result as $row) {
          $titulo = $row['titulo'];
          $presentador = $row['presentador'];
          $dia = $row['dia'];
          $hora = $row['hora'];
          $desc = $row["descripcion"];
          $foto = $row['foto'];
        }
      }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo']; $presentador = $_POST['presentador']; $dia = $_POST['dia']; $hora = $_POST['hora']; $desc = $_POST['descripcion']; $foto = $_POST['foto']; $id = $_GET['id'];
        
      $stmt = $conn->prepare("UPDATE tarjetas SET titulo = ?, presentador = ?, dia = ?, hora = ?, descripcion = ?, foto = ? WHERE id = ?;"); 
      $stmt->bindParam(1, $titulo); $stmt->bindParam(2, $presentador); $stmt->bindParam(3, $dia); $stmt->bindParam(4, $hora); $stmt->bindParam(5, $desc); $stmt->bindParam(6, $foto); $stmt->bindParam(7, $id);
        
      if ($stmt->execute()) {
        echo '  <script>
                  alert("Editado correctamente!"); 
                  window.location.href = "tabla_tarjetas.php";
                </script>';
        exit();
      } else {
        echo '  <script>
                  alert("Error al editar tarjertas!"); 
                  window.history.back();
                </script>';
        exit();
      }
    }
    
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tabla de edición - Radio Isla Cristina</title>
        <link rel="icon" type="image/x-icon" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <style>
			body {
				font-family: "Courier", sans-serif;
                background-color: #08045c;
			}
            /* boton volver */
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
                margin-bottom: 2%;
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
            
            /* Otros estilos */    
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
                /* Other styles here */
            }
            #cabecera {
                position: relative;
                top: 18px;
                left: 10px;
                font-family: 'Courier', monospace;
            }
            
            /* boton enviar */
            .btnSubmit {
             padding: 0.8em 1.8em;
             border: 2px solid #08045c;
             position: relative;
             overflow: hidden;
             background-color: transparent;
             text-align: center;
             text-transform: uppercase;
             font-size: 16px;
             transition: .3s;
             z-index: 1;
             font-family: inherit;
             color: #08045c;
            }

            .btnSubmit::before {
             content: '';
             width: 0;
             height: 300%;
             position: absolute;
             top: 50%;
             left: 50%;
             transform: translate(-50%, -50%) rotate(45deg);
             background: #08045c;
             transition: .5s ease;
             display: block;
             z-index: -1;
            }

            .btnSubmit:hover::before {
             width: 105%;
            }

            .btnSubmit:hover {
             color: white;
            }
        </style>
    </head>
    <body>
        <div class="container modal-body">
            <div class="buttons-container">
                <button class="btn-shine" onclick="window.location.href='panelAdministracion.php'">
                    <span class="spn-shine"><ion-icon class="volver" name="arrow-back-circle-outline"></ion-icon>Volver</span>
                </button>
            </div>
            <div>
                <img class= "radioIcon "src= "https://radio.islacristina.org/wp-content/uploads/2021/07/Logo-Reducido.jpg"> 
                <h1 id="cabecera"><u>Formulario de edición de la tarjeta seleccionada.</u></h1>
            </div>
            <br><br>
            <form action="form_edicionTarjetas.php?id=<?php echo $id ?>" method="POST">
                <label for="titulo" class="form-label">Título del programa</label>
                <input type="text" class="form-control" name="titulo" value="<?php echo $titulo ?>" onkeypress="return /[0-9\/\-\.\_\a-z\ñ\ \]/i.test(event.key)" required><br>
                <label for="presentador" class="form-label">Quien presenta</label>
                <input type="text" class="form-control" name="presentador" value="<?php echo $presentador ?>" onkeypress="return /[a-z ñ]/i.test(event.key)" required><br>
                <label for="dia" class="form-label">Día / Días (Preferentemente poner en el formato: Lunes,Miercoles,Jueves,Sabado. El sistema no te va a dejar usar espacios ni tildes).</label>
                <input type="text" class="form-control" name="dia" value="<?php echo $dia ?>" onkeypress="return /[a-z,]/i.test(event.key)" required><br>
                <label for="hora" class="form-label">Hora (Introducir de esta manera -> 13:00 - 14:30, con espacios entre el guión).</label>
                <input type="text" class="form-control" name="hora" value="<?php echo $hora ?>" onkeypress="return /[0-9:-]/.test(event.key)" required><br>
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $desc ?>" onkeypress="return /[a-z\ñ\ \]/i.test(event.key)" required><br>
                <label for="foto" class="form-label">Foto (Pon el nombre de la foto dentro de la carpeta).</label>
                <input type="text" class="form-control" name="foto" value="<?php echo $foto ?>" onkeypress="return /[a-z\ñ\ \]/i.test(event.key)" required><br>
                <button type="subtmit" class="btnSubmit" onclick="return confirm('¿Estás seguro de que quieres editarlo?')">Editar</button>
            </form>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
