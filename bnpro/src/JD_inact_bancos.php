<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_banco"]))
{
    exit();
}

$id_banco = $_GET["id_banco"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_inactivar_bancos( ? );");
$resultado = $sentencia->execute([$id_banco]);
if ($resultado === true) {
    header("Location: JD_listar_bancos.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}