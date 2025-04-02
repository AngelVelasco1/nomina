<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_entidad"]))
{
	echo "No existe Parámetro a editar";
	exit();
}

$id_entidad = $_GET["id_entidad"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_entidad, nom_entidad, ano_fiscal, mes_fiscal, val_tir, nom_plan_desarrollo FROM tab_pmtros_bnpro WHERE id_entidad = ?;");
$sentencia->execute([$id_entidad]);
$pmtros = $sentencia->fetchObject();
if (!$pmtros)
{
    #No existe
    echo "¡No existe el parámetro con ese ID!";
    exit();
}

#Si parámetro existe, se ejecuta esta parte del código
?>
<?php include_once "encab_pmtros_bnpro.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_pmtros_bnpro.php" method="POST">
			<input type="hidden" name="id_entidad" value="<?php echo $pmtros->id_entidad; ?>">
			<div class="form-group">
				<label for="nombre">Nombre Entidad</label>
				<input value="<?php echo $pmtros->nom_entidad; ?>" required name="nom_entidad" type="text" id="nom_entidad" placeholder="Nombre de la Entidad" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Año</label>
				<input value="<?php echo $pmtros->ano_fiscal; ?>" required name="ano_fiscal" type="number" min="2023" id="ano_fiscal" placeholder="Año Fiscal" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Mes</label>
				<input value="<?php echo $pmtros->mes_fiscal; ?>" required name="mes_fiscal" type="number" min="1" max="12" id="mes_fiscal" placeholder="Mes Fiscal" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">TIR</label>
				<input value="<?php echo $pmtros->val_tir; ?>" required name="val_tir" type="number" min="10" max="99" id="val_tir" placeholder="Tasa Interna de Retorno" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Plan Desarrollo</label>
				<input value="<?php echo $pmtros->nom_plan_desarrollo; ?>" required name="nom_plan_desarrollo" type="text" min="20" max="200" id="nom_plan_desarrollo" placeholder="Plan de Desarrollo" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_pmtros_bnpro.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>