<?php
include_once "base_de_datos.php";

$id_cliente = $_GET['id_cliente'];

$sentencia = $base_de_datos->prepare('SELECT cliente_estado(?)');
$sentencia->execute([$id_cliente]);

header('Location: listar_clientes.php');
exit;
?>