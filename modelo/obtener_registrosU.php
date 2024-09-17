<?php
include("conexion.php");
include("funcionesU.php");

$query = "";
$salida = array();
$query = "SELECT * FROM unidades ";

if (isset($_POST["search"]["value"])) {
    $searchValue = $_POST["search"]["value"];
    $query .= 'WHERE ';
    $query .= 'idUnidad LIKE "%' . $searchValue . '%" OR ';
    $query .= 'id_remolque LIKE "%' . $searchValue . '%" OR ';
    $query .= 'marca LIKE "%' . $searchValue . '%" OR ';
    $query .= 'modelo LIKE "%' . $searchValue . '%" OR ';
    $query .= 'color LIKE "%' . $searchValue . '%" OR ';
    $query .= 'descripcion LIKE "%' . $searchValue . '%" ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY idUnidad ' . $_POST["order"][0]['dir'] . ' ';
}

if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST["start"] . ',' . $_POST["length"];
}

$stmt = $conexion->prepare($query);
$stmt->execute();
$resultado = $stmt->fetchAll();
$datos = array();
$filtered_rows = $stmt->rowCount();
foreach ($resultado as $fila) {
    $imagen = '';
    if ($fila["imgUnidad"] != '') {
        $imagen = '<img src="./modelo/imgU/' . $fila["imgUnidad"] . '"  class="img-thumbnail" width="50" height="35" />';
    } else {
        $imagen = '';
    }
    $sub_array = array();
    $sub_array[] = $fila["idUnidad"];
    $sub_array[] = $fila["marca"];
    $sub_array[] = $fila["modelo"];
    $sub_array[] = $fila["color"];
    $sub_array[] = $imagen;
    $sub_array[] = '<button type="button" name="editar" id="' . $fila["idUnidad"] . '" class="editar btn btn-primary"><i class="bi bi-pencil" id="botonEditar"></i></button>';
    $sub_array[] = '<button type="button" name="borrar" id="' . $fila["idUnidad"] . '" class="btn btn-danger btn-xs borrar"><i class="bi bi-trash"></i></button>';
    $datos[] = $sub_array;
}

$salida = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => obtener_todos_registrosU(),
    "data" => $datos
);

echo json_encode($salida);
?>
