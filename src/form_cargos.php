<?php include_once "encabezado.php"; ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Cargo</h1>
		<form action="./insertar_cargos.php" method="POST">
			<div class="form-group">
				<label for="nom_cargo">Nombre del Cargo</label>
				<input required name="nom_cargo" type="text" id="nom_cargo" minlength="5" maxlength="50" placeholder="Nombre del Cargo" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="listar_cargos.php" class="btn btn-warning">Ver todos</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"; ?>
