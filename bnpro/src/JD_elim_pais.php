<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_pais"]))
{
    exit();
}

$id_pais = $_GET["id_pais"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_delete_pais( ? );");
$resultado = $sentencia->execute([$id_pais]);
if ($resultado === true) {
    header("Location: JD_listar_pais.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}