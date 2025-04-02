<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_ciudad"]))
{
	echo "No existe la ciudad a editar";
	exit();
}

$id_ciudad = $_GET["id_ciudad"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_ciudad, nom_ciudad FROM tab_ciudades WHERE id_ciudad = ?;");
$sentencia->execute([$id_ciudad]);
$ciudades = $sentencia->fetchObject();
if (!$ciudades)
{
    #No existe
    echo "¡No existe la ciudad con ese ID!";
    exit();
}

#Si la región existe, se ejecuta esta parte del código
?>
<?php include_once "encab_ciudades.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_ciudades.php" method="POST">
			<input type="hidden" name="id_ciudad" value="<?php echo $ciudades->id_ciudad; ?>">
			<div class="form-group">
				<label for="nombre">Nombre ciudad</label>
				<input value="<?php echo $ciudades->nom_ciudad; ?>" required name="nom_ciudad" type="text" id="nom_ciudad" placeholder="Nombre de la ciudad" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_ciudades.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>