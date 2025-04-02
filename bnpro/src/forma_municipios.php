<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
============================================================================================
Este archivo muestra un formulario que se envía a insertar.php, el cual guardará los datos
============================================================================================
*/
?>
<?php include_once "base_de_datos.php" ?>
<?php include_once "encab_municipios.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Municipios a BNPRO</h1>
		<form action="./insertar_municipios.php" method="POST">
<!--		<div class="form-group">
				<label for="id">Consecutivo</label>
				<input type="hidden" name="id" value="<?php echo $usuarios->id_dpto; ?>">
				<input required name="id" type="number" id="id" placeholder="ID del Usuario" class="form-control">
			</div> -->

<!-- TRAYENDO LOS DEPARTAMENTOS DESDE LA TABLA tab_dptos-->

			<div class="form-group">
				<label for="id_dpto">Departamento</label>
				<select required name="id_dpto" id="id_dpto" class="form-control">
				<?php
					$sentencia = $base_de_datos->prepare('SELECT a.id_dpto, a.nom_dpto FROM tab_dptos a ORDER BY 2');
					$sentencia->execute();
					$count = $sentencia->rowCount();
					$dptos=$sentencia->fetchAll();
					foreach($dptos as $dpto):
						echo '<option value="'.$dpto["id_dpto"].'">'.$dpto["nom_dpto"].'</option>';
					endforeach;
				?>
				</select>
			</div>

			<div class="form-group">
				<label for="id_municipio">Id.Municipio</label>
				<input required name="id_municipio" type="text" maxlength=3 minlength=3 id="id_municipio" placeholder="Municipio" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_municipio" type="text" id="nom_municipio" minlength="3" maxlength="30" placeholder="Nombre Municipio" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_municipios.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
<?php include_once "pie.php" ?>