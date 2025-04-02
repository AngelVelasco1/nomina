<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_cliente"]))
{
	echo "No existe el producto a editar";
	exit();
}

$id_cliente = $_GET["id_cliente"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_cliente, nom_cliente, ape_cliente, id_ciudad, dir_cliente, tel_cliente, id_banco, val_acum, ind_estado   FROM tab_clientes WHERE id_cliente = ?;");
$sentencia->execute([$id_cliente]);
$clientes = $sentencia->fetchObject();
if (!$clientes)
{
    #No existe
    echo "¡No existe la ciudad con ese ID!";
    exit();
}

#Si la región existe, se ejecuta esta parte del código
?>
<?php include_once "encab_clientes.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_clientes.php" method="POST">
			<input type="hidden" name="id_cliente" value="<?php echo $clientes->id_cliente; ?>">
			<div class="form-group">
				<label for="nombre">Nombre cliente</label>
				<input required name="nom_cliente" type="text" id="nom_cliente" placeholder="Nombre cliente" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Apellido</label>
				<input required name="ape_cliente" type="text" id="ape_cliente" placeholder="Apellido" class="form-control">
			</div>
            <div class="form-group">
				<label for="ciudad">ciudad</label>
				<SELECT required name ="id_ciudad" id="id_ciudad" CLASS="form-control">
				<?php
					$sentencia= $base_de_datos->prepare('SELECT a.id_ciudad,a.nom_ciudad FROM tab_ciudades AS a');
					$sentencia->execute();
					$count= $sentencia->rowCount();
					$ciudades=$sentencia->fetchAll();
					foreach($ciudades as $ciudad):
						echo'<option value="'.$ciudad["id_ciudad"].'">'.$ciudad["nom_ciudad"].'</option>';
					endforeach;
				?>
				</SELECT>
			</div>
            <div class="form-group">
				<label for="nombre">Direccion</label>
				<input required name="dir_cliente" type="text" id="dir_cliente" placeholder="Direccion" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Telefono</label>
				<input required name="tel_cliente" type="text" id="tel_cliente" placeholder="Telefono" class="form-control">
			</div>
			<div class="form-group">
				<label for="banco">Banco</label>
				<SELECT required name ="id_banco" id="id_banco" CLASS="form-control">
				<?php
					$sentencia= $base_de_datos->prepare('SELECT a.id_banco,a.nom_banco FROM tab_bancos AS a');
					$sentencia->execute();
					$count= $sentencia->rowCount();
					$bancos=$sentencia->fetchAll();
					foreach($bancos as $banco):
						echo'<option value="'.$banco["id_banco"].'">'.$banco["nom_banco"].'</option>';
					endforeach;
				?>
				</SELECT>
			</div>
            <div class="form-group">
				<label for="nombre">Acumulado</label>
				<input required name="val_acum" type="text" id="val_acum" placeholder="Acumulado" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Estado</label>
				<input required name="ind_estado" type="text" id="ind_estado" placeholder="Estado" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_clientes.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>