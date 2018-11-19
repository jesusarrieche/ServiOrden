<?php

    if(isset($peticionAjax)){
        require_once '../Modelos/Cliente.php';
    }else{
         require_once './Modelos/Cliente.php';
    }
    
    
    class ClienteControlador extends Cliente{
        
        private $modeloCliente;
        
        public function __construct() {
            $this->modeloCliente = new Cliente();
        }
        
        public function Inicio(){
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Clientes/Index.php';
            require_once 'Vistas/Pie.php';
        }

        public function RegistroCliente(){

            $titulo= "Registrar";
            
            $cliente = new Cliente();
            if (isset($_GET['id'])) {
                $titulo= "Actualizar";
                $cliente = $this->modeloCliente->Obtener($_GET['id']);
            }
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Clientes/Registro.php';
            require_once 'Vistas/Pie.php';
        }
        
        public function Guardar(){
           $cliente = new Cliente();
          
           if(isset($_POST['id'])){
               $cliente->setId($_POST['id']);
           }
           $cliente->setTipoIdentificacion($_POST['inicial_identificacion']);
           $cliente->setIdentificacion($_POST['identificacion']);
           $cliente->setNombre(strtoupper($_POST['nombre']));
           $cliente->setApellido(strtoupper($_POST['apellido']));
           $cliente->setDireccion(strtoupper($_POST['direccion']));
           $cliente->setTelefono(strtoupper($_POST['telefono']));
           $cliente->setCorreo(strtoupper($_POST['correo']));
           $cliente->setEstatus("ACTIVO");
           
           if($cliente->getId() > 0){
              $alerta = $this->modeloCliente->Actualizar($cliente);
              
           }else{
              $alerta = $this->modeloCliente->Registrar($cliente);
           }
            $alerta= parent::Alerta($alerta);
            
            echo $alerta;
             
        }
        
        public function ListarClientes(){
            $clientes = $this->modeloCliente->Listar();
            
            echo json_encode($clientes);
        }
        
        public function BorrarCliente(){
           $alerta = $this->modeloCliente->Borrar($_GET['id']);
           $alerta = parent::Alerta($alerta);
            if(!empty($alerta)){
                require_once 'Vistas/Encabezado.php';
                require_once 'Vistas/Contenidos/Clientes/Index.php';
                require_once 'Vistas/Pie.php';
            } else {
                header("location:?controlador=cliente");
            }
        }

    }

