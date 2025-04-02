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
    !isset($_POST["nom_prod"]) ||
    !isset($_POST["id_prod"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_prod  = $_POST["id_prod"];
$nom_prod = $_POST["nom_prod"];
$id_marca = $_POST["id_marca"];
$val_prod = $_POST["val_prod"];
$val_stock = $_POST["val_stock"];
$ind_categ = $_POST["ind_categ"];
$ind_tipo = $_POST["ind_tipo"];
$ind_clase = $_POST["ind_clase"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_productos(?, ?, ?, ? , ?, ?, ?, ?);");

$resultado = $sentencia->execute([$id_prod, $nom_prod, $id_marca, $val_prod, $val_stock, $ind_categ, $ind_tipo, $ind_clase]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_productos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID de la ciudad";
}