<?php
/*
CRUD con PostgreSQL y PHP
===================================================================================
Este archivo elimina un dato por ID sin pedir confirmación. El ID viene de la URL
===================================================================================
*/
if (!isset($_GET["id_contacto"]))
{
    exit();
}

$id_contacto = $_GET["id_contacto"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT fun_delete_contactos( ? );");
$resultado = $sentencia->execute([$id_contacto]);
if ($resultado === true) {
    header("Location: listar_contactos.php");
} else {
    echo "Algo salió mal... Go back to the elemental school";
}