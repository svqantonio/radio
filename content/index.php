
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0">

        <title>Inicio - Radio Isla Cristina</title>

        <link rel="icon" type="image/png" href="../imgs/radio.png">
        <link rel="stylesheet" type="text/css" href="../styles/index.css">
        <link rel="stylesheet" type="text/css" href="../styles/carrusel.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0"></script>

    </head>
    <body>
        <div class="fondo-navigation"> 
            <div class="navigation">
                <ul>
                    <li class="list active" data-menu-id="1">
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
                        <a href="#programacion">
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

        <div style="top: 0; display: flex; height: 80px; left: 0; position: fixed; right: 0; width: 100%; z-index: 1500; overflow: hidden;">
            <iframe class="cuadroBordeado" src="https://cp.usastreams.com/pr2g/APPlayerRadioHTML5.aspx?stream=https://radioserver11.profesionalhosting.com/proxy/pkg81947b?mp=/stream&amp;fondo=00&amp;formato=mp3&amp;color=7&amp;titulo=2&amp;autoStart=0&amp;vol=5&amp;tipo=200&amp;nombre=Radio+Isla+Cristina&amp;botonPlay=0&amp;imagen=https://radio.islacristina.org/wp-content/uploads/2021/07/Logo-Reducido.jpg&amp;server=https://radioserver11.profesionalhosting.com/status.xslCHUMILLASmount=/proxy/status.xslCHUMILLASmount=/pkg81947bCHUMILLASmp=/status.xslCHUMILLASmount=/stream" name="contenedorPlayer" width="100%" height="80px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            <button id="play-button" style="position: absolute; top: 20px; left: 20px; display: none;">Play</button>
        </div>
        <div class="container">
            <div class="box1">
                <div class="slider position"></div>
            </div>
            <div class="box2">
                <div class="fb-page" data-href="https://www.facebook.com/radioislacristina" data-show-posts="true" data-width="500" data-height="415" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
            </div>
        </div>

        <script src="../scripts/autoplay.js"></script>
        <script src="../scripts/menu.js"></script>
    </body>
</html>
