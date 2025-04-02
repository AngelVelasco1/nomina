
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
if (!isset($_POST["nom_entidad"])  ||
    !isset($_POST["nom_contacto"]) ||
    !isset($_POST["val_correo"])   ||
    !isset($_POST["val_telefono"]) ||
    !isset($_POST["val_interes"]))
    {
    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$nom_entidad   = $_POST["nom_entidad"];
$nom_contacto  = $_POST["nom_contacto"];
$val_correo    = $_POST["val_correo"];
$val_telefono  = $_POST["val_telefono"];
$val_interes   = $_POST["val_interes"];
/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_contactos(?,?,?,?,?);");
$resultado = $sentencia->execute([$nom_entidad, $nom_contacto, $val_correo, $val_telefono, $val_interes]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: ../index.html");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }