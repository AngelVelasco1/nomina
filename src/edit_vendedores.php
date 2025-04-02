<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_vendedor"]))
{
	echo "No existe el vendedor a editar";
	exit();
}

$id_vendedor = $_GET["id_vendedor"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_vendedor, nom_vendedor, ape_vendedor, val_sueldo, val_comision, val_totsuel, tel_vendedor  FROM tab_vendedores WHERE id_vendedor = ?;");
$sentencia->execute([$id_vendedor]);
$vendedores = $sentencia->fetchObject();
if (!$vendedores)
{
    #No existe
    echo "¡No existe la vendedor con ese ID!";
    exit();
}

#Si la región existe, se ejecuta esta parte del código
?>
<?php include_once "encab_vendedores.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_vendedores.php" method="POST">
			<input type="hidden" name="id_vendedor" value="<?php echo $vendedores->id_vendedor; ?>">
			<div class="form-group">
				<label for="nombre">Nombre del vendedor</label>
				<input required name="nom_vendedor" type="text" id="nom_vendedor" placeholder="Nombre vendedor" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Apellido vendedor</label>
				<input required name="ape_vendedor" type="text" id="ape_vendedor" placeholder="Apellido vendedor" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Sueldo</label>
				<input required name="val_sueldo" type="text" id="val_sueldo" placeholder="Sueldo" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Comision</label>
				<input required name="val_comision" type="text" id="val_comision" placeholder="Comision" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Sueldo Total</label>
				<input required name="val_totsuel" type="text" id="val_totsuel" placeholder="Sueldo Total" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Telefono</label>
				<input required name="tel_vendedor" type="text" id="tel_vendedor" placeholder="Telefono" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_vendedores.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>