<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */


if ( !isset($_GET["id_dpto"]) ||
     !isset($_GET["id_municipio"]))
{
	echo "No existe el Municipio a editar... Revise";
	exit();
}

$dpto 	   = $_GET["id_dpto"];
$municipio = $_GET["id_municipio"];
/*echo $dpto;
echo $municipio;*/

include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT a.id_dpto, a.id_municipio, a.nom_municipio,b.nom_dpto FROM tab_municipios a, tab_dptos b WHERE a.id_dpto = ? AND a.id_municipio = ? AND a.id_dpto = b.id_dpto;");
$sentencia->execute([$dpto,$municipio]);
$municipio = $sentencia->fetchObject();
if (!$municipio)
{
    #No existe
    echo "¡No existe algún Municipio con ese ID!";
    exit();
}

#Si el dpto y el municipio existen, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_municipios.php" method="GET">
			<label for="nombre">Departamento</label>
			<input type="text" name="id_dpto" value="<?php echo $municipio->id_dpto; ?>">
			<input type="text" name="id_municipio" value="<?php echo $municipio->id_municipio; ?>">
			<div class="form-group">
				<label for="nombre">Municipio</label>
				<input value="<?php echo $municipio->nom_municipio; ?>" required name="nom_municipio" type="text" id="nom_municipio" placeholder="Nombre del Municipio" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_municipios.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>
