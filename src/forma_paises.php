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
<?php include_once "encab_paises.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Pais BNPRO</h1>
		<form action="./insertar_paises.php" method="POST">
			<div class="form-group">
				<label for="id_pais">ID. Pais</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_pais" type="number"  id="id_pais" placeholder="ID Pais" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_pais" type="text" id="nom_pais" placeholder="Nombre Pais" class="form-control">
			</div>
			<div class="form-group">
				<label for="estado">Estado</label>
				<SELECT required name="ind_estado" id="ind_estado">
					<OPtion value=False>Inactivo</OPtion>
					<OPtion value=True>Activo</OPtion>
				</SELECT>
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_paises.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>