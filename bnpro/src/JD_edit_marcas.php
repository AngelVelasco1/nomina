<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_marca"]))
{
	echo "No existe la marca a editar";
	exit();
}

$id_marca = $_GET["id_marca"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_marca, nom_marca FROM tab_marcas WHERE id_marca = ?;");
$sentencia->execute([$id_marca]);
$marcas = $sentencia->fetchObject();
if (!$marcas)
{
    #No existe
    echo "¡No existe la marca con ese ID!";
    exit();
}

#Si la región existe, se ejecuta esta parte del código
?>
<?php include_once "JD_enc_marcas.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="JD_update_marcas.php" method="POST">
			<input type="hidden" name="id_marca" value="<?php echo $marcas->id_marca; ?>">
			<div class="form-group">
				<label for="nombre">Nombre Marca</label>
				<input value="<?php echo $marcas->nom_marca; ?>" required name="nom_marca" type="text" id="nom_marca" placeholder="Nombre de la marca" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./JD_listar_marcas.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>