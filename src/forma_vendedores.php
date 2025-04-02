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
<?php include_once "encab_vendedores.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Vendedor BNPRO</h1>
		<form action="./insertar_vendedores.php" method="GET">
			<div class="form-group">
				<label for="id_vendedor">ID. vendedor</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_vendedor" type="text" id="id_vendedor" placeholder="ID vendedor" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre del vendedor</label>
				<input required name="nom_vendedor" type="text" id="nom_vendedor" placeholder="Nombre vendedor" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Apellido vendedor</label>
				<input required name="ape_vendedor" type="text" id="ape_vendedor" placeholder="Apellido vendedor" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Sueldo</label>
				<input required name="val_sueldo" type="text" id="val_sueldo" placeholder="Sueldo" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Comision</label>
				<input required name="val_comision" type="text" id="val_comision" placeholder="Comision" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Sueldo Total</label>
				<input required name="val_totsuel" type="text" id="val_totsuel" placeholder="Sueldo Total" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Telefono</label>
				<input required name="tel_vendedor" type="text" id="tel_vendedor" placeholder="Telefono" class="form-control">
			</div>
			<div class="form-group">
				<label for="estado">Estado</label>
				<SELECT required name="ind_estado" id="ind_estado">
					<OPtion value=False>Inactivo</OPtion>
					<OPtion value=True>Activo</OPtion>
				</SELECT>
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_vendedores.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>