<?php
require_once "Forma.php";
require_once "Triangulo.php";

$triangulo = new Triangulo();
$triangulo->lados = 3;
$triangulo->color = "rojo";

var_dump($triangulo);