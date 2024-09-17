
<?php
    include("conexion.php");
    include("funciones.php");

    
    $id_usuario = $usuario;

    $query = "";
    $salida = array();
    $query = "SELECT * FROM cotizaciones ";

    // if($usuario){
    //     $query .= 'WHERE usuario = "' . $id_usuario. '" ';
        
    // }

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
        $sub_array = array();

        $sub_array[] = $fila["usuario"];
        $sub_array[] = $fila["id"];
        $sub_array[] = $fila["origen"];
        $sub_array[] = $fila["destino"];
        $sub_array[] = $fila["precioFlete"];
        /*$sub_array[] = $fila["estado"];
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id"].'" class="btn btn-warning 
        btn-xs editar">Editar</button>';*/

        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id"].'" class="btn btn-danger 
        btn-xs borrar">Eliminar</button>';

        $sub_array[] = '<button type="button" name="confirmar" id="'.$fila["id"].'" class="btn btn-success 
        btn-xs confirmar">Confirmar</button>';

        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"              => intval($_POST["draw"]),
        "recordsTotal"      => $filtered_rows,
        "recordsFiltered"   => obtener_todos_registros(),
        "data"              => $datos
    );

    echo json_encode($salida);


    
