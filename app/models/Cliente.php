<?php

namespace App\Models;

use PDO;

class Cliente extends Persona{

    public function contar(){
        try{
            $consulta = parent::connect()->query("SELECT * FROM clientes WHERE estatus='ACTIVO'")->rowCount();
            return $consulta;
        
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function listar(){
        try{
            $consulta = parent::connect()->prepare("SELECT id, documento, CONCAT(nombre, ' ', apellido) AS nombre, telefono, estatus, created_at FROM clientes WHERE estatus='ACTIVO' ORDER BY created_at DESC");
            $consulta->execute();
            
            return $consulta->fetchAll(PDO::FETCH_OBJ);
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    public function registrar(Cliente $c){
        try{
            $consulta = parent::connect()->prepare("INSERT INTO clientes(documento, nombre, apellido, direccion, telefono, email, estatus) "
                . "VALUES (:documento, :nombre, :apellido, :direccion, :telefono, :email, :estatus)");
        
            //$id = $u->getId();
            $documento= $c->getTipoDocumento()."-".$c->getDocumento();
            $nombre = $c->getNombre();
            $apellido = $c->getApellido();
            $direccion = $c->getDireccion();
            $telefono = $c->getTelefono();
            $email = $c->getEmail();
            $estatus = $c->getEstatus();
            
            $consulta->bindParam(":documento", $documento);
            $consulta->bindParam(":nombre", $nombre);
            $consulta->bindParam(":apellido", $apellido);
            $consulta->bindParam(":direccion", $direccion);
            $consulta->bindParam(":telefono", $telefono);
            $consulta->bindParam(":email", $email);
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

    public function actualizar(Cliente $c){
        try{
            $consulta = parent::connect()->prepare("UPDATE clientes SET documento=:documento, nombre=:nombre, apellido=:apellido, direccion=:direccion, telefono=:telefono, email=:email, estatus=:estatus WHERE id=:id");


            $id = $c->getId();
            $documento= $c->getTipoDocumento()."-".$c->getDocumento();
            $nombre = $c->getNombre();
            $apellido = $c->getApellido();
            $direccion = $c->getDireccion();
            $telefono = $c->getTelefono();
            $email = $c->getEmail();
            $estatus = "ACTIVO";
            
            $consulta->bindParam(":id", $id);
            $consulta->bindParam(":documento", $documento);
            $consulta->bindParam(":nombre", $nombre);
            $consulta->bindParam(":apellido", $apellido);
            $consulta->bindParam(":direccion", $direccion);
            $consulta->bindParam(":telefono", $telefono);
            $consulta->bindParam(":email", $email);
            $consulta->bindParam(":estatus", $estatus);

            return $consulta->execute();
                    
        } catch (Exception $ex) {
            
            // die("Error: " . $ex->getMessage());
        }
    }

}