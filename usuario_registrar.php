<?php
include('conexion.php');

$nombre = $_POST["txtnombre1"];
$correo = $_POST["txtcorreo1"];
$pass 	= $_POST["txtpassword1"];


$insertarusu = mysqli_query($conn,"INSERT INTO usuarios(nom,correo,pass) values ('$nombre','$correo','$pass')");
	
if(!$insertarusu)
{
echo "<script>alert('Correo duplicado, intenta con otro correo');window.location='index.php';</script>";	 
}
else
{
echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.php' </script>";
}

?>