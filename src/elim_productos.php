<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_prod"]))
{
    exit();
}

$id_prod = $_GET["id_prod"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_delete_productos( ? );");
$resultado = $sentencia->execute([$id_prod]);
if ($resultado === true) {
    header("Location: listar_productos.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}