<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
=================================================================
Este archivo guarda los datos del formulario en donde se editan
=================================================================
*/
?>

<?php

#Salir si alguno de los datos no está presente
if (
    !isset($_POST["nom_dpto"]) ||
    !isset($_POST["id_region"]) ||
    !isset($_POST["id_dpto"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_dpto   = $_POST["id_dpto"];
$nom_dpto  = $_POST["nom_dpto"];
$id_region = $_POST["id_region"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_dptos(?,?,?);");

$resultado = $sentencia->execute([$id_dpto, $nom_dpto, $id_region]); # Pasar en el mismo orden de los ?
if ($resultado === true)
{
    header("Location: listar_dptos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del Departamento";
}