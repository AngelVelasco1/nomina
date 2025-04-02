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
$sentencia = $base_de_datos->query('SELECT id_vendedor, nom_vendedor, ape_vendedor, val_sueldo, val_comision, val_totsuel, ind_estado, tel_vendedor  FROM tab_vendedores ORDER BY 1');
$vendedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_vendedores.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Vendedores BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">Nombre</th>
                        <th scope="col" colspan="1" style="text-align: center">Apellido</th>
                        <th scope="col" colspan="1" style="text-align: center">Valor Sueldo</th>
                        <th scope="col" colspan="1" style="text-align: center">Valor Comision</th>
                        <th scope="col" colspan="1" style="text-align: center">Valor Total</th>
                        <th scope="col" colspan="1" style="text-align: center">Estado</th>
                        <th scope="col" colspan="1" style="text-align: center">Telefono</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Declarar Estado</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($vendedores as $vendedor)
					{?>
					<tr>
						<td><?php echo $vendedor->id_vendedor ?></td>
						<td><?php echo $vendedor->nom_vendedor ?></td>
                        <td><?php echo $vendedor->ape_vendedor ?></td>
						<td><?php echo $vendedor->val_sueldo ?></td>
                        <td><?php echo $vendedor->val_comision ?></td>
						<td><?php echo $vendedor->val_totsuel ?></td>
                        <td><?php if ($vendedor->ind_estado==False) {
							echo "Inactivo";
						}else{
							echo"Activo";
						}
						?></td>
						<td><?php echo $vendedor->tel_vendedor ?></td>
						<td><a class="btn btn-warning" href="<?php echo "edit_vendedores.php?id_vendedor=" . $vendedor->id_vendedor?>">Editar 📝</a></td>
						<td><?php if($vendedor->ind_estado==TRUE){
							echo "<a class='btn btn-success' href='desactivar_vendedores.php?id_vendedor=$vendedor->id_vendedor'>Activo 😁</a>";} else{
								echo "<a class='btn btn-danger' href='desactivar_vendedores.php?id_vendedor=$vendedor->id_vendedor'>Desactivo ☹️</a>";} ?></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>