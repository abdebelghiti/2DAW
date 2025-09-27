<?php

require_once "Configuracion.php";

Configuracion::$color = "Rojo";
Configuracion::$entorno = "Bitbucket";
Configuracion::$estado = "Activo";

Configuracion::mostrarDatos();