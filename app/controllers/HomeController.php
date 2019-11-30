<?php

namespace App\Controllers;

use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\Venta;
use System\Core\Controller;
use System\Core\View;

class HomeController extends Controller{

    private $cliente;
    private $producto;
    private $compra;
    private $venta;

    public function __construct(){
        $this->cliente = new Cliente;
        $this->producto = new Producto;
        $this->compra = new Compra;
        $this->venta = new Venta;
    }

    public function index(){

        return View::getView('Home.index', [
            'clientes' => $this->cliente->contar('clientes'),
            'productos' => $this->producto->contar('productos'),
            'compras' => $this->compra->contar('compras'),
            'ventas' => $this->venta->contar('ventas')
        ]);
    }
}