<?php
include("conexion.php");
include('chequeo_sesion.php');
include("restringir_acceso.php");
include("barra_lateral.php");
include("ws_controller.php");

$ws_controller = new ws_controller();
$ws_controller->usuario = $_SESSION["usuarioingresando"];
$ws_controller->clave = $_SESSION["clave"];

$id = $_GET['id'];

$ws_controller -> borrarProducto($id);

$pagina = $_GET['pag'];

header("Location:productos_tabla.php?pag=$pagina");

?>