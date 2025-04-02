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
$sentencia = $base_de_datos->query('SELECT id_prov, id_prod FROM tab_prodxprov ORDER BY 1');
$prodxprov = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_prodxprov.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Productos x Provedores BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID Provedor</th>
						<th>ID Producto</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($prodxprov as $prodprov)
					{
						?>
						<tr>
							<td><?php echo $prodprov->id_prov ?></td>
							<td><?php echo $prodprov->id_prod ?></td>
							<td><a class="btn btn-warning" href="<?php echo "edit_prodxprov.php?id_prov=" . $prodprov->id_prov?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "elim_prodxprov.php?id_prov=" . $prodprov->id_prov?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>