<?php

    class Persona extends Conexion{
        
        private $id;
        private $tipoIdentificacion;
        private $identificacion;
        private $nombre;
        private $apellido;
        private $direccion;
        private $telefono;
        private $correo;
        private $estatus;
        
        public function getTipoIdentificacion() {
            return $this->tipoIdentificacion;
        }

        public function setTipoIdentificacion($tipoIdentificacion) {
            $this->tipoIdentificacion = $tipoIdentificacion;
        }
        
        public function getId(){
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }
        
        public function getIdentificacion() {
            return $this->identificacion;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getApellido() {
            return $this->apellido;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function getTelefono() {
            return $this->telefono;
        }

        public function getCorreo() {
            return $this->correo;
        }

        public function setIdentificacion($identificacion) {
            $this->identificacion = $identificacion;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }

        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }

        public function setCorreo($correo) {
            $this->correo = $correo;
        }
        
        public function getEstatus() {
            return $this->estatus;
        }

        public function setEstatus($estatus) {
            $this->estatus = $estatus;
        }



    }

