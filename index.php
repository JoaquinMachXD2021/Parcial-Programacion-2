<?php
include('conexion.php');
if(isset($_SESSION['usuarioingresando']))
{
header('location: productos_tabla.php');
}
?>

<html>
<head>
<title>Restaurante DOOM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./style.css?t=1">
<link rel="icon" href="./faviconDOOM.png" type="image/x-icon">
</head>
<body>

<div class="FormCajaLogin">

<div class="FormLogin">

<div class="botondeintercambiar">
<div id="btnvai"></div>
<button type="button" class="botoncambiarcaja" onclick="loginvai()" id="vaibtnlogin">Inicio</button>
<button type="button" class="botoncambiarcaja" onclick="registrarvai()" id="vaibtnregistrar">Registro</button>
</div>

<form method="POST" id="frmlogin" class="grupo-entradas" action="usuario_login.php">
<h1>Iniciar sesión</h1>

<div class="TextoCajas"><i class="fa-regular fa-user" style="color: #ffffff;"></i> Ingresar correo</div>
<input type="email" name="txtcorreo" class="CajaTexto" autocomplete="off" required>

<div class="TextoCajas">• Ingresar contraseña</div>
<input type="password"  name="txtpassword" class="CajaTexto" autocomplete="off" required>

<div>
<input type="submit" value="Iniciar sesión" class="BtnLogin" name="btningresar" >
</div>

</form>

<form method="post" id="frmregistrar" class="grupo-entradas" action="usuario_registrar.php">
<h1>Crear nueva cuenta</h1>

<div class="TextoCajas">• Ingresar nombre</div>
<input type="text" name="txtnombre1" class="CajaTexto" autocomplete="off" required>

<div class="TextoCajas">• Ingresar correo</div>
<input type="email" name="txtcorreo1" class="CajaTexto" autocomplete="off" required>

<div class="TextoCajas">• Ingresar contraseña</div>
<input type="password"  name="txtpassword1" class="CajaTexto" autocomplete="off" required>
 
<div>
<input type="submit" value="Crea nueva cuenta" class="BtnRegistrar" name="btnregistrar">
</div>

</form>
</div>
</div>
 
</body>
<script src="boton_formulario.js"></script>
</html>