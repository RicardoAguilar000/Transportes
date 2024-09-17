<?php

    include("conexion.php");
    include("funciones.php");




    $query = "";
    $salida = array();
    $query = "SELECT * FROM pagos ";

    if(isset($_POST["search"]["value"])){
        $query .= 'WHERE numero LIKE "%' . $_POST["search"]["value"] . '%" ';
        $query .= 'OR nombre LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . ' ';        
    }else{
        $query .= 'ORDER BY id DESC ';
    }

    if($_POST["length"] != -1){
        $query .= 'LIMIT ' . $_POST["start"] . ','. $_POST["length"];
    }

  
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array(); 
    $filtered_rows = $stmt->rowCount();
    foreach($resultado as $fila){
        $sub_array = array();

        $sub_array[] = $fila["id"];
        $sub_array[] = $fila["usuario"];
        $sub_array[] = $fila["numero"];
        $sub_array[] = $fila["nombre"];
        $sub_array[] = $fila["mes"];
        $sub_array[] = $fila["anio"];
        $sub_array[] = $fila["cvv"];
       
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id"].'" class="btn btn-danger 
        btn-xs borrar">Borrar</button>';
        $datos[] = $sub_array;
    }
    
    $salida = array(
        "draw"              => intval($_POST["draw"]),
        "recordsTotal"      => $filtered_rows,
        "recordsFiltered"   => obtener_todos_registros(),
        "data"              => $datos
    );

    echo json_encode($salida);