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
    !isset($_POST["nom_marca"]) ||
    !isset($_POST["id_marca"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_marca  = $_POST["id_marca"];
$nom_marca = $_POST["nom_marca"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_marcas(?,?);");

$resultado = $sentencia->execute([$id_marca, $nom_marca]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: JD_listar_marcas.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del Banco";
}