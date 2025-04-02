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
$sentencia = $base_de_datos->query('SELECT id_marca, nom_marca, ind_estado FROM tab_marcas ORDER BY 1');
$marcas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_marcas.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Marcas BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
					<th scope="col" colspan="1" style="text-align: center">ID</th>
					<th scope="col" colspan="1" style="text-align: center">Marcas</th>
					<th scope="col" colspan="1" style="text-align: center">Estado</th>
					<th scope="col" colspan="1" style="text-align: center">Editar</th>
					<th scope="col" colspan="1" style="text-align: center">Declarar Estado</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($marcas as $marca)
					{
						?>
						<tr>
							<td><?php echo $marca->id_marca ?></td>
							<td><?php echo $marca->nom_marca ?></td>
							<td><?php if ($marca->ind_estado==False) {
							echo "Inactivo";
						}else{
							echo"Activo";
						}
						?></td>
							<td><a class="btn btn-warning" href="<?php echo "edit_marcas.php?id_marca=" . $marca->id_marca?>">Editar 📝</a></td>
							<td><?php if($marca->ind_estado==TRUE){
							echo "<a class='btn btn-success' href='desactivar_marcas.php?id_marca=$marca->id_marca'>Activo 😁</a>";} else{
								echo "<a class='btn btn-danger' href='desactivar_marcas.php?id_marca=$marca->id_marca'>Desactivo ☹️</a>";} ?></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>