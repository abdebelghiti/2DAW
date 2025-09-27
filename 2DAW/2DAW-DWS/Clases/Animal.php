<?php

abstract Class Animal {
    //Propiedades
    private $nombre;
    private $raza;
    private $edad;

    //Contructor
    public function __construct($nombre, $raza, $edad) {
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->edad = $edad;
    }

    //Métodos

    public function dormir() {
        echo "Zzzzzz";
    }

    //Getters
    public function getNombre() {
        echo $this->nombre;
    }
    public function getRaza() {
        echo $this->raza;
    }
    public function getEdad() {
        echo $this->edad;
    }

    //Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setRaza($raza) {
        $this->raza = $raza;
    }
    public function setEdad($edad) {
        $this->edad = $edad;
    } 

    
}

// No se puede instanciar "Animal" porque es una clase abstracta    $animal = new Animal("","","");

$perro = new Perro("Firulais", "Bulldog", 10);
echo $perro->ladrar();

$gato = new Gato("Garfield","Naranja",10);
echo $gato->maullar();