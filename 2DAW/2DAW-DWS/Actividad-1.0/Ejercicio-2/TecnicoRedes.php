<?php

require_once "Persona.php";
require_once "Informatico.php";

class TecnicoRedes extends Informatico {

    public $auditarRedes;
    public $experienciaRedes;

    public function __construct($nombre, $apellido, $altura, $edad, $lenguajes, $experienciaProgramador, $auditarRedes, $experienciaRedes) {
        parent::__construct($nombre, $apellido, $altura, $edad, $lenguajes, $experienciaProgramador);
        $this->auditarRedes = $auditarRedes;
        $this->experienciaRedes = $experienciaRedes;
    }

    public function auditaRedes() {
        echo "Auditando redes...";
    }

    public function getAuditarRedes() {
        return $this->auditarRedes;
    }
    public function getExperienciaRedes() {
        return $this->experienciaRedes;
    }

    public function setAuditarRedes($auditarRedes) {
        $this->auditarRedes = $auditarRedes;
    }
    public function setExperienciaRedes($experienciaRedes) {
        $this->experienciaRedes = $experienciaRedes;
    }
}