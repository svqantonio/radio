<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0">

        <title>Carnaval - Radio Isla Cristina</title>

        <link rel="stylesheet" type="text/css" href="../styles/menu.css">
        <link rel="stylesheet" type="text/css" href="../styles/carnaval.css">
        <link rel="stylesheet" type="text/css" href="../styles/buscador.css">
        <link rel="stylesheet" type="text/css" href="../styles/btns/btnPodcast.css">

        <link rel="icon" type="image/png" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <style>
            .carnavalTabla {
                width: 100%;
                overflow-x: auto;
            }

            @media (max-width: 768px) {
                .carnavalTabla{
                    margin-left: 20%;
                }
            }
        </style>
    </head>
    <body>
        <div class="fondo-navigation">
            <div class="navigation">
                <ul>
                    <li class="list" data-menu-id="1">
                        <a href="#inicio">
                            <span class="icon">
                                <ion-icon name="radio"></ion-icon>
                            </span>
                            <span class="text">Inicio</span>
                        </a>
                    </li>
                    <li class="list" data-menu-id="2">
                        <a href="#hemeroteca">
                            <span class="icon">
                                <ion-icon name="library-outline"></ion-icon>
                            </span>
                            <span class="text">Hemeroteca</span>
                        </a>
                    </li>
                    <li class="list" data-menu-id="3">
                        <a href="#contacto">
                            <span class="icon">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                            </span>
                            <span class="text">Contacto</span>
                        </a>
                    </li>
                    <li class="list" data-menu-id="4">
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="calendar-outline"></ion-icon>
                            </span>
                            <span class="text">Programación</span>
                        </a>
                    </li>
                    <li class="list active" data-menu-id="5">
                        <a href="#carnaval">
                            <span class="icon">
                                <ion-icon name="color-palette-outline"></ion-icon>
                            </span>
                            <span class="text">Carnaval</span>
                        </a>
                    </li>
                    <div class="indicator"></div>
                </ul>
            </div>
        </div>
        <div class="contenido">
            <div id="main-container">
                <h1>Carnaval</h1>
                <header style="margin-top:20px;">
                    <!--<div id="cuadroBusqueda">
                    <div class="barra">
                            <div class="searchBox">
                            <div class="shadow"></div>
                            <input type="text" id="busqueda" onkeyup="filtrar()" placeholder="Introduce un criterio de búsqueda">
                            <ion-icon id="iconoBusqueda" name="search-outline"></ion-icon>
                            </div> 
                        </div>
                        <div class="cuadroLimpiar">
                            <div id="limpiaBusqueda" onclick="limpiar()">
                            <ion-icon id="iconoBusqueda" name="close-outline"></ion-icon>
                            </div>
                        </div>
                    </div>-->
                </header>
                <table class="carnavalTabla">
                    <thead>
                        <tr class="tihead">
                            <th>Título</th>
                            <th>Fecha</th>
                            <th>Temática</th>
                            <th>Enlace</th>
                        </tr>
                    </thead>
                    <tbody id="contenedorPodcast">
                        <?php 
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
                                $sqlSetLocale = "SET lc_time_names = 'es_ES'";
                                $arrayTitulos = array(); 
                                $arrayFechas = array();
                                $arrayTematica = array();
                                $arrayId = array();

                                if ($conn->query($sqlSetLocale) === TRUE) {
                                    $sql = "SELECT id, titulo, DAY(fecha) as dia, MONTHNAME(fecha) as mes, YEAR(fecha) as anyo, tematica FROM podcasts WHERE tematica = 'carnaval';";

                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        while ($fila = mysqli_fetch_assoc($result)) {
                                            $fecha_formateada = $fila['dia'] . " de " . ucfirst(utf8_encode($fila['mes'])) . " de " . $fila['anyo'];

                                            $arrayTitulos[] = $fila['titulo'];
                                            $arrayFechas[] = $fecha_formateada;
                                            $arrayTematica[] = $fila['tematica'];
                                            $arrayId[] = $fila['id'];
                                            ?>
                                            <tr class="tibody">
                                                <td><?php echo $fila['titulo'] ?></td>
                                                <td><?php echo $fecha_formateada ?></td>
                                                <td><u><?php echo $fila['tematica'] ?></u></td>
                                                <td>
                                                     <button class='cta' onclick="window.location.href='tarjeta_podcasts.php?num=<?php echo $fila['id'] ?>'">
                                                        <span class='span'>Podcast</span>
                                                        <span class='second'>
                                                           <svg width='50px' height='20px' viewBox='0 0 66 43' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                                                            <g id='arrow' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                                                              <path class='one' d='M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z' fill='#056bfa'></path>
                                                              <path class='two' d='M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z' fill='#056bfa'></path>
                                                              <path class='three' d='M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z' fill='#056bfa'></path>
                                                            </g>
                                                          </svg>
                                                        </span> 
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                        } 
                                        mysqli_free_result($result);
                                    } else {
                                        echo "Error en la consulta: " . mysqli_error($conn);
                                    }
                                    mysqli_close($conn);   
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script type="text/javascript" language="javascript">
        /* Scripts para el cuadro de búsqueda de hemeroteca */
            var listaTitulo = new Array();
            var listaFechas = new Array();
            var listaTematica = new Array();
            var listaId = new Array();

            <?php foreach($arrayTitulos as $key => $val){ ?>
                listaTitulo.push('<?php echo $val; ?>');
            <?php } ?>
            
            <?php foreach($arrayFechas as $key => $val){ ?>
                listaFechas.push('<?php echo $val; ?>');
            <?php } ?>
            <?php foreach($arrayTematica as $key => $val){ ?>
                listaTematica.push('<?php echo $val; ?>');
            <?php } ?>
            <?php foreach($arrayId as $key => $val){ ?>
                listaId.push('<?php echo $val; ?>');
            <?php } ?>

            var arrayPodcast = new Array();
            for(let i = 0; i < listaTitulo.length; i++) {
                var arrayLinea = new Array();
                arrayLinea.push(listaTitulo[i]);
                arrayLinea.push(listaFechas[i]);
                arrayLinea.push(listaTematica[i]);
                arrayLinea.push(listaId[i]);
                arrayPodcast.push(arrayLinea);
            }

            function filtrar() {
                var searchTerm = $("#busqueda").val().toLowerCase();
                var resetear = document.getElementById('limpiaBusqueda');
                resetear.style.display = 'block';
                var filteredTitulos =  arrayPodcast.filter(function(podcast) {
                    return podcast[0].toLowerCase().includes(searchTerm);
                });

                var userList = $("#contenedorPodcast");
                userList.empty();

                filteredTitulos.forEach(function(podcast) {
                    var listItem = `<tr class="tibody">
                        <td>${podcast[0]}</td>
                        <td>${podcast[1]}</td>
                        <td><u>${podcast[2]}</u></td>
                        <td>
                            <button class='cta' onclick="window.location.href='tarjeta_podcasts.php?num=${podcast[3]}'">
                                <span class='span'>Podcast</span>
                                <span class='second'>
                                    <svg width='50px' height='20px' viewBox='0 0 66 43' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                                        <g id='arrow' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                                            <path class='one' d='M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z' fill='#056bfa'></path>
                                            <path class='two' d='M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z' fill='#056bfa'></path>
                                            <path class='three' d='M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z' fill='#056bfa'></path>
                                        </g>
                                    </svg>
                                </span> 
                            </button>
                        </td>
                    </tr>`;
                    userList.append(listItem);
                });
            }        

        function limpiar() {
            $("#busqueda").val("");
            filtrar();
            var resetear = document.getElementById('limpiaBusqueda');
          resetear.style.display = 'none';
        }
        </script>
        <script src="../scripts/menu.js"></script>

    </body>
</html>