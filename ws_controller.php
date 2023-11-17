<?php

class ws_controller
{ 
    public $usuario;
    public $clave;

    private function getDatos($params){
        //Tuvimos que suar curl para pasar datos por POST
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost/parcial2/ws/$params",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => "usuario=$this->usuario&clave=$this->clave",
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: PHPSESSID=e0hro0obdsk0c2vcld5n9s6rhg'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        return json_decode($response,true);
    }

    function obtenerOfertas(){
        $respuesta =$this->getDatos("menu.php")["data"]["categorias"];

        return $respuesta;
    }

    function agregarProducto($nombre, $precio, $descripcion, $categoria)
    {
        $nombre = urlencode($nombre);
        $precio = urlencode($precio);
        $descripcion = urlencode($descripcion);
        $categoria = urlencode($categoria);

        $respuesta =$this->getDatos("abml.php?insert=1&nombre=$nombre&descripcion=$descripcion&precio=$precio&categoria=$categoria");

        return $respuesta;
    }

    function borrarProducto($id)
    {
        $respuesta =$this->getDatos("abml.php?delete=$id");

        return $respuesta;
    }

    function editarProducto($id, $nombre, $precio, $descripcion, $categoria)
    {
        $id = urlencode($id);
        $nombre = urlencode($nombre);
        $precio = urlencode($precio);
        $descripcion = urlencode($descripcion);
        $categoria = urlencode($categoria);
        $respuesta =$this->getDatos("abml.php?update=$id&nombre=$nombre&descripcion=$descripcion&precio=$precio&categoria=$categoria");

        return $respuesta;
    }

    function obtenerProducto($id)
    {
        
        $productos = $this -> getDatos("abml.php?select=$id")["data"];

        return $productos;
    }

    function listarProductos()
    {
        
        $productos = $this -> getDatos('abml.php?list=null')["data"];

        return $productos;
    }

    function buscarProductos($pagina,$nombre)
    {
        if(empty($nombre)) $nombre = "null";
        $productos = $this -> getDatos("abml.php?list=$nombre&page=$pagina")["data"];

        return $productos;
    }
}



?>