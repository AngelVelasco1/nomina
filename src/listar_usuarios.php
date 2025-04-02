<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@2023-05-08
=========================================================================================
Este archivo lista todos los datos de la tabla, obteniendo a los mismos como un arreglo
=========================================================================================
*/
?>
<?php
include_once "base_de_datos.php";
/*echo "Entro a Listar para saber si está entrando o no....";*/
$sentencia = $base_de_datos->query('SELECT id, nusuario, nombre, password, rol, fec_creacion FROM tab_usuarios ORDER BY 2');
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>CRUD de Usuarios</h1>
		<a href="//www.sena.edu.co" target="_blank">Ejemplo</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Password</th>
						<th>Rol</th>
						<th>Fec. Creación</th>						
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($usuarios as $usuari)
					{
						?>
						<tr>
							<td><?php echo $usuari->id ?></td>
							<td><?php echo $usuari->nusuario ?></td>
							<td><?php echo $usuari->nombre ?></td>
							<td><?php echo $usuari->password ?></td>
							<td><?php echo $usuari->rol ?></td>
							<td><?php echo $usuari->fec_creacion ?></td>
							<td><a class="btn btn-warning" href="<?php echo "edit_usuarios.php?nusuario=" . $usuari->nusuario?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "elim_usuarios.php?nusuario=" . $usuari->nusuario?>">Eliminar 🗑️</a></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>