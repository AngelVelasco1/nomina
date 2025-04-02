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
if (!isset($_GET["id_prov"])      ||
    !isset($_GET["nom_prov"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$id_prov  = $_GET["id_prov"];
$nom_prov = $_GET["nom_prov"];
$id_pais = $_GET["id_pais"];
$id_ciudad = $_GET["id_ciudad"];
$mail_prov = $_GET["mail_prov"];
$ubic_prov = $_GET["ubic_prov"];
$tel_prov = $_GET["tel_prov"];
$ind_estado = $_GET["ind_estado"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_provedores(?, ?, ?, ? , ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_prov, $nom_prov, $id_pais, $id_ciudad, $mail_prov, $ubic_prov, $tel_prov, $ind_estado]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_provedores.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }