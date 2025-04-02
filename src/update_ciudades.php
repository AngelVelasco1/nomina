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
    !isset($_POST["nom_ciudad"]) ||
    !isset($_POST["id_ciudad"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_ciudad  = $_POST["id_ciudad"];
$nom_ciudad = $_POST["nom_ciudad"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_ciudades(?,?);");

$resultado = $sentencia->execute([$id_ciudad, $nom_ciudad]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_ciudades.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID de la ciudad";
}