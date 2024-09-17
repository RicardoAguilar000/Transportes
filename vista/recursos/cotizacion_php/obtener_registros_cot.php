<?php

    include("conexion.php");
    include("funciones.php");

    $id_usuario = $usuario;

    $query = "";
    $salida = array();
    $query = "SELECT * FROM cotizaciones ";

    if(isset($_POST["search"]["value"])){
        $query .= 'WHERE origen LIKE "%' . $_POST["search"]["value"] . '%" ';
        $query .= 'OR destino LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if(isset($_POST["order"])){
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] . ' ' . $_POST["order"][0]['dir'] . ' ';
    }else{
        $query .= 'ORDER BY id DESC ';
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
        /*$imagen = '';
        if($fila["imagen"] != ''){
            $imagen = '<img src="img/' . $fila["imagen"] . '" class="img-thumbnail" width="50" height="35"/>';
        }else{
            $imagen = '';
        }*/

        $sub_array = array();

        $sub_array[] = $fila["id"];
        $sub_array[] = $fila["usuario"];
        $sub_array[] = $fila["origen"];
        $sub_array[] = $fila["destino"];
        $sub_array[] = $fila["valor"];
        $sub_array[] = $fila["prioridad"];
        $sub_array[] = $fila["piezas"];
        $sub_array[] = $fila["distancia"];
        $sub_array[] = $fila["peso"];
        $sub_array[] = $fila["largo"];
        $sub_array[] = $fila["ancho"];
        $sub_array[] = $fila["alto"];
        $sub_array[] = $fila["empaque"];
        $sub_array[] = $fila["precioFlete"];
        $sub_array[] = '<td>
                            <a name="" type="button" href="vista/recursos/cotizacion_php/' . $fila['ruta'] . '" target="_blank" class="btn btn-primary btn-xs">Ver factura</a>
                        </td>';
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id"].'" class="btn btn-warning 
        btn-xs editar">Editar</button>';

        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id"].'" class="btn btn-danger 
        btn-xs borrar">Borrar</button>';

        $sub_array[] = '<button type="button" name="responder" id="'.$fila["id"].'" class="btn btn-success 
        btn-xs responder">Responder</button>';

        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"              => intval($_POST["draw"]),
        "recordsTotal"      => $filtered_rows,
        "recordsFiltered"   => obtener_todos_registros(),
        "data"              => $datos
    );

    echo json_encode($salida);