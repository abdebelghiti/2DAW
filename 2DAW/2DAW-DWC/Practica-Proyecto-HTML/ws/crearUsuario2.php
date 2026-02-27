<?php
require_once __DIR__ . "/models/Conexion.php";
require_once __DIR__ . "/models/User.php";

header("Content-Type: application/json");

$response = [
    "success" => false,
    "message" => "",
    "data" => null
];

try {
    $nombre = $_POST['Nombre'] ?? null;
    $apellidos = $_POST['Apellidos'] ?? null;
    $email = $_POST['Email'] ?? null;
    $password = $_POST['Password'] ?? null;
    $telefono = $_POST['Telefono'] ?? null;
    $sexo = $_POST['Sexo'] ?? null;
    $fechaNacimiento = $_POST['FechaNacimiento'] ?? null;

    if (!$nombre || !$apellidos || !$email || !$password || !$telefono || !$sexo || !$fechaNacimiento) {
        throw new Exception("Faltan parámetros obligatorios.");
    }

    $usuario = new User($nombre, $apellidos, $email, $password, $telefono, $sexo, null, $fechaNacimiento);

    $db = new Conexion();
    $conn = $db->getConnection();

    $query = "INSERT INTO alumno (nombre, apellidos, email, password, telefono, sexo, fecha_nacimiento) VALUES (:nombre, :apellidos, :email, :password, :telefono, :sexo, :fecha_nacimiento)";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":apellidos", $apellidos);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":telefono", $telefono);
    $stmt->bindParam(":sexo", $sexo);
    $stmt->bindParam(":fecha_nacimiento", $fechaNacimiento);

    $stmt->execute();
    
    $usuario->setId($conn->lastInsertId());

    $response["success"] = true;
    $response["message"] = "Usuario creado correctamente.";
    $response["data"] = json_decode($usuario->toJson());
} catch (Exception $e) {
    $response["message"] = "Error: " . $e->getMessage();
}

echo json_encode($response);
