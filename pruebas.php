<?php


class Orden{

    private $descripcion;
    private $id_mecanicos = [];
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    
    public function getId_mecanicos() {
        return $this->id_mecanicos;
    }

    public function setId_mecanicos($id_mecanicos) {
        array_push($this->id_mecanicos, $id_mecanicos);
    }

}


$orden = new Orden();

$orden->setDescripcion($_POST['descripcion']);

if(isset($_POST['id_mecanico'])){
    $id_mecanico = $_POST['id_mecanico'];
                
    if(is_array($id_mecanico)){

        while ( list($llave, $valor) = each($id_mecanico)){
            $orden->setId_mecanicos($valor);
        }
    }
}

foreach ($orden->getId_mecanicos() as $mecanico){
    echo $mecanico . $orden->getDescripcion() ."<br>";
}
            
  