<?php

    $usuario = "root";
    $password = "";
    $servidor = "localhost";
    $BD = "transporta_bd";


    $conexion = new mysqli($servidor, $usuario, $password, $BD);
    mysqli_set_charset($conexion,'utf8');

if($conexion -> connect_error){
    echo ("<script text= 'text/javascript'>
    alert('ERROR!, la conexión no se pudo establecer');
    window.location = 'index.php?pagina=inicio';
    </script>");
    
}

