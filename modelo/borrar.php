<?php

include('conexion.php');
include("funciones.php");

if(isset($_POST["id_conductor"]))
{
	$imagen = obtener_nombre_imagen($_POST["id_conductor"]);
	if($imagen != '')
	{
		unlink("./img/" . $imagen);
	}
	$stmt = $conexion->prepare(
		"DELETE FROM conductores WHERE idConductores = :id_conductor"
	);
	$resultado = $stmt->execute(
		array(
			':id_conductor'	=>	$_POST["id_conductor"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}

if(isset($_POST["id_remolque"]))
{
	$imagen = obtener_nombre_imagen($_POST["id_remolque"]);
	if($imagen != '')
	{
		unlink("./imgR/" . $imagen);
	}
	$stmt = $conexion->prepare(
		"DELETE FROM remolque WHERE idRemolque = :id_remolque"
	);
	$resultado = $stmt->execute(
		array(
			':id_remolque'	=>	$_POST["id_remolque"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}

if(isset($_POST["id_unidad"]))
{
	$imagen = obtener_nombre_imagen($_POST["id_unidad"]);
	if($imagen != '')
	{
		unlink("./imgU/" . $imagen);
	}
	$stmt = $conexion->prepare(
		"DELETE FROM unidades WHERE idUnidad = :id_unidad"
	);
	$resultado = $stmt->execute(
		array(
			':id_unidad'	=>	$_POST["id_unidad"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}



?>