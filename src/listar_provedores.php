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
$sentencia = $base_de_datos->query('SELECT id_prov, nom_prov, id_pais, id_ciudad, mail_prov, ubic_prov, tel_prov, ind_estado  FROM tab_prov ORDER BY 1');
$provedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encab_provedores.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Provedores BNPRO</h1>
		<a href="//www.bnpro.com.co" target="_blank">BNPRO</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th>
						<th scope="col" colspan="1" style="text-align: center">Provedor</th>
                        <th scope="col" colspan="1" style="text-align: center">Pais</th>
                        <th scope="col" colspan="1" style="text-align: center">Ciudad</th>
                        <th scope="col" colspan="1" style="text-align: center">Mail</th>
                        <th scope="col" colspan="1" style="text-align: center">Ubicacion</th>
                        <th scope="col" colspan="1" style="text-align: center">Telefono</th>
						<th scope="col" colspan="1" style="text-align: center">Estado</th>
                        <th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Declarar Estado</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php foreach($provedores as $prov)
					{?>
					<tr>
						<td><?php echo $prov->id_prov ?></td>
						<td><?php echo $prov->nom_prov ?></td>
                        <td><?php echo $prov->id_pais ?></td>
						<td><?php echo $prov->id_ciudad ?></td>
                        <td><?php echo $prov->mail_prov ?></td>
						<td><?php echo $prov->ubic_prov ?></td>
                        <td><?php echo $prov->tel_prov?></td>
						<td><?php if ($prov->ind_estado==False) {
							echo "Inactivo";
						}else{
							echo"Activo";
						}
						?></td>
						<td><a class="btn btn-warning" href="<?php echo "edit_provedores.php?id_prov=" . $prov->id_prov?>">Editar 📝</a></td>
						<td><?php if($prov->ind_estado==TRUE){
							echo "<a class='btn btn-success' href='desactivar_prov.php?id_prov=$prov->id_prov'>Activo 😁</a>";} else{
								echo "<a class='btn btn-danger' href='desactivar_prov.php?id_prov=$prov->id_prov'>Desactivo ☹️</a>";} ?></td>
					</tr>
					<?php
					} ?> 
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>