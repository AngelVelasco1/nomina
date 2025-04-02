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
$sentencia = $base_de_datos->query('SELECT b.id_dpto, b.nom_dpto, a.id_municipio, a.nom_municipio FROM tab_municipios a,tab_dptos b
WHERE a.id_dpto = b.id_dpto ORDER BY 1,3');
$municipios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_municipios.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Municipios BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">Departamento</th>
						<th scope="col" colspan="1" style="text-align: center">ID Municipio</th>
						<th scope="col" colspan="1" style="text-align: center">Municipio</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($municipios as $mun)
					{
						?>
						<tr>
							<td><?php echo $mun->id_dpto ?></td>
							<td><?php echo $mun->id_municipio ?></td>
							<td><?php echo $mun->nom_municipio ?></td>
							<td><a class="btn btn-warning" href="edit_municipios.php?id_dpto=<?php echo $mun->id_dpto;?>&id_municipio=<?php echo $mun->id_municipio;?>">Editar 📝</a></td>
							<td><a class="btn btn-warning" href="elim_municipios.php?id_dpto=<?php echo $mun->id_dpto;?>&id_municipio=<?php echo $mun->id_municipio;?>">Eliminar 🗑️</a></td> 
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>
