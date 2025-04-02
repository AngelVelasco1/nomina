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
<?php include_once "encab_ciudades.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar ciudades BNPRO</h1>
		<form action="./insertar_ciudades.php" method="POST">
			<div class="form-group">
				<label for="id_ciudad">ID. ciudad</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_ciudad" type="number" min="1" max="10" id="id_ciudad" placeholder="ID ciudad" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_ciudad" type="text" id="nom_ciudad" placeholder="Nombre ciudad" class="form-control">
			</div>
			<div class="form-group">
				<label for="estado">Estado</label>
				<SELECT required name="ind_estado" id="ind_estado">
					<OPtion value=False>Inactivo</OPtion>
					<OPtion value=True>Activo</OPtion>
				</SELECT>
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_ciudades.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>