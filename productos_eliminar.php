<?php
include("conexion.php");
include('chequeo_sesion.php');
include("barra_lateral.php");
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$id = $_GET['id'];



mysqli_query($conn, "DELETE FROM productos WHERE id='$id'");
header("Location:productos_tabla.php?pag=$pagina");

?>