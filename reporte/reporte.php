<?php

 
    require_once '../MVC/Assets/Librerias/PHPExcel.php';
    
        private $driver = "pgsql";
        private $host = "localhost";
        private $dbname = "taller";
        private $user = "postgres";
        private $password = "jd1234";
        
        
        public function Conectar(){
            
                $conexion = new PDO("$this->driver:host=$this->host; dbname=$this->dbname", $this->user, $this->password);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return $conexion;
        }
    
    $consulta = Conexion::Conectar()->prepare("SELECT * FROM clientes");
    $consulta->execute();
    
    $clientes = $consulta->fetchAll(PDO::FETCH_OBJ);
    
    $fila = 2;
    
    $excel = new PHPExcel();
    
    $excel->setProperties()->setCreator("Hidroparts")->setDescription("Reportes de Clientes");
    
    $excel->setActiveSheetIndex(0); // indicamos en la pesta*a donde trabajaremos, iniciando desde el 0 para que sea la primera
    $excel->setActiveSheet()->setTitle("Clientes"); //Establecemos el titulo
    
    //Definimos Encabezados
    
    $excel->setActiveSheet()->setCellValue('A1', 'ID');
    $excel->setActiveSheet()->setCellValue('B1', 'IDENTIFICACION');
    $excel->setActiveSheet()->setCellValue('C1', 'NOMBRE');
    $excel->setActiveSheet()->setCellValue('D1', 'APELLIDO');
    $excel->setActiveSheet()->setCellValue('E1', 'DIRECCION');
    $excel->setActiveSheet()->setCellValue('F1', 'TELEFONO');
    $excel->setActiveSheet()->setCellValue('G1', 'CORREO');
    
    //Imprimimos Resultados (Valores)
    
    foreach ( $clientes as $cliente){
        $excel->setActiveSheet()->setCellValue('A'.$fila , $cliente->id);
        $excel->setActiveSheet()->setCellValue('B'.$fila , $cliente->identificacion);
        $excel->setActiveSheet()->setCellValue('C'.$fila , $cliente->nombre);
        $excel->setActiveSheet()->setCellValue('D'.$fila , $cliente->apellido);
        $excel->setActiveSheet()->setCellValue('E'.$fila , $cliente->direccion);
        $excel->setActiveSheet()->setCellValue('F'.$fila , $cliente->telefono);
        $excel->setActiveSheet()->setCellValue('G'.$fila , $cliente->correo);
        
        $fila++;
    }
    
    //Definimos Cabeceras
    
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Clientes.xlsx"');
    header('Cache-Control: max-age=0');
    
    $imprimir = new PHPExcel_Writer_Excel2007($excel);
    $imprimir->save('php://output');
    
    


