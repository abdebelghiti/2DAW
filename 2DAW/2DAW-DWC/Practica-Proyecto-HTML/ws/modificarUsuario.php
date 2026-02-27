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

    // Comprobar que el usuario existe
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
        $row['id'],
        $row['fecha_nacimiento']
    );

    // Modificar solo los parámetros enviados
    $updates = [];
    $params = [":id" => $id];

    if (!empty($_POST['Nombre'])) {
        $updates[] = "nombre = :nombre";
        $params[":nombre"] = $_POST['Nombre'];
        $user->setNombre($_POST['Nombre']);
    }
    if (!empty($_POST['Apellidos'])) {
        $updates[] = "apellidos = :apellidos";
        $params[":apellidos"] = $_POST['Apellidos'];
        $user->setApellidos($_POST['Apellidos']);
    }
    if (!empty($_POST['Email'])) {
        $updates[] = "email = :email";
        $params[":email"] = $_POST['Email'];
        $user->setEmail($_POST['Email']);
    }
    if (!empty($_POST['Password'])) {
        $updates[] = "password = :password";
        $params[":password"] = $_POST['Password'];
        $user->setPassword($_POST['Password']);
    }
    if (!empty($_POST['Telefono'])) {
        $updates[] = "telefono = :telefono";
        $params[":telefono"] = $_POST['Telefono'];
        $user->setTelefono($_POST['Telefono']);
    }
    if (!empty($_POST['Sexo'])) {
        $updates[] = "sexo = :sexo";
        $params[":sexo"] = $_POST['Sexo'];
        $user->setSexo($_POST['Sexo']);
    }
    if (!empty($_POST['FechaNacimiento'])) {
        $updates[] = "fecha_nacimiento = :fecha_nacimiento";
        $params[":fecha_nacimiento"] = $_POST['FechaNacimiento'];
        $user->setFechaNacimiento($_POST['FechaNacimiento']);
    }

    if (count($updates) > 0) {
        $queryUpdate = "UPDATE alumno SET " . implode(", ", $updates) . " WHERE id = :id";
        $stmtUpdate = $conn->prepare($queryUpdate);
        $stmtUpdate->execute($params);
    }

    $response["success"] = true;
    $response["message"] = count($updates) > 0 ? "Usuario modificado correctamente." : "No se enviaron datos para modificar.";
    $response["data"] = json_decode($user->toJson());

} catch (Exception $e) {
    $response["message"] = "Error: " . $e->getMessage();
}

echo json_encode($response);
