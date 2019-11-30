<?php

namespace App\Controllers;

use App\Models\Inventario;
use App\Traits\Utility;
use System\Core\Controller;
use System\Core\View;

class InventarioController extends Controller{

    private $inventario;

    use Utility;

    public function __construct(){
        $this->inventario = new Inventario;
    }

    public function index(){
        return View::getView('Inventario.index');
    }

    public function listar(){
        
        $method = $_SERVER['REQUEST_METHOD'];

        if( $method != 'POST'){
        http_response_code(404);
        return false;
        }

        $productos = $this->inventario->listar();

        foreach($productos as $producto){

            if($producto->estatus == 'ACTIVO'){
                $producto->estado = "<a href='" . $this->encriptar($producto->id) . "' class='btn btn-success estatus'><i class='fas fa-check-circle'></i> Activa</a>";
            }else{
                $producto->estado = "<a href='" . $this->encriptar($producto->id) . "' class='btn btn-danger estatus'><i class='fas fa-window-close'></i> Anulada</a>";
            }

            $producto->button = 
            "<a href='/FrameworkJD/producto/mostrar/". $this->encriptar($producto->id) ."' class='mostrar btn btn-info'><i class='fas fa-search'></i></a>".
            "<a href='/FrameworkJD/producto/productoPDF/". $this->encriptar($producto->id) ."' class='pdf btn btn-danger m-1'><i class='fas fa-file-pdf'></i></a>";
        }

        http_response_code(200);

        echo json_encode([
        'data' => $productos
        ]);
    }
}