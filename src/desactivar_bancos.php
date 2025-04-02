<?php
include_once "base_de_datos.php";

$id_banco = $_GET['id_banco'];

$sentencia = $base_de_datos->prepare('SELECT bancos_estado(?)');
$sentencia->execute([$id_banco]);

header('Location: listar_bancos.php');
exit;
?>