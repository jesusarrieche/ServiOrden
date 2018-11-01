<?php
    
    require_once 'Modelos/Usuario.php';
    require_once 'Modelos/Cliente.php';
    
    class InicioControlador{

        private $modeloUsuario;
        private $modeloCliente;
        public function __construct() {
            $this->modeloUsuario = new Usuario();
            $this->modeloCliente = new Cliente();
        }
       
        public function Inicio(){
            require_once "Vistas/Encabezado.php";
            require_once "Vistas/Contenidos/Inicio/Index.php";
            require_once "Vistas/Pie.php";
        }
        
       
    }