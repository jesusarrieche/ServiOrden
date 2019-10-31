<?php

namespace App\Controllers;

use App\Models\Cliente;
use System\Core\Controller;
use System\Core\View;

class HomeController extends Controller{

    private $cliente;

    public function __construct(){
        $this->cliente = new Cliente;
    }

    public function index(){

        return View::getView('Home.index', [
            'clientes' => $this->cliente->contar()
        ]);
    }
}