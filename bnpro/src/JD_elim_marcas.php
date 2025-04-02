<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_marca"]))
{
    exit();
}

$id_marca = $_GET["id_marca"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_delete_marcas( ? );");
$resultado = $sentencia->execute([$id_marca]);
if ($resultado === true) {
    header("Location: JD_listar_marcas.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}