<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_region"]))
{
	echo "No existe la Región a editar";
	exit();
}

$id_region = $_GET["id_region"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_region, nom_region FROM tab_regiones WHERE id_region = ?;");
$sentencia->execute([$id_region]);
$regiones = $sentencia->fetchObject();
if (!$regiones)
{
    #No existe
    echo "¡No existe la Región con ese ID!";
    exit();
}

#Si la región existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_regiones.php" method="POST">
			<input type="hidden" name="id_region" value="<?php echo $regiones->id_region; ?>">
			<div class="form-group">
				<label for="nombre">Nombre Región</label>
				<input value="<?php echo $regiones->nom_region; ?>" required name="nom_region" type="text" id="nom_region" placeholder="Nombre de la Región" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_regiones.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>