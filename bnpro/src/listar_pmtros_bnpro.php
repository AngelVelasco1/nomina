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
$sentencia	  = $base_de_datos->query('SELECT id_entidad, nom_entidad, ano_fiscal, mes_fiscal, val_tir,nom_plan_desarrollo FROM tab_pmtros_bnpro');
$pmtros_bnpro = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_pmtros_bnpro.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Parámetros BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">Entidad</th>
						<th scope="col" colspan="1" style="text-align: center">Año Fiscal</th>
						<th scope="col" colspan="1" style="text-align: center">Mes Fiscal</th>
						<th scope="col" colspan="1" style="text-align: center">TIR</th>
						<th scope="col" colspan="1" style="text-align: center">Plan Desarrollo</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Eliminar</th>

					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($pmtros_bnpro as $pm_bnpro)
					{?>
					<tr>
						<td><?php echo $pm_bnpro->id_entidad ?></td>
						<td><?php echo $pm_bnpro->nom_entidad ?></td>
						<td><?php echo $pm_bnpro->ano_fiscal ?></td>
						<td><?php echo $pm_bnpro->mes_fiscal ?></td>
						<td><?php echo $pm_bnpro->val_tir ?></td>
						<td><?php echo $pm_bnpro->nom_plan_desarrollo ?></td>
						<td><a class="btn btn-warning" href="<?php echo "edit_pmtros_bnpro.php?id_entidad=" . $pm_bnpro->id_entidad?>">Editar 📝</a></td>
						<td><a class="btn btn-danger" href="<?php echo "elim_pmtros_bnpro.php?id_entidad=" . $pm_bnpro->id_entidad?>">Eliminar 🗑️</a></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>