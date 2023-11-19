<?php 
include('conexion.php');
include('chequeo_sesion.php');
include("categoria_tabla.php");

$pagina = $_GET['pag'];
?>
<html>
<head>    
<title>Restaurante DOOM</title>
<link rel="stylesheet" type="text/css" href="./categoria_registrar.css">
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<link rel="icon" href="./faviconDOOM.png" type="image/x-icon">
</head>
<body>
<div class="caja_popup2"> 
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2" >Agregar categoría</th></tr>
<tr> 
<td>Nombre</td>
<td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr> 	
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"categoria_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar esta categoría?');">
</td>
</tr>
</table>
</form>
 </div>
</body>
</html>
<?php

if(isset($_POST['btnregistrar']))
{   
	$vainom 	= $_POST['txtnom'];

	$queryadd	= mysqli_query($conn, "INSERT INTO categoria_productos(nombre) VALUES('$vainom')");
	
 	if(!$queryadd)
	{
		 echo "<script>alert('Id duplicado, intenta otra vez');</script>";
		 
	}else
	{
		echo "<script>window.location= 'categoria_tabla.php?pag=1' </script>";
	}
}
?>