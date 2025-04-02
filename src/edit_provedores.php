<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_prov"]))
{
	echo "No existe el provedor a editar";
	exit();
}

$id_prov = $_GET["id_prov"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_prov, nom_prov, id_pais, id_ciudad, mail_prov, ubic_prov, tel_prov  FROM tab_prov WHERE id_prov = ?;");
$sentencia->execute([$id_prov]);
$provedores = $sentencia->fetchObject();
if (!$provedores)
{
    #No existe
    echo "¡No existe el provedor con ese ID!";
    exit();
}

#Si la región existe, se ejecuta esta parte del código
?>
<?php include_once "encab_provedores.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="update_provedores.php" method="POST">
			<input type="hidden" name="id_prov" value="<?php echo $provedores->id_prov; ?>">
			<div class="form-group">
				<label for="nombre">Nombre del Provedor</label>
				<input required name="nom_prov" type="text" id="nom_prov" placeholder="Nombre " class="form-control">
			</div>
            <div class="form-group">
				<label for="pais">pais</label>
				<SELECT required name ="id_pais" id="id_pais" CLASS="form-control">
				<?php
					$sentencia= $base_de_datos->prepare('SELECT a.id_pais,a.nom_pais FROM tab_paises AS a');
					$sentencia->execute();
					$count= $sentencia->rowCount();
					$paises=$sentencia->fetchAll();
					foreach($paises as $pais):
						echo'<option value="'.$pais["id_pais"].'">'.$pais["nom_pais"].'</option>';
					endforeach;
				?>
				</SELECT>
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
				<label for="nombre">mail</label>
				<input required name="mail_prov" type="text" id="mail_prov" placeholder="mail" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">ubicacion</label>
				<input required name="ubic_prov" type="text" id="ubic_prov" placeholder="ubicacion" class="form-control">
			</div>
            <div class="form-group">
				<label for="nombre">Telefono</label>
				<input required name="tel_prov" type="text" id="tel_prov" placeholder="telefono" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar_provedores.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>