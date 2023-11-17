<?php
    if(isset($_SESSION['usuarioingresando']))
    {
        $usuarioingresado = $_SESSION['usuarioingresando'];
        $buscandousu = mysqli_query($conn,"SELECT * FROM usuarios WHERE correo = '".$usuarioingresado."'");
        $mostrar=mysqli_fetch_array($buscandousu);
        
        
    }else
    {
        header('location: index.php');
    }
?>