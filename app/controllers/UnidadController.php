<?php

namespace App\Controllers;

use App\Models\Utilidad;
use App\Traits\Utility;
use System\Core\Controller;

class UnidadController extends Controller {

	private $utilidad;
	
	use Utility;

	public function __construct(){
		$this->utilidad = new Utilidad;
	}

	public function listar(){

		$unidades = $this->utilidad->getAll('unidades');

		echo json_encode([
			'data' => $unidades
		]);

		exit();
		
	}
}