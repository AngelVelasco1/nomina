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
if (!isset($_GET["a.id_fac"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$id_fac  = $_GET["a.id_fac"];
$id_ciudad = $_GET["a.id_ciudad"];
$id_vendedor = $_GET["a.id_vendedor"];
$id_cliente = $_GET["a.id_cliente"];
$ind_credito = $_GET["a.ind_credito"];
$id_prod = $_GET["b.id_prod"];
$val_cant= $_GET["b.val_cant"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_provedores(?, ?, ?, ? , ?, ?, ?);");
$resultado = $sentencia->execute([$id_fac, $id_ciudad, $id_vendedor, $id_cliente, $ind_credito, $id_prod, $val_cant]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_factura.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }