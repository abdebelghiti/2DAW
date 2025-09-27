<?php

class Index {
}

$informatico = new Informatico("Abde", "Belghiti", "1.83", "23", "Java", "4 años");
$tecnicoRedes = new TecnicoRedes("Alvaro", "Robles", "175","22", "Python", "1 año", "Wifi", "6 meses");


//Métodos Persona
$tecnicoRedes->hablar();
$tecnicoRedes->caminar();
$tecnicoRedes->getAltura();

//Método Informático
$tecnicoRedes->repararOrdenador();

//Método TecnicoRedes
$tecnicoRedes->auditaRedes();
