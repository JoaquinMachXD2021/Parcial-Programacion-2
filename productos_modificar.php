<?php 
include("conexion.php");
include('chequeo_sesion.php');
include("productos_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM productos WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{	
	$proid 		= $mostrar['id'];
	$pronom 	= $mostrar['nombre'];
	$prodes 	= $mostrar['descripcion'];
	$propre 	= $mostrar['precio'];
	$procat 	= $mostrar['categoria_id'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Modificar producto</th></tr>	
<tr> 
<td><b>Id: </b></td>
<td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $proid;?>" readonly></td>
</tr>
<tr> 
<td><b>Nombre: </b></td>
<td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $pronom;?>" required></td>
</tr>
<tr> 
<td><b>Descripción: </b></td>
<td><input class="CajaTexto" type="text" name="txtdes" value="<?php echo $prodes;?>" required></td>
</tr>
<tr> 
<td><b>Precio: </b></td>
<td><input class="CajaTexto" type="number" step="any" name="txtpre" value="<?php echo $propre;?>" required ></td>
</tr>
<tr> 
<td><b>Categoría: </b></td>
<td>
<select name="txtcat" class='CajaTexto'>

<?php	
$qrproductos = mysqli_query($conn, "SELECT * FROM categoria_productos ");
while($mostrarcat = mysqli_fetch_array($qrproductos)) 
{ 
if($mostrarcat['id']==$procat)
{
echo '<option selected="selected" value="'.$mostrarcat['id'].'">' .$mostrarcat['nombre']. '</option>';
}
else
{
echo '<option value="'.$mostrarcat['id'].'">' .$mostrarcat['nombre']. '</option>';
}
}		
?> 

</select>
</td>
</tr>
<tr>
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"productos_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este producto');">
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
	$proid1 	= $_POST['txtid'];
	$pronom1 	= $_POST['txtnom'];
	$prodes1	= $_POST['txtdes'];
	$propre1 	= $_POST['txtpre'];
	$procat1 	= $_POST['txtcat'];
      
$querymodificar = mysqli_query($conn, "UPDATE productos SET nombre='$pronom1',descripcion='$prodes1',precio='$propre1',categoria_id='$procat1' WHERE id = '$proid1'");
echo "<script>window.location= 'productos_tabla.php?pag=$pagina' </script>";
    
}
?>