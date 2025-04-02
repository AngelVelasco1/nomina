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
$sentencia = $base_de_datos->query('SELECT id_cliente, nom_cliente, ape_cliente, id_ciudad, dir_cliente, tel_cliente, id_banco, val_acum, ind_estado   FROM tab_clientes ORDER BY 1');
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_clientes.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Clientes BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">Nombre</th>
                        <th scope="col" colspan="1" style="text-align: center">Apellido</th>
                        <th scope="col" colspan="1" style="text-align: center">Ciudad</th>
                        <th scope="col" colspan="1" style="text-align: center">Direccion</th>
                        <th scope="col" colspan="1" style="text-align: center">Telefono</th>
                        <th scope="col" colspan="1" style="text-align: center">Banco</th>
                        <th scope="col" colspan="1" style="text-align: center">Valor Acomulado</th>
                        <!--<th scope="col" colspan="1" style="text-align: center">Estado</th>-->
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Declarar Estado</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($clientes as $cliente)
					{?>
					<tr>
						<td><?php echo $cliente->id_cliente ?></td>
						<td><?php echo $cliente->nom_cliente ?></td>
                        <td><?php echo $cliente->ape_cliente ?></td>
						<td><?php echo $cliente->id_ciudad ?></td>
                        <td><?php echo $cliente->dir_cliente ?></td>
						<td><?php echo $cliente->tel_cliente ?></td>
                        <td><?php echo $cliente->id_banco ?></td>
						<td><?php echo $cliente->val_acum ?></td>
                        <!--<td><?php if ($cliente->ind_estado==False) {
							echo "Inactivo";
						}else{
							echo"Activo";
						}
						?></td>-->
						<td><a class="btn btn-warning" href="<?php echo "edit_clientes.php?id_cliente=" . $cliente->id_cliente?>">Editar 📝</a></td>
						<td><?php if($cliente->ind_estado==TRUE){
							echo "<a class='btn btn-success' href='Desactivar_cliente.php?id_cliente=$cliente->id_cliente'>Activo 😁</a>";} else{
								echo "<a class='btn btn-danger' href='Desactivar_cliente.php?id_cliente=$cliente->id_cliente'>Desactivo ☹️</a>";} ?></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>