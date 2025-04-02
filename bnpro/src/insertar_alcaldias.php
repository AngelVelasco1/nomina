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
if (!isset($_POST["id_alcaldia"])         ||
    !isset($_POST["val_digito_verif"])    ||
    !isset($_POST["nom_alcaldia"])        ||
    !isset($_POST["nom_alcalde"])         ||
    !isset($_POST["id_dpto"])             ||
    !isset($_POST["nom_municipio"])       ||
    !isset($_POST["dir_alcaldia"])        ||
    !isset($_POST["nom_gestora_social"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$id_region    = $_POST["id_alcaldia"];
$val_digito   = $_POST("val_digito_verif");
$nom_alcaldia = $_POST("nom_alcaldia");
$nom_alcalde  = $_POST("nom_alcalde");
$id_dpto      = $_POST("id_dpto");
$id_municipio = $_POST("id_municipio");
$dir_alcaldia = $_POST("dir_alcaldia");
$nom_gestora  = $_POST["nom_gestora_social"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_alcaldias(?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_alcaldia, $val_digito_verif, $nom_alcaldia, $nom_alcalde, $id_dpto, $id_municipio, $dir_alcaldia, $nom_gestora]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_alcaldias.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }