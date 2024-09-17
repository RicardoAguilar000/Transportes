<?php

    include("conexion.php");
    include("funciones.php");


   


    $query = "";
    $salida = array();
    $query = "SELECT * FROM viajes ";

    if(isset($_POST["search"]["value"])){
        $query .= 'WHERE fechaEmbarque LIKE "%' . $_POST["search"]["value"] . '%" ';
        $query .= 'OR fechaDesembarque LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if(isset($_POST["order"])){
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] . ' ' . $_POST["order"][0]['dir'] . ' ';
    }else{
        $query .= 'ORDER BY id_viaje DESC ';
    }

    if($_POST["length"] != -1){
        $query .= 'LIMIT ' . $_POST["start"] . ',' . $_POST["length"];
    }

    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array(); 
    $filtered_rows = $stmt->rowCount();
    foreach($resultado as $fila){
        $sub_array = array();

        
        
        $sub_array[] = $fila["id_viaje"];
        
        
        $sub_array[] = $fila["conductor"];
        $sub_array[] = $fila["fechaEmbarque"];
        $sub_array[] = $fila["fechaDesembarque"];
        $sub_array[] = $fila["estado"];
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id_viaje"].'" class="btn btn-warning 
        btn-xs actualizar">Seleccionar</button>';

        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id_viaje"].'" class="btn btn-danger 
        btn-xs borrar">Borrar</button>';

        $datos[] = $sub_array;
    }
    
    $salida = array(
        "draw"              => intval($_POST["draw"]),
        "recordsTotal"      => $filtered_rows,
        "recordsFiltered"   => obtener_todos_registros_viajes(),
        "data"              => $datos
    );

    echo json_encode($salida);