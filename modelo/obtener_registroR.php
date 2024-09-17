<?php

include("conexion.php");
include("funcionesR.php");

if (isset($_POST["id_remolque"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM remolque WHERE idRemolque = '".$_POST["id_remolque"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["marca"] = $fila["marca"];
        $salida["modelo"] = $fila["modelo"];
        $salida["color"] = $fila["color"];
        $salida["tamano"] = $fila["tamano"];
        if ($fila["imgRemolque"] != "") {
            $salida["imagen_remolque"] = '<img src="./modelo/imgR/' . $fila["imgRemolque"] . '" class="img-thumbnail" width="200" height="50"  />' . '<input type="hidden" name="imagen_remolque_oculta" value="' . $fila["imgRemolque"] . '" />';
        }else{
            $salida["imagen_remolque"] = '<input type="hidden" name="imagen_remolque_oculta" value="" />';
        }
    }

    echo json_encode($salida);
}