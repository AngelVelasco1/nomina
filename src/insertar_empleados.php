<?php
if (!isset($_POST["nom_cargo"])) {
    echo "Faltan datos del formulario";
    exit();
}

include_once "base_de_datos.php";

$id_emplea = $_POST["id_emplea"];
$nom_emplea = $_POST["nom_emplea"];
$ape_emplea = $_POST["ape_emplea"];
$ind_genero = $_POST["ind_genero"];
$dir_emplea = $_POST["dir_emplea"];
$ind_estrato = $_POST["ind_estrato"];
$ind_est_civil = $_POST["ind_est_civil"];
$num_hijos = $_POST["num_hijos"];
$val_tipo_sangre = $_POST["val_tipo_sangre"];
$val_edad = $_POST["val_edad"];
$id_cargo = $_POST["id_cargo"];
$val_sal_basico = $_POST["val_sal_basico"];
$fec_ingreso = $_POST["fec_ingreso"];

$sentencia = $base_de_datos->prepare("SELECT fun_insert_empleados(?, ?, ?,?,?,?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$id_emplea, $nom_cargo, $ape_emplea, $ind_genero, $dir_emplea, $ind_estrato, $ind_est_civil, $num_hijos, $val_tipo_sangre, $val_edad, $id_cargo, $val_sal_basico, $fec_ingreso]);

if ($resultado === true) {
    echo "Cargo insertado correctamente";
    header("Location: listar_cargos.php");
} else {
    echo "No se pudo insertar el cargo. Verifica que la función o la tabla existan.";
}
?>
