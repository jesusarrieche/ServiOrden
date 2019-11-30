<?php

namespace System\Core;

class View {

    public static function getView($path, $key=null, $value=null){

        // Especifico la ruta de la vista
        $path = str_replace('.','/', $path) . '.php';

        // var_dump($path);

        if(!is_null($key)){

            if(is_array($key)){
                extract($key, EXTR_PREFIX_SAME, '');
            }else{
                ${$key} = $value;
            }
        }
        
        // var_dump( VIEWS);

        require VIEWS . 'header.php';
        require VIEWS . 'contents/' . $path;
        require VIEWS . 'footer.php';


    }

    public static function getViewPDF($path, $key=null, $value=null){

        // Especifico la ruta de la vista
        $path = str_replace('.','/', $path) . '.php';

        if(!is_null($key)){

            if(is_array($key)){
                extract($key, EXTR_PREFIX_SAME, '');
            }else{
                ${$key} = $value;
            }
        }
        
        require VIEWS . 'contents/' . $path;
    }
}