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
<?php include_once "encab_dptos.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Departamentos BNPRO</h1>
		<form action="./insertar_dptos.php" method="POST">
			<div class="form-group">
				<label for="id_dpto">ID. Dpto.</label>
				<input required name="id_dpto" type="text" minlength="2" maxlength="2" id="id_dpto" placeholder="ID Dpto." class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_dpto" type="text" id="nom_dpto" minlength="4" maxlength="24" placeholder="Nombre Dpto." class="form-control">
			</div>
			<div class="form-group">
				<label for="id_region">ID. Región</label>
				<input required name="id_region" type="number" min="1" max="10" id="id_region" placeholder="ID Región" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_dptos.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>