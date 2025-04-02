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
$sentencia = $base_de_datos->query('SELECT id_pais, nom_pais FROM tab_paises ORDER BY 1');
$paises = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "JD_enc_pais.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Paises JDAA</h1>
		<a href="//www.bnpro.com.co" target="_blank">JDAA</a>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan="1" style="text-align: center">ID</th> 
						<th scope="col" colspan="1" style="text-align: center">Paises</th>
						<th scope="col" colspan="1" style="text-align: center">Editar</th>
						<th scope="col" colspan="1" style="text-align: center">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará. Pd: no ignorar las llaves de inicio y cierre {}
					-->
					<?php
                     foreach($paises as $pais)
					{?>
					<tr>
						<td><?php echo $pais->id_pais ?></td>
						<td><?php echo $pais->nom_pais ?></td>
						<td><a class="btn btn-warning" href="<?php echo "JD_edit_pais.php?id_pais=" . $pais->id_pais?>">Editar 📝</a></td>
						<td><a class="btn btn-danger" href="<?php echo "JD_elim_pais.php?id_pais=" . $pais->id_pais?>">Eliminar 🗑️</a></td> 
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "pie.php" ?>