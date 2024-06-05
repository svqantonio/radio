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
      $stmt = $conn->prepare("SELECT * FROM podcasts WHERE id = :id;");
      $stmt->bindParam(':id', $_GET['id']);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($result) {
        foreach($result as $row) {
          $titulo = $row['titulo']; $fecha = $row['fecha']; $fecha_formateada = date("d-m-Y", strtotime($fecha)); $principal = $row['principal']; $persona1 = $row['persona1']; $persona2 = $row['persona2']; $tematica = $row['tematica']; $enlace = $row['enlace'];
        }
      }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $titulo = $_POST['titulo']; $fecha = $_POST['fecha']; $principal = $_POST['principal']; $persona1 = $_POST['persona1']; $persona2 = $_POST['persona2']; $tematica = $_POST['tematica']; $url = $_POST['enlace']; $id = $_GET['id'];
      
      $stmt = $conn->prepare("UPDATE podcasts SET titulo = ?, principal = ?, persona1 = ?, persona2 = ?, tematica = ?, fecha = ?, enlace = ? WHERE id = ?");
      $stmt->bindParam(1, $titulo); $stmt->bindParam(2, $principal); $stmt->bindParam(3, $persona1); $stmt->bindParam(4, $persona2); $stmt->bindParam(5, $tematica); $stmt->bindParam(6, $fecha); $stmt->bindParam(7, $enlace); $stmt->bindParam(8, $id);
      if ($stmt->execute()) {
        echo "  <script>
                  alert('Registro editado correctamente!');
                  window.location.href = 'tabla_podcasts.php';
                </script>";
        exit;
      } else {
        echo "  <script>
                  alert('Error al editar el registro!');
                  window.history.back();
                </script>";
        exit;
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
                <h1 id="cabecera"><u>Formulario de edición del PODCAST seleccionado.</u></h1>
            </div>
            <br><br>
            <form action="form_edicionPodcast.php?id=<?php echo $_GET['id'] ?>" method="POST">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" value="<?php echo $titulo ?>" onkeypress="return /[0-9\/\-\.\_\a-z\ñ\ \]/i.test(event.key)" required><br>
                <label for="fecha" class="form-label">Fecha</label>
                <input type="Date" class="form-control" name="fecha" value="<?php echo $fecha ?>" required><br>
                <label for="principal" class="form-label">Entrevistador / Personaje principal</label>
                <input type="text" class="form-control" name="principal" value="<?php echo $principal ?>" onkeypress="return /[a-z\ñ ]/i.test(event.key)" required><br>
                <label for="persona1" class="form-label">Persona adicional 1</label>
                <input type="text" class="form-control" name="persona1" value="<?php echo $persona1 ?>" onkeypress="return /[a-z\ñ ]/.test(event.key)"><br>
                <label for="persona2" class="form-label">Persona adicional 2</label>
                <input type="text" class="form-control" name="persona2" value="<?php echo $persona2 ?>" onkeypress="return /[a-z\ñ ]/.test(event.key)"><br>
                <label for="tematica" class="form-label">Temática</label>
                <input type="text" class="form-control" name="tematica" value="<?php echo $tematica ?>" onkeypress="return /[a-z\ñ ]/i.test(event.key)" required><br>
                <label for="enlace" class="form-label">Enlace</label>
                <input type="text" class="form-control" name="enlace" value="<?php echo $enlace ?>" onkeypress="return /[a-z\ñ\0-9\]/i.test(event.key)" required><br>
                <button type="submit" class="btnSubmit" onclick="return confirm('¿Estás seguro de que quieres editarlo?')">Editar</button>
            </form>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>