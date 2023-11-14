<?php
function conectarBaseDeDatos() {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "empresa";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    return $conn;
}

function obtenerProductosYCategorias($conn) {/*
    $sql = "SELECT productos.*, categoria_productos.nombre AS categoria_nombre 
            FROM productos 
            INNER JOIN categoria_productos ON productos.categoria_id = categoria_productos.id";
    $result = mysqli_query($conn, $sql);
*/
    $url="http://{ip_webservice}/parcial2/ws/menu.php";                                                                                                                    $json=file_get_contents($url);
    $datos=json_decode($json,true)["datos"];
    $productos = array();
    $productos = $datos;

    /*if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $productos[] = $row;
        }
    }*/

    return $productos;
}

$conn = conectarBaseDeDatos();

$productos = obtenerProductosYCategorias($conn);

mysqli_close($conn);
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
        <a href="productos_tabla.php"> Volver</a>
    </div>

    <section class="menu">
        <?php foreach ($productos as $producto) : ?>
            <div class="item">
                <h2><?= $producto['nombre'] ?></h2>
                <p>Categoría: <?= $producto['categoria_nombre'] ?></p>
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
