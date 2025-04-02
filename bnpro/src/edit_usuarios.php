<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["nusuario"]))
{
	echo "No existe el Usuario a editar";
	exit();
}

$nusuario = $_GET["nusuario"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, nusuario, nombre, password, rol, fec_creacion FROM tab_usuarios WHERE nusuario = ?;");
$sentencia->execute([$nusuario]);
$usuarios = $sentencia->fetchObject();
if (!$usuarios)
{
    #No existe
    echo "¡No existe algún Usuario con ese ID!";
    exit();
}

#Si el usuario existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_usuarios.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $usuarios->id; ?>">
			<input type="hidden" name="nusuario" value="<?php echo $usuarios->nusuario; ?>">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input value="<?php echo $usuarios->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre del Usuario" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Clave</label>
				<input value="<?php echo $usuarios->password; ?>" required name="password" type="text" id="password" placeholder="Clave" class="form-control">
			</div>
			<div class="form-group">
				<label for="rol">Rol</label>
				<input value="<?php echo $usuarios->rol; ?>" required name="rol" type="number" step="any" id="rol" placeholder="Rol" class="form-control">
			</div>
			<input type="hidden" name="fec_creacion" value="<?php echo $usuarios->fec_creacion; ?>">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_usuarios.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>