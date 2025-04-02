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
<?php include_once "encab_clientes.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar cliente BNPRO</h1>
		<form action="./insertar_clientes.php" method="GET">
			<div class="form-group">
				<label for="id_cliente">ID. cliente</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_cliente" type="text" id="id_cliente" placeholder="ID cliente" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre cliente</label>
				<input required name="nom_cliente" type="text" id="nom_cliente" placeholder="Nombre cliente" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Apellido</label>
				<input required name="ape_cliente" type="text" id="ape_cliente" placeholder="Apellido" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Acumulado</label>
				<input required name="val_acum" type="text" id="val_acum" placeholder="Acumulado" class="form-control">
			</div>
            <div class="form-group">
				<label for="ciudad">Ciudad</label>
				<input required name="id_ciudad" type="text" id="id_ciudad" placeholder="Ciuedad" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Telefono</label>
				<input required name="tel_cliente" type="text" id="tel_cliente" placeholder="Telefono" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Bancos</label>
				<input required name="id_banco" type="text" id="id_banco" placeholder="banco" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Acumulado</label>
				<input required name="val_acum" type="text" id="val_acum" placeholder="Acumulado" class="form-control">
			</div>
            <div class="form-group">
				<label for="estado">Estado</label>
				<SELECT required name="ind_estado" id="ind_estado">
					<OPtion value=False>Inactivo</OPtion>
					<OPtion value=True>Activo</OPtion>
				</SELECT>
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_clientes.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>