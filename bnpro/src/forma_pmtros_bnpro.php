<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
============================================================================================
Este archivo muestra un formulario que se envía a insertar.php, el cual guardará los datos
============================================================================================
*/
?>
<?php include_once "encab_pmtros_bnpro.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Parámetros BNPRO</h1>
		<form action="./insertar_pmtros_bnpro.php" method="POST">
			<div class="form-group">
				<label for="id_entidad">ID. Entidad</label>
				<input required name="id_entidad" type="text" min="2" max="5" id="id_entidad" placeholder="ID Entidad" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_entidad" type="text" id="nom_entidad" placeholder="Nombre Entidad" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Año</label>
				<input required name="ano_fiscal" type="number" min="2023" id="ano_fiscal" placeholder="Año Fiscal" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Mes</label>
				<input required name="mes_fiscal" type="number" min="1" max="12" id="mes_fiscal" placeholder="Mes Fiscal" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">TIR</label>
				<input required name="val_tir" type="number" min="10" max="99" id="val_tir" placeholder="Tasa Interna de Retorno" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Plan Desarrollo</label>
				<input required name="nom_plan_desarrollo" type="text" min="20" max="200" id="nom_plan_desarrollo" placeholder="Plan de Desarrollo" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_pmtros_bnpro.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>