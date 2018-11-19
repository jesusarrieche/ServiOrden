<?php
    class Vehiculo extends Conexion{

        private $id;
        private $id_cliente;
        private $id_marca;
        private $id_modelo;
        private $placa;
        private $serial_motor;
        private $serial_carroceria;
        private $serial_caja;
        private $color;
        private $marca;
        private $modelo;
        private $anio;
        private $estatus;

        public function getId() {
            return $this->id;
        }

        public function getPlaca() {
            return $this->placa;
        }

        public function getSerial_motor() {
            return $this->serial_motor;
        }

        public function getSerial_carroceria() {
            return $this->serial_carroceria;
        }

        public function getSerial_caja() {
            return $this->serial_caja;
        }

        public function getColor() {
            return $this->color;
        }

        public function getMarca() {
            return $this->marca;
        }

        public function getModelo() {
            return $this->modelo;
        }

        public function getAnio() {
            return $this->anio;
        }

        public function getEstatus() {
            return $this->estatus;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setPlaca($placa) {
            $this->placa = $placa;
        }

        public function setSerial_motor($serial_motor) {
            $this->serial_motor = $serial_motor;
        }

        public function setSerial_carroceria($serial_carroceria) {
            $this->serial_carroceria = $serial_carroceria;
        }

        public function setSerial_caja($serial_caja) {
            $this->serial_caja = $serial_caja;
        }

        public function setColor($color) {
            $this->color = $color;
        }

        public function setMarca($marca) {
            $this->marca = $marca;
        }

        public function setModelo($modelo) {
            $this->modelo = $modelo;
        }

        public function setAnio($anio) {
            $this->anio = $anio;
        }

        public function setEstatus($estatus) {
            $this->estatus = $estatus;
        }
        
        public function getId_cliente() {
            return $this->id_cliente;
        }

        public function getId_modelo() {
            return $this->id_modelo;
        }

        public function setId_cliente($id_cliente) {
            $this->id_cliente = $id_cliente;
        }

        public function setId_modelo($id_modelo) {
            $this->id_modelo = $id_modelo;
        }
        
        public function getId_marca() {
            return $this->id_marca;
        }

        public function setId_marca($id_marca) {
            $this->id_marca = $id_marca;
        }

        
        
        
        public function Contar(){
            try{
                $consulta = Conexion::Conectar()->query("SELECT * FROM vehiculos")->rowCount();
                return $consulta;

            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        public function ListarVehiculos(){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT vehiculos.id, vehiculos.id_modelos AS id_modelos, vehiculos.serial_motor, clientes.nombre, clientes.apellido, vehiculos.placa, marcas.nombre AS marca, modelos.nombre AS  modelo, vehiculos.estatus from clientes
                                                JOIN vehiculos ON id_clientes = clientes.id
                                                JOIN modelos ON  vehiculos.id_modelos = modelos.id
                                                JOIN marcas ON modelos.id_marcas = marcas.id ORDER BY clientes.nombre ASC;");
                $consulta->execute();

                return $consulta->fetchAll(PDO::FETCH_OBJ);

            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        
        public function ListarMarcas(){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT * FROM marcas WHERE estatus='ACTIVO' ORDER BY nombre ASC");
                $consulta->execute();

                return $consulta->fetchAll(PDO::FETCH_OBJ);

            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        public function ListarModelos($id){
            try{
            
                $consulta = Conexion::Conectar()->prepare("SELECT * FROM modelos WHERE id_marcas='$id' AND estatus='ACTIVO'");
                
                $consulta->execute();

                return $consulta->fetchAll(PDO::FETCH_OBJ);

            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        public function ObtenerVehiculo($id){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT * FROM vehiculos WHERE id='$id'");
                $consulta->execute();

                $registro = $consulta->fetch(PDO::FETCH_OBJ);;

                $vehiculo = new Vehiculo();

                $vehiculo->setId($registro->id);
                $vehiculo->setId_cliente($registro->id_clientes);
                $vehiculo->setPlaca($registro->placa);
                $vehiculo->setSerial_motor($registro->serial_motor);
                $vehiculo->setSerial_carroceria($registro->serial_carroceria);
                $vehiculo->setSerial_caja($registro->serial_caja);
                $vehiculo->setColor($registro->color);
                $vehiculo->setId_modelo($registro->id_modelos);
                $vehiculo->setAnio($registro->anio);
                $vehiculo->setEstatus($registro->estatus);

                return $vehiculo;

            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        
        public function ObtenerCaja($id){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT * FROM vehiculos WHERE id='$id'");
                $consulta->execute();

                $registro = $consulta->fetch(PDO::FETCH_OBJ);;

                $caja = new Vehiculo();

                $caja->setId($registro->id);
                $caja->setPlaca($registro->placa);
                $caja->setSerial_caja($registro->serial_caja);
                $caja->setId_cliente($registro->id_clientes);
                $caja->setId_modelo($registro->id_modelos);
                $caja->setAnio($registro->anio);
                $caja->setEstatus($registro->estatus);

                return $caja;

            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        
        public function ObtenerMarca($id){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT * FROM marcas WHERE id='$id'");
                $consulta->execute();

                $registro = $consulta->fetch(PDO::FETCH_OBJ);;

                $marca = new Vehiculo();    //Se utiliza un objeto Vehiculo para traer datos de Marcas

                $marca->setId($registro->id);
                $marca->setMarca($registro->nombre); // Campo nombre de la tabla Marcas
                $marca->setEstatus($registro->estatus);

                return $marca;

            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        
        public function ObtenerModelo($id){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT * FROM modelos WHERE id='$id'");
                $consulta->execute();

                $registro = $consulta->fetch(PDO::FETCH_OBJ);;

                $modelo = new Vehiculo();    //Se utiliza un objeto Vehiculo para traer datos de Modelos

                $modelo->setId($registro->id);
                $modelo->setModelo($registro->nombre);
                $modelo->setEstatus($registro->estatus);

                return $modelo;

            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
            
        public function RegistrarVehiculo(Vehiculo $v){
            try{
                $consulta = Conexion::Conectar()->prepare("INSERT INTO vehiculos(id_modelos, id_clientes, placa, serial_motor, serial_carroceria, serial_caja, color, anio, estatus) "
                    . "VALUES (:id_modelos, :id_clientes, :placa, :serial_motor, :serial_carroceria, :serial_caja, :color, :anio, :estatus)");

                $id_modelos = $v->getId_modelo();
                $id_clientes = $v->getId_cliente();
                $placa = $v->getPlaca();
                $serial_motor = $v->getSerial_motor();
                $serial_carroceria = $v->getSerial_carroceria();
                $serial_caja = $v->getSerial_caja();
                $color = $v->getColor();
                $anio = $v->getAnio();
                $estatus = $v->getEstatus();

                $consulta->bindParam(":id_modelos", $id_modelos);
                $consulta->bindParam(":id_clientes", $id_clientes);
                $consulta->bindParam(":placa", $placa);
                $consulta->bindParam(":serial_motor", $serial_motor);
                $consulta->bindParam(":serial_carroceria", $serial_carroceria);
                $consulta->bindParam(":serial_caja", $serial_caja);
                $consulta->bindParam(":color", $color);
                $consulta->bindParam(":anio", $anio);
                $consulta->bindParam(":estatus", $estatus);

                $consulta->execute();

                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Vehiculo registrado satisfactoriamente',
                'tipo' => 'success'
                ];

                return $alerta;

                } catch (Exception $ex) {

                    $alerta= [
                   'alerta' => 'simple',
                    'titulo' => 'Error Inesperado...!!!',
                    'texto' => 'Se produjo un error inesperado, Por favor verifique los datos e intente nuevamente',
                    'tipo' => 'error'
                    ];
        
                   return $alerta;
                    die($ex->getMessage());
                }
        }

        public function RegistrarMarca(Vehiculo $marca){
            try {
                $consulta = parent::Conectar()->prepare("INSERT INTO marcas(nombre, estatus) VALUES (:nombre, :estatus)");
                
                $nombre = $marca->getMarca();
                $estatus = $marca->getEstatus();
                
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":estatus", $estatus);
                
                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Marca registrada satisfactoriamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function RegistrarModelo(Vehiculo $modelo){
            try {
                $consulta = parent::Conectar()->prepare("INSERT INTO modelos(id_marcas, nombre, estatus) VALUES (:id_marcas, :nombre, :estatus)");
                
                $id_marcas = $modelo->getId_marca();
                $nombre = $modelo->getModelo();
                $estatus = $modelo->getEstatus();
                
                $consulta->bindParam(":id_marcas", $id_marcas);
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":estatus", $estatus);
                
                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Modelo registrado satisfactoriamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
            } catch (Exception $exc) {
                die($exc->getMessage());
            }
        }
        
        public function ActualizarMarca(Vehiculo $marca){
            try{
                $consulta = Conexion::Conectar()->prepare("UPDATE marcas SET nombre=:nombre, estatus=:estatus WHERE id=:id");

                $id = $marca->getId();
                $nombre = $marca->getMarca();
                $estatus = $marca->getEstatus();

                $consulta->bindParam(":id", $id);
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":estatus", $estatus);

                $consulta->execute();

                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Se Actualizo el registro correctamente',
                'tipo' => 'success'
                ];

                return $alerta;

            } catch (Exception $ex) {

                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Error Inesperado...!!!',
                'texto' => 'Se Produjo un Error al intentar Modificar los Datos',
                'tipo' => 'error'
                ];

                return $alerta;
                die();
            }
        }
        
        public function ActualizarModelo(Vehiculo $modelo){
            try{
                $consulta = Conexion::Conectar()->prepare("UPDATE modelos SET nombre=:nombre, estatus=:estatus WHERE id=:id");

                $id = $modelo->getId();
                $nombre = $modelo->getModelo();
                $estatus = $modelo->getEstatus();

                $consulta->bindParam(":id", $id);
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":estatus", $estatus);

                $consulta->execute();

                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Se Actualizo el registro correctamente',
                'tipo' => 'success'
                ];

                return $alerta;

            } catch (Exception $ex) {

                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Error Inesperado...!!!',
                'texto' => 'Se Produjo un Error al intentar Modificar los Datos',
                'tipo' => 'error'
                ];

                return $alerta;
                die();
            }
        }
        
        public function ActualizarCaja(Vehiculo $caja){
            try{
                $consulta = Conexion::Conectar()->prepare("UPDATE vehiculos SET id_clientes=:id_clientes, id_modelos=:id_modelos, anio=:anio, placa=:placa, serial_caja=:serial_caja WHERE id=:id");
                
                $id = $caja->getId();
                
                $id_cliente = $caja->getId_cliente();
                $id_modelo = $caja->getId_modelo();
                $anio = $caja->getAnio();
                $placa = $caja->getPlaca();
                $serial_caja = $caja->getSerial_caja();
                
                $consulta->bindParam(":id", $id);
                $consulta->bindParam(":id_clientes", $id_cliente);
                $consulta->bindParam(":id_modelos", $id_modelo);
                $consulta->bindParam(":anio", $anio);
                $consulta->bindParam(":placa", $placa);
                $consulta->bindParam(":serial_caja", $serial_caja);

                $consulta->execute();

                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Se Actualizo el registro correctamente',
                'tipo' => 'success'
                ];

                return $alerta;

            } catch (Exception $ex) {

               // $alerta= [
               // 'alerta' => 'simple',
               // 'titulo' => 'Error Inesperado...!!!',
               // 'texto' => 'Se Produjo un Error al intentar Modificar los Datos',
               // 'tipo' => 'error'
               // ];

               // return $alerta;
                die($ex->getMessage());
            }
        }
          
        public function Borrar($tabla, $id) {
           try{
               $consulta = parent::Conectar()->prepare("UPDATE $tabla SET estatus='ELIMINADO' WHERE id='$id'");
               $consulta->execute();
               
               $alerta= [
               'alerta' => 'simple',
               'titulo' => 'Registro Eliminado',
               'texto' => 'El Registro fue eliminado satisfactoriamente',
               'tipo' => 'success'
               ];
               
               return $alerta;
           } catch (Exception $ex) {
                die("Error :". $ex->getMessage());
           }
        }
        
        

	}
?>