<?php

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $nombre = $_POST["nombre"];

    echo "Email: ".$email.", Nombre: ".$nombre.".";
}



