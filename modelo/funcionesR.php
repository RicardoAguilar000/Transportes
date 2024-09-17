<?php

    /* Remolque*/

    function subir_imagenR(){
        if (isset($_FILES["imagen_remolque"])) {
            
            $extension = explode('.', $_FILES["imagen_remolque"]['name']);
            $nuevo_nombre = rand() . '.' . $extension[1];
            $ubicacion = './imgR/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_remolque"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function obtener_nombre_imagenR($id_remolque){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT imgRemolque FROM remolque WHERE idRemolque = '$id_remolque'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["imgRemolque"];
        }
    }

    function obtener_todos_registrosR(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM remolque ");
        $stmt->execute();
        $resultado = $stmt->fetchAll(); 
        return $stmt->rowCount();       
    }