<?php

namespace App\Controllers;

use App\Models\Rol;
use App\Traits\Utility;
use System\Core\Controller;
use System\Core\View;

class RolController extends Controller {

	private $rol;
	
	use Utility;

	public function __construct(){
		$this->rol = new Rol;
    }
    
    public function index(){
        return View::getView('Rol.index');
    }

	public function listar(){

        $roles = $this->rol->listar();
        
        $cont = 1;
        foreach($roles AS $rol){

            $rol->numero = $cont;
            $rol->button = 
            "<a href='/FrameworkJD/rol/mostrar/". $this->encriptar($rol->id) ."' class='mostrar btn btn-info'><i class='fas fa-search'></i></a>".
            "<a href='/FrameworkJD/rol/mostrar/". $this->encriptar($rol->id) ."' class='editar btn btn-warning m-1'><i class='fas fa-pencil-alt'></i></a>".
            "<a href='". $this->encriptar($rol->id) ."' class='eliminar btn btn-danger'><i class='fas fa-trash-alt'></i></a>";

            $cont++;
        }

		echo json_encode([
			'data' => $roles
		]);

		exit();
		
	}
}