<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0">

        <title>Contacto - Radio Isla Cristina</title>

        <link rel="stylesheet" type="text/css" href="../styles/menu.css">
        <link rel="stylesheet" type="text/css" href="../styles/contacto.css">
        <link rel="stylesheet" type="text/css" href="../styles/btns/btnApartado_Legal.css">

        <link rel="icon" type="image/png" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <style>
            /* Estilos generales */
            .informacion {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
            }

            #mapa { 
                margin-bottom: 25%;
            }

            /* Estilos para pantallas pequeñas (menos de 768px de ancho) */
            @media (max-width: 768px) {
                .logoRadio {
                    margin-top: 25%;
                }
                .besides {
                    flex-direction: column;
                    text-align: center;
                }

                .main {
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    gap: 0.5rem;
                    transform: translateX(30%);
                    margin-bottom: 10%;
                }

                p {
                    font-size: 10px;
                }
                /* Agrega más reglas CSS según sea necesario para que se ajuste al diseño en pantallas más pequeñas */
            }
            
            .logoRadio {
                max-width: 100%;
                height: auto;
            }

            iframe[src*="google.com/maps"] {
                max-width: 100%;
            }

        </style>

    </head>
    <body>
        <div style="top: 0; display: flex; height: 80px; left: 0; position: fixed; right: 0; width: 100%; z-index: 1500; overflow: hidden;">
            <iframe class="cuadroBordeado" src="https://cp.usastreams.com/pr2g/APPlayerRadioHTML5.aspx?stream=https://radioserver11.profesionalhosting.com/proxy/pkg81947b?mp=/stream&amp;fondo=00&amp;formato=mp3&amp;color=7&amp;titulo=2&amp;autoStart=0&amp;vol=5&amp;tipo=200&amp;nombre=Radio+Isla+Cristina&amp;botonPlay=0&amp;imagen=https://radio.islacristina.org/wp-content/uploads/2021/07/Logo-Reducido.jpg&amp;server=https://radioserver11.profesionalhosting.com/status.xslCHUMILLASmount=/proxy/status.xslCHUMILLASmount=/pkg81947bCHUMILLASmp=/status.xslCHUMILLASmount=/stream" name="contenedorPlayer" width="100%" height="80px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            <button id="play-button" style="position: absolute; top: 20px; left: 20px; display: none;">Play</button>
        </div>
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
                    <li class="list active" data-menu-id="3">
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
        <div class="informacion">
            <div class="besides" style="display: flex; flex-wrap: wrap;">
                <img class="logoRadio" src="../imgs/radio.png">
                <div class="main">
                    <div class="up">
                        <button class="card1" onclick="window.open('https://www.instagram.com/radioislacristina', '_blank', 'noopener noreferrer')">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="30px" height="30px" fill-rule="nonzero" class="instagram"><g fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8,8)"><path d="M11.46875,5c-3.55078,0 -6.46875,2.91406 -6.46875,6.46875v9.0625c0,3.55078 2.91406,6.46875 6.46875,6.46875h9.0625c3.55078,0 6.46875,-2.91406 6.46875,-6.46875v-9.0625c0,-3.55078 -2.91406,-6.46875 -6.46875,-6.46875zM11.46875,7h9.0625c2.47266,0 4.46875,1.99609 4.46875,4.46875v9.0625c0,2.47266 -1.99609,4.46875 -4.46875,4.46875h-9.0625c-2.47266,0 -4.46875,-1.99609 -4.46875,-4.46875v-9.0625c0,-2.47266 1.99609,-4.46875 4.46875,-4.46875zM21.90625,9.1875c-0.50391,0 -0.90625,0.40234 -0.90625,0.90625c0,0.50391 0.40234,0.90625 0.90625,0.90625c0.50391,0 0.90625,-0.40234 0.90625,-0.90625c0,-0.50391 -0.40234,-0.90625 -0.90625,-0.90625zM16,10c-3.30078,0 -6,2.69922 -6,6c0,3.30078 2.69922,6 6,6c3.30078,0 6,-2.69922 6,-6c0,-3.30078 -2.69922,-6 -6,-6zM16,12c2.22266,0 4,1.77734 4,4c0,2.22266 -1.77734,4 -4,4c-2.22266,0 -4,-1.77734 -4,-4c0,-2.22266 1.77734,-4 4,-4z"></path></g></g></svg>
                        </button>
                        <button class="card2" onclick="window.open('https://www.facebook.com/radioislacristina', '_blank', 'noopener noreferrer')">
                      <svg width="24" class="facebook" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.19795 21.5H13.198V13.4901H16.8021L17.198 9.50977H13.198V7.5C13.198 6.94772 13.6457 6.5 14.198 6.5H17.198V2.5H14.198C11.4365 2.5 9.19795 4.73858 9.19795 7.5V9.50977H7.19795L6.80206 13.4901H9.19795V21.5Z"></path>
                      </svg>
                    </button>
                  </div>
                  <div class="down">
                    <button class="card3" onclick="window.open('https://wa.me/636263761', '_blank')">
                      <svg class="whatsapp" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="30" width="30">
                        <path d="M19.001 4.908A9.817 9.817 0 0 0 11.992 2C6.534 2 2.085 6.448 2.08 11.908c0 1.748.458 3.45 1.321 4.956L2 22l5.255-1.377a9.916 9.916 0 0 0 4.737 1.206h.005c5.46 0 9.908-4.448 9.913-9.913A9.872 9.872 0 0 0 19 4.908h.001ZM11.992 20.15A8.216 8.216 0 0 1 7.797 19l-.3-.18-3.117.818.833-3.041-.196-.314a8.2 8.2 0 0 1-1.258-4.381c0-4.533 3.696-8.23 8.239-8.23a8.2 8.2 0 0 1 5.825 2.413 8.196 8.196 0 0 1 2.41 5.825c-.006 4.55-3.702 8.24-8.24 8.24Zm4.52-6.167c-.247-.124-1.463-.723-1.692-.808-.228-.08-.394-.123-.556.124-.166.246-.641.808-.784.969-.143.166-.29.185-.537.062-.247-.125-1.045-.385-1.99-1.23-.738-.657-1.232-1.47-1.38-1.716-.142-.247-.013-.38.11-.504.11-.11.247-.29.37-.432.126-.143.167-.248.248-.413.082-.167.043-.31-.018-.433-.063-.124-.557-1.345-.765-1.838-.2-.486-.404-.419-.557-.425-.142-.009-.309-.009-.475-.009a.911.911 0 0 0-.661.31c-.228.247-.864.845-.864 2.067 0 1.22.888 2.395 1.013 2.56.122.167 1.742 2.666 4.229 3.74.587.257 1.05.408 1.41.523.595.19 1.13.162 1.558.1.475-.072 1.464-.6 1.673-1.178.205-.58.205-1.075.142-1.18-.061-.104-.227-.165-.475-.29Z"></path>
                      </svg>
                    </button>
                    <button class="card4" onclick="window.location.href='mailto:radio@islacristina.org'" target='_blank'>
                        <svg class="gmail" height="27" width="27" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="black"></path>
                        </svg>
                    </button>
                  </div>
                </div>
            </div>
            <p>Para cualquier consulta, sugerencia o idea que tengas, puedes ponerte en contacto con nosotros <br>por teléfono, vía e-mail y a través de las redes sociales. -> <a href="legal.html" class="menu__link">Apartado legal</a></p>
            <p class="direccion">Junto Piscina, Av. España, 194, 21410 Isla Cristina, Huelva</p>
            <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3178.103303697769!2d-7.3144941999999835!3d37.19777570000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1024f899704c95%3A0x3532bd8ab1cde73e!2sRadio%20Isla%20Cristina!5e0!3m2!1sen!2ses!4v1700571751876!5m2!1sen!2ses" width="1250" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <script src="../scripts/autoplay.js"></script>
        <script src="../scripts/menu.js"></script>
        
    </body>
</html>