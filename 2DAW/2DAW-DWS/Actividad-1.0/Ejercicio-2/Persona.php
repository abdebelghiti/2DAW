<?php


abstract class Persona {
    public $nombre;
    public $apellido;
    public $altura;
    public $edad;

    public function __construct($nombre, $apellido, $altura, $edad) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->altura = $altura;
        $this->edad = $edad;
    }

    public function hablar() {
        echo "Hola hola";
    }
    public function caminar() {
        echo "Caminando...";
    }

    public function getNombre() {
        echo $this->nombre;
    }
    public function getApellido() {
        echo $this->apellido;
    }
    public function getAltura() {
        echo $this->altura;
    }
    public function getEdad() {
        echo $this->edad;
    }


    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setAltura($altura) {
        $this->altura = $altura;
    }
    public function setEdad($edad) {
        $this->edad = $edad;
    }

}