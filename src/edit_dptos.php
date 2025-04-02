<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_dpto"]))
{
	echo "No existe el Departamento a editar";
	exit();
}

$id_dpto = $_GET["id_dpto"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_dpto, nom_dpto, id_region FROM tab_dptos WHERE id_dpto = ?;");
$sentencia->execute([$id_dpto]);
$dptos = $sentencia->fetchObject();
if (!$dptos)
{
    #No existe
    echo "¡No existe el Departamento con ese ID!";
    exit();
}

#Si el >Dpto. existe, se ejecuta esta parte del código
?>
<?php include_once "encab_dptos.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_dptos.php" method="POST">
			<input type="hidden" name="id_dpto" value="<?php echo $dptos->id_dpto; ?>">
			<div class="form-group">
				<label for="nombre">Nombre Dpto.</label>
				<input value="<?php echo $dptos->nom_dpto; ?>" required name="nom_dpto" minlength="5" maxlength="24" type="text" id="nom_dpto" placeholder="Nombre del Departamento" class="form-control">
			</div>
			<input type="number" name="id_region" value="<?php echo $dptos->id_region; ?>">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_dptos.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>