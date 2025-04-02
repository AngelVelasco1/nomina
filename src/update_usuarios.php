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
    !isset($_POST["nombre"]) ||
    !isset($_POST["password"]) ||
    !isset($_POST["rol"]) ||
    !isset($_POST["fec_creacion"]) ||
    !isset($_POST["id"]) ||
    !isset($_POST["nusuario"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id           = $_POST["id"];
$nusuario     = $_POST["nusuario"];
$nombre       = $_POST["nombre"];
$password     = $_POST["password"];
$rol          = $_POST["rol"];
$fec_creacion = $_POST["fec_creacion"];

echo $fec_creacion;
$sentencia = $base_de_datos->prepare("SELECT fun_update_usuarios(?,?,?,?,?,?);");

$resultado = $sentencia->execute([$id, $nusuario, $nombre, $password, $rol, $fec_creacion]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_usuarios.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}