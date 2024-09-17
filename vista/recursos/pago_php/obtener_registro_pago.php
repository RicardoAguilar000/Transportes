<?php

    include("conexion.php");
    include("funciones.php");

    if(isset($_POST["id_usuario"])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM pagos WHERE id = '".$_POST["id_usuario"]."' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["numero"] = $fila["numero"];
            $salida["nombre"] = $fila["nombre"];
            $salida["mes"] = $fila["mes"];
            $salida["año"] = $fila["año"];
            $salida["cvv"] = $fila["cvv"];
           
           
           
        }
        echo json_encode($salida);
    }