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
<?php include_once "encab_contactos.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Contactos BNPRO</h1>

		<div class="col l6 s12">
		<h5 class="white-text">! Bienvenido !</h5>
		<p class="grey-text text-lighten-4">Por favor, diligencie los datos en el presente formulario a fin entregarle la información de manera oportuna, tan pronto nos sea posible. En un plazo máximo de 24 horas estaremos en contacto con Usted. Es indispenable que sus datos sean consignados para establecer un acercamiento más efectivo.</p>
		<p class="grey-text text-lighten-4">Igualmente, tenga en cuenta que, para poder brindarle una información puntual y precisa, es necesario que diligencia todos los campos solicitados.</p>
		<p class="grey-text text-lighten-4">¡ Muchas gracias por contactárnos y por su amable interés !</p>
		<p class="grey-text text-lighten-4">Cordialmente, Equipo BNPRO</p>
	  </div>

		<form action="./insertar_contactos.php" method="POST">
<!--			<div class="form-group">
				<label for="id_contacto">#</label>
				<input required name="id_contacto" type="number" min="1" id="id_contacto" placeholder="ID Contacto" class="form-control">
			</div> -->
			<div class="form-group">
				<label for="nombre">Entidad</label>
				<input required name="nom_entidad" type="text" id="nom_entidad" placeholder="Nombre Entidad" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Contacto</label>
				<input required name="nom_contacto" type="text" id="nom_contacto" placeholder="Nombre Contacto" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Correo</label>
				<input required name="val_correo" type="mail" id="val_correo" placeholder="Correo Electrónico" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Teléfono</label>
				<input required name="val_telefono" type="number" id="val_telefono" min="2222222222" max="9999999999" placeholder="Teléfono" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Interesado en</label>
				<input required name="val_interes" type="text" id="val_interes" placeholder="Interesado en.." class="form-control">
			</div>
<!--			<div class="form-group">
				<label for="nombre">Fecha</label>
				<input required disabled name="fec_contacto" type="disabled" id="fec_contacto" placeholder="Interasado en.." class="form-control">
			</div> -->
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_contactos.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>