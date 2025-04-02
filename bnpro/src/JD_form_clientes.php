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
<?php include_once "JD_enc_clientes.php" ?>
<?php include_once "base_de_datos.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Clientes BNPRO</h1>
		<form action="./JD_insert_clientes.php" method="POST">
			<div class="form-group">
				<label for="id_cliente">ID.</label>
<!--				echo '<script>', 'showMessage();', '</script>';-->
				<input required name="id_cliente" type="number" min="1" max="999999999" id="id_cliente" placeholder="ID" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nom_cliente" type="text" minlength="5" maxlength="40" id="nom_cliente" placeholder="Nombre" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Apellido</label>
				<input required name="ape_cliente" type="text" minlength="5" maxlength="40" id="ape_cliente" placeholder="Apellido" class="form-control">
			</div>

			<div class="form-group">
    		    <label for="id_dpto">Departamento</label>
				<select require name="id_dpto" id="id_dpto" class="form-control">
    		    <?php
    		    $sentencia_dptos = $base_de_datos->prepare('SELECT id_dpto, nom_dpto FROM tab_dptos ORDER BY nom_dpto');
    		    $sentencia_dptos->execute();
    		    $dptos = $sentencia_dptos->fetchAll();
    		    foreach ($dptos as $dpto) {    
				echo '<option value="'.$dpto["id_dpto"].'">'.$dpto["nom_dpto"].'</option>';
	            $currentDpto = $dpto["id_dpto"];
			}
    		    ?>
    		</select>
			</div>
    		<div class="form-group">
    		    <label for="id_municipio">Municipio</label>
				<select required name="id_municipio" id="id_municipio" class="form-control">
    		    <option value="id_municipio">Seleccione el municipio</option>;
    		</select>
			</div>
			<script src="../js/ajax_buscar_municipio.js"></script>

			<div class="form-group">
				<label for="nombre">Dirección</label>
				<input required name="dir_cliente" type="text" minlength="10" maxlength="50" id="dir_cliente" placeholder="Dirección" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Correo</label>
				<input required name="mail_cliente" type="email" minlength="5" maxlength="50" id="mail_cliente" placeholder="Correo Electronico" class="form-control">
			</div>

			<div class="form-group">
				<label for="nombre">Telefono</label>
				<input required name="tel_cliente" type="number" min="1" max="9999999999" id="tel_cliente" placeholder="Telefono" class="form-control">
			</div>

			<?php
			$sentencia = $base_de_datos->query("SELECT id_banco, nom_banco FROM tab_bancos ORDER BY 1");
			$bancos = $sentencia->fetchAll(PDO::FETCH_OBJ);
			?>
			<div class="form-group">
			<label for="nombre">Banco</label>
			<select name="id_banco" id="id_banco" class="form-control">
				<?php foreach(
					$bancos as $banco
					){?>
				<option value="<?php echo $banco->id_banco ?>"><?php echo $banco->nom_banco ?></option>	
				<?php }?>
			</select>  
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="JD_listar_clientes.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>