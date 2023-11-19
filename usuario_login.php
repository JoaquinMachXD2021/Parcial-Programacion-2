<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?t=1">
</head>
<body>
<?php
session_start();
include('conexion.php');

$correo = $_POST["txtcorreo"];
$pass 	= $_POST["txtpassword"];

$buscandousu = mysqli_query($conn,"SELECT * FROM usuarios WHERE correo = '".$correo."' and pass = '".$pass."'");
$nr = mysqli_num_rows($buscandousu);



if($nr == 1)
{
    $_SESSION['usuarioingresando']=$correo;
    $_SESSION['clave']=$pass;
    $_SESSION['rol']=mysqli_fetch_assoc($buscandousu)['rol'];
    header("Location: productos_tabla.php");
}
else
{
    header("Location: index.php");
}
?>
</body>
</html>
