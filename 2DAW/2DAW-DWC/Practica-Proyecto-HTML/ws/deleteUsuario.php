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
    if (!isset($_GET['id'])) {
        throw new Exception("Falta el parámetro id.");
    }
    
    $id = $_GET['id'];
    
    $db = new Conexion();
    $conn = $db->getConnection();
    
    // Primero obtener el usuario
    $query = "SELECT * FROM alumno WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        throw new Exception("Usuario no encontrado.");
    }
    
    $user = new User(
        $row['nombre'],
        $row['apellidos'],
        $row['email'],
        $row['password'],
        $row['telefono'],
        $row['sexo'],
        $row['id']
    );
    
    // Eliminar el usuario
    $queryDelete = "DELETE FROM alumno WHERE id = :id";
    $stmtDelete = $conn->prepare($queryDelete);
    $stmtDelete->bindParam(":id", $id);
    $stmtDelete->execute();
    
    $response["success"] = true;
    $response["message"] = "Usuario eliminado correctamente.";
    $response["data"] = json_decode($user->toJson());
} catch (Exception $e) {
    $response["message"] = "Error: " . $e->getMessage();
}

echo json_encode($response);
