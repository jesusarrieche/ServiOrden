<?php

namespace App\Models;

use PDO;
use System\Core\Model;

class Inventario extends Model{

    public function listar(){

        $conexion = parent::connect();

        try {
            $query = $conexion->query("SELECT * FROM v_inventario");
            
            return $query->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}