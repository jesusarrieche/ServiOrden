<?php

    require_once 'Modelos/Usuario.php';
    
    class UsuarioControlador extends Usuario{
        
        private $modeloUsuario;
        
        public function __construct() {
            $this->modeloUsuario= new Usuario;
        }
        
        public function Inicio(){
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Usuarios/Index.php';
            require_once 'Vistas/Pie.php';
        }

        public function RegistroUsuario(){

            $titulo= "Registrar";
            
            $usuario = new Usuario();
            if (isset($_GET['id'])) {
                $titulo= "Actualizar";
                $usuario = $this->modeloUsuario->Obtener($_GET['id']);
            }
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Usuarios/Registro.php';
            require_once 'Vistas/Pie.php';
        }
        
        public function Guardar(){
           $usuario = new Usuario();
           
           $usuario->setId($_POST['id']);
           $usuario->setTipoIdentificacion($_POST['inicial_identificacion']);
           $usuario->setIdentificacion($_POST['identificacion']);
           $usuario->setNombre(strtoupper($_POST['nombre']));
           $usuario->setApellido(strtoupper($_POST['apellido']));
           $usuario->setDireccion(strtoupper($_POST['direccion']));
           $usuario->setTelefono(strtoupper($_POST['telefono']));
           $usuario->setCorreo(strtoupper($_POST['correo']));
           
           $usuario->setUsuario($_POST['usuario']);
           $usuario->setPassword(parent::Encriptar($_POST['password']));
           $usuario->setPrivilegio($_POST['privilegio']);
           $usuario->setEstatus("ACTIVO");
           
           if($usuario->getId() > 0){
               $alerta = $this->modeloUsuario->Actualizar($usuario);
           }else{
               $alerta = $this->modeloUsuario->Registrar($usuario);
           }
           
           $alerta = parent::Alerta($alerta);
           
           if(!empty($alerta)){
                require_once 'Vistas/Encabezado.php';
                require_once 'Vistas/Contenidos/Usuarios/Index.php';
                require_once 'Vistas/Pie.php';
           }else{
               header("location:?controlador=usuario");
           }
           
        }
        
        public function BorrarUsuario(){
            $alerta = $this->modeloUsuario->Borrar("usuarios",$_GET['id']);
            $alerta = parent::Alerta($alerta);
          
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Usuarios/Index.php';
            require_once 'Vistas/Pie.php';
        
        }

    }