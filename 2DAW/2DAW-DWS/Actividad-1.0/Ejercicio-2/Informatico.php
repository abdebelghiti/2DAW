<?php

require_once "Persona.php";

class Informatico extends Persona{

    public $lenguajes;
    public $experienciaProgramador;

    public function __construct($nombre, $apellido, $altura, $edad, $lenguajes, $experienciaProgramador) {
        parent::__construct($nombre, $apellido, $altura, $edad);
        $this->lenguajes = $lenguajes;
        $this->experienciaProgramador = $experienciaProgramador;
    }

    public function programar () {
        echo "Programando...";
    }
    public function repararOrdenador () {
        echo "Reparando ordenador...";
    }
    public function hacerOfimatica () {
        echo "Haciendo ofimática...";
    }

    public function getLenguajes(){
        return $this->lenguajes;
    }
    public function getExperienciaProgramador(){
        return $this->experienciaProgramador;
    }

    public function setLenguajes($lenguajes){
        $this->lenguajes = $lenguajes;
    }
    public function setExperienciaProgramador($experienciaProgramador){
        $this->experienciaProgramador = $experienciaProgramador;
    }
}