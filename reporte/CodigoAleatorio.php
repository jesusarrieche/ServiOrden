<?php

function CodigoAleatorio($letra, $logitud, $numero){
    $acum = NULL;
    for($i=0 ; $i<$logitud; $i++){
        $num = rand(0, 9);
        
        $acum .= $num;
    }
    
    return $letra.$acum.$numero;
}

echo CodigoAleatorio("OR", 5, 1);

