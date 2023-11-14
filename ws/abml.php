<?php
    include("conexion.php");
    /*
    http://192.168.1.9/parcial2/ws/abml.php?select=31
    http://192.168.1.9/parcial2/ws/abml.php?insert=&nombre=Prueba de Producto&descripcion=Una descripción interesante&precio=50.99&categoria=1
    http://192.168.1.9/parcial2/ws/abml.php?update=31&nombre=Cambiaste de nombre&descripcion=Nueva descripcion&precio=0&categoria=1
    http://192.168.1.9/parcial2/ws/abml.php?delete=30
    */

    //1. Verificación de datos de usuario

    header("Content-Type:application/json");

    if(!isset($_POST["usuario"]) && !isset($_POST["clave"])) deliver_response(200,'Peticion mal formulada y acceso denegado', '');

    $query = 'SELECT rol FROM usuarios WHERE id='.$_POST["usuario"].' AND pass="'.$_POST["clave"].'"';

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) != 1) deliver_response(200,'Acceso denegado', $query);

    if(mysqli_fetch_assoc($result)['rol'] != ADMIN_ROL_ID) deliver_response(200,'Acceso denegado', '');
                    
    //2. Procesamiento de query

    //Agregar nuevo producto
    if(isset($_GET["insert"]) && isset($_GET["nombre"]) && isset($_GET["descripcion"]) && isset($_GET["precio"]) && isset($_GET["categoria"])){
        if(!is_numeric($_GET["precio"])) deliver_response(200,"El precio debe ser un numero","");
        $nombre = $_GET["nombre"];
        $desc = $_GET["descripcion"];
        $precio = $_GET["precio"];
        $cat = $_GET["categoria"];

        $query = "INSERT INTO Productos (nombre, descripcion, precio, categoria_id) VALUES(
            '$nombre',
            '$desc',
            $precio,
            $cat
        )";
        if(mysqli_query($conn, $query)) deliver_response(200,'Insertar OK!', '');
    }

    //Borrar producto
    if(isset($_GET["delete"])){
        if(!is_numeric($_GET["delete"])) deliver_response(200,"El id debe ser un numero","");
        $id = $_GET["delete"];

        $query = "DELETE FROM Productos WHERE id='$id'";

        if(mysqli_query($conn, $query)) deliver_response(200,'Borrar OK!', '');
    }

    //Actualizar producto
    if(isset($_GET["update"])){
        if(!is_numeric($_GET["update"])) deliver_response(200,"El id debe ser un numero","");
        $id = $_GET["update"];
        $query = "UPDATE Productos SET id=id";

        if (isset($_GET["nombre"]))
        {
            $nombre = $_GET["nombre"];
            $query .= ", nombre = '$nombre'";
        }

        if (isset($_GET["descripcion"]))
        {
            $desc = $_GET["descripcion"];
            $query .= ", descripcion = '$desc'";
        }

        if (isset($_GET["precio"]))
        {
            $precio = $_GET["precio"];
            if(!is_numeric($_GET["precio"])) deliver_response(200,"El precio debe ser un numero","");
            $query .= ", precio = $precio";
        }

        if (isset($_GET["categoria"]))
        {
            $cat = $_GET["categoria"];
            if(!is_numeric($cat)) deliver_response(200,"La categoria debe ser un numero","");
            $query .= ", categoria_id = $cat";
        }
        
        $query.= " WHERE id = '$id'";

        
        if(mysqli_query($conn, $query)) deliver_response(200,'Actualizar OK!', '');
    }

    //Listar producto
    if(isset($_GET["select"])){
        $id = $_GET["select"];
        if(!is_numeric($id)) deliver_response(200,"El id debe ser un numero","");
        $query = "SELECT * FROM Productos WHERE id='$id'";

        
        if($result = mysqli_query($conn, $query)){
            if(mysqli_num_rows($result) > 0)
                deliver_response(200,'Listar OK!', mysqli_fetch_assoc($result));
            else 
                deliver_response(200,'Producto inexistente','');
            
        } 
    }


        
    //Agregar nuevo producto
    deliver_response(200,'Peticion mal formulada', ''  );
    function deliver_query($conn) 
    { 
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

    function deliver_response($status, $status_message, $data)
    {
        header("HTTP/1.1 $status $status_message");
        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['data'] = $data;
 
        $json_response = json_encode($response);
        echo $json_response;
        exit;
    }

?>