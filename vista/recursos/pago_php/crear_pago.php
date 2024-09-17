<?php

    include("conexion.php");
    include("funciones.php");

    if($_POST["operacion"] == "Pagar"){
      
        $stmt = $conexion->prepare("INSERT INTO pagos (numero, nombre, mes, anio, cvv, usuario) 
        VALUES (:numero, :nombre, :mes, :anio, :cvv, :usuario)");

        $resultado = $stmt->execute(
            array(
                ':numero'           => $_POST["numero"],
                ':nombre'           => $_POST["nombre"],
                ':mes'              => $_POST["mes"],
                ':anio'              => $_POST["anio"],
                ':cvv'              => $_POST["cvv"],
                ':usuario'          => $_POST["userId"]
            )
        );
        

        if(!empty($resultado)){
            echo 'Pago realizado exitosamente';
            
        }
        
        
    }

    