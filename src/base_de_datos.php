<?php
/*
CRUD con PostgreSQL y PHP
@Equipo BNPRO (Alvaro, Jose, Esteban, CEP)
@Fecha: 2023-11-25
==============================================================================
Este archivo se encarga de conectar a la base de datos y traer un objeto PDO
==============================================================================
 */
/*echo "Entré a conectarme";*/
$contraseña         = "PgSena2024";
$usuario            = "postgres";
$nombreBaseDeDatos  = "db_bnpro";
#Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$server = "127.0.0.1";
$puerto = "5432";
try
{
    $base_de_datos = new PDO("pgsql:host=$server;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*    echo "Me Conecté";*/
}

catch (Exception $e)
{
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}