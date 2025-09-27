<?php

class IMac implements Ordenador{

    public $marca;
    public $software;

    public function __construct($software) {
        this->marca = self::MARCA;
        $this->software = $software;
    }
}