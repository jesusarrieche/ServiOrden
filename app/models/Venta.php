<?php

namespace App\Models;

use PDO;
use System\Core\Model;

class Venta extends Movimiento{

    public function listar(){

        $conexion = parent::connect();

        try{

            $conexion->beginTransaction();

            $sql = "SELECT v.id, v.num_venta, Date_format(v.fecha,'%d/%m/%Y') AS fecha, Date_format(v.fecha,'%H:%i') AS hora, c.nombre AS cliente, v.estatus FROM
            ventas v
                LEFT JOIN
            clientes c
                ON v.cliente_id = c.id ORDER BY c.created_at DESC";
    
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            
            $conexion->commit();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
            
        } catch (Exception $ex) {
            $conexion->rollBack();
            die($ex->getMessage());
        }
    }

    public function registrar(Venta $venta){
        try{

            $dbh = parent::connect();

            $consulta = $dbh->prepare("INSERT INTO ventas(cliente_id, num_venta, total)" 
                                                            . "VALUES (:cliente_id, :num_venta, :total)");

            $cliente_id = $venta->getPersonaId();
            $num_venta = $venta->getNumeroDocumento();
            $total = $venta->getTotal();

            $consulta->bindParam(":cliente_id", $cliente_id);
            $consulta->bindParam(":num_venta", $num_venta);
            $consulta->bindParam(":total", $total);

            $consulta->execute();

            $lastId = $dbh->lastInsertId();
            
            return $lastId;

        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function ultimoDocumento(){
        try {
            $consulta = parent::connect()->prepare("SELECT num_venta FROM ventas ORDER BY id DESC LIMIT 1");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_COLUMN);
        } catch (Exception $ex){
            return $ex->message();
        }
    }

}