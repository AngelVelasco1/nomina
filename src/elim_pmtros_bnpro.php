<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_entidad"]))
{
    exit();
}

$id_entidad = $_GET["id_entidad"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_delete_pmtros_bnpro( ? );");
$resultado = $sentencia->execute([$id_entidad]);
if ($resultado === true) {
    header("Location: listar_pmtros_bnpro.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}