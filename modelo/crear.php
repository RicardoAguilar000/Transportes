<?php

include("conexion.php");
include("funciones.php");

if ($_POST["operacion"] == "Crear") {
    $imagen = '';
    if ($_FILES["imagen_conductor"]["name"] != '') {
        $imagen = subir_imagen();
    }
    $stmt = $conexion->prepare("INSERT INTO conductores(id_Unidad, nombre, foto, edad, experiencia, numeroLicencia, estatus)VALUES(:id_Unidad, :nombre, :foto, :edad, :experiencia, :numeroLicencia, :estatus)");

    $resultado = $stmt->execute(
        array(
            ':id_Unidad'    => $_POST["id_Unidad"],
            ':nombre'    => $_POST["nombre"],
            ':edad'    => $_POST["edad"],
            ':experiencia'    => $_POST["experiencia"],
            ':numeroLicencia'    => $_POST["numeroLicencia"],
            ':estatus'    => $_POST["estatus"],
            ':foto'    => $imagen
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}


if ($_POST["operacion"] == "Editar") {
    $imagen = '';
    if ($_FILES["imagen_conductor"]["name"] != '') {
        $imagen = subir_imagen();
    }else{
        $imagen = $_POST["imagen_conductor_oculta"];
    }


    $stmt = $conexion->prepare("UPDATE conductores SET id_Unidad=:id_Unidad, nombre=:nombre, foto=:foto, edad=:edad, experiencia=:experiencia, numeroLicencia=:numeroLicencia, estatus=:estatus WHERE idConductores = :id_conductor");

    $resultado = $stmt->execute(
        array(
            ':id_Unidad'    => $_POST["id_Unidad"],
            ':nombre'    => $_POST["nombre"],
            ':edad'    => $_POST["edad"],
            ':experiencia'    => $_POST["experiencia"],
            ':numeroLicencia'    => $_POST["numeroLicencia"],
            ':estatus'    => $_POST["estatus"],
            ':foto'    => $imagen,
            ':id_conductor'    => $_POST["id_conductor"]

        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}