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
<?php include_once "encab_factura.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar productos BNPRO</h1>
		<form action="./insertar_productos.php" method="GET">
			<div class="form-group">
				<label for="id_prod">ID. producto</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_prod" type="text" id="id_prod" placeholder="ID producto" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre del Porducto</label>
				<input required name="nom_prod" type="text" id="nom_ciudad" placeholder="Nombre producto" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Marca</label>
				<input required name="id_marca" type="number" id="id_marca" placeholder="Marca" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Valor Producto</label>
				<input required name="val_prod" type="text" id="val_prod" placeholder="Valor producto" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Stock del Producto</label>
				<input required name="val_stock" type="text" id="val_stock" placeholder="Stock" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Categoria</label>
				<input required name="ind_categ" type="text" id="ind_categ" placeholder="Categoria" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Tipo</label>
				<input required name="ind_tipo" type="text" id="ind_tipo" placeholder="Tipo" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Clase</label>
				<input required name="ind_clase" type="text" id="ind_clase" placeholder="Clase" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Estado</label>
				<input required name="ind_estado" type="text" id="ind_estado" placeholder="estado" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_productos.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>