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
if (!isset($_GET["id_vendedor"])      ||
    !isset($_GET["nom_vendedor"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$id_vendedor  = $_GET["id_vendedor"];
$nom_vendedor = $_GET["nom_vendedor"];
$ape_vendedor = $_GET["ape_vendedor"];
$val_sueldo = $_GET["val_sueldo"];
$val_comision = $_GET["val_comision"];
$val_totsuel = $_GET["val_totsuel"];
$ind_estado = $_GET["ind_estado"];
$tel_vendedor = $_GET["tel_vendedor"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_vendedores(?, ?, ?, ? , ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_vendedor, $nom_vendedor, $ape_vendedor, $val_sueldo, $val_comision, $val_totsuel, $ind_estado, $tel_vendedor]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_vendedores.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }