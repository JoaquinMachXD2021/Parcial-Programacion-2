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
    <link rel="stylesheet" href="cliente_ver.css">
    <link rel="icon" href="./faviconDOOM.png" type="image/x-icon">
</head>

<body>
    <header>
        <img src="./images/Restaurantelogo.png" alt="Texto alternativo">
    </header>

    <div class="navbar">
        <a href="cliente_ver.php"> Inicio</a>
        <a href="#"> Locales</a>
        <a href="informacion_ver.php"> Información</a>
        <a href="cerrar_sesion.php"> Cerrar sesión</a>
    </div>

    <section class="menu">
        
        <?php foreach ($productos as $cat) foreach($cat['productos'] as $producto): ?>
            <div class="item">
                <h2><?= $producto['nombre'] ?></h2>
                <p>Categoría: <?= $cat['nombre'] ?></p>
                <p>Descripción: <?= $producto['descripcion'] ?></p>
                <p class="price">$<?= $producto['precio'] ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <footer>
    <p>Todos los derechos reservados &copy; 2023 Los Señores de la Cocina Infernal</p>
    </footer>

    <script src="PrincipalJS.js"></script>
</body>

</html>
