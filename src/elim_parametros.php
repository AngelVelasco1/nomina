<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_empresa"]))
{
    exit();
}

$id_empresa = $_GET["id_empresa"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT sp_delete_pmtros( ? );");
$resultado = $sentencia->execute([$id_empresa]);
if ($resultado === true) {
    header("Location: listar_parametros.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}