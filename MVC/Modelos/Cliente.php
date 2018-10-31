<?php

   require_once 'Modelos/Persona.php';
   
   class Cliente extends Persona{

        public function Contar(){
            try{
                $consulta = Conexion::Conectar()->query("SELECT * FROM clientes WHERE estatus='ACTIVO'")->rowCount();
                return $consulta;
            
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
    
        public function Listar(){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT id, identificacion, nombre, apellido, telefono, estatus FROM clientes WHERE estatus='ACTIVO'");
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
                
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        public function Obtener($id){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT * FROM clientes WHERE id='$id'");
                $consulta->execute();
              
                $registro = $consulta->fetch(PDO::FETCH_OBJ);;
                
                $cliente = new Cliente();
                
                $cliente->setId($registro->id);
                
                $ident = explode("-",$registro->identificacion);
                
                $tipoIden = $ident[0];
                $identificacion = $ident[1];
                
                $cliente->setTipoIdentificacion($tipoIden);
                $cliente->setIdentificacion($identificacion);
                $cliente->setNombre($registro->nombre);
                $cliente->setApellido($registro->apellido);
                $cliente->setDireccion($registro->direccion);
                $cliente->setTelefono($registro->telefono);
                $cliente->setCorreo($registro->correo);
                
                return $cliente;
                  
            } catch (Exception $ex) {
                die($ex->getMessage());
            }      
        }
       
        public function Registrar(Cliente $c){
            try{
                $consulta = Conexion::Conectar()->prepare("INSERT INTO clientes(identificacion, nombre, apellido, direccion, telefono, correo, estatus) "
                    . "VALUES (:identificacion, :nombre, :apellido, :direccion, :telefono, :correo, :estatus)");
            
                //$id = $u->getId();
                $identificacion= $c->getTipoIdentificacion()."-".$c->getIdentificacion();
                $nombre = $c->getNombre();
                $apellido = $c->getApellido();
                $direccion = $c->getDireccion();
                $telefono = $c->getTelefono();
                $correo = $c->getCorreo();
                $estatus = $c->getEstatus();
                
                $consulta->bindParam(":identificacion", $identificacion);
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":apellido", $apellido);
                $consulta->bindParam(":direccion", $direccion);
                $consulta->bindParam(":telefono", $telefono);
                $consulta->bindParam(":correo", $correo);
                $consulta->bindParam(":estatus", $estatus);

                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Cliente registrado satisfactoriamente',
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
                die();
            }
        }

        public function Actualizar(Cliente $c){
            try{
                $consulta = Conexion::Conectar()->prepare("UPDATE clientes SET identificacion=:identificacion, nombre=:nombre, apellido=:apellido, direccion=:direccion, telefono=:telefono, correo=:correo, estatus=:estatus WHERE id=:id");


                $id = $c->getId();
                $identificacion= $c->getTipoIdentificacion()."-".$c->getIdentificacion();
                $nombre = $c->getNombre();
                $apellido = $c->getApellido();
                $direccion = $c->getDireccion();
                $telefono = $c->getTelefono();
                $correo = $c->getCorreo();
                $estatus = "ACTIVO";
                
                $consulta->bindParam(":id", $id);
                $consulta->bindParam(":identificacion", $identificacion);
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":apellido", $apellido);
                $consulta->bindParam(":direccion", $direccion);
                $consulta->bindParam(":telefono", $telefono);
                $consulta->bindParam(":correo", $correo);
                $consulta->bindParam(":estatus", $estatus);

                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Se actualizo el registro correctamente',
                'tipo' => 'success'
                ];
                
                return $alerta;
                
            } catch (Exception $ex) {
                
                // die("Error: " . $ex->getMessage());
            }
        }
        
        public function Borrar($tabla, $id){    //Metodo elimina logicamente un registro
            try{
                $consulta = Conexion::Conectar()->prepare("UPDATE $tabla SET estatus='ELIMINADO' WHERE id=$id");

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