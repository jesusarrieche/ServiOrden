<?php

namespace App\Models;

use System\Core\Model;

use PDO;

class Producto extends Model {

  private $id;
  private $categoria_id;
  private $unidad_id;
  private $codigo;
  private $nombre;
  private $descripcion;
  private $precio_venta;
  private $precio_porcentaje;
  private $stock;
  private $stock_min;
  private $stock_max;
  private $imagen;
  private $estatus;

  public function __construct(){
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getCategoriaId(){
    return $this->categoria_id;
  }

  public function setCategoriaId($categoria_id){
    $this->categoria_id = $categoria_id;
  }

  public function getUnidadId(){
    return $this->unidad_id;
  }

  public function setUnidadId($categoria_id){
    $this->unidad_id = $categoria_id;
  }

  public function getCodigo(){
    return $this->codigo;
  }

  public function setCodigo($codigo){
    $this->codigo = $codigo;
  }

  public function getNombre(){
    return $this->nombre;
  }

  public function setNombre($nombre){
    $this->nombre = $nombre;
  }

  public function getDescripcion(){
    return $this->descripcion;
  }

  public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
  }

  public function getPrecioVenta(){
    return $this->precio_venta;
  }

  public function setPrecioVenta($precio){
    $this->precio_venta = $precio;
  }

  public function getPrecioPorcentaje(){
    return $this->precio_porcentaje;
  }

  public function setPrecioPorcentaje($porcentaje){
    $this->precio_porcentaje = $porcentaje;
  }

  public function getStock(){
    return $this->stock;
  }

  public function setStock($stock){
    $this->stock = $stock;
  }

  public function getStockMin(){
    return $this->stock_min;
  }

  public function setStockMin($stock_min){
    $this->stock_min = $stock_min;
  }

  public function getStockMax(){
    return $this->stock_max;
  }

  public function setStockMax($stock_max){
    $this->stock_max = $stock_max;
  }

  public function getImagen(){
    return $this->imagen;
  }

  public function setImagen($imagen){
    $this->imagen = $imagen;
  }

  public function getEstatus(){
    return $this->estatus;
  }

  public function setEstatus($estatus){
    $this->estatus = $estatus;
  }

  


  /**
   * Metodos
   */

  public function listar(){
    try{
      $sql = 
     "SELECT * FROM v_inventario";

        $consulta = parent::connect()->prepare($sql);
        $consulta->execute();
        
        return $consulta->fetchAll(PDO::FETCH_OBJ);
        
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
  }

  public function buscarProductoCodigo($codigo){
    try {
      $sql = "SELECT * FROM productos WHERE codigo= '$codigo' LIMIT 1";

      $query = parent::connect()->prepare($sql)->execute();

      return $query->fetch(PDO::FETCH_OBJ);

    } catch (Exception $ex) {
        die($ex->getMessage());
    }
  }
  
  public function registrar(Producto $producto){
      try{
          $consulta = parent::connect()->prepare("INSERT INTO productos(codigo, categoria_id, unidad_id, nombre, descripcion, precio_porcentaje, stock_min, stock_max, estatus) "
              . "VALUES (:codigo, :categoria_id, :unidad_id, :nombre, :descripcion, :precio_porcentaje, :stock_min, :stock_max, :estatus)");
      
      
          // $id = $producto->getId();
          $codigo = $producto->getCodigo();
          $categoria_id = $producto->getCategoriaId();
          $unidad_id = $producto->getUnidadId();
          $nombre = $producto->getNombre();
          $descripcion = $producto->getDescripcion();
          $precio_porcentaje = $producto->getPrecioPorcentaje();
          $stock_min = $producto->getStockMin();
          $stock_max = $producto->getStockMax();
          $imagen = $producto->getImagen();
          $estatus = 'ACTIVO';
          
          $consulta->bindParam(":codigo", $codigo);
          $consulta->bindParam(":categoria_id", $categoria_id);
          $consulta->bindParam(":unidad_id", $unidad_id);
          $consulta->bindParam(":nombre", $nombre);
          $consulta->bindParam(":descripcion", $descripcion);
          $consulta->bindParam(":precio_porcentaje", $precio_porcentaje);
          $consulta->bindParam(":stock_min", $stock_min);  
          $consulta->bindParam(":stock_max", $stock_max);
          $consulta->bindParam(":estatus", $estatus);                    

          
          return $consulta->execute();
          
      } catch (Exception $ex) {
          return $ex->getMessage();
      }
  }

  public function actualizar(Producto $producto){
      try{
          $consulta = parent::connect()->prepare("UPDATE productos SET codigo=:codigo, categoria_id=:categoria, unidad_id=:unidad, nombre=:nombre, descripcion=:descripcion, precio_porcentaje=:precio_porcentaje, stock_min=:stock_min, stock_max=:stock_max, estatus=:estatus WHERE id=:id");

          $id = $producto->getId();
          $codigo = $producto->getCodigo();
          $categoria_id = $producto->getCategoriaId();
          $unidad_id = $producto->getUnidadId();
          $nombre = $producto->getNombre();
          $precio_porcentaje = $producto->getPrecioPorcentaje();
          $descripcion = $producto->getDescripcion();
          $stock_min = $producto->getStockMin();
          $stock_max = $producto->getStockMax();
          $estatus = "ACTIVO";
          
          $consulta->bindParam(":id", $id);

          $consulta->bindParam(":codigo", $codigo);
          $consulta->bindParam(":categoria", $categoria_id);
          $consulta->bindParam(":unidad", $unidad_id);
          $consulta->bindParam(":nombre", $nombre);
          $consulta->bindParam(':descripcion', $descripcion);
          $consulta->bindParam(":precio_porcentaje", $precio_porcentaje);
          $consulta->bindParam(":stock_min", $stock_min);  
          $consulta->bindParam(":stock_max", $stock_max);
          $consulta->bindParam(":estatus", $estatus);

          return $consulta->execute();
                  
      } catch (Exception $ex) {
          return $ex->getMessage();            
      }
  }

  
}
