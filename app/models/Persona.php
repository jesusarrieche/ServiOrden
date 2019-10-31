<?php

namespace App\Models;

use System\Core\Model;

class Persona extends Model{
    
    private $id;
    private $tipoDocumento;
    private $documento;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $email;
    private $estatus;

    public function __construct(){
    }
    
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }
    
    public function getId(){
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getDocumento() {
        return $this->documento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getEstatus() {
        return $this->estatus;
    }

    public function setEstatus($estatus) {
        $this->estatus = $estatus;
    }



}

