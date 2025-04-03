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
if (!isset($_POST["id_empresa"])      ||
    !isset($_POST["nom_empresa"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";

$id_empresa = $_POST["id_empresa"];
$nom_empresa = $_POST["nom_empresa"];
$ind_perio_pago = $_POST["ind_perio_pago"];
$val_smlv = $_POST["val_smlv"];
$val_auxtrans = $_POST["val_auxtrans"];
$ind_num_trans = $_POST["ind_num_trans"];
$ano_nomina = $_POST["ano_nomina"];
$mes_nomina = $_POST["mes_nomina"];
$val_por_intces = $_POST["val_por_intces"];
$num_diasmes = $_POST["num_diasmes"];
$id_concep_sb = $_POST["id_concep_sb"];
$id_concep_at = $_POST["id_concep_at"];
/*
Al incluir el archivo "base_de_datos.php";todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT sp_insert_pmtros(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_empresa, $nom_empresa, $ind_perio_pago, $val_smlv , 
$val_auxtrans , 
$ind_num_trans , 
$ano_nomina , 
$mes_nomina , 
$val_por_intces, 
$num_diasmes ,
$id_concep_sb , 
$id_concep_at]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_parametros.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }