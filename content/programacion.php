<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0">

        <title>Programación - Radio Isla Cristina</title>

        <link rel="stylesheet" type="text/css" href="../styles/menu.css">
        <link rel="stylesheet" type="text/css" href="../styles/programacion.css">
        
        <link rel="icon" type="image/png" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </head>
    <body>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                programacion('Lunes');
            });

            function programacion(dia) {
                const xhr = new XMLHttpRequest();
                const url = `../administration/prog_botonDia.php?dia=${dia}`;
                
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            try {
                                const response = JSON.parse(xhr.responseText); 
                                datosDevueltos(response);
                            } catch (error) {
                                console.error('Error al parsear JSON:', error);
                            }
                        } else {
                            console.error('Hubo un error al hacer la consulta. Código de estado:', xhr.status);
                        }
                    }
                };

                xhr.open('GET', url, true);
                xhr.send();
            }
            
            function datosDevueltos(datos) {
                try {
                    // Obtén el contenedor en el que se agregarán las tarjetas
                    var container = document.querySelector('.tarjetas');

                    // Limpiar contenido anterior
                    container.innerHTML = '';

                    // Verificar si hay datos para mostrar
                    if (datos && datos.length > 0) {
                        // Itera sobre los datos
                        datos.forEach((data) => {
                            // Crea el contenedor de la tarjeta
                            var cardContainer = document.createElement('div');
                            cardContainer.classList.add('card-container');

                            // Crea el div principal de la tarjeta
                            var cardDiv = document.createElement('div');
                            cardDiv.classList.add('card');

                            // Crea el contenido frontal de la tarjeta
                            var frontContentDiv = document.createElement('div');
                            frontContentDiv.classList.add('front-content');
                            frontContentDiv.id = 'contenidoFront';

                            // Crea la imagen de la tarjeta
                            var img = document.createElement('img');
                            img.src = '../imgs/' + data.foto;
                            img.classList.add('imgn' + data.id);
                            //console.log('Clases de la imagen:', img.classList);

                            // Crea el contenido del texto
                            var contentDiv = document.createElement('div');
                            contentDiv.classList.add('content');
                            contentDiv.id = 'contentDiv';

                            // Crea el encabezado
                            var heading = document.createElement('p');
                            heading.classList.add('heading');
                            heading.id = 'headingContent';
                            heading.textContent = data.titulo + ': ' + data.hora; 

                            var texto1 = document.createElement('p'); var texto2 = document.createElement('p');
                            texto1.classList.add('texto'); texto2.classList.add('texto');
                            texto1.textContent = "Presenta: " + data.presentador;
                            texto2.textContent = data.descripcion;

                            frontContentDiv.appendChild(img);
                            contentDiv.appendChild(heading); 
                            contentDiv.appendChild(texto1);
                            contentDiv.appendChild(texto2);
                            cardDiv.appendChild(frontContentDiv);
                            cardDiv.appendChild(contentDiv);
                            cardContainer.appendChild(cardDiv);
                            container.appendChild(cardContainer);
                        });
                    } else {
                        // No hay datos válidos para mostrar, se puede mostrar un mensaje o realizar otra acción
                        console.log('No hay datos para mostrar.');
                    }
                } catch (error) {
                    console.log('Error al intentar:', error.message);
                }
            }
        </script>
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
                    <li class="list active" data-menu-id="4">
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
        <div style="top: 0; display: flex; height: 80px; left: 0; position: fixed; right: 0; width: 100%; z-index: 1500; overflow: hidden;">
            <iframe class="cuadroBordeado" src="https://cp.usastreams.com/pr2g/APPlayerRadioHTML5.aspx?stream=https://radioserver11.profesionalhosting.com/proxy/pkg81947b?mp=/stream&amp;fondo=00&amp;formato=mp3&amp;color=7&amp;titulo=2&amp;autoStart=1&amp;vol=5&amp;tipo=200&amp;nombre=Radio+Isla+Cristina&amp;botonPlay=1&amp;imagen=https://radio.islacristina.org/wp-content/uploads/2021/07/Logo-Reducido.jpg&amp;server=https://radioserver11.profesionalhosting.com/status.xslCHUMILLASmount=/proxy/status.xslCHUMILLASmount=/pkg81947bCHUMILLASmp=/status.xslCHUMILLASmount=/stream" name="contenedorPlayer" width="100%" height="80px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            <button id="play-button" style="position: absolute; top: 20px; left: 20px; display: none;">Play</button>
        </div>
        <div class="mydict">
            <div class="separar">
                <label>
                    <input type="radio" name="radio" checked="">
                    <span onclick="programacion('Lunes')">Lunes</span>
                </label>
                <label>
                    <input type="radio" name="radio">
                    <span onclick="programacion('Martes')">Martes</span>
                </label>
                <label>
                    <input type="radio" name="radio">
                    <span onclick="programacion('Miercoles')">Miércoles</span>
                </label>
                <label>
                    <input type="radio" name="radio">
                    <span onclick="programacion('Jueves')">Jueves</span>
                </label>
                <label>
                    <input type="radio" name="radio">
                    <span onclick="programacion('Viernes')">Viernes</span>
                </label>
                <label>
                    <input type="radio" name="radio">
                    <span onclick="programacion('Sabado')">Sábado</span>
                </label>
                <label>
                    <input type="radio" name="radio">
                    <span onclick="programacion('Domingo')">Domingo</span>
                </label>
            </div>
            <div class="tarjetas">
                <div class="card-container" id="tarjeta">
                    <div class="card">
                        <div class="front-content" id="contenidoFront"></div>
                        <div class="content" id="contentDiv">
                            <p class="heading" id="headingContent"></p>
                            <p class="texto" id="texto1"></p>
                            <p class="texto" id="texto2"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../scripts/autoplay.js"></script>
        <script src="../scripts/menu.js"></script>
    </body>
</html>
