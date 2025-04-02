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
if (!isset($_GET["id_prod"])      ||
    !isset($_GET["nom_prod"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$id_prod  = $_GET["id_prod"];
$nom_prod = $_GET["nom_prod"];
$id_marca = $_GET["id_marca"];
$val_prod = $_GET["val_prod"];
$val_stock = $_GET["val_stock"];
$ind_categ = $_GET["ind_categ"];
$ind_tipo = $_GET["ind_tipo"];
$ind_clase = $_GET["ind_clase"];
$ind_estado = $_GET["ind_estado"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_productos(?, ?, ?, ? , ?, ?, ?, ?, ?);");
$ind_estado = $_GET["ind_estado"];
$resultado = $sentencia->execute([$id_prod, $nom_prod, $id_marca, $val_prod, $val_stock, $ind_categ, $ind_tipo, $ind_clase , $ind_estado]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario. 
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_productos.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }