<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["nusuario"]))
{
    exit();
}

$nusuario = $_GET["nusuario"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_delete_usuarios( ? );");
$resultado = $sentencia->execute([$nusuario]);
if ($resultado === true) {
    header("Location: listar_usuarios.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}