<?php

class Coche {
    public $color = "Rojo";
    public $marca = "Ferrari";
    public $modelo = "Enzo";
    public $velocidad = 300;
    public $caballaje = 500;
    public $plazas = 2;

    public function __construct($color, $marca, $modelo, $velocidad, $caballaje, $plazas) {
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballaje = $caballaje;
        $this->plazas = $plazas;
    }

    public function acelerar() {
        return $this->velocidad + 1;
    }
    public function frenar() {
        return $this->velocidad - 1;
    }

    public function mostrarVelocidad() {
        echo "Velocidad: ". $this->velocidad;
    }

    public function mostrarInformacionCoche(Coche $coche) {

        if (is_object($coche) && $coche !== null) {
            echo "Información del coche: "."
                Marca: ".$coche->marca.", 
                Modelo: ".$coche->modelo.", 
                Color: ".$coche->color.", 
                Caballaje: ".$coche->caballaje.", 
                Velocidad: ".$coche->velocidad.", 
                Plazas: ".$coche->plazas.".";
        } else {
            echo "No es un objeto o coche no definido";
        }
    }


    //Getters

    public function getColor() {
            echo $this->color;
    }
    public function getMarca() {
        echo $this->marca;
    }
    public function getModelo() {
        echo $this->modelo;
    }
    public function getvelocidad() {
        echo $this->velocidad;
    }
    public function getCaballaje() {
        echo $this->caballaje;
    }
    public function getPlazas() {
        echo $this->plazas;
    }


    //Setters
    public function setColor($color) {
        $this->color = $color;
    }
    public function setMarca($marca) {
        $this->marca = $marca;
    }
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function setvelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }
    public function setCaballaje($caballaje) {
        $this->caballaje = $caballaje;
    }
    public function setPlazas($plazas) {
        $this->plazas = $plazas;
    }

}


$coche = new Coche("Amarillo", "Renault", "Clio", 150, 200, 5);
$coche1 = new Coche("Verde", "Seat", "Panda", 250, 200, 5);
$coche2 = new Coche("Azul", "Citroen", "Xara", 100, 220, 4);
$coche3 = new Coche("Rojo", "Mercedes", "Clase A", 350, 100, 3);
$coche->color = "ROSA";
$coche->setMarca("Audi");
echo $coche->mostrarInformacionCoche($coche);
var_dump($coche->getModelo());
var_dump($coche);
var_dump($coche1);
var_dump($coche2);
var_dump($coche3);

