<?php
include('conexion.php');

$correo = $_POST["txtcorreo"];
$pass 	= $_POST["txtpassword"];

$buscandousu = mysqli_query($conn,"SELECT * FROM usuarios WHERE correo = '".$correo."' and pass = '".$pass."'");
$nr = mysqli_num_rows($buscandousu);



if($nr == 1)
{
    $_SESSION['usuarioingresando']=$correo;
    $_SESSION['clave']=$pass;
    header("Location: productos_tabla.php");
}
else
{
    header("Location: index.php");
}
?>
