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
    $db = new Conexion();
    $conn = $db->getConnection();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM alumno WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $user = new User(
                $row['nombre'],
                $row['apellidos'],
                $row['email'],
                $row['password'],
                $row['telefono'],
                $row['sexo'],
                $row['id'],
                $row['fecha_nacimiento']
            );
            $response["success"] = true;
            $response["message"] = "Usuario encontrado.";
            $response["data"] = json_decode($user->toJson());
        } else {
            $response["message"] = "Usuario no encontrado.";
        }
    } else {
        $query = "SELECT * FROM alumno";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $users = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User(
                $row['nombre'],
                $row['apellidos'],
                $row['email'],
                $row['password'],
                $row['telefono'],
                $row['sexo'],
                $row['id'],
                $row['fecha_nacimiento']
            );
            $users[] = json_decode($user->toJson());
        }

        $response["success"] = true;
        $response["message"] = "Usuarios obtenidos correctamente.";
        $response["data"] = $users;
    }
} catch (Exception $e) {
    $response["message"] = "Error: " . $e->getMessage();
}

echo json_encode($response);
