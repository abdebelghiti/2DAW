<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = $_ENV["DB_SERVIDOR"];
$user = $_ENV["DB_USUARIO"];
$pass = $_ENV["DB_PASSWORD"];
$db = $_ENV["DB_NAME"];

try {
    $dsn = "mysql:host=$host;dbname=$db";
    $dbh = new PDO($dsn, $user, $pass);
    echo "Conexión correcta";
} catch (PDOException $e){
    echo $e->getMessage();
}

phpinfo();