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
    !isset($_POST["nom_cliente"]) ||
    !isset($_POST["id_cliente"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_cliente  = $_POST["id_cliente"];
$nom_cliente = $_POST["nom_cliente"];
$ape_cliente = $_POST["ape_cliente"];
$id_ciudad = $_POST["id_ciudad"];
$dir_cliente = $_POST["dir_cliente"];
$tel_cliente = $_POST["tel_cliente"];
$id_banco = $_POST["id_banco"];
$val_acum = $_POST["val_acum"];
$ind_estado = $_POST["ind_estado"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_clientes(?, ?, ?, ? , ?, ?, ?, ?, ?);");

$resultado = $sentencia->execute([$id_cliente, $nom_cliente, $ape_cliente, $id_ciudad, $dir_cliente, $tel_cliente, $id_banco, $val_acum, $ind_estado]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_clientes.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID de la cliente";
}