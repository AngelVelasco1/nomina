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
<?php include_once "JD_enc_bancos.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Bancos</h1>
		<form action="./JD_insert_bancos.php" method="POST">
			<div class="form-group">
				<label for="nombre">Nombre Banco</label>
				<input required name="nom_banco" type="text" id="nom_banco" placeholder="Nombre del Banco" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="JD_listar_bancos.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>