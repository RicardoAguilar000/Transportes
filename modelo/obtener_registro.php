<?php

include("conexion.php");
include("funciones.php");

if (isset($_POST["id_conductor"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM conductores WHERE idConductores = '".$_POST["id_conductor"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["id_Unidad"] = $fila["id_Unidad"];
        $salida["nombre"] = $fila["nombre"];
        $salida["edad"] = $fila["edad"];
        $salida["experiencia"] = $fila["experiencia"];
        $salida["numeroLicencia"] = $fila["numeroLicencia"];
        $salida["estatus"] = $fila["estatus"];
        if ($fila["foto"] != "") {
            $salida["imagen_conductor"] = '<img src="./modelo/img/' . $fila["foto"] . '" class="img-thumbnail" width="200" height="50"  />' . '<input type="hidden" name="imagen_conductor_oculta" value="' . $fila["foto"] . '" />';
        }else{
            $salida["imagen_conductor"] = '<input type="hidden" name="imagen_conductor_oculta" value="" />';
        }
    }

    echo json_encode($salida);
}