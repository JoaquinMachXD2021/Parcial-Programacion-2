<?php

class ws_controller
{ 
    public $usuario;
    public $clave;
    function obtenerOfertas(){

    }

    function listarProductosConCategoria()
    {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://192.168.1.10/parcial2/ws/abml.php?list=null',
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
        
        $productos=json_decode($response,true)["data"];

        return $productos;
    }
}



?>