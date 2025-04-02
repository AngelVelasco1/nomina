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
$sentencia = $base_de_datos->query('SELECT a.id_cliente, a.nom_cliente, a.ape_cliente, b.id_dpto, b.nom_dpto, c.id_municipio, c.nom_municipio, a.dir_cliente, a.mail_cliente, a.tel_cliente, d.id_banco, d.nom_banco, a.ind_estado 
                                    FROM tab_clientes a, tab_dptos b, tab_municipios c, tab_bancos d WHERE a.id_dpto=b.id_dpto AND a.id_municipio=c.id_municipio AND a.id_banco = d.id_banco
                                    ORDER BY a.ind_estado desc, a.id_cliente asc');
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>  
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "JD_enc_clientes.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Alcaldías BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">Nombre Completo</th>
						<th scope="col" colspan="1" style="text-align: center">Dpto/Municipio</th>
						<th scope="col" colspan="1" style="text-align: center">Direccion</th>
						<th scope="col" colspan="1" style="text-align: center">Email</th>
						<th scope="col" colspan="1" style="text-align: center">Telefono</th>
						<th scope="col" colspan="1" style="text-align: center">Banco</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Estado</th>

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
						<td><?php echo $cliente->nom_cliente . ' ' . $cliente->ape_cliente?></td>
						<td><?php echo $cliente->nom_dpto .', '.  $cliente->nom_municipio?></td>
						<td><?php echo $cliente->dir_cliente ?></td>
						<td><?php echo $cliente->mail_cliente ?></td>
						<td><?php echo $cliente->tel_cliente ?></td>
						<td><?php echo $cliente->nom_banco ?></td>
						<td><a class="btn btn-warning" href="<?php echo "JD_edit_clientes.php?id_cliente=" . $cliente->id_cliente?>">Editar 📝</a></td>
						<td>
						<?php
							if($cliente->ind_estado==TRUE){
								echo '<a class="btn btn-success" href="JD_inactivar_clientes.php?id_cliente=' . $cliente->id_cliente. '">Activo</a>';
							} else
							{
								echo '<a class="btn btn-danger" href="JD_inactivar_clientes.php?id_cliente=' . $cliente->id_cliente. '">Inactivo</a>';
							};
						?>
						</td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>