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
$sentencia = $base_de_datos->query('SELECT a.id_fac , a.fec_fac, a.id_ciudad, a.id_vendedor, a.id_cliente, a.ind_credito, b.id_prod, b.val_cant, b.val_bruto, b.val_descto, b.val_iva, b.val_neto ,a.val_fac  FROM  tab_enc_fac AS a, tab_det_fac AS b   ORDER BY 1');
$facturas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_factura.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Generar Factura BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">fecha</th>
                        <th scope="col" colspan="1" style="text-align: center">ciudad</th>
                        <th scope="col" colspan="1" style="text-align: center">vendedor</th>
                        <th scope="col" colspan="1" style="text-align: center">cliente</th>
                        <th scope="col" colspan="1" style="text-align: center">creditos</th>
                        <th scope="col" colspan="1" style="text-align: center">productos</th>
                        <th scope="col" colspan="1" style="text-align: center">valor cantidad</th>
                        <th scope="col" colspan="1" style="text-align: center">valor bruto</th>
                        <th scope="col" colspan="1" style="text-align: center">valor descuento</th>
                        <th scope="col" colspan="1" style="text-align: center">valor iva</th>
                        <th scope="col" colspan="1" style="text-align: center">valor neto</th>
						<th scope="col" colspan="1" style="text-align: center">valor factura</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($facturas as $factura)
					{?>
					<tr>
						<td><?php echo $factura->id_fac ?></td>
						<td><?php echo $factura->fec_fac ?></td>
                        <td><?php echo $factura->id_ciudad ?></td>
						<td><?php echo $factura->id_vendedor ?></td>
                        <td><?php echo $factura->id_cliente ?></td>
						<td><?php echo $factura->val_fac ?></td>
                        <td><?php echo $factura->ind_credito ?></td>
						<td><?php echo $factura->id_prod ?></td>
                        <td><?php echo $factura->val_cant ?></td>
						<td><?php echo $factura->val_bruto ?></td>
                        <td><?php echo $factura->val_descto ?></td>
						<td><?php echo $factura->val_iva ?></td>
                        <td><?php echo $factura->val_neto ?></td>
						<td><a class="btn btn-warning" href="<?php echo "edit_productos.php?id_fac=" . $factura->id_fac?>">Editar 📝</a></td>
						<td><a class="btn btn-danger" href="<?php echo "elim_productos.php?id_fac=" . $factura->id_fac?>">Eliminar 🗑️</a></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>