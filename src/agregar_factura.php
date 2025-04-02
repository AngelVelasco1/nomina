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
		<h1>Agregar cliente BNPRO</h1>
		<form action="./mostrar_factura.html" method="GET">
			<div class="form-group">
				<label for="a.id_fac">ID factura</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="a.id_fac" type="text" id="a.id_fac" placeholder="ID factura" class="form-control">
			</div>
            <div class="form-group">
				<label for="a.id_ciudad">ciudad</label>
				<input required name="a.id_ciudad" type="text" id="a.id_ciudad" placeholder="ingresa la ciudad" class="form-control">
			</div>
            <div class="form-group">
				<label for="a.id_vendedor">vendedor</label>
				<input required name="a.id_vendedor" type="text" id="a.id_vendedor" placeholder="ingresa el vendedor" class="form-control">
			</div>
            <div class="form-group">
				<label for="a.id_cliente">cliente</label>
				<input required name="a.id_cliente" type="text" id="a.id_cliente" placeholder="ingresa el cliente" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Creditos</label>
				<input required name="a.ind_credito" type="text" id="a.ind_credito" placeholder="creditos" class="form-control">
			</div>
            <div class="form-group">
				<label for="a.id_prod">Producto</label>
				<input required name="a.id_prod" type="text" id="a.id_prod" placeholder="producto" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">cantidad</label>
				<input required name="b.val_cant" type="text" id="b.val_cant" placeholder="cantidad" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_factura.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>