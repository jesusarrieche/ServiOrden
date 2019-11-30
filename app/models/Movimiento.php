<?php

namespace App\Models;

use PDO;
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

    public function formatoDocumento($ultimoDocumento){
       
        $ultimoDocumento += 1;
        $result = str_pad($ultimoDocumento, 9,'0',STR_PAD_LEFT);
        
        return $result;
    }

    public function cambiarEstatus($tabla,$id){
        $conexion = parent::connect();

        if($tabla == 'compras'){
            $tabla = 'compras';
            $tabla2 = 'entradas';
            $referencia = 'compra_id';
        }elseif($tabla == 'ventas'){
            $tabla = 'ventas';
            $tabla2 = 'salidas';
            $referencia = 'venta_id';
        }else {
            return false;
        }

        try {
            $conexion->beginTransaction();

            $query = $conexion->prepare("SELECT estatus FROM $tabla WHERE id = '$id' LIMIT 1");
            $query->execute();

            $estatus = $query->fetch(PDO::FETCH_COLUMN);

            if($estatus == 'ACTIVO'){
                $query2 = $conexion->prepare("UPDATE $tabla SET estatus = 'INACTIVO' WHERE id = '$id'");
                $query3 = $conexion->prepare("UPDATE $tabla2 SET estatus = 'INACTIVO' WHERE $referencia = '$id'");

                $query2->execute();
                $query3->execute();

                $conexion->commit();

                return true;

            }elseif($estatus == 'INACTIVO'){
                $query2 = $conexion->prepare("UPDATE $tabla SET estatus = 'ACTIVO' WHERE id = '$id'");
                $query3 = $conexion->prepare("UPDATE $tabla2 SET estatus = 'ACTIVO' WHERE $referencia = '$id'");

                $query2->execute();
                $query3->execute();

                $conexion->commit();

                return true;


            }else {
                return false;
            }

        } catch (Exception $e) {
            $conexion->rollBack();
            return $e->getMessage();
        }
    }
}