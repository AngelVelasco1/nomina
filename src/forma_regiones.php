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
<?php include_once "encabezado.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Agregar Regiones BNPRO</h1>
		<form action="./insertar_regiones.php" method="POST">
    <div class="form-group">
        <label for="id_empresa">ID Empresa</label>
        <input required name="id_empresa" type="number" min="1" id="id_empresa" class="form-control" placeholder="ID Empresa">
    </div>

    <div class="form-group">
        <label for="nom_empresa">Nombre Empresa</label>
        <input required name="nom_empresa" type="text" id="nom_empresa" class="form-control" placeholder="Nombre de la Empresa">
    </div>

    <div class="form-group">
        <label for="ind_perio_pago">Periodo de Pago</label>
        <select required name="ind_perio_pago" id="ind_perio_pago" class="form-control">
            <option value="M">Mensual</option>
            <option value="Q">Quincenal</option>
        </select>
    </div>

    <div class="form-group">
        <label for="val_smlv">Salario Mínimo Legal Vigente</label>
        <input required name="val_smlv" type="number" min="0" id="val_smlv" class="form-control" placeholder="SMLV">
    </div>

    <div class="form-group">
        <label for="val_auxtrans">Auxilio de Transporte</label>
        <input required name="val_auxtrans" type="number" min="0" id="val_auxtrans" class="form-control" placeholder="Auxilio de Transporte">
    </div>

    <div class="form-group">
        <label for="ind_num_trans">Número de Veces el Salario para Transporte</label>
        <input required name="ind_num_trans" type="number" min="1" id="ind_num_trans" class="form-control" placeholder="N° Veces Salario">
    </div>

    <div class="form-group">
        <label for="ano_nomina">Año de Nómina</label>
        <input required name="ano_nomina" type="number" min="2000" max="2100" id="ano_nomina" class="form-control" placeholder="Año de Nómina">
    </div>

    <div class="form-group">
        <label for="mes_nomina">Mes de Nómina</label>
        <select required name="mes_nomina" id="mes_nomina" class="form-control">
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
    </div>

    <div class="form-group">
        <label for="val_por_intces">Porcentaje de Intereses de Cesantías</label>
        <input required name="val_por_intces" type="number" step="0.01" min="0" max="100" id="val_por_intces" class="form-control" placeholder="Porcentaje de Intereses">
    </div>

    <div class="form-group">
        <label for="num_diasmes">Número de Días del Mes Fiscal</label>
        <input required name="num_diasmes" type="number" min="28" max="31" id="num_diasmes" class="form-control" placeholder="Días del Mes Fiscal">
    </div>

    <div class="form-group">
        <label for="id_concep_sb">ID Concepto de Salario Básico</label>
        <input required name="id_concep_sb" type="number" min="1" id="id_concep_sb" class="form-control" placeholder="ID Concepto Salario Básico">
    </div>

    <div class="form-group">
        <label for="id_concep_at">ID Concepto de Auxilio de Transporte</label>
        <input required name="id_concep_at" type="number" min="1" id="id_concep_at" class="form-control" placeholder="ID Concepto Auxilio Transporte">
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="listar_parametros.php" class="btn btn-warning">Ver Todos</a>
</form>

	</div>