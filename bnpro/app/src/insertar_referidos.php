<?php
/*
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
===================================================================
Este archivo inserta los datos enviados a través de formulario.php
===================================================================
*/
?>
<?php
if (!isset($_POST["id"])      ||
    !isset($_POST["apellido1"])     ||
    !isset($_POST["nombre1"])  ||
    !isset($_POST["nusuario"]) ||
    !isset($_POST["telefono"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id         = $_POST["id"];
$apellido1  = $_POST["apellido1"];
$apellido2  = $_POST["apellido2"];
$nombre1    = $_POST["nombre1"];
$nombre2    = $_POST["nombre2"];
$genero     = $_POST["genero"];
$fec_nac    = $_POST["fec_nac"];
$rh         = $_POST["rh"];
$telefono   = $_POST["telefono"];
$email      = $_POST["email"];
$hijos      = $_POST["hijos"];
$usuario    = $_POST["usuario"];
$fec_y_hora = $_POST["fec_y_hora"];
$direccion  = $_POST["direccion"];
$municipio  = $_POST["municipio"];
$barrio     = $_POST["barrio"];
$tel2       = $_POST["tel2"];
$profesion  = $_POST["profesion"];
$puestovota = $_POST["puestovota"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_referidos(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ?);");
/*$sentencia = $base_de_datos->prepare("SELECT a.id_bodega,a.nom_bodega FROM tab_bodegas a WHERE 1=1;"); */
$resultado = $sentencia->execute([$id, $apellido1, $apellido2, $nombre1, $nombre2, $genero, $fec_nac, $rh, $telefono, $email, $hijos,
                                  $usuario, $fec_y_hora, $direccion, $municipio, $barrio, $tel2, $profesion, $puestovota]); # Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: listar_referidos.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }