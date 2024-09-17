<?php
include("conexion.php");
include("funcionesR.php");

$query = "";
$salida = array();
$query = "SELECT * FROM remolque ";

if (isset($_POST["search"]["value"])) {
    $searchValue = $_POST["search"]["value"];
    $query .= 'WHERE ';
    $query .= 'idRemolque LIKE "%' . $searchValue . '%" OR ';
    $query .= 'marca LIKE "%' . $searchValue . '%" OR ';
    $query .= 'modelo LIKE "%' . $searchValue . '%" OR ';
    $query .= 'color LIKE "%' . $searchValue . '%" OR ';
    $query .= 'tamano LIKE "%' . $searchValue . '%" ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY idRemolque ' . $_POST["order"][0]['dir'] . ' ';
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
    if ($fila["imgRemolque"] != '') {
        $imagen = '<img src="./modelo/imgR/' . $fila["imgRemolque"] . '"  class="img-thumbnail" width="50" height="35" />';
    } else {
        $imagen = '';
    }
    $sub_array = array();
    $sub_array[] = $fila["idRemolque"];
    $sub_array[] = $fila["marca"];
    $sub_array[] = $fila["modelo"];
    $sub_array[] = $fila["color"];
    $sub_array[] = $imagen;
    $sub_array[] = $fila["tamano"];
    $sub_array[] = '<button type="button" name="editar" id="' . $fila["idRemolque"] . '" class="editar btn btn-primary"><i class="bi bi-pencil" id="botonEditar"></i></button>';
    $sub_array[] = '<button type="button" name="borrar" id="' . $fila["idRemolque"] . '" class="btn btn-danger btn-xs borrar"><i class="bi bi-trash"></i></button>';
    $datos[] = $sub_array;
}

$salida = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => obtener_todos_registrosR(),
    "data" => $datos
);

echo json_encode($salida);
?>
