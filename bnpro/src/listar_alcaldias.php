<?php
/*
CRUD con PostgreSQL y PHP
@Equipo BNPRO (Alvaro, Jose, Esteban, CEP)
@2023-05-08
=========================================================================================
Este archivo lista todos los datos de la tabla, obteniendo a los mismos como un arreglo
=========================================================================================
*/
?>
<?php
include_once "base_de_datos.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('SELECT id_alcaldia, val_digito_verif, nom_alcaldia, nom_alcalde, id_dpto, id_municipio, dir_alcaldia, nom_gestora_social FROM tab_alcaldias ORDER BY 1');
$alcaldias = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_alcaldias.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Alcaldías BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">DV</th>
						<th scope="col" colspan="1" style="text-align: center">Alcaldía</th>
						<th scope="col" colspan="1" style="text-align: center">Alcalde</th>
						<th scope="col" colspan="1" style="text-align: center">Dpto.</th>
						<th scope="col" colspan="1" style="text-align: center">Municipio</th>
						<th scope="col" colspan="1" style="text-align: center">Dirección</th>
						<th scope="col" colspan="1" style="text-align: center">Gestora Social</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Eliminar</th>

					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($alcaldias as $alcaldia)
					{?>
					<tr>
						<td><?php echo $alcaldia->id_alcaldia ?></td>
						<td><?php echo $alcaldia->val_digito_verif ?></td>
						<td><?php echo $alcaldia->nom_alcaldia ?></td>
						<td><?php echo $alcaldia->nom_alcalde ?></td>
						<td><?php echo $alcaldia->id_dpto ?></td>
						<td><?php echo $alcaldia->id_municipio ?></td>
						<td><?php echo $alcaldia->dir_alcaldia ?></td>
						<td><?php echo $alcaldia->nom_gestora_social ?></td>
						<td><a class="btn btn-warning" href="<?php echo "edit_alcaldias.php?id_alcaldia=" . $alcaldia->id_alcaldia?>">Editar 📝</a></td>
						<td><a class="btn btn-danger" href="<?php echo "elim_alcaldias.php?id_alcaldia=" . $alcaldia->id_alcaldia?>">Eliminar 🗑️</a></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>