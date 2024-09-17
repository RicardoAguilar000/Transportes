<?php

    function obtener_todos_registros(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM cotizaciones");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $stmt->rowCount();
    }

    function obtener_todos_registros_viajes(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM viajes");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $stmt->rowCount();
    }

    function obtener_todos_registros_dos_tablas(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM cotizaciones, viajes");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $stmt->rowCount();
    }