<!doctype html>
<html lang="es">
<!--
CRUD con PostgreSQL y PHP
@Carlos Eduardo Perez Rueda
@Marzo de 2023
=============================================
Definir el encabezado de todos los programas
=============================================
  Plantilla inicial de Bootstrap 4
-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema BNPRO">
    <meta name="author" content="ADSO 2023">
    <title>BNPRO | BNPRO</title>
    <!-- Cargar el CSS de Boostrap-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Cargar estilos propios -->
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Definición del menú -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" target="_blank" href="//bnpro.co">
        Sistema de Gestión de Proyectos
        </a>

    <!--    <?php
            $browser = $_SERVER['HTTP_USER_AGENT'];
            echo $browser
        ?>-->

        <div class="collapse navbar-collapse" id="miNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./listar_regiones.php">Listar</a>
                </li>
<!--            <li class="nav-item">
                    <a class="nav-link" href="./listarCursor.php">Listar (cursor)</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="./forma_regiones.php">Agregar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../menu.html">Volver</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Termina la definición del menú -->
    <main role="main" class="container">