<?php
if (!isset($_POST["id_cargo"])) {
	echo "No se recibió el ID del cargo.";
	exit();
}

include_once "base_de_datos.php";

$id_cargo = $_POST["id_cargo"];
$nom_cargo = $_POST["nom_cargo"];
$sentencia = $base_de_datos->prepare("SELECT fun_update_cargos(?, ?);");
$resultado = $sentencia->execute([
	$id_cargo,
	$nom_cargo
]);

if ($resultado === true) {
	header("Location: listar_cargos.php");
} else {
	echo "Algo salió mal al actualizar la empresa.";
}
?>
