<?php
if (!isset($_GET["id_empresa"])) {
	echo "No existe el parámetro a editar";
	exit();
}

$id_empresa = $_GET["id_empresa"];
include_once "base_de_datos.php";

$sentencia = $base_de_datos->prepare("SELECT * FROM tab_pmtros WHERE id_empresa = ?;");
$sentencia->execute([$id_empresa]);
$parametros = $sentencia->fetchObject();

if (!$parametros) {
	echo "¡No existe la empresa con ese ID!";
	exit();
}

include_once "encabezado.php";
?>

<div class="row">
	<div class="col-12">
		<h1>Editar Parámetros</h1>
		<form action="update_parametros.php" method="POST">
			<input type="hidden" name="id_empresa" value="<?php echo $parametros->id_empresa; ?>">

			<div class="form-group">
				<label>Nombre Empresa</label>
				<input value="<?php echo $parametros->nom_empresa; ?>" name="nom_empresa" class="form-control">
			</div>

			<div class="form-group">
				<label>Periodo de Pago</label>
				<input value="<?php echo $parametros->ind_perio_pago; ?>" name="ind_perio_pago" class="form-control">
			</div>

			<div class="form-group">
				<label>Salario Mínimo</label>
				<input value="<?php echo $parametros->val_smlv; ?>" name="val_smlv" class="form-control">
			</div>

			<div class="form-group">
				<label>Auxilio Transporte</label>
				<input value="<?php echo $parametros->val_auxtrans; ?>" name="val_auxtrans" class="form-control">
			</div>

			<div class="form-group">
				<label>Número de Transporte</label>
				<input value="<?php echo $parametros->ind_num_trans; ?>" name="ind_num_trans" class="form-control">
			</div>

			<div class="form-group">
				<label>Año Nómina</label>
				<input value="<?php echo $parametros->ano_nomina; ?>" name="ano_nomina" class="form-control">
			</div>

			<div class="form-group">
				<label>Mes Nómina</label>
				<input value="<?php echo $parametros->mes_nomina; ?>" name="mes_nomina" class="form-control">
			</div>

			<div class="form-group">
				<label>% Intereses Cesantías</label>
				<input value="<?php echo $parametros->val_por_intces; ?>" name="val_por_intces" class="form-control">
			</div>

			<div class="form-group">
				<label>Días del Mes</label>
				<input value="<?php echo $parametros->num_diasmes; ?>" name="num_diasmes" class="form-control">
			</div>

			<div class="form-group">
				<label>ID Concepto Salario Básico</label>
				<input value="<?php echo $parametros->id_concep_sb; ?>" name="id_concep_sb" class="form-control">
			</div>

			<div class="form-group">
				<label>ID Concepto Auxilio Transporte</label>
				<input value="<?php echo $parametros->id_concep_at; ?>" name="id_concep_at" class="form-control">
			</div>

			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_parametros.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>

<?php include_once "pie.php"; ?>
