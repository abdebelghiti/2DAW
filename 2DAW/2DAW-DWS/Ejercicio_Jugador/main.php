<?php

use function PHPUnit\Framework\isEmpty;

require_once("./Jugador.php");

$playerName = $_POST['playerName'] ?? "Sin nombre";
$playerNumber = $_POST['playerNumber'] ?? 0;
$playerAge = $_POST['playerAge'] ?? 0;
$playerPosition = $_POST['playerPosition'] ?? "Sin posición";
$playerInjured = $_POST['playerInjured'] ?? false;
$playerSex = $_POST['playerSex'] ?? "U";

$jugador = new Jugador($playerName, $playerNumber, $playerAge,$playerPosition, $playerInjured, $playerSex);

echo $jugador->toJson();