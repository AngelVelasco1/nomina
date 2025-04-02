<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_prod"]))
{
	echo "No existe el producto a editar";
	exit();
}

$id_prod = $_GET["id_prod"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_prod, nom_prod, id_marca, val_prod, val_stock, ind_categ, ind_tipo,  ind_clase, usr_insert, fec_insert, usr_update, fec_update  FROM tab_prod WHERE id_prod = ?;");
$sentencia->execute([$id_prod]);
$productos = $sentencia->fetchObject();
if (!$productos)
{
    #No existe
    echo "¡No existe la ciudad con ese ID!";
    exit();
}

#Si la región existe, se ejecuta esta parte del código
?>
<?php include_once "encab_productos.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_productos.php" method="POST">
			<input type="hidden" name="id_prod" value="<?php echo $productos->id_prod; ?>">
			<div class="form-group">
				<label for="nombre">Nombre producto</label>
				<input value="<?php echo $productos->nom_prod; ?>" required name="nom_prod" type="text" id="nom_prod" placeholder="Nombre del producto" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Marca</label>
				<input value="<?php echo $productos->id_marca; ?>" required name="id_marca" type="text" id="id_marca" placeholder="Marca" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Valor</label>
				<input value="<?php echo $productos->val_prod; ?>" required name="val_prod" type="text" id="val_prod" placeholder="Valor" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">stock</label>
				<input value="<?php echo $productos->val_stock; ?>" required name="val_stock" type="text" id="val_stock" placeholder="Stock" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Categoria</label>
				<input value="<?php echo $productos->ind_categ; ?>" required name="ind_categ" type="text" id="ind_categ" placeholder="Categoria" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Tipo</label>
				<input value="<?php echo $productos->ind_tipo; ?>" required name="ind_tipo" type="text" id="ind_tipo" placeholder="Tipo" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Clase</label>
				<input value="<?php echo $productos->ind_clase; ?>" required name="ind_clase" type="text" id="ind_clase" placeholder="Clase" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_productos.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>