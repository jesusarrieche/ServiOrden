<?php

    require_once 'Modelos/Cliente.php';
    
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


           $cliente->setId($_POST['id']);
           $cliente->setTipoIdentificacion($_POST['inicial_identificacion']);
           $cliente->setIdentificacion($_POST['identificacion']);
           $cliente->setNombre(strtoupper($_POST['nombre']));
           $cliente->setApellido(strtoupper($_POST['apellido']));
           $cliente->setDireccion(strtoupper($_POST['direccion']));
           $cliente->setTelefono(strtoupper($_POST['telefono']));
           $cliente->setCorreo(strtoupper($_POST['correo']));
           $cliente->setEstatus("ACTIVO");



           if ($cliente->getId() != "") {
              
              $id = $cliente->getId();
              $identificacion = $cliente->getTipoIdentificacion()."-".$cliente->getIdentificacion();

              $consultaIdentificacion = parent::ConsultaSimple("SELECT * FROM clientes WHERE identificacion='$identificacion' AND id!='$id'" );

              if ($consultaIdentificacion->rowCount() >= 1) {
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Esta Identificacion ya Existe',
                'texto' => 'Por favor intente de nuevo',
                'tipo' => 'error'
                ];
              }else{
                $alerta = $this->modeloCliente->Actualizar($cliente);
              }

           }else{

              $identificacion = $cliente->getTipoIdentificacion()."-".$cliente->getIdentificacion();

              $consulta = parent::ConsultaSimple("SELECT * FROM clientes WHERE identificacion='$identificacion' AND estatus='INACTIVO'");

              if ($consulta->rowCount() >= 1) {
                $registro = parent::ObtenerObjeto("SELECT * FROM clientes WHERE identificacion='$identificacion' AND estatus='INACTIVO'");
                
                $cliente->setId($registro->id);

                $this->modeloCliente->Actualizar($cliente);

                $alerta = [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Cliente registrado satisfactoriamente',
                'tipo' => 'success'
                ];

              }else{
                $alerta = $this->modeloCliente->Registrar($cliente);
              }
              
            }
           
           
            $alerta= parent::Alerta($alerta);
            
            if(!empty($alerta)){
                require_once 'Vistas/Encabezado.php';
                require_once 'Vistas/Contenidos/Clientes/Index.php';
                require_once 'Vistas/Pie.php';
            } else {
                header("location:?controlador=cliente");
            }
             
        }
        
        public function BorrarCliente(){

          $cliente = new Cliente();

          $cliente->setId($_GET['id']);

           $cliente = $this->modeloCliente->Obtener($cliente->getId());

           $alerta = $this->modeloCliente->Borrar($cliente);
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
