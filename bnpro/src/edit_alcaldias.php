
<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_alcaldia"]))
{
	echo "No existe la Alcaldia a editar";
	exit();
}

$id_alcaldia = $_GET["id_alcaldia"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_alcaldia, val_digito_verif, nom_alcaldia, nom_alcalde, id_dpto, id_municipio, dir_alcaldia, nom_gestora_social FROM tab_alcaldias WHERE id_alcaldia = ?;");
$sentencia->execute([$id_alcaldia]);
$alcaldias = $sentencia->fetchObject();
if (!$alcaldias)
{
    #No existe
    echo "¡No existe la Alcaldía con ese ID!";
    exit();
}

#Si la alcaldía existe, se ejecuta esta parte del código
?>
<?php include_once "encab_alcaldias.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_alcaldias.php" method="POST">
			<input type="hidden" name="id_alcaldia" value="<?php echo $alcaldias->id_alcaldia; ?>">

			<div class="form-group">
				<label for="nombre">Dígito Verificación</label>
				<input value="<?php echo $alcaldias->val_digito_verif; ?>" required name="val_digito_verif" type="number" min="0" max="9" id="val_digito_verig" placeholder="Dígito de Verificación" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input value="<?php echo $alcaldias->nom_alcaldia; ?>" required name="nom_alcaldia" type="text" id="nom_alcaldia" placeholder="Nombre de Alcaldía" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Alcalde</label>
				<input value="<?php echo $alcaldias->nom_alcalde; ?>" required name="nom_alcalde" type="text" id="nom_alcalde" placeholder="Nombre de la Alcalde" class="form-control">
			</div>
			<div class="form-group">
				<label for="id_municipio">Municipio</label>
				<select required name="id_municipio" id="id_municipio" class="form-control">
				<?php
					$sentencia = $base_de_datos->prepare('SELECT a.id_dpto, b.nom_dpto, a.id_municipio, a.nom_municipio FROM tab_municipios a, tab_dptos b WHERE a.id_dpto = b.id_dpto ORDER BY 2,4');
					$sentencia->execute();
					$count = $sentencia->rowCount();
					$dptos = $sentencia->fetchAll();
					foreach($dptos as $dpto):
						echo '<option value="'.$dpto["id_municipio"].'">'.$dpto["nom_dpto"].', '.$dpto["nom_municipio"].'</option>';
					endforeach;
				?>
				</select>
			</div>

			<div class="form-group">
				<label for="nombre">Dirección</label>
				<input value="<?php echo $alcaldias->dir_alcaldia; ?>" required name="dir_alcaldia" type="text" id="dir_alcaldia" placeholder="Dirección Alcaldía" class="form-control">
			</div>

			<div class="form-group">
				<label for="nombre">Gestora Social</label>
				<input value="<?php echo $alcaldias->nom_gestora_social; ?>" required name="nom_gestora_social" type="text" id="nom_gestora_social" placeholder="Gestora Social" class="form-control">
			</div>

			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_alcaldias.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>