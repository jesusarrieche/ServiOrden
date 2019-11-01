<?php

namespace App\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use System\Core\Controller;
use System\Core\View;

class VentaController extends Controller{

    private $cliente;
    private $producto;

    public function __construct(){
        $this->cliente = new Cliente;
        $this->producto = new Producto;
    }

    public function index(){
        return View::getView('Venta.index');
    }

    public function crear(){
        return View::getView('Venta.create');
    }
}