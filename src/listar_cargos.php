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
$sentencia = $base_de_datos->query('SELECT * FROM sp_listar_cargos()');
$cargos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$num_columnas = $sentencia->columnCount();

?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_cargos.php" ?>
<div class="row">
	<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Departamentos BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<?php

						// Recorrer cada columna para obtener su nombre
						for ($i = 0; $i < $num_columnas; $i++) {
							$meta = $sentencia->getColumnMeta($i); // Obtener metadatos de la columna
							$nombre_columna = $meta['name']; // Nombre del atributo
							echo "<th scope='col' style='text-align: center'>" . htmlspecialchars($nombre_columna) . "</th>";
						}
						?>
							<th scope='col' style='text-align: center'>Edit</th>
							<th scope='col' style='text-align: center'>Delete</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach ($cargos as $cargo) { ?>
						<tr>
							<td><?php echo $cargo->id_cargo ?></td>
							<td><?php echo $cargo->nom_cargo ?></td>
							
							<td><a class="btn btn-warning" href="<?php echo "edit_dptos.php?id_cargo=" . $cargo->id_cargo ?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "elim_dptos.php?id_cargo=" . $cargo->id_cargo ?>">Eliminar 🗑️</a></td>

						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>