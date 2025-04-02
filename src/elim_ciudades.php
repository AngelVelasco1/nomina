<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_ciudad"]))
{
    exit();
}

$id_ciudad = $_GET["id_ciudad"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_delete_ciudades( ? );");
$resultado = $sentencia->execute([$id_ciudad]);
if ($resultado === true) {
    header("Location: listar_ciudades.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}