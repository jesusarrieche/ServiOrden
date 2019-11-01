<?php

namespace System\Core;

use PDO;

class Model extends Database{

    public function __construct(){
    }

    public function contar($table){
        try{
            $consulta = parent::connect()->query("SELECT * FROM $table WHERE estatus='ACTIVO'")->rowCount();
            return $consulta;
        
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function query($sql){
        try{
            $consulta = parent::connect()->prepare($sql);
            $consulta->execute();
            return $consulta;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function getOne($table, $id){
        try{
            $consulta= parent::connect()->prepare("SELECT * FROM $table WHERE id=$id");

            $consulta->execute();
            $objeto = $consulta->fetch(PDO::FETCH_OBJ);

            return $objeto;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function getAll($table, $condition = null){

        if(!is_null($condition)){
            $sql = "SELECT * FROM $table WHERE $condition";
        }else{
            $sql = "SELECT * FROM $table";
        }

        try{
            $consulta= parent::connect()->prepare($sql);

            $consulta->execute();
            $objeto = $consulta->fetchAll(PDO::FETCH_OBJ);

            return $objeto;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function eliminar($tabla, $id){    //Metodo elimina logicamente un registro
        try{
            $consulta = parent::connect()->prepare("UPDATE $tabla SET estatus='ELIMINADO' WHERE id=$id");

            return $consulta->execute();

        } catch (Exception $ex) {
            
            die("Error: ". $ex->getMessage());
        }
    }
}