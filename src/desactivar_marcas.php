<?php
include_once "base_de_datos.php";

$id_marca = $_GET['id_marca'];

$sentencia = $base_de_datos->prepare('SELECT marcas_estado(?)');
$sentencia->execute([$id_marca]);

header('Location: listar_marcas.php');
exit;
?>