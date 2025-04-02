<?php
include_once "base_de_datos.php";

$id_prov = $_GET['id_prov'];

$sentencia = $base_de_datos->prepare('SELECT prov_estado(?)');
$sentencia->execute([$id_prov]);

header('Location: listar_provedores.php');
exit;
?>