<?php

namespace App\Models;

use PDO;
use System\Core\Model;

class Categoria extends Model{

    private $id;
    private $nombre;
    private $descripcion;
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

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getEstatus(){
        return $this->estatus;
    }

    public function setEstatus($estatus){
        $this->estatus = $estatus;
    }


    /**
     * Metodos
     */

    public function listar(){
        try{
            $consulta = parent::connect()->prepare("SELECT id, nombre, descripcion, estatus FROM categorias WHERE estatus='ACTIVO' ORDER BY created_at DESC");
            $consulta->execute();
            
            return $consulta->fetchAll(PDO::FETCH_OBJ);
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    public function registrar(Categoria $categoria){
        try{
            $consulta = parent::connect()->prepare("INSERT INTO categorias(nombre, descripcion) "
                . "VALUES (:nombre, :descripcion)");
        
        
            $nombre = $categoria->getNombre();
            $descripcion = $categoria->getDescripcion();
            
            $consulta->bindParam(":nombre", $nombre);
            $consulta->bindParam(":descripcion", $descripcion);
            
            return $consulta->execute();
            
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function actualizar(Categoria $categoria){
        try{
            $consulta = parent::connect()->prepare("UPDATE categorias SET nombre=:nombre, descripcion=:descripcion, estatus=:estatus WHERE id=:id");


            $id = $categoria->getId();
            $nombre = $categoria->getNombre();
            $descripcion = $categoria->getDescripcion();
            $estatus = "ACTIVO";
            
            $consulta->bindParam(":id", $id);
            $consulta->bindParam(":nombre", $nombre);
            $consulta->bindParam(':descripcion', $descripcion);
            $consulta->bindParam(":estatus", $estatus);

            return $consulta->execute();
                    
        } catch (Exception $ex) {
            return $ex->getMessage();            
        }
    }
}