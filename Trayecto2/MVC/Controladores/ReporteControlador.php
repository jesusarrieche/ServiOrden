<?php
	
    require_once 'Modelos/Conexion.php';
    require_once 'Modelos/Orden.php';


    class ReporteControlador extends Conexion{
        private $modeloOrden;

        public function __construct(){
            $this->modeloOrden= new Orden();
        }

        public function Inicio(){
            require_once "Vistas/Encabezado.php";
            require_once "Vistas/Contenidos/Reportes/Index.php";
            require_once "Vistas/Pie.php";
        }

        public function GenerarReporte(){

            $reporte = $_POST['reporte'];
            $fechaInicial = $_POST['fechaInicial'];
            $fechaFinal = $_POST['fechaFinal'];

            var_dump($fechaInicial);
            var_dump($fechaFinal);
            var_dump($reporte);

            if ($reporte == 'ABIERTAS') {
                $consulta = parent::ObtenerObjetos("SELECT ordenes.codigo, ordenes.descripcion, ordenes.fecha_registro, vehiculos.placa FROM ordenes
                                                    JOIN vehiculos on vehiculos.id = ordenes.id_vehiculos
                                                    WHERE fecha_registro BETWEEN '$fechaInicial' AND '$fechaFinal' AND ordenes.estatus='ACTIVO'");
                
//                var_dump($consulta);
            } elseif ($reporte == 'ANULADAS') {
                $consulta = parent::ObtenerObjetos("SELECT ordenes.codigo, ordenes.descripcion, ordenes.fecha_registro, vehiculos.placa FROM ordenes
                                                    JOIN vehiculos on vehiculos.id = ordenes.id_vehiculos
                                                    WHERE fecha_anulacion BETWEEN '$fechaInicial' AND '$fechaFinal' AND ordenes.estatus='ANULADA'");
//                var_dump($consulta);

            } else {
                $consulta = parent::ObtenerObjetos("SELECT ordenes.codigo, ordenes.descripcion, ordenes.fecha_registro, vehiculos.placa FROM ordenes
                                                    JOIN vehiculos on vehiculos.id = ordenes.id_vehiculos
                                                    WHERE fecha_cierre BETWEEN '$fechaInicial' AND '$fechaFinal' AND ordenes.estatus='CERRADA'");
//                var_dump($consulta);

            }
            
            $registros = $consulta;

            $html = '<div id="titulo">
                        <h3>
                                REPORTE DE ORDENES '.$reporte.'
                        </h3>
                    </div>

                    <div class="contenedor">
                            <table>
                                    <thead>
                                            <tr bgcolor="#D55C5C">
                                                    <th>#</th>
                                                    <th>CODIGO</th>
                                                    <th>FECHA REGISTRO</th>
                                                    <th>PLACA</th>
                                                    <th>DESCRIPCION</th>
                                            </tr>
                                    </thead>
                                    <tbody>';
//                        var_dump($registros);
                                    $ordenL = 0;
                                    foreach ( $registros as $orden){
                                        $ordenL++;
                                        
                                        $fecha = explode(" ", $orden->fecha_registro);
                                        $formato = date("d/m/Y", strtotime($fecha[0]));
                                        
                                        $html.= '<tr>
                                                    <th>'.$ordenL.'</th>
                                                    <th>'.$orden->codigo.'</th>
                                                    <th>'.$formato.'</th>
                                                    <th>'.$orden->placa.'</th>
                                                    <th>'.$orden->descripcion.'</th>
                                                </tr>';
                                    }
            
                                    $html.= '
                                            
                                            
                                    </tbody>
                            </table>
                    </div>';
            
            $estilos = file_get_contents('Salidas/Reportes/estilos.css');
            
            $pdf = new \Mpdf\Mpdf();
            
            $pdf->SetFooter('{PAGENO}');
            $pdf->WriteHTML($estilos, 1);
            $pdf->WriteHTML($html, 2);
            $pdf->Output("Reporte.pdf",'I');
            
            
        }
    }
?>