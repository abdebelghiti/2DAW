<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

$idAsignatura = $_POST['id'] ?? null;
$nombreAsignatura = $_GET['nombre'] ?? null;

echo "ID recibido por GET: " . ($idAsignatura ?? 'NULL') . "<br>";
echo "Nombre recibido por POST: " . ($nombreAsignatura ?? 'NULL') . "<br><br>";

if ($idAsignatura === null || $nombreAsignatura === null) {
    die("ERROR: Debes enviar un id por GET y un nombre por POST");
}

try {
    $dsn = "mysql:dbname=colegio;host=127.0.0.1;port=3306";
    $conexion = new PDO($dsn, "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión a BD correcta<br><br>";

    $consultaSelect = "SELECT * FROM asignatura WHERE id = :id";
    $querySelect = $conexion->prepare($consultaSelect);
    $querySelect->bindParam(":id", $idAsignatura, PDO::PARAM_INT);
    $querySelect->execute();

    $asignatura = $querySelect->fetch(PDO::FETCH_ASSOC);

    if (!$asignatura) {
        throw new Exception("La asignatura con id $idAsignatura no existe");
    }

    echo "Asignatura encontrada:<br>";
    echo $asignatura["id"] . " - " . $asignatura["nombre"] . "<br><br>";

    $consultaUpdate = "UPDATE asignatura SET nombre = :nombre WHERE id = :id";

    $queryUpdate = $conexion->prepare($consultaUpdate);
    $queryUpdate->bindParam(":nombre", $nombreAsignatura, PDO::PARAM_STR);
    $queryUpdate->bindParam(":id", $idAsignatura, PDO::PARAM_INT);
    $queryUpdate->execute();

    echo "Asignatura actualizada correctamente<br><br>";

    $queryAll = $conexion->query("SELECT * FROM asignatura");
    $asignaturas = $queryAll->fetchAll(PDO::FETCH_ASSOC);

    echo "Listado completo de asignaturas:<br>";
    foreach ($asignaturas as $a) {
        echo $a["id"] . ": " . $a["nombre"] . "<br>";
    }

} catch (PDOException $e) {
    echo "ERROR DE BASE DE DATOS: " . $e->getMessage();
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}


// Teniendo la base de datos colegio restaurada y Postman corriendo:

// 1. Hacer un servicio PHP que reciba un id de asignatura por GET y un nombre por POST
// 1.1 hacer un archivo php
// 1.2 Recibir un valor por GET y mostrarlo
// 1.3 Recibir un valor por post y mostrarlo
// 2. Actualizar los datos de la asignatura en la base de datos según los parámetros
// 2.1 Escribir el código de la conexión, abrir la web y ver que no falla
// 2.2 Escribir una query "select * from asignatura" y mostrar el resultado
// 2.3 Modificar la query para que sea un update y utilice los parámetros del punto 1
// 3. Si la asignatura no existe, debe lanzar un error
// 3.2 Hacer el select del punto 2.1 con un where por id y mostrar si no hay ningún resultado
// 4. Añadir trycatchs para otros fallos en las querys o fallo de conexión a la bd

// NO HACE FALTA HACERLO EN UNA CLASE, me vale un main.php
// Probadlo desde postman