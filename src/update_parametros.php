<?php
if (!isset($_POST["id_empresa"])) {
	echo "No se recibió el ID de empresa.";
	exit();
}

include_once "base_de_datos.php";

$id_empresa = $_POST["id_empresa"];
$nom_empresa = $_POST["nom_empresa"] ?? null;
$ind_perio_pago = $_POST["ind_perio_pago"] ?? null;
$val_smlv = $_POST["val_smlv"] ?? null;
$val_auxtrans = $_POST["val_auxtrans"] ?? null;
$ind_num_trans = $_POST["ind_num_trans"] ?? null;
$ano_nomina = $_POST["ano_nomina"] ?? null;
$mes_nomina = $_POST["mes_nomina"] ?? null;
$val_por_intces = $_POST["val_por_intces"] ?? null;
$num_diasmes = $_POST["num_diasmes"] ?? null;
$id_concep_sb = $_POST["id_concep_sb"] ?? null;
$id_concep_at = $_POST["id_concep_at"] ?? null;

$sentencia = $base_de_datos->prepare("SELECT sp_update_pmtros(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([
	$id_empresa,
	$nom_empresa,
	$ind_perio_pago,
	$val_smlv,
	$val_auxtrans,
	$ind_num_trans,
	$ano_nomina,
	$mes_nomina,
	$val_por_intces,
	$num_diasmes,
	$id_concep_sb,
	$id_concep_at
]);

if ($resultado === true) {
	header("Location: listar_parametros.php");
} else {
	echo "Algo salió mal al actualizar la empresa.";
}
?>
