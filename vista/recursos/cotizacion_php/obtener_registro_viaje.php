<?php

    include("conexion.php");
    include("funciones.php");

    if(isset($_POST["id_viaje"])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM viajes WHERE id_viaje = '".$_POST["id_viaje"]."' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["fechaEmbarque"] =  $fila["fechaEmbarque"];
            $salida["conductor"] =  $fila["conductor"];
            $salida["fechaDesembarque"] =  $fila["fechaDesembarque"];
            $salida["estado"] =  $fila["estado"];
        }
        echo json_encode($salida);
    }