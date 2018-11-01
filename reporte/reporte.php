<?php

 
    require_once '../MVC/Assets/Librerias/PHPExcel.php';
            
        
        function Conectar(){
            
                $conexion = new PDO("pgsql:host=localhost; dbname=taller", "postgres", "jd1234");
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return $conexion;
        }
    
    $consulta = Conectar()->prepare("SELECT * FROM clientes");
    $consulta->execute();
    
    $clientes = $consulta->fetchAll(PDO::FETCH_OBJ);
    
    $fila = 2;
    
    $excel = new PHPExcel();
    
//    $excel->setProperties()->setCreator("Hidroparts")->setDescription("Reportes de Clientes");
    
    $excel->setActiveSheetIndex(0); // indicamos en la pesta*a donde trabajaremos, iniciando desde el 0 para que sea la primera
    $excel->setActiveSheetIndex(0)->setTitle("Clientes"); //Establecemos el titulo
    
    //Definimos Encabezados
    
    $excel->setActiveSheetIndex(0)->setCellValue('A1', 'ID');
    $excel->setActiveSheetIndex(0)->setCellValue('B1', 'IDENTIFICACION');
    $excel->setActiveSheetIndex(0)->setCellValue('C1', 'NOMBRE');
    $excel->setActiveSheetIndex(0)->setCellValue('D1', 'APELLIDO');
    $excel->setActiveSheetIndex(0)->setCellValue('E1', 'DIRECCION');
    $excel->setActiveSheetIndex(0)->setCellValue('F1', 'TELEFONO');
    $excel->setActiveSheetIndex(0)->setCellValue('G1', 'CORREO');
    
    //Imprimimos Resultados (Valores)
    
    foreach ( $clientes as $cliente){
        $excel->setActiveSheetIndex(0)->setCellValue('A'.$fila , $cliente->id);
        $excel->setActiveSheetIndex(0)->setCellValue('B'.$fila , $cliente->identificacion);
        $excel->setActiveSheetIndex(0)->setCellValue('C'.$fila , $cliente->nombre);
        $excel->setActiveSheetIndex(0)->setCellValue('D'.$fila , $cliente->apellido);
        $excel->setActiveSheetIndex(0)->setCellValue('E'.$fila , $cliente->direccion);
        $excel->setActiveSheetIndex(0)->setCellValue('F'.$fila , $cliente->telefono);
        $excel->setActiveSheetIndex(0)->setCellValue('G'.$fila , $cliente->correo);
        
        $fila++;
    }
    
    //Definimos Cabeceras
    
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Clientes.xlsx"');
    header('Cache-Control: max-age=0');
    
    $imprimir = new PHPExcel_Writer_Excel2007($excel);
    $imprimir->save('php://output');
    
    


