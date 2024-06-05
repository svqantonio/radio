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
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tabla de edición - Radio Isla Cristina</title>

        <link rel="icon" type="image/x-icon" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <style>
            .tablaDatos {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 75%;
            }

            .searchBox, #limpiaBusqueda {
                position: relative;
                width: 65px;
                height: 50px;
                justify-content: center;
                align-items: center;
                transition: 0.5s;
            }

            #limpiaBusqueda {
                background-color: #9c9cac;
                display: none;
                margin-left: 20px;
            }

            .searchBox:hover {
                width: 400px;
            }

            .searchBox::before , #limpiaBusqueda::before  {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 10px;
                height: 100%;
                background: linear-gradient(#fff, #fff, #e3e3e3);
                z-index: 1;
                filter: blur(1px);
            }

            .searchBox::after, #limpiaBusqueda::after {
                content: '';
                position: absolute;
                top: 0;
                right: -1px;
                width: 10px;
                height: 100%;
                background: #9d9d9d;
                z-index: 1;
                filter: blur(1px);
            }

            .searchBox input {
                position: relative;
                width: 100%;
                height: 100%;
                border: none;
                padding: 10px 25px;
                outline: none;
                font-size: 1.1em;
                color: #555;
                background: linear-gradient(#dbdae1, #a3aaba);
                box-shadow: 5px 5px 5px rgba(0 , 0, 0 , 0.1),
                15px 15px 15px rgba(0 , 0, 0 , 0.1),
                20px 20px 15px rgba(0 , 0, 0 , 0.1),
                30px 30px 15px rgba(0 , 0, 0 , 0.1),
                inset 1px 1px 2px #fff;
            }

            .searchBox input::placeholder {
                color: transparent;
            }

            .searchBox:hover input::placeholder {
                color: #555;
            }
            
            #iconoBusqueda {
                position: absolute;
                right: 20px;
                top: 10px;
                color: #555;
                font-size: 1.5em;
                cursor: pointer;

            }

            #cuadroBusqueda{
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #cuadroLimpiar {
                height: 15%;
                width: 15%;
                margin-left: 50px;
            }

            #barra {
                color:rgba(255, 255, 0, 0.664);
                position: relative;
                margin-top: 10px;
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
                    åtransform: rotate(0deg) translate3d(0, 0, 0);
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
            
            .buttons-container {
                display: flex; /* Para que los botones estén en línea */
                justify-content: space-between; /* Para separar los botones con espacio entre ellos */
                align-items: center; /* Para alinear los botones verticalmente en el centro */
                margin-bottom: 20px; /* Margen inferior para separar de otros elementos si es necesario */
            }
            
            /* Boton editar */
            .Btn {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                width: 100px;
                height: 40px;
                border: none;
                padding: 0px 20px;
                background-color: rgb(168, 38, 255);
                color: white;
                font-weight: 500;
                cursor: pointer;
                border-radius: 10px;
                box-shadow: 5px 5px 0px rgb(140, 32, 212);
                transition-duration: .3s;
            }

            .svg {
                width: 13px;
                position: absolute;
                right: 0;
                margin-right: 20px;
                fill: white;
                transition-duration: .3s;
            }

            .Btn:hover {
                color: transparent;
            }

            .Btn:hover svg {
                right: 43%;
                margin: 0;
                padding: 0;
                border: none;
                transition-duration: .3s;
            }

            .Btn:active {
                transform: translate(3px , 3px);
                transition-duration: .3s;
                box-shadow: 2px 2px 0px rgb(140, 32, 212);
            }
            
            /* Estilo boton de volver */
            ion-icon {
                font-size: 1.5em;
                transform: translateY(5px);
            } 
            
            .centrar {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .searchBox, #limpiaBusqueda {
                position: relative;
                width: 65px;
                height: 50px;
                justify-content: center;
                align-items: center;
                transition: 0.5s;
            }

            #limpiaBusqueda {
                background-color: #9c9cac;
                display: none;
                margin-left: 20px;
            }


            .searchBox:hover {
                width: 400px;
            }

            .searchBox::before , #limpiaBusqueda::before  {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 10px;
                height: 100%;
                background: linear-gradient(#fff, #fff, #e3e3e3);
                z-index: 1;
                filter: blur(1px);
            }

            .searchBox::after, #limpiaBusqueda::after {
                content: '';
                position: absolute;
                top: 0;
                right: -1px;
                width: 10px;
                height: 100%;
                background: #9d9d9d;
                z-index: 1;
                filter: blur(1px);
            }

            .searchBox input {
                position: relative;
                width: 100%;
                height: 100%;
                border: none;
                padding: 10px 25px;
                outline: none;
                font-size: 1.1em;
                color: #555;
                background: linear-gradient(#dbdae1, #a3aaba);
                box-shadow: 5px 5px 5px rgba(0 , 0, 0 , 0.1),
                15px 15px 15px rgba(0 , 0, 0 , 0.1),
                20px 20px 15px rgba(0 , 0, 0 , 0.1),
                30px 30px 15px rgba(0 , 0, 0 , 0.1),
                inset 1px 1px 2px #fff;
            }

            .searchBox input::placeholder {
                color: transparent;
            }

            .searchBox:hover input::placeholder {
                color: #555;
            }

            #iconoBusqueda {
                position: absolute;
                right: 20px;
                top: 10px;
                color: #555;
                font-size: 1.5em;
                cursor: pointer;

            }

            #cuadroBusqueda{
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #cuadroLimpiar {
                height: 15%;
                width: 15%;
                margin-left: 50px;
            }

            #barra {
                color:rgba(255, 255, 0, 0.664);
                position: relative;
                margin-top: 10px;
            }

            /* Botón Borrar */
            .Btn2 {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                width: 100px;
                height: 40px;
                border: none;
                padding: 0px 20px;
                background-color: #e50000;
                color: white;
                font-weight: 500;
                cursor: pointer;
                border-radius: 10px;
                box-shadow: 5px 5px 0px #e50000;
                transition-duration: .3s;
            }

            .svg2 {
                width: 13px;
                position: absolute;
                right: 0;
                margin-right: 20px;
                fill: white;
                transition-duration: .3s;
            }

            .Btn2:hover {
                color: transparent;
            }

            .Btn2:hover .svg2 {
                right: 43%;
                margin: 0;
                padding: 0;
                border: none;
                transition-duration: .3s;
            }

            .Btn2:active {
                transform: translate(3px , 3px);
                transition-duration: .3s;
                box-shadow: 2px 2px 0px #e50000;
            }
        </style>
    </head>
    <body>
        <button class="btn-shine" onclick="window.location.href='panelAdministracion.php'">
            <span class="spn-shine"><ion-icon class="volver" name="arrow-back-circle-outline"></ion-icon>Volver</span>
        </button>
        <header style="margin-top:20px;">
                    <div id="cuadroBusqueda">
                    <div class="barra">
                            <div class="searchBox">
                            <div class="shadow"></div>
                            <input type="text" id="busqueda" onkeyup="filtrar()" placeholder="Buscar por título..">
                            <ion-icon id="iconoBusqueda" name="search-outline"></ion-icon>
                            </div> 
                        </div>
                        <div class="cuadroLimpiar">
                            <div id="limpiaBusqueda" onclick="limpiar()">
                            <ion-icon id="iconoBusqueda" name="close-outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                </header>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Título del programa</th>
                    <th>Presentador</th>
                    <th>Horario</th>
                    <th>Descripción</th>
                    <th>Acceso</th>
                </tr>
            </thead>
            <tbody id="contenedorPodcast">
                <?php
                    
                    $stmt = $conn->prepare("SELECT * FROM tarjetas;");
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $arrayTitulos = array(); 
                    $arrayPresentador = array();
                    $arrayFechas = array();
                    $arrayDescripcion = array();
                    $arrayId = array();

                    if($result) {
                        foreach($result as $row) {
                            $arrayTitulos[] = $row['titulo'];
                            $arrayPresentador[] = $row['presentador'];
                            $arrayFechas[] = $row['dia'] . " - " . $row['hora'];
                            $arrayDescripcion[] = $row['descripcion'];
                            $arrayId[] = $row['id'];
                            ?>
                            <tr>
                                <td><?php echo $row['titulo'] ?></td>
                                <td><?php echo $row['presentador'] ?></td>
                                <td><?php echo $row['dia'] . " - " . $row['hora'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><button class="Btn" onclick="window.location.href='form_edicionTarjetas.php?id=<?php echo $row['id'] ?>'">Editar
                                    <svg class="svg" viewBox="0 0 512 512">
                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                    </svg>
                                </button></td>
                            </tr>
                            <?php
                        }
                    }
                    
                ?>
            </tbody>
        </table>

        <script type="text/javascript" language="javascript">
        /* Scripts para el cuadro de búsqueda de hemeroteca */
            var listaTitulo = new Array();
            var listaPresentador = new Array();
            var listaFechas = new Array();
            var listaDescripcion = new Array();
            var listaId = new Array();

            <?php foreach($arrayTitulos as $key => $val){ ?>
                listaTitulo.push('<?php echo $val; ?>');
            <?php } ?>
            
            <?php foreach($arrayFechas as $key => $val){ ?>
                listaFechas.push('<?php echo $val; ?>');
            <?php } ?>
            <?php foreach($arrayPresentador as $key => $val){ ?>
                listaPresentador.push('<?php echo $val; ?>');
            <?php } ?>
            <?php foreach($arrayDescripcion as $key => $val){ ?>
                listaDescripcion.push('<?php echo $val; ?>');
            <?php } ?>
            <?php foreach($arrayId as $key => $val){ ?>
                listaId.push('<?php echo $val; ?>');
            <?php } ?>

            var arrayPodcast = new Array();
            for(let i = 0; i < listaTitulo.length; i++) {
                var arrayLinea = new Array()
                arrayLinea.push(listaTitulo[i])
                console.log(listaTitulo)
                arrayLinea.push(listaPresentador[i])
                arrayLinea.push(listaFechas[i])
                arrayLinea.push(listaDescripcion[i])
                arrayLinea.push(listaId[i])

                arrayPodcast.push(arrayLinea)
            }


            function filtrar() {
          var searchTerm = $("#busqueda").val().toLowerCase();
          var resetear = document.getElementById('limpiaBusqueda');
          resetear.style.display = 'block';
          var filteredTitulos =  arrayPodcast.filter(function(podcast) {
            return podcast[0].toLowerCase().includes(searchTerm)
            });

            var userList = $("#contenedorPodcast");
            userList.empty();


            filteredTitulos.forEach(function(podcast) {
            var listItem = `<tr>
                                    <td>${podcast[0]}</td>
                                    <td>${podcast[1]}</td>
                                    <td>${podcast[2]}</td>
                                    <td>${podcast[3]}</td>
                                    <td><button class="Btn" onclick="window.location.href='form_edicionTarjetas.php?id=${podcast[4]}'">Editar
                                        <svg class="svg" viewBox="0 0 512 512">
                                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                        </svg>
                                    </button></td>
                                </tr>`;
            userList.append(listItem);
            })
        }        

        function limpiar() {
            $("#busqueda").val("");
            filtrar();
            var resetear = document.getElementById('limpiaBusqueda');
          resetear.style.display = 'none';
        }
        </script>
    </body>
</html>
