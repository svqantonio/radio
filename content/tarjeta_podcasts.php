<html lang="es">

<head>
    <title>Podcast - Radio Isla Cristina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0">

    <link rel="icon" type="image/png" href="../imgs/radio.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/btns/btnVolver_podcast.css">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <style>
        body {
            background: #212120;
            color: white;
        }

        .centrar {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
        }

        .container {
            max-width: 40rem;
            width: 100%;
            margin: auto;
            height: 100vh;

            & .header {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 1rem 0;
                height: 6rem;

                & h1 {

                    & span {
                        display: block;
                        font-size: 1rem;
                        font-weight: lighter;
                    }
                }
            }

            & .content {
                height: calc(100% - 6rem);
                display: flex;
                align-items: center;
                justify-content: center;

                & iframe {
                    width: calc(100% - 2rem);
                    margin: 0 1rem;
                    border: 0;
                    height: 15rem;
                    border-radius: 1rem;
                }
            }
        }
    </style>
</head>

<body>
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
        if ($_GET['mes'] && $_GET['anyo'] && $_GET['num']) { //SI RECIBE 3 PARAMETROS, VIENE DESDE LA HEMEROTECA 
            $mes = $_GET['mes'];
            $anyo = $_GET['anyo'];
            $id = $_GET['num'];
            $sql = "SELECT titulo, DAY(fecha) AS dia, MONTHNAME(fecha) AS mes, YEAR(fecha) AS anyo, principal, persona1, persona2, tematica, enlace FROM podcasts WHERE id = '$id' and MONTH(fecha) = '$mes' and YEAR(fecha) = '$anyo'";
        } else if ($_GET['num']) { //POR SI SOLO RECIBE EL ID, VIENE DESDE EL CARNAVAL
            $id = $_GET['num'];
            $sql = "SELECT titulo, DAY(fecha) AS dia, MONTHNAME(fecha) AS mes, YEAR(fecha) AS anyo, principal, persona1, persona2, tematica, enlace FROM podcasts WHERE id = '$id'";
        }

        $sqlSetLocale = "SET lc_time_names = 'es_ES'";

        if ($conn->query($sqlSetLocale) === TRUE) {
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $enlaceCompleto = $row['enlace'];
                    $enlace = substr($enlaceCompleto, 32, 33);
                    $titulo = $row['titulo'];
                    $fecha_formateada = $row['dia'] . " de " . ucfirst(mb_convert_encoding($row['mes'], 'UTF-8', 'ISO-8859-1')) . " de " . $row['anyo'];
                }
            }
        }
    }
    ?>
    <!--<div class="centrar" style="margin-top: 10%;">
        <button class="btnCB" onclick="window.history.back();">
            <div class="button-box">
                <span class="button-elem">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 40">
                        <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                    </svg>
                </span>
                <span class="button-elem">
                    <svg viewBox="0 0 46 40">
                        <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                    </svg>
                </span>
            </div>
        </button>
    </div>
    <div class="centrar">
        <div style="background-color: white; margin-bottom: 2%;">
            <h3><?php echo $titulo ?> - <?php echo $fecha_formateada ?></h3>
        </div>
        <div class="iframe-container">
            <iframe src="https://drive.google.com/file/d/<?php echo $enlace ?>/preview?export=download&amp;controls=0" frameborder="0" allow="autoplay"></iframe>
        </div>
    </div>-->

    <div class="container">
        <div class="header">
            <button class="btnCB" onclick="window.history.back();">
                <div class="button-box">
                    <span class="button-elem">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 40">
                            <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                        </svg>
                    </span>
                    <span class="button-elem">
                        <svg viewBox="0 0 46 40">
                            <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                        </svg>
                    </span>
                </div>
            </button>
            <h1><?php echo $titulo ?> <span><?php echo $fecha_formateada ?></span></h1>
        </div>
        <div class="content">
            <iframe src="https://drive.google.com/file/d/<?php echo $enlace ?>/preview?export=download&amp;controls=0" frameborder="0" allow="autoplay"></iframe>
        </div>
    </div>

</body>

</html>