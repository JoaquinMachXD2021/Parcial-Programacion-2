<?php
include("productos_tabla.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

$mostrar = $ws_controller->obtenerProducto($id);
if (count($mostrar) == 0)
	die();
$proid = $mostrar['id'];
$pronom = $mostrar['nombre'];
$prodes = $mostrar['descripcion'];
$propre = $mostrar['precio'];
$procat = $mostrar['categoria_nombre'];
?>
<html>
<link rel="stylesheet" href="./productos_ver.css">
<body>
	<div class="caja_popup2">
		<form class="contenedor_popup" method="POST">
			<table>
				<tr>
					<th colspan="2">Ver producto</th>
				</tr>
				<tr>
					<td><b>Id:</b></td>
					<td>
						<?php echo $proid; ?>
					</td>
				</tr>
				<tr>
					<td><b>Nombre: </b></td>
					<td>
						<?php echo $pronom; ?>
					</td>
				</tr>
				<tr>
					<td><b>Descripción: </b></td>
					<td>
						<?php echo $prodes; ?>
					</td>
				</tr>
				<tr>
					<td><b>Precio: </b></td>
					<td>
						<?php echo $propre; ?>
					</td>
				</tr>
				<tr>
					<td><b>Categoría: </b></td>
					<td>
						<?php echo $procat; ?>
					</td>
				</tr>
				<td><b>Imagen: </b></td>
				<td>
					<img src="images/productos/<?= $id ?>.png"
						onclick="window.open('images/productos/<?= $id ?>.png','_blank')">
				</td>
				</tr>

				<tr>

					<td colspan="2">
						<?php echo "<a class='BotonesTeam' href=\"productos_tabla.php?pag=$pagina\">Regresar</a>"; ?>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>

</html>