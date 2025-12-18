<?php
ini_set('display_errors', 'on');
$nombreAsignatura = $_POST['nombreAsignatura'] ?? "";

echo "Se va a insertar al asignatura con nombre: ".$nombreAsignatura . "<br>";

$dsn = "mysql:dbname=colegio;host127.0.0.1;port=3306";

$conexion = new PDO($dsn,"root","");
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//Insertar
$consulta = "INSERT INTO asignatura(nombre) values (:nombreAsignatura)";
$query = $conexion->prepare($consulta);
$query->bindParam(":nombreAsignatura",$nombreAsignatura, PDO::PARAM_STR);
$query->execute();

//Mostrar
$query = $conexion->query("SELECT * FROM asignjjjatura");

$asignaturas = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($asignaturas as $asignatura) {
    echo "\n" . $asignatura["id"] . ": " . $asignatura["nombre"];
    echo "<br>";
}