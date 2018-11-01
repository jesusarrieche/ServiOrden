<?php
    
    require_once 'Modelos/Vehiculo.php';
    require_once 'Modelos/Cliente.php';
    
    class VehiculoControlador extends Vehiculo{
        
        private $modeloVehiculo;
        private $modeloCliente;

        public function __construct() {
            $this->modeloVehiculo = new Vehiculo();
            $this->modeloCliente = new Cliente();
        }
        
        public function Inicio(){
            
            $vehiculos = parent::ObtenerObjetos("select vehiculos.id, vehiculos.id_modelos as id_modelos, clientes.nombre, clientes.apellido, vehiculos.placa, marcas.nombre as marca, modelos.nombre as  modelo, modelos.anio, vehiculos.estatus from clientes
                right join vehiculos on id_clientes = clientes.id
                left join modelos on  vehiculos.id_modelos = modelos.id
                left join marcas on modelos.id_marcas = marcas.id;");
                            
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Vehiculos/Index.php';
            require_once 'Vistas/Pie.php';
        }

        public function RegistroVehiculo(){        
            
            $modelos = parent::ObtenerObjetos("SELECT modelos.id, marcas.nombre AS marca, modelos.nombre AS modelo, modelos.anio FROM marcas JOIN modelos ON id_marcas = marcas.id ORDER BY marca ASC");
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Vehiculos/RegistroVehiculo.php';
            require_once 'Vistas/Pie.php';  
        }

        public function RegistroModelo(){
            $titulo = "Registro";
            $modelo = new Vehiculo();
            
            if(isset($_GET['id'])){
                $titulo = "Actualizar";
                $modelo = $this->modeloVehiculo->ObtenerModelo($_GET['id']);
            }
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Vehiculos/RegistroModelo.php';
            require_once 'Vistas/Pie.php';
        }
        
        public function MostrarModelos(){
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Vehiculos/Modelos.php';
            require_once 'Vistas/Pie.php';
        }
        
        public function RegistroCaja(){    
            $modelos = parent::ObtenerObjetos("SELECT modelos.id, marcas.nombre AS marca, modelos.nombre AS modelo, modelos.anio FROM marcas JOIN modelos ON id_marcas = marcas.id ORDER BY marca ASC");



            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Vehiculos/RegistroCaja.php';
            require_once 'Vistas/Pie.php';
        }
        
        public function InicioMarca(){
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Vehiculos/Marcas.php';
            require_once 'Vistas/Pie.php';
        }

        public function RegistroMarca(){
            
            $titulo = "Registrar";
            $marca = new Vehiculo();
            if(isset($_GET['id'])){
                $titulo = "Actualizar";
                $marca = $this->modeloVehiculo->ObtenerMarca($_GET['id']);
            }
          
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Vehiculos/RegistroMarca.php';
            require_once 'Vistas/Pie.php';            
        }
        
        public function GuardarVehiculo(){
            $vehiculo = new Vehiculo();

            if(empty($_POST['placa'])){

                $vehiculo->setId_cliente(parent::LimpiaCadena($_POST['id_cliente']));   
                $vehiculo->setId_modelo(parent::LimpiaCadena($_POST['id_modelo']));
                $vehiculo->setPlaca("CAJA");
                if(empty($_POST['serial_caja'])){
                    $vehiculo->setSerial_caja("NO APLICA");
                }

                $vehiculo->setSerial_caja(parent::LimpiaCadena($_POST['serial_caja']));
                $vehiculo->setEstatus(parent::LimpiaCadena($_POST['estatus']));
                $vehiculo->setSerial_motor("NO APLICA");
                $vehiculo->setSerial_carroceria("NO APLICA");
            }else{

                $vehiculo->setId_cliente(parent::LimpiaCadena($_POST['id_cliente']));   
                $vehiculo->setId_modelo(parent::LimpiaCadena($_POST['id_modelo']));
                $vehiculo->setPlaca(parent::LimpiaCadena($_POST['placa']));
                $vehiculo->setSerial_motor(parent::LimpiaCadena($_POST['serial_motor']));
                $vehiculo->setSerial_carroceria(parent::LimpiaCadena($_POST['serial_carroceria']));
                $vehiculo->setSerial_caja(parent::LimpiaCadena($_POST['serial_caja']));
                $vehiculo->setColor(parent::LimpiaCadena($_POST['color']));
                $vehiculo->setEstatus(parent::LimpiaCadena($_POST['estatus']));
                
                $alerta = $this->modeloVehiculo->RegistrarVehiculo($vehiculo);
                $alerta = parent::Alerta($alerta);
                
                require_once 'Vistas/Encabezado.php';
                require_once 'Vistas/Contenidos/Vehiculos/Index.php';
                require_once 'Vistas/Pie.php';  
            }
              
            
                  
        }


        public function GuardarMarca() {
            $marca = new Vehiculo();
            
            $marca->setId(parent::LimpiaCadena($_POST['id']));
            $marca->setMarca(strtoupper(parent::LimpiaCadena($_POST['marca'])));
            $marca->setEstatus(strtoupper(parent::LimpiaCadena($_POST['estatus'])));
            
     
      
            $marcaV = strtoupper(parent::LimpiaCadena($_POST['marca'])); //Obtener valor de Marca, limpiar y colocar en mayuscula
            $consulta = parent::ConsultaSimple("SELECT * FROM marcas WHERE nombre ='$marcaV'");

            if($consulta->rowCount() >= 1){  
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Marca Registrada',
                'texto' => 'Esta marca ya se encuentra registrada, por favor intente de nuevo',
                'tipo' => 'error'
                ];

                $alerta = parent::Alerta($alerta);

                require_once 'Vistas/Encabezado.php';
                require_once 'Vistas/Contenidos/Vehiculos/Marcas.php';
                require_once 'Vistas/Pie.php';

            }else{
                if($marca->getId() > 0){
                    $alerta = $this->modeloVehiculo->ActualizarMarca($marca);
                } else {
                $alerta = $this->modeloVehiculo->RegistrarMarca($marca);
                }       
                
                $alerta = parent::Alerta($alerta);

                if(!empty($alerta)){
                    require_once 'Vistas/Encabezado.php';
                    require_once 'Vistas/Contenidos/Vehiculos/Marcas.php';
                    require_once 'Vistas/Pie.php';
                } else {
                    header("location:?controtador=Vehiculo&accion=InicioMarca");
                }
            }
        }
        
        public function GuardarModelo(){
            $modelo = new Vehiculo();
            
            $modelo->setId(parent::LimpiaCadena($_POST['id_modelo']));
            $modelo->setId_marca(parent::LimpiaCadena($_POST['id_marca']));
            $modelo->setModelo(strtoupper(parent::LimpiaCadena($_POST['modelo'])));
            $modelo->setAnio(parent::LimpiaCadena($_POST['anio']));
            $modelo->setEstatus(strtoupper(parent::LimpiaCadena($_POST['estatus'])));
            
            $nombreModelo = strtoupper(parent::LimpiaCadena($_POST['modelo']));
            $anioModelo = parent::LimpiaCadena($_POST['anio']);
            $consulta = parent::ConsultaSimple("SELECT * FROM modelos WHERE nombre = '$nombreModelo' AND anio='$anioModelo'");
            
            if($consulta->rowCount() >= 1){
                $alerta = [
                    'alerta' => 'simple',
                    'titulo' => 'Modelo Registrado',
                    'texto' =>  'Este modelo ya se encuentra registrado, por favor intente de nuevo',
                    'tipo' => 'error'
                ];
                $alerta= parent::Alerta($alerta);
                
                require_once 'Vistas/Encabezado.php';
                require_once 'Vistas/Contenidos/Vehiculos/Marcas.php';
                require_once 'Vistas/Pie.php';
            } else {
                if($modelo->getId() > 0){
                    $alerta = $this->modeloVehiculo->ActualizarModelo($modelo);
                } else {
                    $alerta = $this->modeloVehiculo->RegistrarModelo($modelo);
                }
                
                $alerta = parent::Alerta($alerta);
                
                
                    require_once 'Vistas/Encabezado.php';
                    require_once 'Vistas/Contenidos/Vehiculos/Marcas.php';
                    require_once 'Vistas/Pie.php';
                
            }
        }
        
        public function BorrarMarca() {
            
            $alerta = $this->modeloVehiculo->Borrar("marcas", $_GET['id']);
            $alerta = parent::Alerta($alerta);
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Vehiculos/Marcas.php';
            require_once 'Vistas/Pie.php';       
        }
        
        public function BorrarModelo() {
            
            $alerta = $this->modeloVehiculo->Borrar("modelos", $_GET['id']);
            $alerta = parent::Alerta($alerta);
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Vehiculos/Marcas.php';
            require_once 'Vistas/Pie.php';       
        }

    }