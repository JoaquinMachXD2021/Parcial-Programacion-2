<?php
    include("conexion.php");

    header("Content-Type:application/json");

    if(isset($_GET["categoria"])){
        $query = 'SELECT productos.id, productos.nombre, productos.descripcion, productos.precio FROM productos INNER JOIN categoria_productos ON productos.categoria_id = categoria_productos.id
        WHERE categoria_productos.nombre="'.$_GET["categoria"].'"';

        $result = mysqli_query($conn, $query);

        $i = 0;

        $output = array();

        while ($row = mysqli_fetch_array($result)) 
        {
            $output[$i] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion'],
                'precio' => $row['precio'],
            );
            
            $i++;
        }
    }
    else{
        $query = 'SELECT id, nombre FROM categoria_productos';

        $result = mysqli_query($conn, $query);

        $output = array(
            'categorias' => array()
        );

        $i = 0;

        while ($row = mysqli_fetch_array($result)) 
        {
            $output['categorias'][$i] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'productos' => array(),
            );

            $y = 0;
            $query = 'SELECT id, nombre, descripcion, precio FROM productos WHERE categoria_id = '.$row['id'];

            $result2 = mysqli_query($conn, $query);
            
            while ($row = mysqli_fetch_array($result2,MYSQLI_ASSOC))
            {
                $output['categorias'][$i]['productos'][$y] = $row;
                $y++;
            }
            $i++;
        }
    }

    

    deliver_response(200, 'Solicitud realizada con éxito', $output);

    function deliver_response($status, $status_message, $data)
    {
        header("HTTP/1.1 $status $status_message");
        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['data'] = $data;
 
        $json_response = json_encode($response);
        echo $json_response;
    }
?>