<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_pais"]))
{
	echo "No existe el pais a editar";
	exit();
}

$id_pais = $_GET["id_pais"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_pais, nom_pais FROM tab_paises WHERE id_pais = ?;");
$sentencia->execute([$id_pais]);
$paises = $sentencia->fetchObject();
if (!$paises)
{
    #No existe
    echo "¡No existe el banco con ese ID!";
    exit();
}

#Si la banco existe, se ejecuta esta parte del código
?>
<?php include_once "encab_paises.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_paises.php" method="POST">
			<input type="hidden" name="id_pais" value="<?php echo $paises->id_pais; ?>">
			<div class="form-group">
				<label for="nombre">Nombre pais</label>
				<input value="<?php echo $paises->nom_pais; ?>" required name="nom_pais" type="text" id="nom_pais" placeholder="Nombre del pais" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_paises.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>