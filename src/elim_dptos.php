<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_dpto"]))
{
    exit();
}

$id_dpto = $_GET["id_dpto"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_delete_dptos( ? );");
$resultado = $sentencia->execute([$id_dpto]);
if ($resultado === true) {
    header("Location: listar_dptos.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}