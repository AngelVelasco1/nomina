<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_banco"]))
{
	echo "No existe el Banco a editar";
	exit();
}

$id_banco = $_GET["id_banco"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_banco, nom_banco FROM tab_bancos WHERE id_banco = ?;");
$sentencia->execute([$id_banco]);
$bancos = $sentencia->fetchObject();
if (!$bancos)
{
    #No existe
    echo "¡No existe el Banco con ese ID!";
    exit();
}

#Si la región existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="JD_update_bancos.php" method="POST">
			<input type="hidden" name="id_banco" value="<?php echo $bancos->id_banco; ?>">
			<div class="form-group">
				<label for="nombre">Nombre Banco</label>
				<input value="<?php echo $bancos->nom_banco; ?>" required name="nom_banco" type="text" id="nom_banco" placeholder="Nombre del Banco" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./JD_listar_bancos.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>