<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
========================================================================================
Este archivo lista todos los datos de la tabla, obteniendo a los mismos como un arreglo
========================================================================================
*/
?>
<?php
include_once "base_de_datos.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('SELECT id, apellido1, apellido2, nombre1, nombre2, genero, fec_nac, rh, telefono, email, hijos, nusuario,
										   fec_y_hora, direccion, municipio, barrio, tel2, profesion, puestovota FROM tab_asistentes ORDER BY 1');
$referidos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_referidos.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Listar Referidos</h1>
		<a href="//www.sena.edu.co" target="_blank">ADSO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Apellido1</th>
						<th>Apellido2</th>
						<th>Nombre1</th>
						<th>Nombre2</th>
						<th>Género</th>
						<th>Fecha Nacim.</th>
						<th>RH</th>
						<th>Celular</th>
						<th>Correo</th>
						<th>Hijos</th>
						<th>Referido por</th>
						<th>Fecha</th>
						<th>Dirección</th>
						<th>Municipio</th>
						<th>Barrio</th>
						<th>Tel. Fijo</th>
						<th>Profesión</th>
						<th>Puesto Votación</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($referidos as $referido)
					{
						?>
						<tr>
							<td><?php echo $referido->id ?></td>
							<td><?php echo $referido->apellido1 ?></td>
							<td><?php echo $referido->apellido2 ?></td>
							<td><?php echo $referido->nombre1 ?></td>
							<td><?php echo $referido->nombre2 ?></td>
							<td><?php echo $referido->genero ?></td>
							<td><?php echo $referido->fec_nac ?></td>
							<td><?php echo $referido->rh ?></td>
							<td><?php echo $referido->telefono ?></td>
							<td><?php echo $referido->email ?></td>
							<td><?php echo $referido->hijos ?></td>
							<td><?php echo $referido->usuario ?></td>
							<td><?php echo $referido->fec_y_hora ?></td>
							<td><?php echo $referido->direccion ?></td>
							<td><?php echo $referido->municipio ?></td>
							<td><?php echo $referido->barrio ?></td>
							<td><?php echo $referido->tel2 ?></td>
							<td><?php echo $referido->profesion ?></td>
							<td><?php echo $referido->puestovota ?></td>
							<td><a class="btn btn-warning" href="<?php echo "edit_referidos.php?id=" . $referido->id?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "elim_referidos.php?id=" . $referido->id?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>