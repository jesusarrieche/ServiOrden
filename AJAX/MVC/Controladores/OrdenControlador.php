<?php
    require_once 'Modelos/Orden.php';
    require_once 'Modelos/Empleado.php';

    class OrdenControlador extends Orden{
        
        private $modeloOrden;
        private $modeloEmpleado;
        
        public function __construct() {
            $this->modeloOrden = new Orden();
            $this->modeloEmpleado = new Empleado;
        }
        
        public function Inicio() {
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/Index.php';
            require_once 'Vistas/Pie.php';
        }

        public function RegistroOrden() {
            
            $mecanicos = parent::ObtenerObjetos("SELECT * FROM EMPLEADOS WHERE cargo='MECANICO' OR cargo='AYUDANTE MECANICO'");
            require_once 'Vistas/Encabezado.php';
            require_once 'Vistas/Contenidos/Ordenes/Registro.php';
            require_once 'Vistas/Pie.php';
        }

    }

