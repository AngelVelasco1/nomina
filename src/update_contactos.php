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
    !isset($_POST["nom_entidad"])  ||
    !isset($_POST["nom_contacto"]) ||
    !isset($_POST["val_correo"])   ||
    !isset($_POST["val_telefono"]) ||
    !isset($_POST["val_interes"]) ||
    !isset($_POST["id_contacto"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_contacto   = $_POST["id_contacto"];
$nom_entidad   = $_POST["nom_entidad"];
$nom_contacto  = $_POST["nom_contacto"];
$val_correo    = $_POST["val_correo"];
$val_telefono  = $_POST["val_telefono"];
$val_interes   = $_POST["val_interes"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_contactos(?,?,?,?,?,?);");

$resultado = $sentencia->execute([$id_contacto, $nom_entidad, $nom_contacto, $val_correo, $val_telefono, $val_interes]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_contactos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del contacto";
}