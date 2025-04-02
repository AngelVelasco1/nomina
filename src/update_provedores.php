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
    !isset($_POST["nom_prov"]) ||
    !isset($_POST["id_prov"])
) {
    echo "Salió mal";
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id_prov  = $_POST["id_prov"];
$nom_prov = $_POST["nom_prov"];
$id_pais = $_POST["id_pais"];
$id_ciudad = $_POST["id_ciudad"];
$mail_prov = $_POST["mail_prov"];
$ubic_prov = $_POST["ubic_prov"];
$tel_prov = $_POST["tel_prov"];

$sentencia = $base_de_datos->prepare("SELECT fun_update_provedores(?, ?, ?, ? , ?, ?, ?);");

$resultado = $sentencia->execute([$id_prov, $nom_prov, $id_pais, $id_ciudad, $mail_prov, $ubic_prov, $tel_prov]); # Pasar en el mismo orden de los ?
if ($resultado === true) 
{
    header("Location: listar_provedores.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID de la ciudad";
}