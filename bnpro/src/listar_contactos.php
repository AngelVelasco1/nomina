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
$sentencia = $base_de_datos->query('SELECT id_contacto, nom_entidad, nom_contacto, val_correo, val_telefono, val_interes,fec_contacto FROM tab_contactos ORDER BY fec_contacto DESC');
$contactos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_contactos.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Contactos BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">#</th>
						<th scope="col" colspan="1" style="text-align: center">Entidad</th>
						<th scope="col" colspan="1" style="text-align: center">Encargado</th>
						<th scope="col" colspan="1" style="text-align: center">Correo</th>
						<th scope="col" colspan="1" style="text-align: center">Teléfono</th>
						<th scope="col" colspan="1" style="text-align: center">Interés</th>
						<th scope="col" colspan="1" style="text-align: center">Fecha</th>
						<th scope="col" colspan="1" style="text-align: center">Responder</th>
						<th scope="col" colspan="1" style="text-align: center">Eliminar</th>

					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($contactos as $contacto)
					{?>
					<tr>
						<td><?php echo $contacto->id_contacto ?></td>
						<td><?php echo $contacto->nom_entidad ?></td>
						<td><?php echo $contacto->nom_contacto ?></td>
						<td><?php echo $contacto->val_correo ?></td>
						<td><?php echo $contacto->val_telefono ?></td>
						<td><?php echo $contacto->val_interes ?></td>
						<td><?php echo $contacto->fec_contacto ?></td>
						<td><a class="btn btn-warning" href="<?php echo "edit_contactos.php?id_contacto=" . $contacto->id_contacto?>">Responder 📝</a></td>
						<td><a class="btn btn-danger" href="<?php echo "elim_contactos.php?id_contacto=" . $contacto->id_contacto?>">Eliminar 🗑️</a></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>