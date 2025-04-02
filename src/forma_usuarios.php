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
		<h1>Agregar Usuarios Amigos CEPR</h1>
		<form action="./insertar_usuarios.php" method="POST">
<!--		<div class="form-group">
				<label for="id">Consecutivo</label>
				<input type="hidden" name="id" value="<?php echo $usuarios->id; ?>">
				<input required name="id" type="number" id="id" placeholder="ID del Usuario" class="form-control">
			</div> -->
			<div class="form-group">
				<label for="usuario">Usuario</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="nusuario" type="text" maxlength=8 minlength=4 id="nusuario" placeholder="Usuario del Sistema" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nombre" type="text" id="nombre" placeholder="Nombre Usuario" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Clave</label>
				<input required name="password" type="password" step="any" id="password" placeholder="Password" class="form-control">
			</div>
			<div class="form-group">
				<label for="rol">Rol</label>
				<input required name="rol" type="number" maxlength=1 minlength=1 default="1" step="any" id="rol" placeholder="Rol Usuario" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_usuarios.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
	
function showMessage(){
 alert("Forma de usuarios");
}
</div>
<?php include_once "pie.php" ?>
