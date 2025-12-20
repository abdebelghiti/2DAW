<?php

require_once __DIR__ . "/../interfaces/IToJson.php";

class User implements IToJson {

    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $telefono;
    private $sexo;

    public function __construct($nombre, $apellidos, $email, $password, $telefono, $sexo) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->telefono = $telefono;
        $this->sexo = $sexo;
    }

    public function toJson() {
        return json_encode([
            "Nombre" => $this->nombre,
            "Apellidos" => $this->apellidos,
            "Email" => $this->email,
            "Password" => $this->password,
            "Telefono" => $this->telefono,
            "Sexo" => $this->sexo
        ]);
    }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getApellidos() { return $this->apellidos; }
    public function setApellidos($apellidos) { $this->apellidos = $apellidos; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getTelefono() { return $this->telefono; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }

    public function getSexo() { return $this->sexo; }
    public function setSexo($sexo) { $this->sexo = $sexo; }

}