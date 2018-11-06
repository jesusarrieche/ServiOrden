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
          
            
            if($empleado->getId() != ""){
                
                $id = $empleado->getId();
                $identificacion = $empleado->getTipoIdentificacion()."-".$empleado->getIdentificacion();
                
                $consultaIdentificacion = parent::ConsultaSimple("SELECT * FROM empleados WHERE identificacion='$identificacion' AND id!='$id'" );
                
                if($consultaIdentificacion->rowCount() >= 1){
                    $alerta= [
                    'alerta' => 'simple',
                    'titulo' => 'Esta Identificacion ya Existe',
                    'texto' => 'Por favor intente de nuevo',
                    'tipo' => 'error'
                    ];
                } else {
                    $alerta = $this->modeloEmpleado->Actualizar($empleado);
                }
            } else {
                
                $identificacion = $empleado->getTipoIdentificacion()."-".$empleado->getIdentificacion();
                
                $consulta = parent::ConsultaSimple("SELECT * FROM empleados WHERE identificacion='$identificacion' AND estatus='INACTIVO'");
                
                if ($consulta->rowCount() >= 1) {
                    $registro = parent::ObtenerObjeto("SELECT * FROM empleados WHERE identificacion='$identificacion' AND estatus='INACTIVO'");
                    
                    $empleado->setId($registro->id);
                    
                    $this->modeloEmpleado->Actualizar($empleado);
                    
                    $alerta = [
                    'alerta' => 'simple',
                    'titulo' => 'Operacion Exitosa...!!!',
                    'texto' => 'Empleado registrado satisfactoriamente',
                    'tipo' => 'success'
                    ];
                } else {
                    $alerta = $this->modeloEmpleado->Registrar($empleado);
                }
            }
            
            $alerta = parent::Alerta($alerta);
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Empleados/Index.php';
            require_once 'Vistas/Pie.php';
            
        }

        public function BorrarEmpleado(){
            $empleado = new Empleado();
            $empleado->setId($_GET['id']);
            $empleado = $this->modeloEmpleado->Obtener($empleado->getId());

            $alerta = $this->modeloEmpleado->Borrar($empleado);
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

