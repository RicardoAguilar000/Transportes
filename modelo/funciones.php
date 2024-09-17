<?php
/* Conductor*/
    function subir_imagen(){
        if (isset($_FILES["imagen_conductor"])) {
            
            $extension = explode('.', $_FILES["imagen_conductor"]['name']);
            $nuevo_nombre = rand() . '.' . $extension[1];
            $ubicacion = './img/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_conductor"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function obtener_nombre_imagen($id_conductor){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT foto FROM conductores WHERE idConductores = '$id_conductor'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["foto"];
        }
    }

    function obtener_todos_registros(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM conductores");
        $stmt->execute();
        $resultado = $stmt->fetchAll(); 
        return $stmt->rowCount();       
    }