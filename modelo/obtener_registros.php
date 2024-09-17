<?php
include("conexion.php");
include("funciones.php");

$query = "";
$salida = array();
$query = "SELECT * FROM conductores ";

if (isset($_POST["search"]["value"])) {
    $searchValue = $_POST["search"]["value"];
    $query .= 'WHERE ';
    $query .= 'idConductores LIKE "%' . $searchValue . '%" OR ';
    $query .= 'nombre LIKE "%' . $searchValue . '%" OR ';
    $query .= 'edad LIKE "%' . $searchValue . '%" OR ';
    $query .= 'experiencia LIKE "%' . $searchValue . '%" OR ';
    $query .= 'numeroLicencia LIKE "%' . $searchValue . '%" OR ';
    $query .= 'estatus LIKE "%' . $searchValue . '%" ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY idConductores ' . $_POST["order"][0]['dir'] . ' ';
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
    if ($fila["foto"] != '') {
        $imagen = '<img src="./modelo/img/' . $fila["foto"] . '"  class="img-thumbnail" width="50" height="35" />';
    } else {
        $imagen = '';
    }
    $sub_array = array();
    $sub_array[] = $fila["nombre"];
    $sub_array[] = $fila["edad"]  . " años";
    $sub_array[] = $fila["experiencia"] . " años";
    $sub_array[] = $fila["numeroLicencia"];
    $sub_array[] = $imagen;
    $sub_array[] = $fila["estatus"];
    $sub_array[] = '<button type="button" name="editar" id="' . $fila["idConductores"] . '" class="editar btn btn-primary"><i class="bi bi-pencil" id="botonEditar"></i></button>';
    $sub_array[] = '<button type="button" name="borrar" id="' . $fila["idConductores"] . '" class="btn btn-danger btn-xs borrar"><i class="bi bi-trash"></i></button>';
    $datos[] = $sub_array;
}

$salida = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => obtener_todos_registros(),
    "data" => $datos
);

echo json_encode($salida);
?>
