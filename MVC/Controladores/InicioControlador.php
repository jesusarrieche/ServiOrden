<?php
    
    require_once 'Modelos/Usuario.php';
    require_once 'Modelos/Cliente.php';
    require_once 'Modelos/Orden.php';
    
    class InicioControlador{

        private $modeloUsuario;
        private $modeloCliente;
        private $modeloOrden;

        public function __construct() {
            $this->modeloUsuario = new Usuario();
            $this->modeloCliente = new Cliente();
            $this->modeloOrden = new Orden();
        }
       
        public function Inicio(){
            require_once "Vistas/Encabezado.php";
            require_once "Vistas/Contenidos/Inicio/Index.php";
            require_once "Vistas/Pie.php";
        }
        
        public function GenerarPDF(){
            
            ob_start();
            include 'Vistas/pdf.php';
         
            $dompdf = new Dompdf\Dompdf();
            
            $dompdf->set_paper("A4", "portrait");
            
            $dompdf->loadHtml(ob_get_clean());

            // $dompdf->set_base_path("Assets/pdf/bootstrap.min.css");
            
            $dompdf->render();
            
            $dompdf->stream('Orden.pdf');
            
            
        }
       
    }