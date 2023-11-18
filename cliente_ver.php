<?php
include("conexion.php");
include('chequeo_sesion.php');
include("ws_controller.php");

$ws_controller = new ws_controller();

$productos = $ws_controller -> obtenerOfertas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Restaurante DOOM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cliente_ver.css?t=12313124124">
    <link rel="icon" href="./faviconDOOM.png" type="image/x-icon">
</head>

<body>
    <a href="cerrar_sesion.php"> Cerrar sesión</a>
    <a href="cerrar_sesion.php"><img src="./images/Restaurantelogo.png" alt="Texto alternativo"></a>

    <div class="item selected">
        <img class="image" src="https://static.vecteezy.com/system/resources/previews/024/280/420/original/hot-and-fresh-tasty-delicious-grilled-hamburger-ai-generated-png.png">
        <div class="scanlines"></div>
        <h2 class="title">
            LA BFG Burger
        </h2>
        <div class="priceContainer">
            <div class="price">
                A solo<br>$20.99
            </div>
        </div>
    </div>
    <div class="item">
        <img class="image" src="https://static.vecteezy.com/system/resources/previews/024/280/420/original/hot-and-fresh-tasty-delicious-grilled-hamburger-ai-generated-png.png">
        <div class="scanlines"></div>
        <h2 class="title">
            LA BFG Burger
        </h2>
        <div class="priceContainer">
            <div class="price">
                A solo<br>$20.99
            </div>
        </div>
    </div>
    <div class="item">
        <img class="image" src="https://static.vecteezy.com/system/resources/previews/024/280/420/original/hot-and-fresh-tasty-delicious-grilled-hamburger-ai-generated-png.png">
        <div class="scanlines"></div>
        <h2 class="title">
            LA BFG Burger
        </h2>
        <div class="priceContainer">
            <div class="price">
                A solo<br>$20.99
            </div>
        </div>
    </div>
    <div class="item">
        <img class="image" src="https://static.vecteezy.com/system/resources/previews/024/280/420/original/hot-and-fresh-tasty-delicious-grilled-hamburger-ai-generated-png.png">
        <div class="scanlines"></div>
        <h2 class="title">
            LA BFG Burger
        </h2>
        <div class="priceContainer">
            <div class="price">
                A solo<br>$20.99
            </div>
        </div>
    </div>
    <div class="item">
        <img class="image" src="https://static.vecteezy.com/system/resources/previews/024/280/420/original/hot-and-fresh-tasty-delicious-grilled-hamburger-ai-generated-png.png">
        <div class="scanlines"></div>
        <h2 class="title">
            LA BFG Burger
        </h2>
        <div class="priceContainer">
            <div class="price">
                A solo<br>$20.99
            </div>
        </div>
    </div>
    <div class="item">
        <img class="image" src="https://static.vecteezy.com/system/resources/previews/024/280/420/original/hot-and-fresh-tasty-delicious-grilled-hamburger-ai-generated-png.png">
        <div class="scanlines"></div>
        <h2 class="title">
            LA BFG Burger
        </h2>
        <div class="priceContainer">
            <div class="price">
                A solo<br>$20.99
            </div>
        </div>
    </div>
        <?php /*foreach ($productos as $cat) foreach($cat['productos'] as $producto): ?>
            <div class="item">
                <h2><?= $producto['nombre'] ?></h2>
                <p>Categoría: <?= $cat['nombre'] ?></p>
                <p>Descripción: <?= $producto['descripcion'] ?></p>
                <p class="price">$<?= $producto['precio'] ?></p>
            </div>
        <?php endforeach; */?>


    <footer>
    <p>Todos los derechos reservados &copy; 2023 Los Señores de la Cocina Infernal</p>
    </footer>

    <script src="cliente_ver.js?t=21241245214"></script>
</body>

</html>
