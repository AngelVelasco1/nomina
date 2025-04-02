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
$sentencia = $base_de_datos->query('SELECT id_ciudad, nom_ciudad , ind_estado FROM tab_ciudades ORDER BY 1');
$ciudades = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_ciudades.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Ciudades BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">Ciudades</th>
						<th scope="col" colspan="1" style="text-align: center">Estado</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="2" style="text-align: center">Declarae Estado</th>

					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($ciudades as $ciudad)
					{?>
					<tr>
						<td><?php echo $ciudad->id_ciudad ?></td>
						<td><?php echo $ciudad->nom_ciudad ?></td>
						<td><?php if ($ciudad->ind_estado==False) {
							echo "Inactivo";
						}else{
							echo"Activo";
						}
						?></td>
						<td><a class="btn btn-warning" href="<?php echo "edit_ciudades.php?id_ciudad=" . $ciudad->id_ciudad?>">Editar 📝</a></td>
						<td><a class="btn btn-danger" href="<?php echo "elim_ciudades.php?id_ciudad=" . $ciudad->id_ciudad?>">Activo</a></td>
						<td><a class="btn btn-danger" href="<?php echo "elim_ciudades.php?id_ciudad=" . $ciudad->id_ciudad?>">Inactivo </a></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>