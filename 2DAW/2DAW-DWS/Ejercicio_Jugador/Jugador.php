<?php

class Jugador {

    public string $nombre;
    public int $numero;
    public int $edad;
    public string $posicion;

    public bool $lesionado;
    public string $sexo;

    public function __construct(string $nombre, int $numero, int $edad, string $posicion, bool $lesionado, string $sexo) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->edad = $edad;
        $this->posicion = $posicion;
        $this->lesionado = $lesionado;
        $this->sexo = $sexo;
    }

    public function toJson() {
        return json_encode($this);
    }
}

