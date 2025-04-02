<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@date 2023-05-10
======================================================================================================
Este archivo muestra un formulario llenado automáticamente desde el ID pasado por la URL) para editar
======================================================================================================
 */

if (!isset($_GET["id_dpto"]))
{
	echo "No existe el Departamento a editar";
	exit();
}

$id_dpto = $_GET["id_dpto"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id_dpto, nom_dpto, id_pais FROM tab_dptos WHERE id_dpto = ?;");
$sentencia->execute([$id_dpto]);
$dptos = $sentencia->fetchObject();
$sentencia = $base_de_datos->query("SELECT id_pais, nom_pais FROM tab_paises ORDER BY 1");
$paises = $sentencia->fetchAll(PDO::FETCH_OBJ);


if (!$dptos)
{
    #No existe
    echo "¡No existe el Departamento con ese ID!";
    exit();
}

#Si el >Dpto. existe, se ejecuta esta parte del código
?>
<?php include_once "JD_enc_dptos.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="JD_update_dptos.php" method="POST">
			<input type="hidden" name="id_dpto" value="<?php echo $dptos->id_dpto; ?>">
			<div class="form-group">
				<label for="nombre">Nombre Departamento</label>
				<input value="<?php echo $dptos->nom_dpto; ?>" name="nom_dpto" minlength="5" maxlength="24" type="text" id="nom_dpto" placeholder="Nombre del Departamento" class="form-control">
			</div>
			<div>
				<label for="nombre">Nombre Pais</label>
				<select name="id_pais" id="id_pais" class="form-control">
					<?php foreach(
						$paises as $pais
						){?>
					<option value="<?php echo $pais->id_pais ?>"><?php echo $pais->nom_pais ?></option>
					<?php }?>
				</select>  
			</div>
			<br>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./JD_listar_dptos.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>