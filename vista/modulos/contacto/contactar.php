<?php

include ("conect_bd.php");

if (isset($_POST['enviar_formulario'])){
    if(
        strlen ($_POST['nombre']) >= 1 &&
        strlen ($_POST['correo']) >= 1 &&
        strlen ($_POST['telefono']) >= 1 &&
        strlen ($_POST['mensaje']) >= 1 
    ){
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $mensaje= trim($_POST['mensaje']);


        $consulta = "INSERT INTO contacto(nombre, correo, telefono, mensaje)
        VALUES ('$nombre', '$correo','$telefono','$mensaje')";
        $resultado= mysqli_query($conectado, $consulta);


        if($resultado){
            ?>
            <h4 class="succes" event.preventDefault>¡Recibimos tu comentario,Gracias!</h4>
            <?php
        } else {
            ?>
            <h3 class="error" event.preventDefault>Ocurrio un error</h3>
            <?php
        }
    } else { ?> <h4 class="error" event.preventDefault>Llena todos los campos</h4> <?php
    }

}

?>
