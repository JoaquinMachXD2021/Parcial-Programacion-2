<?php
    if($_SESSION["rol"] == 'usuario'){
        header('Location: cliente_ver.php');
    }
?>