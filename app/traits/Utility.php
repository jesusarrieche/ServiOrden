<?php

namespace App\Traits;

/**
 * Trait General para funciones Helpers
 */
trait Utility {
    
    public function encriptar($cadena){
        $salida=FALSE;
        $password=hash('sha256', CODIGO_PASSWORD); //Genera Valor Cifrado en base a un string
        $vectorInicializacion=substr(hash('sha256', CODIGO_VECTOR), 0, 16);
        $salida=openssl_encrypt($cadena, METODO, $password, 0, $vectorInicializacion);
        $salida=base64_encode($salida);

        return $salida;
    }

    public function desencriptar($cadena){
        $password=hash('sha256', CODIGO_PASSWORD);
        $vectorInicializacion=substr(hash('sha256', CODIGO_VECTOR), 0, 16);
        $salida=openssl_decrypt(base64_decode($cadena), METODO, $password , 0, $vectorInicializacion);

        return $salida;
    }
    
    
    public function limpiaCadena($cadena){
        $cadena=trim($cadena); //Elimina espacios al inicio y al final de la cadena
        $cadena=stripcslashes($cadena); //Elimina Barras Invertidas de la cadena
        $cadena=str_replace('<script>', '', $cadena);
        $cadena=str_replace('</script>', '', $cadena);
        $cadena=str_replace('<script src', '', $cadena);
        $cadena=str_replace('<script type', '', $cadena);
        $cadena=str_replace('SELECT * FROM', '', $cadena);
        $cadena=str_replace('DELETE FROM', '', $cadena);
        $cadena=str_replace('INSERT INTO', '', $cadena);
        $cadena=str_replace('--', '', $cadena);
        $cadena=str_replace('^', '', $cadena);
        $cadena=str_replace('(', '', $cadena);
        $cadena=str_replace(')', '', $cadena);
        $cadena=str_replace('[', '', $cadena);
        $cadena=str_replace(']', '', $cadena);
        $cadena=str_replace('{', '', $cadena);
        $cadena=str_replace('}', '', $cadena);
        $cadena=str_replace('==', '', $cadena);

        return $cadena;
    }

    public function alerta($alerta){
        if($alerta['alerta']== "simple"){
               $aviso= "<script>swal('".$alerta['titulo']."','".$alerta['texto']."','".$alerta['tipo']."')</script>";
           }
           return $aviso;
    }

    public function codigoAleatorio($letra, $logitud, $numero){
        $acum = NULL;
        for($i=0 ; $i<$logitud; $i++){
            $num = rand(0, 9);

            $acum .= $num;
        }

        return $letra.$acum.$numero;
    }
}
