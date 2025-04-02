<?php
include_once "base_de_datos.php";

$id_pais = $_GET['id_pais'];

$sentencia = $base_de_datos->prepare('SELECT paises_estado(?)');
$sentencia->execute([$id_pais]);

header('Location: listar_paises.php');
exit;
?>