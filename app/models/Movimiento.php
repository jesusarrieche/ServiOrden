<?php

namespace App\Models;

use System\Core\Model;

class Movimiento extends Model{

    private $id;
    private $persona_id;
    private $usuario_id;
    private $numero_documento;
    private $fecha;
    private $total;
    private $estatus;

    public function __construct(){
    }

    /**
     * Getter and Setter
     */

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getPersonaId(){
        return $this->persona_id;
    }

    public function setPersonaId($id){
        $this->persona_id = $id;
    }

    public function getUsuarioId(){
        return $this->usuario_id;
    }

    public function setUsuarioId($id){
        $this->usuario_id = $id;
    }

    public function getNumeroDocumento(){
        return $this->numero_documento;
    }

    public function setNumeroDocumento($nroDocumento){
        $this->numero_documento = $nroDocumento;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getTotal(){
        return $this->total;
    }

    public function setTotal($total){
        $this->total = $total;
    }

    public function getEstatus(){
        return $this->estatus;
    }

    public function setEstatus($estatus){
        $this->estatus = $estatus;
    }
}