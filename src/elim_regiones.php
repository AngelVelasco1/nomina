<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_region"]))
{
    exit();
}

$id_region = $_GET["id_region"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_delete_regiones( ? );");
$resultado = $sentencia->execute([$id_region]);
if ($resultado === true) {
    header("Location: listar_regiones.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}