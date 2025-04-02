
<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
==================================================================
Este archivo inserta los datos enviados a través de formulario.php
==================================================================
*/
?>
<?php
if (!isset($_POST["id_entidad"])  ||
    !isset($_POST["nom_entidad"]) ||
    !isset($_POST["ano_fiscal"])  ||
    !isset($_POST["mes_fiscal"])  ||
    !isset($_POST["val_tir"])  ||
    !isset($_POST["nom_plan_desarrollo"]))
    {
        echo "No entramos...";
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$id_entidad  = $_POST["id_entidad"];
$nom_entidad = $_POST["nom_entidad"];
$ano_fiscal  = $_POST["ano_fiscal"];
$mes_fiscal  = $_POST["mes_fiscal"];
$val_tir     = $_POST["val_tir"];
$nom_plan_d  = $_POST["nom_plan_desarrollo"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_pmtros_bnpro(?,?,?,?,?,?);");
$resultado = $sentencia->execute([$id_entidad, $nom_entidad, $ano_fiscal, $mes_fiscal, $val_tir, $nom_plan_d]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_pmtros_bnpro.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }