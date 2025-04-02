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
<?php include_once "encab_provedores.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar provedor BNPRO</h1>
		<form action="./insertar_provedores.php" method="GET">
			<div class="form-group">
				<label for="id_prov">ID. provedor</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_prov" type="text" id="id_prov" placeholder="ID provedor" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre del Provedor</label>
				<input required name="nom_prov" type="text" id="nom_prov" placeholder="Nombre " class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">pais</label>
				<input required name="id_pais" type="text" id="id_pais" placeholder="pais" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">ciudad</label>
				<input required name="id_ciudad" type="text" id="id_ciudad" placeholder="ciudad" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">mail</label>
				<input required name="mail_prov" type="text" id="mail_prov" placeholder="mail" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">ubicacion</label>
				<input required name="ubic_prov" type="text" id="ubic_prov" placeholder="ubicacion" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Telefono</label>
				<input required name="tel_prov" type="text" id="tel_prov" placeholder="telefono" class="form-control">
			</div>
			<div class="form-group">
				<label for="estado">Estado</label>
				<SELECT required name="ind_estado" id="ind_estado">
					<OPtion value=False>Inactivo</OPtion>
					<OPtion value=True>Activo</OPtion>
				</SELECT>
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_provedores.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>