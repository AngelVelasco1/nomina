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
$sentencia = $base_de_datos->query('SELECT * FROM sp_listar_parametros()');
$parametros = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
					<?php foreach($parametros as $parametro)
					{?>
					<tr>
						<td><?php echo $parametro->id_empresa ?></td>
						<td><?php echo $parametro->nom_empresa ?></td>
						<td><?php echo $parametro->ind_perio_pago ?></td>

						<td><?php echo $parametro->val_smlv ?></td>
						<td><?php echo $parametro->val_auxtrans ?></td>
						<td><?php echo $parametro->ano_nomina ?></td>
						<td><?php echo $parametro->mes_nomina ?></td>
						<td><?php echo $parametro->val_por_intces  ?></td>
						<td><?php echo $parametro->num_diasmes  ?></td>


						<td><a class="btn btn-warning" href="<?php echo "edit_regiones.php?id_empresa=" . $parametro->id_empresa?>">Editar 📝</a></td>
						<td><a class="btn btn-danger" href="<?php echo "elim_regiones.php?id_empresa=" . $parametro->id_empresa?>">Eliminar 🗑️</a></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>