<?php

namespace App\Api;

use App\Traits\Utility;
use System\Core\Model;

class Api extends Model {
    use Utility;

    public function __construct(){
    }

    public function generarCodigo(){

        $letra = isset($_POST['letra']) ? $_POST['letra'] : 'A';
        $longitud = isset($_POST['longitud']) ? $_POST['longitud'] : 5;
        $numFinal = isset($_POST['numero']) ? $_POST['numero'] : 0;

        $codigo = $this->codigoAleatorio($letra, $longitud, $numFinal); 
        
        echo json_encode([
            'data' => $codigo
        ]);
    }
}