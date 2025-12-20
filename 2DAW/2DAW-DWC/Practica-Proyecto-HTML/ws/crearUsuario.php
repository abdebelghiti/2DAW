<?php

require_once __DIR__ . "/models/User.php";

$nombre = $_POST['Nombre'] ?? "";
$apellidos = $_POST['Apellidos'] ?? "";
$email = $_POST['Email'] ?? "";
$password = $_POST['Password'] ?? "";
$telefono = $_POST['Telefono'] ?? "";
$sexo = $_POST['Sexo'] ?? "";

$usuario = new User($nombre, $apellidos, $email, $password, $telefono, $sexo);

$archivo = __DIR__ . "/usuarios.txt";
$contenido = $usuario->toJson() . PHP_EOL;

file_put_contents($archivo, $contenido, FILE_APPEND);

header("Content-Type: application/json");
echo $usuario->toJson();
