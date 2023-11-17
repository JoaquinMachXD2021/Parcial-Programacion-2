<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Productos</h1>

    <?php

    if (!$conn) 
    {
      die("Error en la conexión: " . mysqli_connect_error());
    }	
    ?>

    // Consulta SQL para obtener los productos
    $sql = "SELECT id, nombre, descripcion, precio FROM productos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos en una tabla HTML
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["descripcion"] . "</td>";
            echo "<td>$" . number_format($row["precio"], 2) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron productos.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>

</body>
</html>