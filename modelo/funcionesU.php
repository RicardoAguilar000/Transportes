<?php

    /* Unidad*/

    function subir_imagenU(){
        if (isset($_FILES["imagen_unidad"])) {
            
            $extension = explode('.', $_FILES["imagen_unidad"]['name']);
            $nuevo_nombre = rand() . '.' . $extension[1];
            $ubicacion = './imgU/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_unidad"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function obtener_nombre_imagenU($id_unidad){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT imgUnidad FROM unidades WHERE idUnidad = '$id_unidad'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["imgUnidad"];
        }
    }

    function obtener_todos_registrosU(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM unidades");
        $stmt->execute();
        $resultado = $stmt->fetchAll(); 
        return $stmt->rowCount();       
    }