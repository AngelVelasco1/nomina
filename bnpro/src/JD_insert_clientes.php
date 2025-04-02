
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
if (!isset($_POST["id_cliente"])  ||
    !isset($_POST["nom_cliente"])    ||
    !isset($_POST["ape_cliente"]) ||
    !isset($_POST["id_dpto"])    ||
    !isset($_POST["id_municipio"])    ||
    !isset($_POST["dir_cliente"])    ||
    !isset($_POST["mail_cliente"])    ||
    !isset($_POST["tel_cliente"])    ||
    !isset($_POST["id_banco"]))
    {
        echo "NO entramos...";
        echo $_POST["id_cliente"];
        echo $_POST["nom_cliente"];
        echo $_POST["ape_cliente"];
        echo $_POST["id_dpto"];
        echo $_POST["id_municipio"];
        echo $_POST["barrio_cliente"];
        echo $_POST["mail_cliente"]; 
        echo $_POST["tel_cliente"];
        echo $_POST["id_banco"];

    exit();
    }
#Si todo va bien, se ejecuta esta parte del código..., si no, nos jodimos

include_once "base_de_datos.php";
$id_cliente     = $_POST["id_cliente"];        
$nom_cliente    = $_POST["nom_cliente"];    
$ape_cliente    = $_POST["ape_cliente"];    
$id_dpto        = $_POST["id_dpto"];
$id_municipio   = $_POST["id_municipio"];    
$dir_cliente    = $_POST["dir_cliente"];
$mail_cliente   = $_POST["mail_cliente"];
$tel_cliente    = $_POST["tel_cliente"];    
$id_banco       = $_POST["id_banco"];

/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */

$sentencia = $base_de_datos->prepare("SELECT fun_insert_clientes(?,?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$id_cliente, $nom_cliente, $ape_cliente, $id_dpto, $id_municipio,
$dir_cliente, $mail_cliente, $tel_cliente, $id_banco]); # Pasar en el mismo orden de los ?
#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar*/
echo $resultado;
if ($resultado === true) {
    # Redireccionar a la lista
    echo "Registro Insertado";
	header("Location: JD_listar_clientes.php");
} else
    {
    echo "Registro NO Insertado";
    echo "Algo salió mal. Por favor verifica que la tabla exista";
    }