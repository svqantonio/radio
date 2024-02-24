<html lang="es">
    <head>
        <title>Hemeroteca - <?php echo $_GET['anyo'] ?> - Radio Isla Cristina</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="../styles/menu.css">
        <link rel="stylesheet" type="text/css" href="../styles/hemeroteca.css">
        <link rel="stylesheet" type="text/css" href="../styles/btns/btnVolver.css">
        <link rel="stylesheet" type="text/css" href="../styles/btns/btnPodcast.css">
        
        <link rel="icon" type="image/png" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <style>
            @media (max-width: 768px) {
                #main-container{
                    margin-left: 25%;
                    margin-top: 10%;
                }

                table {
                    width: 150%;
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
                    <li class="list active" data-menu-id="2">
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
                    <li class="list" data-menu-id="5">
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
        <div style="top: 0; display: flex; height: 80px; left: 0; position: fixed; right: 0; width: 100%; z-index: 1500; overflow: hidden;"><iframe class="cuadroBordeado" src="https://cp.usastreams.com/pr2g/APPlayerRadioHTML5.aspx?stream=https://radioserver11.profesionalhosting.com/proxy/pkg81947b?mp=/stream&amp;fondo=00&amp;formato=mp3&amp;color=7&amp;titulo=2&amp;autoStart=1&amp;vol=5&amp;tipo=200&amp;nombre=Radio+Isla+Cristina&amp;botonPlay=1&amp;imagen=https://radio.islacristina.org/wp-content/uploads/2021/07/Logo-Reducido.jpg&amp;server=https://radioserver11.profesionalhosting.com/status.xslCHUMILLASmount=/proxy/status.xslCHUMILLASmount=/pkg81947bCHUMILLASmp=/status.xslCHUMILLASmount=/stream" name="contenedorPlayer" width="100%" height="80px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe></div>
        <div class="contenido">
            <div id="main-container">
                <button class="btn-shine" onclick="window.location.href='hemeroteca.php'"><span class="shine"><ion-icon class="volver" name="arrow-back-circle-outline"></ion-icon>Volver a la hemeroteca</span></button>
                <h3 class="cabeceraTabla">Estás viendo una lista de meses dentro del año <?php echo $_GET['anyo'] ?> que tienen podcasts.</h3>
                <table>
                    <thead>
                        <tr class="tihead">
                            <th>Mes</th>
                            <th>Año</th>
                            <th>Acceso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['anyo'])) {
                                $anyoBuscado = $_GET['anyo'];

                                $servername = "lldn292.servidoresdns.net";  // Nombre del servidor de la base de datos
                                $username = "qaid011";     // Nombre de usuario de la base de datos
                                $password = "AntonioGay01";   // Contraseña de la base de datos
                                $dbname = "qaid011";  // Nombre de la base de datos

                                // Realiza la conexión a la base de datos
                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                                mysqli_set_charset($conn, "utf8mb4");

                                if (!$conn) {
                                    die("Error en la conexión " . mysqli_connect_error());
                                } else {
                                    // Establecer la configuración regional para obtener los nombres de los meses en español
                                    $sqlSetLocale = "SET lc_time_names = 'es_ES'";
                                    if ($conn->query($sqlSetLocale) === FALSE) {
                                        echo "Error al establecer la configuración regional: " . $conn->error;
                                    } else {
                                        $sql = "SELECT DISTINCT MONTH(fecha) as mes_num, MONTHNAME(fecha) as mes FROM podcasts WHERE YEAR(fecha) = '$anyoBuscado' ORDER BY mes_num;";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $mesCapitalized = ucfirst($row['mes']);
                                                echo "<tr class='tibody'>";
                                                echo "<td>" . $mesCapitalized . "</td>";
                                                echo "<td>" . $anyoBuscado . "</td>";
                                                ?>
                                                    <td class="mover">
                                                        <button class='cta' onclick="window.location.href='hemeroteca_podcasts.php?anyo=<?php echo $anyoBuscado ?>&mes=<?php echo $row['mes']; ?>'">
                                                            <span class='span'>Podcasts</span>
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
                                                <?php
                                                echo "</tr>";
                                            }
                                        }
                                        $conn->close();
                                    }
                                }
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="../scripts/menu.js"></script>
    </body>
</html>