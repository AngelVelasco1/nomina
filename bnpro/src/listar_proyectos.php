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
$sentencia = $base_de_datos->query('SELECT id_proy, id_bpin, nom_proy, id_dpto, id_municipio, fec_registro FROM tab_proy ORDER BY 2 LIMIT 20000');
$proyectos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Proyectos BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>BPIN</th>
						<th>Nombre</th>
						<th>Dpto.</th>
						<th>Municipio</th>
						<th>Fec. Refistro</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($proyectos as $proy)
					{
						?>
						<tr>
							<td><?php echo $proy->id_proy ?></td>
							<td><?php echo $proy->id_bpin ?></td>
							<td><?php echo $proy->nom_proy ?></td>
							<td><?php echo $proy->id_dpto ?></td>
							<td><?php echo $proy->id_municipio ?></td>
							<td><?php echo $proy->fec_registro ?></td>
							<td><a class="btn btn-warning" href="<?php echo "edit_proyectos.php?id_proy=" . $proy->id_proy?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "elim_proyectos.php?id_proy=" . $proy->id_proy?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>