<?php
session_start();
/* DATABASE CONFIGURATION */
define('DB_SERVER', '172.16.1.254');
define('PORT', '5432');
define('DB_USERNAME', 'postgres');
define('DB_PASSWORD', 'PgSena2024');
define('DB_DATABASE', 'db_bnpro');
define("BASE_URL", "http://172.16.1.254/PHPLoginHash/"); // Eg. http://yourwebsite.com

function getDB() 
{
    $dbhost=DB_SERVER;
    $dbport=PORT;
    $dbuser=DB_USERNAME;
    $dbpass=DB_PASSWORD;
    $dbname=DB_DATABASE;
    try
    {
        $dbConnection = new PDO("pgsql:host=$dbhost;port=$dbport;dbname=$dbname", $dbuser, $dbpass); 
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
    catch (PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>