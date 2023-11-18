<?php
include("productos_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$mostrar = $ws_controller -> obtenerProducto($id);

if(count($mostrar)== 0) die('');
	$proid 		= $mostrar['id'];
	$pronom 	= $mostrar['nombre'];
	$prodes 	= $mostrar['descripcion'];
	$propre 	= $mostrar['precio'];
	$procat 	= $mostrar['categoria_id'];
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST" enctype="multipart/form-data">
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
<tr> 
<td><b>Imagen: </b></td>
<td>
	<input class="CajaTexto" type="file" name="fileimg"></td>
</tr>
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
	$id 	= $_POST['txtid'];
	$nombre 	= $_POST['txtnom'];
	$descripcion	= $_POST['txtdes'];
	$precio 	= $_POST['txtpre'];
	$categoria 	= $_POST['txtcat'];

	$ext = pathinfo($_FILES['fileimg']['name'], PATHINFO_EXTENSION);
	
	move_uploaded_file($_FILES['fileimg']['tmp_name'], "images/productos/". $id.".$ext");

	$respuesta = $ws_controller -> editarProducto($id, $nombre, $precio, $descripcion, $categoria);

	echo "<script>window.location= 'productos_tabla.php?pag=$pagina' </script>";
    
}
?>