<?php

namespace App\Models;

use Exception;
use PDO;
use System\Core\Model;

class Rol extends Model {
    
    private $id;
    private $nombre;
    private $permisos = [];

    public function __construct(){
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getPermisos(){
        return $this->permisos;
    }

    public function setPermisos($permiso){
        array_push($this->permisos, $permiso);
    }

    public function listar(){
        try{

            $conexion = parent::connect();

            $query = $conexion->prepare("SELECT * FROM roles WHERE estatus = 'ACTIVO'");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $ex){
            die($ex->getMessage());
        }
    }
}