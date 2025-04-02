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
    !isset($_POST["nom_banco"]) ||
    !isset($_POST["id_banco"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_banco  = $_POST["id_banco"];
$nom_banco = $_POST["nom_banco"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_bancos(?,?);");

$resultado = $sentencia->execute([$id_banco, $nom_banco]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_bancos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID de la banco";
}