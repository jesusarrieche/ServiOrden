<?php

class persona{
    private $nombre;
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}

class cliente extends persona{
    
    public function mostrar(){
        echo persona::getNombre();
    }
}

$cliente = new cliente();

$cliente->setNombre("Maria");
    
$cliente->mostrar();
