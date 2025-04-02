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
if (!isset($_POST["val_digito_verif"]) ||
    !isset($_POST["nom_alcaldia"])     ||
    !isset($_POST["nom_alcalde"])      ||
    // !isset($_POST["id_dpto"])          ||
    // !isset($_POST["id_municipio"])     ||
    !isset($_POST["dir_alcaldia"])     ||
    !isset($_POST["nom_gestora_social"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_alcaldia        = $_POST["id_alcaldia"];
$val_digito_verif   = $_POST["val_digito_verif"];
$nom_alcaldia       = $_POST["nom_alcaldia"];
$nom_alcalde        = $_POST["nom_alcalde"];
$id_dpto            = $_POST["id_dpto"];
$id_municipio       = $_POST["id_municipio"];
$dir_alcaldia       = $_POST["dir_alcaldia"];
$nom_gestora_social = $_POST["nom_gestora_social"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_alcaldias(?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$id_alcaldia, $val_digito_verif, $nom_alcaldia, $nom_alcalde, $id_dpto, $id_municipio, $dir_alcaldia, $nom_gestora_social]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_alcaldias.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID de la Alcaldía";
}