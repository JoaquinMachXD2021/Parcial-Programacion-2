<?php 
include('conexion.php');
include("categoria_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['categoria'];

$querybuscar = mysqli_query($conn, "SELECT * FROM categoria_productos WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
$catid	= $mostrar['id'];
$catnom = $mostrar['nombre'];
}
?>
<html>
<link rel="icon" href="./faviconDOOM.png" type="image/x-icon">
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar categoría</th></tr>
<tr> 
<td>Id</td>
<td><input class="CajaTexto" type="text" name="txtid" value="<?php echo $catid;?>" readonly></td>
</tr>
<tr> 
<td>Nombre</td>
<td><input class="CajaTexto" type="text" name="txtnombre" value="<?php echo $catnom;?>" required></td>

<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"categoria_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class="BotonesTeam" type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar esta categoría?');">
</td>
</tr>
</table>
</form>
</div>
</body>
</html>

<?php
	
if(isset($_POST['btnmodificar']))
{    
$id 		= $_POST['txtid'];
$nombre 	= $_POST['txtnombre'];
      
$querymodificar = mysqli_query($conn, "UPDATE categoria_productos SET nombre='$nombre' WHERE id = '$id'");
echo "<script>window.location= 'categoria_tabla.php?pag=$pagina' </script>";
    
}
?>