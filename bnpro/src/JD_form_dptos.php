<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
============================================================================================
Este archivo muestra un formulario que se envía a insertar.php, el cual guardará los datos
============================================================================================
*/
?>
<?php include_once "JD_enc_dptos.php";
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT id_pais, nom_pais FROM tab_paises ORDER BY 1");
$paises = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Departamentos BNPRO</h1>
		<form action="./JD_insert_dptos.php" method="POST">
			<div class="form-group">
				<label for="id_dpto">ID. Dpto.</label>
				<input required name="id_dpto" type="text" minlength="1" maxlength="2" id="id_dpto" placeholder="ID Dpto." class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_dpto" type="text" id="nom_dpto" minlength="4" maxlength="24" placeholder="Nombre Dpto." class="form-control">
			</div>
			<div class="form-group">
			<label for="nombre">Nombre Pais</label>
			<select name="id_pais" id="id_pais" class="form-control">
				<?php foreach(
					$paises as $pais
					){?>
				<option value="<?php echo $pais->id_pais ?>"><?php echo $pais->nom_pais ?></option>	
				<?php }?>
			</select>  
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="JD_listar_dptos.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>