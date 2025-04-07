<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_cargo"]))
{
	echo "No existe el Departamento a editar";
	exit();
}

$id_cargo = $_GET["id_cargo"];
$nom_cargo = $_GET["nom_cargo"] ?? null;

include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tab_cargos WHERE id_cargo = ?;");
$sentencia->execute([$id_cargo]);
$cargos = $sentencia->fetchObject();
if (!$cargos)
{
    #No existe
    echo "¡No existe el Departamento con ese ID!";
    exit();
}

#Si el >Dpto. existe, se ejecuta esta parte del código
?>
<?php include_once "encab_cargos.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_cargos.php" method="POST">
			<input type="hidden" name="id_cargo" value="<?php echo $cargos->id_cargo; ?>">
			<div class="form-group">
				<label for="nombre">Nombre Cargo</label>
				<input value="<?php echo $cargos->nom_cargo; ?>" required name="nom_cargo" minlength="5" maxlength="24" type="text" id="nom_cargo" placeholder="Nombre del Departamento" class="form-control">
			</div>
			<input type="number" name="id_cargo" value="<?php echo $cargos->id_cargo; ?>">
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_cargos.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>