<?php

    include("conexion.php");
    include("funciones.php");

    if(isset($_POST["id_usuario"])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM cotizaciones WHERE id = '".$_POST["id_usuario"]."' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["origen"] =  $fila["origen"];
            $salida["destino"] =  $fila["destino"];
            $salida["valor"] =  $fila["valor"];
            $salida["prioridad"] =  $fila["prioridad"];
            $salida["piezas"] =  $fila["piezas"];
            $salida["distancia"] =  $fila["distancia"];
            $salida["peso"] =  $fila["peso"];
            $salida["largo"] =  $fila["largo"];
            $salida["ancho"] =  $fila["ancho"];
            $salida["alto"] =  $fila["alto"];
            $salida["empaque"] =  $fila["empaque"];
            $salida["precioFlete"] =  $fila["precioFlete"];
        }
        echo json_encode($salida);
    }