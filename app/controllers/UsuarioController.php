<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Traits\Utility;
use System\Core\Controller;
use System\Core\View;


class UsuarioController extends Controller{

    use Utility;
    
    private $usuario;
    
    public function __construct() {
        $this->usuario = new Usuario;
    }

    public function index(){
        return View::getView('Usuario.index');
    }

    public function listar(){

        $method = $_SERVER['REQUEST_METHOD'];

        if( $method != 'POST'){
            http_response_code(404);
            return false;
        }

        $usuarios = $this->usuario->listar();

        foreach($usuarios as $usuario){

            $usuario->button = 
            "<a href='/FrameworkJD/usuario/mostrar/". $this->encriptar($usuario->id) ."' class='mostrar btn btn-info'><i class='fas fa-search'></i></a>".
            "<a href='/FrameworkJD/usuario/mostrar/". $this->encriptar($usuario->id) ."' class='editar btn btn-warning m-1'><i class='fas fa-pencil-alt'></i></a>".
            "<a href='". $this->encriptar($usuario->id) ."' class='eliminar btn btn-danger'><i class='fas fa-trash-alt'></i></a>";

        }

        http_response_code(200);

        echo json_encode([
        'data' => $usuarios
        ]);

    }

    public function guardar(){

    $method = $_SERVER['REQUEST_METHOD'];

    if( $method != 'POST'){
    http_response_code(404);
    return false;
    }

    $usuario = new Cliente();

    $usuario->setId($_POST['id']);
    $usuario->setTipoDocumento($_POST['inicial_documento']);
    $usuario->setDocumento($_POST['documento']);
    $usuario->setNombre(strtoupper($this->limpiaCadena($_POST['nombre'])));
    $usuario->setApellido(strtoupper($this->limpiaCadena($_POST['apellido'])));
    $usuario->setDireccion(strtoupper($this->limpiaCadena($_POST['direccion'])));
    $usuario->setTelefono(strtoupper($this->limpiaCadena($_POST['telefono'])));
    $usuario->setEmail(strtoupper($this->limpiaCadena($_POST['correo'])));
    $usuario->setEstatus("ACTIVO");


    $documento = $usuario->getTipoDocumento()."-".$usuario->getDocumento();

    $consultaDocumento = $this->usuario->query("SELECT * FROM usuarios WHERE documento='$documento'" ); // Verifica inexistencia de cedula, sies igual a la actual no la toma en cuenta puesto que si registramos un cambio en el nombre se mantiene la misma cedula y afectaria la consulta.

    if ($consultaDocumento->rowCount() >= 1) {

    http_response_code(200);

    echo json_encode([
        'titulo' => 'Documento Registrado',
        'mensaje' => $documento . ' Se encuentra registrado en nuestro sistema',
        'tipo' => 'error'
    ]);

    return false;

    }

    $this->usuario->registrar($usuario);

    http_response_code(200);

    echo json_encode([
    'titulo' => 'Registro Exitoso',
    'mensaje' => 'Cliente registrado en nuestro sistema',
    'tipo' => 'success'
    ]);


    }

    public function actualizar(){

    $usuario = new Cliente();

    $usuario->setId($_POST['id']);
    $usuario->setTipoDocumento($_POST['inicial_documento']);
    $usuario->setDocumento($_POST['documento']);
    $usuario->setNombre(strtoupper($this->limpiaCadena($_POST['nombre'])));
    $usuario->setApellido(strtoupper($this->limpiaCadena($_POST['apellido'])));
    $usuario->setDireccion(strtoupper($this->limpiaCadena($_POST['direccion'])));
    $usuario->setTelefono(strtoupper($this->limpiaCadena($_POST['telefono'])));
    $usuario->setEmail(strtoupper($this->limpiaCadena($_POST['correo'])));
    $usuario->setEstatus("ACTIVO");

    if($this->usuario->actualizar($usuario)){
    http_response_code(200);

    echo json_encode([
        'titulo' => 'Actualizacion Exitosa',
        'mensaje' => 'Registro actualizado en nuestro sistema',
        'tipo' => 'success'
    ]);
    }else{
    http_response_code(404);

    echo json_encode([
        'titulo' => 'Error al Actualizar',
        'mensaje' => 'Ocurrio un error durante la actualizacion',
        'tipo' => 'error'
    ]);
    }

    }

    public function mostrar($param){

    $param = $this->desencriptar($param);

    $usuario = $this->usuario->getOne('usuarios', $param);

    http_response_code(200);

    echo json_encode([
    'data' => $usuario
    ]);
    }

    public function eliminar($id){

    $method = $_SERVER['REQUEST_METHOD'];

    if( $method != 'DELETE'){
    http_response_code(404);
    return false;
    }

    $id = $this->desencriptar($id);

    if($this->usuario->eliminar("usuarios", $id)){

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

}
