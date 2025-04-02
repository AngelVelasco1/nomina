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
$sentencia = $base_de_datos->query('SELECT id_banco, nom_banco, ind_estado FROM tab_bancos ORDER BY 1');
$bancos = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "JD_enc_bancos.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Bancos JDAA</h1>
		<a href="//www.bnpro.com.co" target="_blank">JDAA</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">Bancos</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Estado</th>

					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php
                     foreach($bancos as $banco)
					{?>
					<tr>
						<td><?php echo $banco->id_banco ?></td>
						<td><?php echo $banco->nom_banco ?></td>
						<td><a class="btn btn-warning" href="<?php echo "JD_edit_bancos.php?id_banco=" . $banco->id_banco?>">Editar 📝</a></td>
						<td>
						<?php
							if($banco->ind_estado==TRUE){
								echo '<a class="btn btn-success" href="JD_inact_bancos.php?id_banco=' . $banco->id_banco. '">Activo</a>';
							} else
							{
								echo '<a class="btn btn-danger" href="JD_inact_bancos.php?id_banco=' . $banco->id_banco. '">Inactivo</a>';
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