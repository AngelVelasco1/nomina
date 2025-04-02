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
<?php include_once "JD_enc_marcas.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Marcas</h1>
		<form action="./JD_insert_marcas.php" method="POST">
			<div class="form-group">
				<label for="id_marca">ID. Pais.</label>
				<input required name="id_marca" type="text" minlength="1" maxlength="2" id="id_marca" placeholder="ID Marca." class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_marca" type="text" id="nom_marca" minlength="4" maxlength="24" placeholder="Nombre Marca." class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="JD_listar_marcas.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>