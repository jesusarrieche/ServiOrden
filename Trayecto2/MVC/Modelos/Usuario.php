<?php
    
    require_once 'Modelos/Persona.php';

    class Usuario extends Persona{
        
        private $usuario;
        private $password;
        private $privilegio;

        public function getUsuario() {
            return $this->usuario;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getPrivilegio() {
            return $this->privilegio;
        }

        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function setPrivilegio($privilegio) {
            $this->privilegio = $privilegio;
        }
        
        
        public function Contar(){
            try{
                $consulta = Conexion::Conectar()->query("SELECT * FROM usuarios")->rowCount();
                return $consulta;
            
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
        
        public function Listar(){
            $id = $_SESSION['id'];
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT id, identificacion, nombre, apellido, usuario, privilegio, estatus FROM usuarios WHERE id != $id AND estatus='ACTIVO'");
                $consulta->execute();
                
                return $consulta->fetchAll(PDO::FETCH_OBJ);
                
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }

        public function Obtener($id){
            try{
                $consulta = Conexion::Conectar()->prepare("SELECT * FROM usuarios WHERE id='$id'");
                $consulta->execute();
            
                $registro = $consulta->fetch(PDO::FETCH_OBJ);;
                
                $usuario = new Usuario();
                
                $usuario->setId($registro->id);
                
                $ident = explode("-",$registro->identificacion);
                
                $tipoIden = $ident[0];
                $identificacion = $ident[1];
                
                $usuario->setTipoIdentificacion($tipoIden);
                $usuario->setIdentificacion($identificacion);
                $usuario->setNombre($registro->nombre);
                $usuario->setApellido($registro->apellido);
                $usuario->setDireccion($registro->direccion);
                $usuario->setTelefono($registro->telefono);
                $usuario->setCorreo($registro->correo);
                
                $usuario->setUsuario($registro->usuario);
                $usuario->setPassword($registro->password);
                $usuario->setPrivilegio($registro->privilegio);
                
                return $usuario;
                
            } catch (Exception $ex) {
                die($ex->getMessage());
            }    
        }
        
        public function Registrar(Usuario $u){
            try{
                $consulta = Conexion::Conectar()->prepare("INSERT INTO usuarios(identificacion, nombre, apellido, direccion, telefono, correo, usuario, password, privilegio, estatus) "
                    . "VALUES (:identificacion, :nombre, :apellido, :direccion, :telefono, :correo, :usuario, :password, :privilegio, :estatus)");
            
                //$id = $u->getId();
                $identificacion= Conexion::LimpiaCadena($u->getTipoIdentificacion()."-".$u->getIdentificacion());
                $nombre = Conexion::LimpiaCadena($u->getNombre());
                $apellido = Conexion::LimpiaCadena($u->getApellido());
                $direccion = Conexion::LimpiaCadena($u->getDireccion());
                $telefono = Conexion::LimpiaCadena($u->getTelefono());
                $correo = Conexion::LimpiaCadena($u->getCorreo());
                $usuario = Conexion::LimpiaCadena($u->getUsuario());
                $password = $u->getPassword();
                $privilegio = Conexion::LimpiaCadena($u->getPrivilegio());
                $estatus = Conexion::LimpiaCadena($u->getEstatus());
                
                $consulta->bindParam(":identificacion", $identificacion);
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":apellido", $apellido);
                $consulta->bindParam(":direccion", $direccion);
                $consulta->bindParam(":telefono", $telefono);
                $consulta->bindParam(":correo", $correo);
                $consulta->bindParam(":usuario", $usuario);
                $consulta->bindParam(":password", $password);
                $consulta->bindParam(":privilegio", $privilegio);
                $consulta->bindParam(":estatus", $estatus);
                
                $consulta->execute();
                
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Operacion Exitosa...!!!',
                'texto' => 'Usuario registrado satisfactoriamente',
                'tipo' => 'success'
                ];
                
                return $alerta;

                $consulta->execute();
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
        
        public function Actualizar(Usuario $u){
            try{
                $consulta = Conexion::Conectar()->prepare("UPDATE usuarios SET identificacion=:identificacion, nombre=:nombre, apellido=:apellido, direccion=:direccion, telefono=:telefono, correo=:correo, usuario=:usuario, password=:password, privilegio=:privilegio, estatus=:estatus WHERE id=:id");


                $id = $u->getId();
                $identificacion= Conexion::LimpiaCadena($u->getTipoIdentificacion()."-".$u->getIdentificacion());
                $nombre = Conexion::LimpiaCadena($u->getNombre());
                $apellido = Conexion::LimpiaCadena($u->getApellido());
                $direccion = Conexion::LimpiaCadena($u->getDireccion());
                $telefono = Conexion::LimpiaCadena($u->getTelefono());
                $correo = Conexion::LimpiaCadena($u->getCorreo());
                $usuario = Conexion::LimpiaCadena($u->getUsuario());
                $password = Conexion::Encriptar(Conexion::LimpiaCadena($u->getPassword()));
                $privilegio = Conexion::LimpiaCadena($u->getPrivilegio());
                $estatus = Conexion::LimpiaCadena($u->getEstatus());
                
                $consulta->bindParam(":id", $id);
                $consulta->bindParam(":identificacion", $identificacion);
                $consulta->bindParam(":nombre", $nombre);
                $consulta->bindParam(":apellido", $apellido);
                $consulta->bindParam(":direccion", $direccion);
                $consulta->bindParam(":telefono", $telefono);
                $consulta->bindParam(":correo", $correo);
                $consulta->bindParam(":usuario", $usuario);
                $consulta->bindParam(":password", $password);
                $consulta->bindParam(":privilegio", $privilegio);
               // $consulta->bindParam(":imagen", $imagen);
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
        
        public function Borrar($tabla, $id){
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
                $alerta= [
                'alerta' => 'simple',
                'titulo' => 'Error Inesperado...!!!',
                'texto' => 'Se produjo un error al intentar eliminar el registro',
                'tipo' => 'error'
                ];
                
                return $alerta;
                die();
            }
        }

    }