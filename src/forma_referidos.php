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
		<h1>Agregar Referidos</h1>
		<form action="./insertar_referidos.php" method="POST">
		<div class="form-group">
				<label for="id">Identificación</label>
<!--				<input type="hidden" name="id" value="<?php echo $usuarios->id; ?>"> -->
				<input required name="id" type="number" id="id" placeholder="ID del Referido" class="form-control">
			</div>
			<div class="form-group">
				<label for="referido">Primer Apellido</label>
				<input required name="apellido1" type="text" size="30" id="apellido1" placeholder="Primer Apellido" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Segundo Apellido</label>
				<input required name="apellido2" type="text" id="apellido2" placeholder="Segundo Apellido" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre1">Primer Nombre</label>
				<input required name="nombre1" type="text" step="any" id="nombre1" placeholder="nombre1" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre2">Segundo Nombre</label>
				<input required name="nombre2" type="text" step="any" id="nombre2" placeholder="nombre2" class="form-control">
			</div>
			<div class="form-group">
				<label for="rol">Rol</label>
				<input required name="rol" type="number" step="any" id="rol" placeholder="Rol Usuario" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_referidoss.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>