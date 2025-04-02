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
<?php include_once "encabezado.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Regiones BNPRO</h1>
		<form action="./insertar_regiones.php" method="POST">
			<div class="form-group">
				<label for="id_region">ID. Región</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_region" type="number" min="1" max="10" id="id_region" placeholder="ID Región" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_region" type="text" id="nom_region" placeholder="Nombre Región" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_regiones.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>