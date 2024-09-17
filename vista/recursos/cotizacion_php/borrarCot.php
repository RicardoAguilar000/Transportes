<?php
include("conexion.php");
$Id = $_GET['id'];

$eliminar = "DELETE FROM cotizaciones WHERE id='$Id'";
$resultado = $conexion->query($eliminar);

if (!$resultado) {
    echo "<script type='text/javascript'>
        alert('Error! No se pudo eliminar 😢');
        </script>";
} else {
    echo "<script type='text/javascript'>
        alert('Registro eliminado');
        </script>";
}



header("Location: {$_SERVER['HTTP_REFERER']}");
echo "<script type='text/javascript'>
alert('Registro eliminado');
</script>";
exit();
?>
