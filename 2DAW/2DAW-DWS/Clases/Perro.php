<?php

require_once "Animal.php";

Class Perro extends Animal {
    public function ladrar() {
        echo "Wouf wouf\n";
    }
}