<?php

namespace App\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Proveedor;
use System\Core\Controller;
use System\Core\View;

class CompraController extends Controller{

    private $cliente;
    private $producto;
    private $proveedor;

    public function __construct(){
        $this->cliente = new Cliente;
        $this->producto = new Producto;
        $this->proveedor = new Proveedor;
    }

    public function index(){
        return View::getView('Compra.index');
    }
}