<?php

include("conexion.php");
include("funcionesR.php");

if ($_POST["operacion"] == "Crear") {
    $imagen = '';
    if ($_FILES["imagen_remolque"]["name"] != '') {
        $imagen = subir_imagenR();
    }
    $stmt = $conexion->prepare("INSERT INTO remolque(marca, modelo, imgRemolque, color, tamano)VALUES(:marca, :modelo, :imgRemolque, :color, :tamano)");

    $resultado = $stmt->execute(
        array(
            ':marca'    => $_POST["marca"],
            ':modelo'    => $_POST["modelo"],
            ':color'    => $_POST["color"],
            ':tamano'    => $_POST["tamano"],
            ':imgRemolque'    => $imagen
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}


if ($_POST["operacion"] == "Editar") {
    $imagen = '';
    if ($_FILES["imagen_remolque"]["name"] != '') {
        $imagen = subir_imagenR();
    }else{
        $imagen = $_POST["imagen_remolque_oculta"];
    }


    $stmt = $conexion->prepare("UPDATE remolque SET marca=:marca, modelo=:modelo, imgRemolque=:imgRemolque, color=:color, tamano=:tamano  WHERE idRemolque = :id_remolque");

    $resultado = $stmt->execute(
        array(
            ':marca'    => $_POST["marca"],
            ':modelo'    => $_POST["modelo"],
            ':color'    => $_POST["color"],
            ':tamano'    => $_POST["tamano"],
            ':imgRemolque'    => $imagen,
            ':id_remolque'    => $_POST["id_remolque"]

        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}