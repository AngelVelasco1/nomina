<?php
if (!isset($_POST["nom_cargo"])) {
    echo "Faltan datos del formulario";
    exit();
}

include_once "base_de_datos.php";

$nom_cargo = $_POST["nom_cargo"];

$sentencia = $base_de_datos->prepare("SELECT fun_insert_cargos(?);");
$resultado = $sentencia->execute([$nom_cargo]);

if ($resultado === true) {
    echo "Cargo insertado correctamente";
    header("Location: listar_cargos.php");
} else {
    echo "No se pudo insertar el cargo. Verifica que la función o la tabla existan.";
}
?>
