<?php

$servidor = "mysql:host=localhost;dbname=DWS";
$user = "root";
$password = "";

try {
    $pdo = new PDO($servidor,$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión establecida con éxito <br>";
} catch (PDOException $e) {
    echo "Error: ". $e->getMessage();
}