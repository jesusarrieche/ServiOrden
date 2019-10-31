<?php

namespace App\Controllers;

use App\Models\Categoria;
use App\Traits\Utility;
use System\Core\Controller;
use System\Core\View;

class CategoriaController extends Controller{
    private $categoria;

    use Utility;

    public function __construct(){
        $this->categoria = new Categoria;
    }

    public function index(){
        return View::getView('Categoria.index');
    }

    public function mostrar($param){

        $param = $this->desencriptar($param);
        
        $categoria = $this->categoria->getOne('categorias', $param);

        http_response_code(200);

        echo json_encode([
            'data' => $categoria
        ]);
    }

    public function listar(){

        $method = $_SERVER['REQUEST_METHOD'];

            if( $method != 'POST'){
            http_response_code(404);
            return false;
            }

            $categorias = $this->categoria->listar();

            foreach($categorias as $categoria){

            $categoria->button = 
            "<a href='/FrameworkJD/categoria/mostrar/". $this->encriptar($categoria->id) ."' class='mostrar btn btn-info'><i class='fas fa-search'></i></a>".
            "<a href='/FrameworkJD/categoria/mostrar/". $this->encriptar($categoria->id) ."' class='editar btn btn-warning m-1'><i class='fas fa-pencil-alt'></i></a>".
            "<a href='". $this->encriptar($categoria->id) ."' class='eliminar btn btn-danger'><i class='fas fa-trash-alt'></i></a>";

        }

        http_response_code(200);

        echo json_encode([
        'data' => $categorias
        ]);

    }

    public function guardar(){

        $method = $_SERVER['REQUEST_METHOD'];
    
        if( $method != 'POST'){
          http_response_code(404);
          return false;
        }
    
        $categoria = new Categoria();
    
        $categoria->setNombre(strtoupper($this->limpiaCadena($_POST['nombre'])));

        if($_POST['descripcion'] != ''){
            $categoria->setDescripcion(strtoupper($this->limpiaCadena($_POST['descripcion'])));
        }else{
            $categoria->setDescripcion('N/A');
        }
    

        $nombre = $categoria->getNombre();

        $consulta = $this->categoria->query("SELECT * FROM categorias WHERE nombre='$nombre'" ); // Verifica inexistencia de cedula, sies igual a la actual no la toma en cuenta puesto que si registramos un cambio en el nombre se mantiene la misma cedula y afectaria la consulta.
    
        if ($consulta->rowCount() >= 1) {
    
          http_response_code(200);
          
          echo json_encode([
            'titulo' => 'Documento Registrado',
            'mensaje' => $nombre . ' Se encuentra registrado en nuestro sistema',
            'tipo' => 'error'
          ]);
    
          return false;
    
        }
    
        if($this->categoria->registrar($categoria)){
            http_response_code(200);
        
            echo json_encode([
              'titulo' => 'Registro Exitoso',
              'mensaje' => 'Categoria registrado en nuestro sistema',
              'tipo' => 'success'
            ]);
        }else{
            http_response_code(200);
        
            echo json_encode([
              'titulo' => 'Error Inesperado',
              'mensaje' => 'Ocurrio un error durante la operacion!',
              'tipo' => 'error'
            ]);
        }
    
    
    
    }

    public function actualizar(){

      $method = $_SERVER['REQUEST_METHOD'];
    
        if( $method != 'POST'){
          http_response_code(404);
          return false;
        }
    
        $categoria = new Categoria();
        $categoria->setId($_POST['id']);
    
        $categoria->setNombre(strtoupper($this->limpiaCadena($_POST['nombre'])));

        if($_POST['descripcion'] != ''){
            $categoria->setDescripcion(strtoupper($this->limpiaCadena($_POST['descripcion'])));
        }else{
            $categoria->setDescripcion('N/A');
        }

        $id = $categoria->getId(); 
        $nombre = $categoria->getNombre();
    
        $consulta = $this->categoria->query("SELECT * FROM categorias WHERE nombre='$nombre' AND id<>$id");

        if( $consulta->rowCount() >= 1 ){
          http_response_code(200);
    
          echo json_encode([
            'titulo' => "Categoria $nombre ya existe!",
            'mensaje' => 'Por favor intente de nuevo',
            'tipo' => 'error'
          ]);

          return false;
        }

        if($this->categoria->actualizar($categoria)){
          http_response_code(200);
    
          echo json_encode([
            'titulo' => 'Actualizacion Exitosa',
            'mensaje' => 'Registro actualizado en nuestro sistema',
            'tipo' => 'success'
          ]);
        }else{
          http_response_code(200);
    
          echo json_encode([
            'titulo' => 'Error al Actualizar',
            'mensaje' => 'Ocurrio un error durante la actualizacion',
            'tipo' => 'error'
          ]);
        }
    
    }

    public function eliminar($id){

      $method = $_SERVER['REQUEST_METHOD'];
  
      if( $method != 'DELETE'){
        http_response_code(404);
        return false;
      }
  
      $id = $this->desencriptar($id);
  
      if($this->categoria->eliminar("categorias", $id)){
  
        http_response_code(200);
  
        echo json_encode([
          'titulo' => 'Registro eliminado!',
          'mensaje' => 'Registro eliminado en nuestro sistema',
          'tipo' => 'success'
        ]);
      }else{
        http_response_code(404);
  
        echo json_encode([
          'titulo' => 'Ocurio un error!',
          'mensaje' => 'No se pudo eliminar el registro',
          'tipo' => 'error'
        ]);
      }
    }


    /**
     * API
     */

    public function listarCategorias(){

      $categorias = $this->categoria->getAll('categorias',"estatus= 'ACTIVO'");
  
      echo json_encode([
        'data' => $categorias
      ]);
  
      exit();
      
    }
}