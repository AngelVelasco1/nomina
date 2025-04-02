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
<?php include_once "encab_alcaldias.php" ?>
<?php include_once "base_de_datos.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Alcaldías BNPRO</h1>
		<form action="./insertar_alcaldias.php" method="POST">
			<div class="form-group">
				<label for="id_alcaldia">ID. Alcaldía</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_alcaldia" type="number" min="1" max="10" id="id_alcaldia" placeholder="ID alcaldía" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Dígito Verificación</label>
				<input required name="val_digito_verif" type="number" min="0" max="9" id="val_digito_verif" placeholder="Dígito Verificación" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_alcaldia" type="text" minlength="10" maxlength="40" id="nom_alcaldia" placeholder="Nombre alcaldia" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Alcalde</label>
				<input required name="nom_alcalde" type="text" id="nom_alcalde" placeholder="Nombre Alcalde" class="form-control">
			</div>

			<div class="form-group">
				<label for="id_dpto">Departamento</label>
				<select required name="id_dpto" id="id_dpto" class="form-control">
				<?php
					$sentencia = $base_de_datos->prepare('SELECT a.id_dpto, a.nom_dpto FROM tab_dptos a ORDER BY 2');
					$sentencia->execute();
					$count = $sentencia->rowCount();
					echo $count;
					$dptos = $sentencia->fetchAll();
					foreach($dptos as $dpto):
						echo '<option value="'.$dpto["id_dpto"].'">'.$dpto["nom_dpto"].'</option>';
						$depart=$dpto["id_dpto"];
						echo $depart;
					endforeach;
				?>
				</select>
			</div>

			<div class="form-group">
				<label for="id_municipio">Municipio</label>
				<select required name="id_municipio" id="id_municipio" class="form-control"> -->
				<?php
					$sentencia1 = $base_de_datos->prepare("SELECT a.id_dpto, b.nom_dpto, a.id_municipio, a.nom_municipio FROM tab_municipios a, tab_dptos b WHERE a.id_dpto = b.id_dpto ORDER BY 3");
					echo $depart;
					$sentencia1->execute();
					$count = $sentencia1->rowCount();
					echo $count;
					$munic = $sentencia1->fetchAll();
					foreach($munic as $mun):
						echo '<option value="'.$mun["nom_dpto"].'">'.$mun["nom_municipio"].'</option>';
					endforeach;
				?>
				</select>
			</div>

			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_alcaldias.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>