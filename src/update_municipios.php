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
    !isset($_GET["id_dpto"]) ||
    !isset($_GET["id_municipio"]) ||
    !isset($_GET["nom_municipio"])
    )
{
    echo "Todo mal... vEO";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_dpto       = $_GET["id_dpto"];
$id_municipio  = $_GET["id_municipio"];
$nom_municipio = $_GET["nom_municipio"];

echo $id_dpto;
$sentencia = $base_de_datos->prepare("SELECT fun_update_municipios(?,?,?);");

$resultado = $sentencia->execute([$id_dpto, $id_municipio, $nom_municipio]); # Pasar en el mismo orden de los ?
if ($resultado === true)
{
    header("Location: listar_municipios.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del Municipio";
}