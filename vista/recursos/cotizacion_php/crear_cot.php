<?php

    include("conexion.php");
    include("funciones.php");

    if($_POST["operacion"] == "Cotizar"){
        $file_name = $_FILES['file']['name'];
        $new_name_file = null;
    
        if($file_name != '' || $file_name != null){
            $file_type = $_FILES['file']['type'];
            list($type, $extension) = explode('/', $file_type);
            if($extension == 'pdf'){
                $file_tmp_name = $_FILES['file']['tmp_name'];
                $new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
    
                if(copy($file_tmp_name, $new_name_file)){
                    
                }
            }
        }
    
        // Validación del costo
    $peso = $_POST["peso"];
    $distancia = $_POST["distancia"];
    $prioridad = $_POST["prioridad"];
    $costo = calcularCosto($peso, $distancia, $prioridad);
    $precioFlete = $costo;

    $stmt = $conexion->prepare("INSERT INTO cotizaciones (origen, destino, valor, prioridad, 
    piezas, distancia, peso, largo, ancho, alto, empaque, precioFlete, ruta, usuario) 
    VALUES (:origen, :destino, :valor, :prioridad, :piezas, :distancia, :peso, :largo, 
    :ancho, :alto, :empaque, :precioFlete, :ruta, :usuario)");

    $resultado = $stmt->execute(
        array(
            ':origen'       => $_POST["origen"],
            ':destino'      => $_POST["destino"],
            ':valor'        => $_POST["valor"],
            ':prioridad'    => $_POST["prioridad"],
            ':piezas'       => $_POST["piezas"],
            ':distancia'    => $_POST["distancia"],
            ':peso'         => $_POST["peso"],
            ':largo'        => $_POST["largo"],
            ':ancho'        => $_POST["ancho"],
            ':alto'         => $_POST["alto"],
            ':empaque'      => $_POST["empaque"],
            ':precioFlete'  => $precioFlete,
            ':ruta'         => $new_name_file,
            ':usuario'      => $_POST["userId"]
        )
    );

    if(!empty($resultado)){
        echo 'Cotizacion realizada exitosamente, espera pronto una respuesta.';
    }
}

function calcularCosto($peso, $distancia, $prioridad) {
    $costo = 0;
    if ($peso > 10000 && $peso < 20000 && $distancia > 80 && $distancia < 110 ) {
        $costo = 40000;
        
    }  else if ($peso > 20000 && $peso < 30000 && $distancia >110 && $distancia < 150) {
        $costo = 60000;
    
    }else if ($peso > 30000 && $peso < 50000 && $distancia >150 && $distancia < 200) {
        $costo = 90000;
    
    }
    elseif ($peso > 5000 && $peso < 10000 && $distancia > 60 && $distancia < 80) {
        $costo = 20000;
        
    } else if ($peso > 3000 && $peso < 5000 && $distancia >30 && $distancia < 60) {
        $costo = 10000;
    }

    // Aumento del 20% si la prioridad es "Urgente"
    if ($prioridad == "Urgente") {
        $costo *= 1.20;
    }

    return $costo;
}
    

    //EDITAR COTIZACIONES
    if($_POST["operacion"] == "Editar"){

        $stmt = $conexion->prepare("UPDATE cotizaciones SET origen=:origen, destino=:destino, 
        valor=:valor, prioridad=:prioridad, piezas=:piezas, distancia=:distancia, peso=:peso, largo=:largo, ancho=:ancho, alto=:alto, empaque=:empaque WHERE id = :id");

        $resultado = $stmt->execute(
            array(
                ':origen'        => $_POST["origen"],
                ':destino'       => $_POST["destino"],
                ':valor'         => $_POST["valor"],
                ':prioridad'    => $_POST["prioridad"],
                ':piezas'        => $_POST["piezas"],
                ':distancia'    => $_POST["distancia"],
                ':peso'        => $_POST["peso"],
                ':largo'        => $_POST["largo"],
                ':ancho'        => $_POST["ancho"],
                ':alto'        => $_POST["alto"],
                ':empaque'        => $_POST["empaque"],
                ':id'            => $_POST["id_usuario"]
            )
        );

        if(!empty($resultado)){
            echo 'Registro Actualizado';

        }
    }

    //RESPONDER COTIZACIÓN

    if($_POST["operacion"] == "Responder"){
        /*$imagen = '';
        if($_FILES["imagen_usuario"]["name"] != ''){
            $imagen = subir_imagen();
        }*/
        $stmt = $conexion->prepare("UPDATE cotizaciones SET precioFlete=:precioFlete WHERE id = :id");

        $resultado = $stmt->execute(
            array(
                ':precioFlete'       => $_POST["precioFlete"],
                ':id'            => $_POST["id_usuario"]
            )
        );

        if(!empty($resultado)){
            echo 'Se ha respondido correctamente la cotización.';
        }
    }

    if($_POST["operacion"] == "Confirmar"){
        /*$imagen = '';
        if($_FILES["imagen_usuario"]["name"] != ''){
            $imagen = subir_imagen();
        }*/
        $stmt = $conexion->prepare("INSERT INTO viajes (id_cotizacion, fechaEmbarque, fechaDesembarque, estado)
        VALUES (:id_cotizacion, :fechaEmbarque, :fechaDesembarque, :estado)");

        $resultado = $stmt->execute(
            array(
                ':id_cotizacion'       => $_POST["id_usuario"],
                ':fechaEmbarque'       => $_POST["fechaEmbarque"],
                ':fechaDesembarque'    => "Pendiente",
                ':estado'              => "En preparación"
            )
        );

        if(!empty($resultado)){
            echo 'Se ha confirmado el viaje.';
            
        }
        
        
    }
    

    //ACTUALIZAR VIAJE - VISTA ADMIN

    if($_POST["operacion"] == "Seleccionar"){

        $stmt = $conexion->prepare("UPDATE viajes SET conductor=:conductor, fechaEmbarque=:fechaEmbarque, fechaDesembarque=:fechaDesembarque, 
        estado=:estado WHERE id_viaje = :id_viaje");

        $resultado = $stmt->execute(
            array(
                ':fechaEmbarque'        => $_POST["fechaEmbarque"],
                ':conductor'        => $_POST["conductor"],
                ':fechaDesembarque'       => $_POST["fechaDesembarque"],
                ':estado'         => $_POST["status"],
                ':id_viaje'            => $_POST["id_viaje"]
            )
        );

        if(!empty($resultado)){
            echo 'Fechas seleccionadas correctamente';
        }
    }