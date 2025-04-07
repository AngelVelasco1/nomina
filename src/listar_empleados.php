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
$sentencia = $base_de_datos->query('SELECT * FROM sp_listar_empleados()');
$empleados = $sentencia->fetchAll(PDO::FETCH_OBJ);
$num_columnas = $sentencia->columnCount();
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<div class="row">
	<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Regiones BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<?php
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
					<?php foreach ($empleados as $empleado) { ?>
						<tr>
							<td><?php echo $empleado->id_emplea ?></td>
							<td><?php echo $empleado->nom_emplea ?></td>
                            <td><?php echo $empleado->ape_emplea ?></td>
							<td><?php echo $empleado->ind_genero ?></td>
                            <td><?php echo $empleado->dir_emplea ?></td>
                            <td><?php echo $empleado->tel_emplea ?></td>
                            <td><?php echo $empleado->ind_estrato ?></td>
                            <td><?php echo $empleado->ind_est_civil ?></td>
                            <td><?php echo $empleado->num_hijos ?></td>
                            <td><?php echo $empleado->val_tipo_sangre ?></td>
                            <td><?php echo $empleado->val_edad ?></td>
                            <td><?php echo $empleado->id_cargo ?></td>
                            <td><?php echo $empleado->val_sal_basico ?></td>
                            <td><?php echo $empleado->fec_ingreso ?></td>

							<td><a class="btn btn-warning" href="<?php echo "edit_empleados.php?id_emplea=" . $empleado->id_emplea ?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "elim_empleados.php?id_emplea=" . $empleado->id_emplea ?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>