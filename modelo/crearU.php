<?php

include("conexion.php");
include("funcionesU.php");

if ($_POST["operacion"] == "Crear") {
    $imagen = '';
    if ($_FILES["imagen_unidad"]["name"] != '') {
        $imagen = subir_imagenU();
    }
    $stmt = $conexion->prepare("INSERT INTO unidades(id_remolque,marca, modelo, imgUnidad, color, descripcion)VALUES(:id_remolque, :marca, :modelo, :imgUnidad, :color, :descripcion)");

    $resultado = $stmt->execute(
        array(
            ':id_remolque'    => $_POST["id_remolque"],
            ':marca'    => $_POST["marca"],
            ':modelo'    => $_POST["modelo"],
            ':color'    => $_POST["color"],
            ':descripcion'    => $_POST["descripcion"],
            ':imgUnidad'    => $imagen
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}


if ($_POST["operacion"] == "Editar") {
    $imagen = '';
    if ($_FILES["imagen_unidad"]["name"] != '') {
        $imagen = subir_imagenU();
    }else{
        $imagen = $_POST["imagen_unidad_oculta"];
    }


    $stmt = $conexion->prepare("UPDATE unidades SET id_remolque=:id_remolque, marca=:marca, modelo=:modelo, imgUnidad=:imgUnidad, color=:color, descripcion=:descripcion  WHERE idUnidad = :id_unidad");

    $resultado = $stmt->execute(
        array(
            ':id_remolque'    => $_POST["id_remolque"],
            ':marca'    => $_POST["marca"],
            ':modelo'    => $_POST["modelo"],
            ':color'    => $_POST["color"],
            ':descripcion'    => $_POST["descripcion"],
            ':imgUnidad'    => $imagen,
            ':id_unidad'    => $_POST["id_unidad"]

        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}