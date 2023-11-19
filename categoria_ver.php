<?php 
include("conexion.php");
include('chequeo_sesion.php');
include("categoria_tabla.php");
$pagina = $_GET['pag'];
$id 	= $_GET['categoria'];

$querybuscar = mysqli_query($conn, "SELECT * FROM categoria_productos WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$catid	= $mostrar['id'];
	$catnom = $mostrar['nombre'];
}
?>
<html lang="es">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./categoria_ver.css">
	<body>
		<div class="caja_popup2">
			<form class="contenedor_popup" method="POST">
				<table>
				<tr><th colspan="2">Ver categoría</th></tr>
					<tr> 
						<td><b>Id:</b></td>
						<td><?php echo $catid;?></td>
					</tr>
							
					<tr> 
						<td><b>Nombre: </b></td>
						<td><?php echo $catnom;?></td>
						</tr>
					<tr>				
						<td colspan="2">
						<?php echo "<a class='BotonesTeam' href=\"categoria_tabla.php?pag=$pagina\">Regresar</a>";?>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>