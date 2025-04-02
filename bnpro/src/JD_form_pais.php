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
<?php include_once "JD_enc_pais.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Paises</h1>
		<form action="./JD_insert_pais.php" method="POST">
			<div class="form-group">
				<label for="id_dpto">ID. Pais.</label>
				<input required name="id_pais" type="text" minlength="1" maxlength="3" id="id_pais" placeholder="ID Pais." class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_pais" type="text" id="nom_pais" minlength="4" maxlength="24" placeholder="Nombre Pais." class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="JD_listar_pais.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>