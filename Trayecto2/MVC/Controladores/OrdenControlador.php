<?php
    require_once 'Modelos/Orden.php';
    require_once 'Modelos/Empleado.php';

    class OrdenControlador extends Orden{
        
        private $modeloOrden;
        private $modeloEmpleado;
        
        public function __construct() {
            $this->modeloOrden = new Orden();
            $this->modeloEmpleado = new Empleado;
        }
        
        public function Inicio() {
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/Index.php';
            require_once 'Vistas/Pie.php';
        }

        public function OrdenesPropiedad() {
            $id = $_GET['id'];
            $propietario = parent::ObtenerObjeto("select clientes.identificacion, clientes.nombre, clientes.apellido, vehiculos.placa, marcas.nombre as marca, modelos.nombre as modelo, vehiculos.anio from clientes
                    join vehiculos on vehiculos.id_clientes = clientes.id
                    join modelos on vehiculos.id_modelos = modelos.id
                    join marcas on modelos.id_marcas = marcas.id
                    where vehiculos.id= $id");
            
            $ordenes = parent::ObtenerObjetos("SELECT ordenes.id, ordenes.codigo, ordenes.fecha_registro, ordenes.fecha_anulacion, ordenes.fecha_cierre, clientes.nombre, clientes.apellido, vehiculos.serial_motor, vehiculos.placa,marcas.nombre as marca, modelos.nombre as modelo, ordenes.descripcion FROM ordenes
                    JOIN vehiculos on ordenes.id_vehiculos = vehiculos.id
                    JOIN modelos on vehiculos.id_modelos = modelos.id
                    JOIN marcas on modelos.id_marcas = marcas.id
                    JOIN clientes on vehiculos.id_clientes = clientes.id WHERE vehiculos.id = $id");
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/OrdenesPropiedad.php';
            require_once 'Vistas/Pie.php';
        }

        public function ChequeoOrden() {
            $id = $_GET['id'];
            $accesorios = parent::ObtenerObjetos("select accesorios.nombre, accesorios.id from accesorios
                                                  join ordenes_accesorios on accesorios.id = ordenes_accesorios.id_accesorios
                                                  where ordenes_accesorios.id_ordenes = '$id'");

            $orden = $this->modeloOrden->ObtenerOrden($id);
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/Chequeo.php';
            require_once 'Vistas/Pie.php';
        }
        
        public function Detalles(){
            $id = $_GET['id'];
            $orden = $this->modeloOrden->ObtenerOrden($id);
            
            $fecha = explode(" ", $orden->fecha_registro);
            $fechaRegistro = date("d/m/Y", strtotime($fecha[0]));
            $horaRegistro = date("h:i", strtotime($fecha[1]));
            
            if($orden->fecha_anulacion != null){
                $fecha = explode(" ", $orden->fecha_anulacion);
                $fechaAnulacion = date("d/m/y", strtotime($fecha[0]));
                $horaAnulacion = date("h:i", strtotime($fecha[1]));
            }
            
            if($orden->fecha_cierre != null){
                $fecha = explode(" ", $orden->fecha_cierre);
                $fechaCierre = date("d/m/y", strtotime($fecha[0]));
                $horaCierre = date("h:i", strtotime($fecha[1]));
            }
            
            $mecanicos = parent::ObtenerObjetos("select empleados.identificacion, empleados.nombre, empleados.apellido, empleados.cargo, empleados.estatus from empleados
                                                join ordenes_empleados on empleados.id = ordenes_empleados.id_empleados
                                                where ordenes_empleados.id_ordenes = '$id'");
            
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/Detalles.php';
            require_once 'Vistas/Pie.php';
        }

        public function Observaciones() {
            $id = $_GET['id'];
            $observaciones = parent::ObtenerObjetos("SELECT * FROM observaciones WHERE id_ordenes=$id");
            $orden = $this->modeloOrden->ObtenerOrden($id);
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/Observaciones.php';
            require_once 'Vistas/Pie.php';
        }

        public function RegistroObservacion(){
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/RegistroObservacion.php';
            require_once 'Vistas/Pie.php';
        }

        public function RegistroInventario() {
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/RegistroInventario.php';
            require_once 'Vistas/Pie.php';
        }

        public function RegistroOrden() {
            
            $mecanicos = parent::ObtenerObjetos("SELECT * FROM EMPLEADOS WHERE estatus='ACTIVO' AND cargo='MECANICO' OR cargo='AYUDANTE MECANICO'");
            $vehiculos = parent::ObtenerObjetos("select vehiculos.id, clientes.identificacion, clientes.nombre, clientes.apellido, vehiculos.placa, vehiculos.anio, marcas.nombre as marca, modelos.nombre as modelo from clientes 
                                                join vehiculos on clientes.id = vehiculos.id_clientes
                                                join modelos on vehiculos.id_modelos = modelos.id
                                                join marcas on modelos.id_marcas = marcas.id");
            
            
            require_once 'Vistas/Encabezado.php';
            if(isset($_GET['id_vehiculo'])){
                $id_vehiculo = parent::LimpiaCadena($_GET['id_vehiculo']);
                $vehiculo = parent::ObtenerObjetos("select vehiculos.id, clientes.identificacion, clientes.nombre, clientes.apellido, vehiculos.placa, marcas.nombre as marca, modelos.nombre as modelo, modelos.anio from clientes 
                                                join vehiculos on clientes.id = vehiculos.id_clientes
                                                join modelos on vehiculos.id_modelos = modelos.id
                                                join marcas on modelos.id_marcas = marcas.id where vehiculos.id = '$id_vehiculo'");
                require_once 'Vistas/Contenidos/Ordenes/RegistroOrdenVehiculo.php';
            }
            require_once 'Vistas/Contenidos/Ordenes/RegistroOrden.php';
            require_once 'Vistas/Pie.php';
        }

        public function GuardarOrden(){
            $orden = new Orden();
            
            $orden->setId_vehiculo(parent::LimpiaCadena($_POST['id_vehiculo']));
            
            $numero = parent::ConsultaSimple("SELECT * FROM ordenes")->rowCount() + 1;
            $orden->setCodigo(parent::CodigoAleatorio("OR", 5, $numero));
            $orden->setFecha_registro(date("j-n-y h:i:s"));
            $orden->setDescripcion(parent::LimpiaCadena($_POST['descripcion']));
            $orden->setEstatus("ACTIVO");
            
            $alerta = $this->modeloOrden->RegistrarOrden($orden);
       
            if(isset($_POST['id_mecanico'])){
                $id_mecanico = $_POST['id_mecanico'];
                if(is_array($id_mecanico)){
                    
                    while ( list($llave, $valor) = each($id_mecanico)){
                        $orden->setId_mecanicos($valor);
                    }
                }
            }
            
            $idOrden = parent::ObtenerObjeto("SELECT max(id) as id FROM ordenes");
            
            $orden->setId($idOrden->id);
            
            $this->modeloOrden->RegistrarMecanicosOrden($orden);
            
            $alerta = parent::Alerta($alerta); 
            
            if(!empty($alerta)){
                require_once 'Vistas/Encabezado.php';
                require_once 'Vistas/Contenidos/Ordenes/Index.php';
                require_once 'Vistas/Pie.php';  
            } else {
                header("location:?controlador=Orden");
            }
        }
        
        public function GuardarInventario(){
            
            $orden = new Orden();
            
            $orden->setId($_POST['id']);
            
            $inventario = $_POST['inventario'];
            
            if(is_array($inventario)){
                while (list($llave, $valor) = each($inventario)){
                    $orden->setId_accesorios($valor);
                }
            }
            
            
            $this->modeloOrden->RegistrarInventarioOrden($orden);
            
            $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Inventario registrado satisfactoriamente',
                'tipo' => 'success'
                ];
            
            $alerta= parent::Alerta($alerta);
            
            if(!empty($alerta)){
                require_once 'Vistas/Encabezado.php';
                require_once 'Vistas/Contenidos/Ordenes/Index.php';
                require_once 'Vistas/Pie.php';  
            } else {
                header("location:?controlador=Orden");
            }
        }
        
        public function GuardarObservacion(){
            $observacion = new Orden();
             
            $id_orden = $_POST['id_orden'];
            $observacion->setId($id_orden);
            $observacion->setDescripcion($_POST['descripcion']);
            
            $ruta = "./Salidas/ImgObservaciones/";
            $archivo = $_FILES['imagen']['tmp_name'];
            $nombreArchivo = $_FILES['imagen']['name'];
            
            $extension = explode('.', $nombreArchivo);
            $extension = array_pop($extension);
            
            $numero = parent::ConsultaSimple("SELECT * FROM observaciones")->rowCount()+1;
            $nombre = parent::CodigoAleatorio("OB", 5, $numero);
            
            //Movemos el archivo a la carpeta
            move_uploaded_file($archivo, $ruta.$nombre.'.'.$extension);
            
            //guardamos la ruta y la setteamos
            $ruta = $ruta.$nombre.'.'.$extension;
            
            $observacion->setRutaImagen($ruta);

            
//            var_dump($observacion);
            
            $this->modeloOrden->RegistrarObservacion($observacion);
            
            header("location:?controlador=Orden&accion=Observaciones&id=$id_orden");
            
                      
        }
        
        public function Anular(){
            $id= $_GET['id'];
            
            $alerta = $this->modeloOrden->AnularOrden($id);
            $alerta = parent::Alerta($alerta);
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/Index.php';
            require_once 'Vistas/Pie.php';
            
        }
        
        public function Cerrar(){
            $id= $_GET['id'];
            
            $alerta = $this->modeloOrden->CerrarOrden($id);
            $alerta = parent::Alerta($alerta);
            
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/Index.php';
            require_once 'Vistas/Pie.php';
            
        }
        
        public function BorrarAccesorio(){
            
            $id= $_GET['id'];
            $id_accesorio = $_GET['id_accesorio'];
            $this->modeloOrden->Borrar("ordenes_accesorios", "id_accesorios=".$id_accesorio);
          
            header("location:?controlador=Orden&accion=ChequeoOrden&id=$id");
        }
        
        public function BorrarObservacion(){
            $id= $_GET['id'];
            $id_orden = $_GET['id_orden'];
            $this->modeloOrden->Borrar("observaciones", "id=".$id);
          
            header("location:?controlador=Orden&accion=Observaciones&id=$id_orden");

        }
    }

