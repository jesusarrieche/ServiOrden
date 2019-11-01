<?php

namespace App\Models;

use PDO;
use System\Core\Model;

class Compra extends Movimiento{

    public function listar(){
    }

    public function registrar(Compra $compra, $detalle = null){
        try{
            $consulta = parent::connect()->query("INSERT INTO compras(proveedor_id, usuario_id, num_compra, impuesto) VALUES 
                                                                     (:proveedor_id, :usuario_id, :num_compra, :impuesto)");
            $consulta2 = parent::connect()->query("SELECT last_insert_id()");

            $proveedor_id = $compra->getPersonaId();
            $usuario_id = $compra->getUsuarioId();
            $num_compra = $compra->

        }catch(Exception $ex){
            return $ex->message();
        }
    }

    public function numeroCompra(){
        try{
            $consulta = parent::connect()->query("SELECT num_compra FROM compras ORDER BY id DESC");

            

        }catch(Exception $ex){
            return $ex->message();
        }
    }
}