<?php
include_once "base_de_datos.php";

$id_vendedor = $_GET['id_vendedor'];

$sentencia = $base_de_datos->prepare('SELECT vendedores_estado(?)');
$sentencia->execute([$id_vendedor]);

header('Location: listar_vendedores.php');
exit;
?>