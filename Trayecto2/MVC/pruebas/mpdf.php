<?php

require_once '../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();


$css = file_get_contents('../Assets/css/bootstrap.css');

$mpdf->WriteHTML($css, 1);


$mpdf->Output('reporte.pdf','I');
