<?php
include('conexion.php');
include('chequeo_sesion.php');
include("barra_lateral.php");
include("restringir_acceso.php");
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$id = $_GET['categoria'];

mysqli_query($conn, "DELETE FROM categoria_productos WHERE id='$id'");
header("Location:categoria_tabla.php?pag=$pagina");

?>