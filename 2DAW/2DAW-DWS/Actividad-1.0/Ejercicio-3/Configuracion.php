<?php

class Configuracion {

    public static $color;
    public static $newsletter;
    public static $entorno;

    public static function mostrarDatos() {
        echo "Color: ".self::$color.", Newsletter: ".self::$newsletter.", Entorno: ".self::$entorno.".";
    }

    public function getColor() {
        return self::$color;
    }
    public function getNewsletter() {
        return self::$newsletter;
    }
    public function getentorno() {
        return self::$entorno;
    }

    public function setColor($color) {
        self::$color = $color;
    }
    public function setNewsletter($newsletter) {
        self::$newsletter = $newsletter;
    }
    public function setentorno($entorno) {
        self::$entorno = $entorno;
    }

}