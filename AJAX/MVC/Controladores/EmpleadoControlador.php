<?php

    require_once 'Modelos/Empleado.php';
    
    class EmpleadoControlador extends Empleado{
        
        private $modeloEmpleado;
        
        public function __construct() {
            $this->modeloEmpleado = new Empleado();
        }

        public function Inicio(){
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Empleados/Index.php';
            require_once 'Vistas/Pie.php';
        }

        public function RegistroEmpleado(){

            $titulo= "Registro";
            $empleado = new Empleado();
            if(isset($_GET['id'])){
                $titulo = "Actualizar";
                $empleado = $this->modeloEmpleado->Obtener($_GET['id']);
            }
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Empleados/Registro.php';
            require_once 'Vistas/Pie.php';
        }
        
        public function Guardar(){
            $empleado = new Empleado();
            
            $empleado->setId(parent::LimpiaCadena($_POST['id']));
            $empleado->setTipoIdentificacion(parent::LimpiaCadena($_POST['inicial_identificacion']));
            $empleado->setIdentificacion(parent::LimpiaCadena($_POST['identificacion']));
            $empleado->setNombre(strtoupper(parent::LimpiaCadena($_POST['nombre'])));
            $empleado->setApellido(strtoupper(parent::LimpiaCadena($_POST['apellido'])));
            $empleado->setDireccion(strtoupper(parent::LimpiaCadena($_POST['direccion'])));
            $empleado->setTelefono(strtoupper(parent::LimpiaCadena($_POST['telefono'])));
            $empleado->setCorreo(strtoupper(parent::LimpiaCadena($_POST['correo'])));
            $empleado->setCargo(strtoupper(parent::LimpiaCadena($_POST['cargo'])));
            $empleado->setEstatus(strtoupper(parent::LimpiaCadena($_POST['estatus'])));
          
            if($empleado->getId() > 0){
                $alerta = $this->modeloEmpleado->Actualizar($empleado);
            }else{
                $alerta = $this->Registrar($empleado);
            }
            
            $alerta = parent::Alerta($alerta);
            
            if(!empty($alerta)){
                require_once 'Vistas/Encabezado.php';
                require_once 'Vistas/Contenidos/Empleados/Index.php';
                require_once 'Vistas/Pie.php';
            }else{
                header("location=?controlador=Empleado");
            }
        }

        public function BorrarEmpleado(){
            $alerta = $this->modeloEmpleado->Borrar($_GET['id']);
            $alerta = parent::Alerta($alerta);
             if(!empty($alerta)){
                 require_once 'Vistas/Encabezado.php';
                 require_once 'Vistas/Contenidos/Empleados/Index.php';
                 require_once 'Vistas/Pie.php';
             } else {
                 header("location:?controlador=Empleado");
             }
         }
    }

