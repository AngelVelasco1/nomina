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
    !isset($_POST["nom_pais"]) ||
    !isset($_POST["id_pais"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_pais  = $_POST["id_pais"];
$nom_pais = $_POST["nom_pais"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_pais(?,?);");

$resultado = $sentencia->execute([$id_pais, $nom_pais]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: JD_listar_pais.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del Pais";
}