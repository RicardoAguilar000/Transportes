<?php

include("conexion.php");
include("funcionesU.php");

if (isset($_POST["id_unidad"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM unidades WHERE idUnidad = '".$_POST["id_unidad"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["id_remolque"] = $fila["id_remolque"];
        $salida["marca"] = $fila["marca"];
        $salida["modelo"] = $fila["modelo"];
        $salida["color"] = $fila["color"];
        $salida["descripcion"] = $fila["descripcion"];
        if ($fila["imgUnidad"] != "") {
            $salida["imagen_unidad"] = '<img src="./modelo/imgU/' . $fila["imgUnidad"] . '" class="img-thumbnail" width="200" height="50"  />' . '<input type="hidden" name="imagen_unidad_oculta" value="' . $fila["imgUnidad"] . '" />';
        }else{
            $salida["imagen_unidad"] = '<input type="hidden" name="imagen_unidad_oculta" value="" />';
        }
    }

    echo json_encode($salida);
}