<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("select id, nombre, edad from mascotas");
$mascotas = $sentencia->fetchAll(PDO::FETCH_OBJ);