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
if (!isset($_GET["id_cliente"])      ||
    !isset($_GET["nom_cliente"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$id_cliente  = $_GET["id_cliente"];
$nom_cliente = $_GET["nom_cliente"];
$ape_cliente = $_GET["ape_cliente"];
$id_ciudad = $_GET["id_ciudad"];
$dir_cliente = $_GET["dir_cliente"];
$tel_cliente = $_GET["tel_cliente"];
$id_banco = $_GET["id_banco"];
$val_acum = $_GET["val_acum"];
$ind_estado = $_GET["ind_estado"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_clientes(?, ?, ?, ? , ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_cliente, $nom_cliente, $ape_cliente, $id_ciudad, $dir_cliente, $tel_cliente, $id_banco, $val_acum, $ind_estado]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_clientes.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }