<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0">
        <meta charset="UTF-8">
        <title>Hemeroteca - Radio Isla Cristina</title>

        <link rel="icon" type="image/png" href="../imgs/radio.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="../styles/menu.css">
        <link rel="stylesheet" type="text/css" href="../styles/hemeroteca.css">
        <link rel="stylesheet" type="text/css" href="../styles/buscador.css">

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <style>
            @media (max-width: 768px) {
                #btns {
                    margin-bottom: 25%;
                }
            }
        </style>
    </head>
    <body>
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
        <div id="btns" style="margin-bottom: 25%">
            <h1 style="font-family: 'Courier', sans-serif; text-align: center;">Hemeroteca: Años disponibles</h1>
            <header style="margin-top: 20px;">
                <div id="cuadroBusqueda">
                    <div class="barra">
                        <div class="searchBox">
                            <div class="shadow"></div>
                            <input type="text" id="busqueda" name="busqueda" placeholder="Introduce lo que quieras buscar">
                            <ion-icon id="iconoBusqueda" name="search-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </header>
            <p style="color: white; margin-top: 5%; font-family: 'Courier', sans-serif; text-align: center;">Para buscar una fecha o mes y año, usa guiones (-) no barras (/). Ejemplo: 06-2023 o 02-03-2023</p>
            <?php 
                $servername = "lldn292.servidoresdns.net";  
                $username = "qaid011";     
                $password = "AntonioGay01";   
                $dbname = "qaid011";  

                $conn = mysqli_connect($servername, $username, $password, $dbname);
                mysqli_set_charset($conn, "utf8mb4");

                if (!$conn) {
                    die("Error en la conexión: " . mysqli_connect_error());
                } else {
                    $sql = "SELECT DISTINCT YEAR(fecha) as anyo FROM podcasts order by YEAR(fecha)";

                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        $contador = 0; 
                        echo '<div class="btn-group" style="margin-top: 70px;">'; 
                        while($fila = $result->fetch_assoc()) {
                            echo '<button data-text="Awesome" class="buttonpma" onclick="window.location.href=\'hemeroteca_meses.php?anyo=' . $fila['anyo'] . '\'">
                            <span class="actual-text">&nbsp;' . $fila['anyo'] . '&nbsp;</span>
                            <span class="hover-text" aria-hidden="true">&nbsp;' . $fila['anyo'] . '&nbsp;</span>
                        </button>';
                            $contador++;
                            
                            // Si el contador llega a 3, cerramos el grupo actual y abrimos uno nuevo
                            if ($contador == 3) {
                                echo '</div><div class="btn-group">';
                                $contador = 0; // Reiniciamos el contador
                            }
                        }
                        echo '</div>'; // Cerramos el último grupo de botones
                    }
                }
            ?>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('busqueda');

                function searchAndRedirect() {
                    const searchText = searchInput.value.trim();
                    //console.log("SearchText: ", searchText);
                    
                    // Expresión regular para verificar si el formato es MM/YYYY o MM-YYYY con guiones o barras
                    const regexDate = /^(0[1-9]|1[0-2])[-\/]\d{4}$/;
                    
                    // Expresión regular para verificar si el formato es solo YYYY
                    const regexYear = /^\d{4}$/;
                    
                    // Verificar si searchText tiene al menos 6 dígitos y dos guiones o barras
                    const regexDigits = /\d/g;
                    const regexDelimiters = /[-\/]/g;
                    
                    const digitMatches = searchText.match(regexDigits);
                    const delimiterMatches = searchText.match(regexDelimiters);
                    
                    const hasSixDigits = digitMatches && digitMatches.length >= 6;
                    const hasTwoDelimiters = delimiterMatches && delimiterMatches.length >= 2;
                    
                    var dataConverted = null;
                    if (regexDate.test(searchText))
                        dataConverted = dateConversion(searchText);
                        //console.log("Formato de fecha MM/YYYY o MM-YYYY detectado.");
                    else if (hasSixDigits && hasTwoDelimiters)
                        dataConverted = dateConversion(searchText);
                        //console.log("Texto con al menos 6 dígitos y dos guiones o barras detectado.");
                    else if (regexYear.test(searchText)) 
                        dataConverted = dateConversion(searchText);
                        //console.log("Formato de año YYYY detectado.");
                    
                    console.log("Fecha devuelta: ", dataConverted);
                    if (dataConverted == null)
                        window.location.href = `busqueda.php?search=${encodeURIComponent(searchText)}&page=${encodeURIComponent(0)}`;
                    else    
                        window.location.href = `busqueda.php?search=${encodeURIComponent(dataConverted)}&page=${encodeURIComponent(0)}&searchParameter=date`;
                } 

                searchInput.addEventListener('keyup', function(event) {
                    if (event.key === 'Enter')
                        searchAndRedirect();
                    
                });
            });

            function dateConversion(date) {
                console.log("Fecha que recibo: ", date);

                // Determinar el separador utilizado en la fecha
                let separator = date.includes('-') ? '-' : '/';

                // Dividir la fecha en partes utilizando el separador adecuado
                let parts = date.split(separator);

                // Caso 1: Solo año (1 parte)
                if (parts.length === 1 && parts[0].length === 4) {
                    return date; // No hacer nada, devolver la entrada original
                }

                // Caso 2: Mes y año (2 partes)
                if (parts.length === 2 && parts[0].length === 2 && parts[1].length === 4) {
                    let month = parts[0];
                    let year = parts[1];

                    // Retornar la fecha en formato YYYY-MM
                    return `${year}-${month}`;
                }

                // Caso 3: Día, mes y año (3 partes)
                if (parts.length === 3) {
                    let day = parts[0];
                    let month = parts[1];
                    let year = parts[2];

                    // Retornar la fecha en formato americano YYYY-MM-DD
                    return `${year}-${month}-${day}`;
                }

                // Si el formato no es reconocido, retornar la entrada original
                return date;
            }
        </script>
        <script src="../scripts/menu.js"></script>
    </body>
</html>