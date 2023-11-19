<?php
include("conexion.php");
include('chequeo_sesion.php');
include("ws_controller.php");

$ws_controller = new ws_controller();

$productos = $ws_controller->obtenerOfertas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Restaurante DOOM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cliente_ver.css?t=1231214124">
    <link rel="icon" href="./faviconDOOM.png" type="image/x-icon">
</head>

<tittle id="title">
        <a href="cerrar_sesion.php"><img src="./images/Restaurantelogo.png" alt="Texto alternativo"></a>
</tittle>

<body>
    
    <nav id="close_sesion">
        <a href="cerrar_sesion.php"> Cerrar sesión </a>
    </nav>
    <nav id="info">
        <a href="informacion_ver.php"> Información </a>
    </nav>

    <div id="videoContainer">
        <video autoplay muted loop id="video">
            <source src="video/videofondo.mp4" type="video/mp4">
        </video>
    </div>


    <?php foreach ($productos as $cat) foreach ($cat['productos'] as $producto): ?>
            <div class="item selected">
                <img class="image"
                    src="<?='images/productos/'.$producto['id'].'.png?t='.date("ddMMyyyyHHiiss") ?>">
                <div class="scanlines"></div>
                <h2 class="title">
                <?= $producto['nombre'] ?>
                </h2>
                <div class="priceContainer">
                    <div class="price">
                        A solo<br>$<?= $producto['precio'] ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    <footer>
        <p>Todos los derechos reservados &copy; 2023 Los Señores de la Cocina Infernal</p>
    </footer>

    <script src="cliente_ver.js?t=21245214"></script>
</body>

</html>