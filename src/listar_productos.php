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
$sentencia = $base_de_datos->query('SELECT id_prod, nom_prod, id_marca, val_prod, val_stock, ind_categ, ind_tipo, ind_clase, ind_estado  FROM tab_prod ORDER BY 1');
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_productos.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Productos BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">Producto</th>
                        <th scope="col" colspan="1" style="text-align: center">Marca</th>
                        <th scope="col" colspan="1" style="text-align: center">Valor</th>
                        <th scope="col" colspan="1" style="text-align: center">Stock</th>
                        <th scope="col" colspan="1" style="text-align: center">Categoria</th>
                        <th scope="col" colspan="1" style="text-align: center">Tipo</th>
                        <th scope="col" colspan="1" style="text-align: center">Clase</th>
						<th scope="col" colspan="1" style="text-align: center">Estado</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Declarar Estado</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($productos as $prod)
					{?>
					<tr>
						<td><?php echo $prod->id_prod ?></td>
						<td><?php echo $prod->nom_prod ?></td>
                        <td><?php echo $prod->id_marca ?></td>
						<td><?php echo $prod->val_prod ?></td>
                        <td><?php echo $prod->val_stock ?></td>
						<td><?php echo $prod->ind_categ ?></td>
                        <td><?php echo $prod->ind_tipo ?></td>
						<td><?php echo $prod->ind_clase ?></td>
						<td><?php if ($prod->ind_estado==False) {
							echo "Inactivo";
						}else{
							echo"Activo";
						}
						?></td>
						<td><a class="btn btn-warning" href="<?php echo "edit_productos.php?id_prod=" . $prod->id_prod?>">Editar 📝</a></td>
						<td><?php if($prod->ind_estado==TRUE){
							echo "<a class='btn btn-success' href='desactivar_prod.php?id_prod=$prod->id_prod'>Activo 😁</a>";} else{
								echo "<a class='btn btn-danger' href='desactivar_prod.php?id_prod=$prod->id_prod'>Desactivo ☹️</a>";} ?></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>