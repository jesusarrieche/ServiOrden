<?php

    class Orden extends Conexion{
        
        private $id;
        private $id_mecanicos = [];
        private $id_accesorios = [];
        private $id_observacion;
        private $id_vehiculo;
        private $codigo;
        private $rutaImagen;
        private $fecha_registro;
        private $fecha_anulacion;
        private $fecha_cierre;
        private $descripcion;
        private $estatus;

        public function getRutaImagen() {
            return $this->rutaImagen;
        }

        public function setRutaImagen($ruta) {
            $this->rutaImagen = $ruta;
        }

        public function getId_observacion(){
            return $this->id_observacion;
        }

        public function setId_observacion($id_observacion){
            $this->id_observacion = $id_observacion;
        }
        
        public function getId_accesorios() {
            return $this->id_accesorios;
        }

        public function setId_accesorios($id_accesorios) {
            array_push($this->id_accesorios, $id_accesorios);
        }
        
        public function getCodigo() {
            return $this->codigo;
        }

        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

                 
        public function getId_mecanicos() {
            return $this->id_mecanicos;
        }

        public function setId_mecanicos($id_mecanicos) {
            array_push($this->id_mecanicos, $id_mecanicos);
        }

        public function getId() {
            return $this->id;
        }

        public function getId_vehiculo() {
            return $this->id_vehiculo;
        }

        public function getFecha_registro() {
            return $this->fecha_registro;
        }

        public function getFecha_anulacion() {
            return $this->fecha_anulacion;
        }

        public function getFecha_cierre() {
            return $this->fecha_cierre;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function getEstatus() {
            return $this->estatus;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setId_vehiculo($id_vehiculo) {
            $this->id_vehiculo = $id_vehiculo;
        }

        public function setFecha_registro($fecha_registro) {
            $this->fecha_registro = $fecha_registro;
        }

        public function setFecha_anulacion($fecha_anulacion) {
            $this->fecha_anulacion = $fecha_anulacion;
        }

        public function setFecha_cierre($fecha_cierre) {
            $this->fecha_cierre = $fecha_cierre;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function setEstatus($estatus) {
            $this->estatus = $estatus;
        }

        public function Contar(){
            try{
                $consulta = Conexion::Conectar()->query("SELECT * FROM ordenes WHERE estatus='ACTIVO'")->rowCount();
                return $consulta;
            
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
                
        public function ListarOrdenes(){
            try {
                $consulta = parent::Conectar()->prepare("SELECT ordenes.id, ordenes.codigo, ordenes.fecha_registro, ordenes.fecha_anulacion, ordenes.fecha_cierre, clientes.nombre, clientes.apellido, vehiculos.serial_motor, vehiculos.placa,marcas.nombre as marca, modelos.nombre as modelo, ordenes.descripcion FROM ordenes
                    JOIN vehiculos on ordenes.id_vehiculos = vehiculos.id
                    JOIN modelos on vehiculos.id_modelos = modelos.id
                    JOIN marcas on modelos.id_marcas = marcas.id
                    JOIN clientes on vehiculos.id_clientes = clientes.id ORDER BY ordenes.fecha_registro ASC");
                
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
                
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        
        public function ObtenerOrden($id){
            try {
                $consulta = parent::Conectar()->prepare("SELECT ordenes.id, ordenes.codigo, ordenes.fecha_registro, ordenes.fecha_anulacion, ordenes.fecha_cierre, clientes.identificacion, clientes.nombre, clientes.apellido, vehiculos.placa, vehiculos.serial_caja ,marcas.nombre as marca, modelos.nombre as modelo, vehiculos.anio, ordenes.descripcion FROM ordenes
                    JOIN vehiculos on ordenes.id_vehiculos = vehiculos.id
                    JOIN modelos on vehiculos.id_modelos = modelos.id
                    JOIN marcas on modelos.id_marcas = marcas.id
                    JOIN clientes on vehiculos.id_clientes = clientes.id
                    WHERE ordenes.id = '$id'");
                
                $consulta->execute();
                
                return $consulta->fetch(PDO::FETCH_OBJ);
                
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        
        public function RegistrarOrden(Orden $orden){
            try {
                $consulta = parent::Conectar()->prepare("INSERT INTO ordenes(id_vehiculos, codigo, descripcion, fecha_registro, estatus) VALUES "
                        . "(:id_vehiculos, :codigo, :descripcion, :fecha_registro, :estatus)");
                
                $id_vehiculos = $orden->getId_vehiculo();
                $codigo = $orden->getCodigo();
                $descripcion = $orden->getDescripcion();
                $fecha_registro = $orden->getFecha_registro();
                $estatus = $orden->getEstatus();
                
                $consulta->bindParam(":id_vehiculos", $id_vehiculos);
                $consulta->bindParam(":codigo", $codigo);
                $consulta->bindParam(":descripcion", $descripcion);
                $consulta->bindParam(":fecha_registro", $fecha_registro);
                $consulta->bindParam(":estatus", $estatus);
                
                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Orden registrada satisfactoriamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
                
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        
        public function RegistrarMecanicosOrden(Orden $empleado){
            
            $idOrden = $empleado->getId();
            
            foreach ($empleado->getId_mecanicos() as $mecanicos){
                try {
                
                    $consulta = parent::Conectar()->prepare("INSERT INTO ordenes_empleados VALUES ('$idOrden', :id_empleados)");

                    $id_mecanicos = $mecanicos;
                    
                    $consulta->bindParam(":id_empleados", $id_mecanicos);   
                    
                    $consulta->execute();

                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
            
            }
        }
        
        public function RegistrarInventarioOrden(Orden $inventario){
            
            $idOrden = $inventario->getId();
            
            foreach ($inventario->getId_accesorios() as $accesorios){
                try {
                    
                    $consulta = parent::Conectar()->prepare("INSERT INTO ordenes_accesorios(id_ordenes, id_accesorios) VALUES ('$idOrden', :id_accesorios)");
                    
                    $id_accesorios = $accesorios;
                    
                    $consulta->bindParam(":id_accesorios", $id_accesorios);
                    
                    $consulta->execute();
                    
                    
                } catch (Exception $ex) {
                    
                }
            }
        }
        
        public function RegistrarObservacion(Orden $observacion){
            try {
                $consulta = parent::Conectar()->prepare("INSERT INTO observaciones(id_ordenes, descripcion, imagen) VALUES (:id_ordenes, :descripcion, :imagen)");
                
                $id_ordenes = $observacion->getId();
                $descripcion = $observacion->getDescripcion();
                $imagen = $observacion->getRutaImagen();
                
                $consulta->bindParam(":id_ordenes", $id_ordenes);
                $consulta->bindParam(":descripcion", $descripcion);
                $consulta->bindParam(":imagen", $imagen);
                
                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Observacion Registrada satisfactoriamente',
                'tipo' => 'success'
                ];
                
            } catch (Exception $ex) {
                die("Error".$ex->getMessage());
            }
        }
        public function AnularOrden($id){
            try{
                $consulta = parent::Conectar()->prepare("UPDATE ordenes SET fecha_anulacion=:fecha_anulacion, estatus='ANULADA' WHERE id='$id'");
                
                $fecha_anulacion = date("j-n-y h:i:s");
                
                $consulta->bindParam(":fecha_anulacion", $fecha_anulacion);
                
                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Orden Anulada satisfactoriamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
            } catch (Exception $ex) {
                die("Error: ". $ex->getMessage());
            }
        }
        
        public function CerrarOrden($id){
            try{
                $consulta = parent::Conectar()->prepare("UPDATE ordenes SET fecha_cierre=:fecha_cierre, estatus='CERRADA' WHERE id='$id'");
                
                $fecha_cierre = date("j-n-y h:i:s");
                
                $consulta->bindParam(":fecha_cierre", $fecha_cierre);
                
                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Orden Cerrada satisfactoriamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
            } catch (Exception $ex) {
                die("Error: ". $ex->getMessage());
            }
        }
        
        public function Borrar($tabla, $id){    //Metodo elimina logicamente un registro
            try{
                $consulta = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE $id");

                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'El registro fue eliminado satisfactoriamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
                
            } catch (Exception $ex) {
                
                die("Error: ". $ex->getMessage());
            }
        }
           
}