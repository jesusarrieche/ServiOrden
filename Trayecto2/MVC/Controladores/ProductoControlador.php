<?php
    // require_once 'Modelos/Orden.php';
    // require_once 'Modelos/Empleado.php';

    class ProductoControlador{
    
        public function __construct() {
        }
        
        public function Inicio() {
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Productos/Index.php';
            require_once 'Vistas/Pie.php';
        }

        public function create(){
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Productos/create.php';
            require_once 'Vistas/Pie.php';
        }
    }

        
            
         