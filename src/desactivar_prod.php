<?php
include_once "base_de_datos.php";

$id_prod = $_GET['id_prod'];

$sentencia = $base_de_datos->prepare('SELECT prod_estado(?)');
$sentencia->execute([$id_prod]);

header('Location: listar_productos.php');
exit;
?>