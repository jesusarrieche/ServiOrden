<?php

namespace App\Models;

use PDO;
use System\Core\Model;

class Compra extends Movimiento{

    private $documentoReferencia;

    public function getDocumentoReferencia(){
        return $this->documentoReferencia;
    }

    public function setDocumentoReferencia($documentoReferencia){
        $this->documentoReferencia = $documentoReferencia;
    }

    public function listar(){

        $conexion = parent::connect();

        try{

            $conexion->beginTransaction();

            $sql = "SELECT c.id, c.num_compra, Date_format(c.fecha,'%d/%m/%Y') AS fecha, Date_format(c.fecha,'%H:%i') AS hora, p.razon_social AS proveedor, c.estatus FROM
            compras c
                LEFT JOIN
            proveedores p
                ON c.proveedor_id = p.id ORDER BY c.created_at DESC";
    
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            
            $conexion->commit();

            return $consulta->fetchAll(PDO::FETCH_OBJ);
            
        } catch (Exception $ex) {
            $conexion->rollBack();
            die($ex->getMessage());
        }
    }

    public function registrar(Compra $compra){
        try{

            $dbh = parent::connect();

            $consulta = $dbh->prepare("INSERT INTO compras(proveedor_id, num_compra, num_documento_referencia, total)" 
                                                            . "VALUES (:proveedor_id, :num_compra, :documento_referencia, :total)");

            $proveedor_id = $compra->getPersonaId();
            $num_compra = $compra->getNumeroDocumento();
            $documentoReferencia = $compra->getDocumentoReferencia();
            $total = $compra->getTotal();

            $consulta->bindParam(":proveedor_id", $proveedor_id);
            $consulta->bindParam(":num_compra", $num_compra);
            $consulta->bindParam(":documento_referencia", $documentoReferencia);
            $consulta->bindParam(":total", $total);

            $consulta->execute();

            $lastId = $dbh->lastInsertId();
            
            return $lastId;

        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function numeroCompra(){
        try{
            $consulta = parent::connect()->query("SELECT num_compra FROM compras ORDER BY id DESC");

            

        }catch(Exception $ex){
            return $ex->message();
        }
    }

    public function ultimoDocumento(){
        try {
            $consulta = parent::connect()->prepare("SELECT num_compra FROM compras ORDER BY id DESC LIMIT 1");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_COLUMN);
        } catch (Exception $ex){
            return $ex->message();
        }
    }

}