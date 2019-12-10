<?php

namespace App\Models;

use Exception;
use PDO;
use System\Core\Model;

class Usuario extends Persona{

    private $usuario;
    private $password;
    private $rol_id;

    public function __construct(){
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    public function getPassword(){
        return $this->usuario;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getRolId(){
        return $this->usuario;
    }

    public function setRolId($rol_id){
        $this->rol_id = $rol_id;
    }

    public function listar(){
        try{
            $consulta = parent::connect()->prepare("SELECT u.id, u.documento, CONCAT(u.nombre, ' ', u.apellido) AS nombre, u.usuario, r.nombre AS rol, u.telefono, u.estatus FROM 
                usuarios u
                    JOIN
                roles r
                    ON r.id = u.rol_id
                WHERE u.estatus='ACTIVO' ORDER BY u.created_at DESC");
            $consulta->execute();
            
            return $consulta->fetchAll(PDO::FETCH_OBJ);
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function registrar(Usuario $usuario){
        try{

            $dbh = parent::connect();

            $consulta = $dbh->prepare("INSERT INTO usuarios(documento, nombre, apellido, direccion, telefono, email, usuario, password)" 
                                                            . "VALUES (:documento, :nombre, :apellido, :direccion, :telefono, :email, :usuario, :password)");

            $documento = $usuario->getDocumento();
            $nombre = $usuario->getNombre();
            $apellido = $usuario->getApellido();
            $direccion = $usuario->getDireccion();
            $telefono = $usuario->getTelefono();
            $email = $usuario->getEmail();
            $usuario_name = $usuario->getUsuario();
            $password = $usuario->getPassword();

            $consulta->bindParam(":documento", $documento);
            $consulta->bindParam(":nombre", $nombre);
            $consulta->bindParam(":apellido", $apellido);
            $consulta->bindParam(":direccion", $direccion);
            $consulta->bindParam(":telefono", $telefono);
            $consulta->bindParam(":email", $email);
            $consulta->bindParam(":usuario", $usuario_name);
            $consulta->bindParam(":password", $password);

            return $consulta->execute();

        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }
}