<?php
    require_once 'Modelos/Persona.php';

    class Empleado extends Persona{
        
        private $cargo;
        
        public function getCargo() {
            return $this->cargo;
        }

        public function setCargo($cargo) {
            $this->cargo = $cargo;
        }

        public function Contar(){
        try{
            $consulta = Conexion::Conectar()->query("SELECT * FROM empleados")->rowCount();
            return $consulta;
        
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        }
    
        public function Listar(){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT id, identificacion, nombre, apellido, telefono, cargo, estatus FROM empleados");
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
                
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        public function Obtener($id){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT * FROM empleados WHERE id='$id'");
                $consulta->execute();
              
                $registro = $consulta->fetch(PDO::FETCH_OBJ);;
                
                $empleado = new Empleado();
                
                $empleado->setId($registro->id);
                
                $ident = explode("-",$registro->identificacion);
                
                $tipoIden = $ident[0];          //Divide Identificiacion (inicial y numeros)
                $identificacion = $ident[1];
                
                $empleado->setTipoIdentificacion($tipoIden);    //Insertando datos en objeto Empleado
                $empleado->setIdentificacion($identificacion);
                $empleado->setNombre($registro->nombre);
                $empleado->setApellido($registro->apellido);
                $empleado->setDireccion($registro->direccion);
                $empleado->setTelefono($registro->telefono);
                $empleado->setCorreo($registro->correo);
                $empleado->setCargo($registro->cargo);
                $empleado->setEstatus($registro->estatus);

                return $empleado;   //Retorna el objeto Eempleado con lo datos Obtenidos con el Id
                  
            } catch (Exception $ex) {
                die($ex->getMessage());
            }

            
        }
       
        public function Registrar(Empleado $e){
            try{
                $consulta = Conexion::Conectar()->prepare("INSERT INTO empleados(identificacion, nombre, apellido, direccion, telefono, correo, cargo, estatus) "
                    . "VALUES (:identificacion, :nombre, :apellido, :direccion, :telefono, :correo, :cargo, :estatus)");
            
          
                $identificacion= $e->getTipoIdentificacion()."-".$e->getIdentificacion();
                $nombre = $e->getNombre();
                $apellido = $e->getApellido();
                $direccion = $e->getDireccion();
                $telefono = $e->getTelefono();
                $correo = $e->getCorreo();
                $cargo = $e->getCargo();
                $estatus = $e->getEstatus();
                
                $consulta->bindParam(":identificacion", $identificacion);
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":apellido", $apellido);
                $consulta->bindParam(":direccion", $direccion);
                $consulta->bindParam(":telefono", $telefono);
                $consulta->bindParam(":correo", $correo);
                $consulta->bindParam(":cargo", $cargo);
                $consulta->bindParam(":estatus", $estatus);

                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Empleado registrado satisfactoriamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
                
            } catch (Exception $ex) {
                // die("Error: ". $ex->getMessage());
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Error Inesperado...!!!',
                'texto' => 'Se produjo un error inesperado, Por favor verifique los datos e intente nuevamente',
                'tipo' => 'error'
                ];
                
                return $alerta;
            }
        }

        public function Actualizar(Empleado $e){
            try{
                $consulta = Conexion::Conectar()->prepare("UPDATE empleados SET identificacion=:identificacion, nombre=:nombre, apellido=:apellido, direccion=:direccion, telefono=:telefono, correo=:correo, cargo=:cargo, estatus=:estatus WHERE id=:id");


                $id = $e->getId();
                $identificacion= $e->getTipoIdentificacion()."-".$e->getIdentificacion();
                $nombre = $e->getNombre();
                $apellido = $e->getApellido();
                $direccion = $e->getDireccion();
                $telefono = $e->getTelefono();
                $correo = $e->getCorreo();
                $cargo = $e->getCargo();
                $estatus = $e->getEstatus();
                
                $consulta->bindParam(":id", $id);
                $consulta->bindParam(":identificacion", $identificacion);
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":apellido", $apellido);
                $consulta->bindParam(":direccion", $direccion);
                $consulta->bindParam(":telefono", $telefono);
                $consulta->bindParam(":correo", $correo);
                $consulta->bindParam(":cargo", $cargo);
                $consulta->bindParam(":estatus", $estatus);

                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Empleado actualizado correctamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
                
            } catch (Exception $ex) {
                
                die("Error: ". $ex->getMessage());
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Error Inesperado...!!!',
                'texto' => 'Se Produjo un Error al intentar Modificar los Datos',
                'tipo' => 'error'
                ];
                
                return $alerta;
            }
        }
        
        public function Borrar($id){
            try{
                $consulta = Conexion::Conectar()->prepare("DELETE FROM empleados WHERE id='$id'");
                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'El registro fue eliminado satisfactoriamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
                
            } catch (Exception $ex) {
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Error Inesperado...!!!',
                'texto' => 'Se produjo un error al intentar eliminar el registro',
                'tipo' => 'error'
                ];
                
                return $alerta;
            }
        }
        
    }

