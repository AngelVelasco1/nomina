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
    !isset($_POST["nom_vendedor"]) ||
    !isset($_POST["id_vendedor"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_vendedor  = $_POST["id_vendedor"];
$nom_vendedor = $_POST["nom_vendedor"];
$ape_vendedor = $_POST["ape_vendedor"];
$val_sueldo = $_POST["val_sueldo"];
$val_comision = $_POST["val_comision"];
$val_totsuel = $_POST["val_totsuel"];
$tel_vendedor = $_POST["tel_vendedor"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_vendedores(?, ?, ?, ? , ?, ?, ?);");

$resultado = $sentencia->execute([$id_vendedor, $nom_vendedor, $ape_vendedor, $val_sueldo, $val_comision, $val_totsuel, $tel_vendedor]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_vendedores.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID de la ciudad";
}