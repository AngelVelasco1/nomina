
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
if (!isset($_POST["id_region"])  ||
    !isset($_POST["id_dpto"])    ||
    !isset($_POST["nom_dpto"]))
    {
        echo "NO entramos...";
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$id_region = $_POST["id_region"];
$id_dpto   = $_POST["id_dpto"];
$nom_dpto  = $_POST["nom_dpto"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_dptos(?, ?,?);");
$resultado = $sentencia->execute([$id_dpto, $nom_dpto, $id_region]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_dptos.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }