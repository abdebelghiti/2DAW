<?php

$nombre = "Abde";
$edad = 23;
$mascotas = ["Perro","Gato","Pájaro","Tortuga"];

function datos($nombre, $edad, $mascotas) {
echo "Nombre: ".$nombre."\n";
    if ($edad >= 18) {
        echo "Edad: ".$edad." (mayor de edad)\n";
    } else {
        echo "Edad: ".$edad." (menor de edad)\n";
    }
    echo "Sus mascotas son: ";
    for ($i = 0; $i < count($mascotas); $i++) {
        echo $mascotas[$i]. ", ";
    }
}

echo datos($nombre, $edad, $mascotas);
