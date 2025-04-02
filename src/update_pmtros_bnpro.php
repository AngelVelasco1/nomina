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
    !isset($_POST["nom_plan_desarrollo"]) ||
    !isset($_POST["val_tir"]) ||
    !isset($_POST["nom_entidad"]) ||
    !isset($_POST["ano_fiscal"]) ||
    !isset($_POST["mes_fiscal"]) ||
    !isset($_POST["id_entidad"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_entidad  = $_POST["id_entidad"];
$nom_entidad = $_POST["nom_entidad"];
$ano_fiscal  = $_POST["ano_fiscal"];
$mes_fiscal  = $_POST["mes_fiscal"];
$val_tir     = $_POST["val_tir"];
$nom_plan_d  = $_POST["nom_plan_desarrollo"];
$sentencia = $base_de_datos->prepare("SELECT fun_update_pmtros_bnpro(?,?,?,?,?,?);");

$resultado = $sentencia->execute([$id_entidad, $nom_entidad, $ano_fiscal, $mes_fiscal, $val_tir, $nom_plan_d]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_pmtros_bnpro.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del parámetro";
}