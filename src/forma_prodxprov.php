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
<?php include_once "encab_prodxprov.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar producto x provedor BNPRO</h1>
		<form action="./insertar_prodxprov.php" method="POST">
			<div class="form-group">
				<label for="id_prov">ID. provedor</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_prov" type="number"  id="id_prov" placeholder="ID provedor" class="form-control">
			</div>
			<div class="form-group">
				<label for="id_prod">ID producto</label>
				<input required name="id_prod" type="text" id="id_prod" placeholder="ID producto" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_prodxprov.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>