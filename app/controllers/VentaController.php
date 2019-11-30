<?php

namespace App\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Salida;
use App\Models\Venta;
use App\Traits\Utility;
use PDO;
use System\Core\Controller;
use System\Core\View;

class VentaController extends Controller{

    private $cliente;
    private $producto;
    private $venta;
    private $salida;

    use Utility;

    public function __construct(){
        $this->cliente = new Cliente;
        $this->producto = new Producto;
        $this->venta = new Venta;
        $this->salida = new Salida;
    }

    public function index(){
        return View::getView('Venta.index');
    }

    public function crear(){

        $num_documento = $this->venta->formatoDocumento($this->venta->ultimoDocumento());
        $clientes = $this->cliente->getAll('clientes', "estatus = 'ACTIVO'");
        $productos = $this->producto->getAll('v_inventario', "estatus = 'ACTIVO' AND stock > 0");
        $iva = $this->producto->getValorColumna('impuestos','valor','id = 2');

        return View::getView('Venta.create', 
            [ 
                'productos' => $productos, 
                'clientes' => $clientes,
                'numeroDocumento' => $num_documento,
                'iva' => $iva
            ]);
    }

    public function listar(){

        $method = $_SERVER['REQUEST_METHOD'];

            if( $method != 'POST'){
            http_response_code(404);
            return false;
            }

            $ventas = $this->venta->listar();

            foreach($ventas as $venta){

                if($venta->estatus == 'ACTIVO'){
                    $venta->estado = "<a href='" . $this->encriptar($venta->id) . "' class='btn btn-success estatus'><i class='fas fa-check-circle'></i> Activa</a>";
                }else{
                    $venta->estado = "<a href='" . $this->encriptar($venta->id) . "' class='btn btn-danger estatus'><i class='fas fa-window-close'></i> Anulada</a>";
                }

                $venta->button = 
                "<a href='/FrameworkJD/venta/mostrar/". $this->encriptar($venta->id) ."' class='mostrar btn btn-info'><i class='fas fa-search'></i></a>".
                "<a href='/FrameworkJD/venta/ventaPDF/". $this->encriptar($venta->id) ."' class='pdf btn btn-danger m-1'><i class='fas fa-file-pdf'></i></a>";
            }

        http_response_code(200);

        echo json_encode([
        'data' => $ventas
        ]);

    }

    public function mostrar($param){

        $idVenta = $this->desencriptar($param);

        $query = $this->venta->query("SELECT v.id, v.num_venta, Date_format(v.fecha,'%d/%m/%Y') AS fecha, Date_format(v.fecha,'%H:%i') AS hora, c.documento AS rif_cliente, c.nombre AS cliente, c.direccion, v.total, v.estatus FROM
            ventas v
                LEFT JOIN
            clientes c
                ON v.cliente_id = c.id
            WHERE v.id = '$idVenta' LIMIT 1");

        $query2 = $this->venta->query("SELECT v.id, p.codigo, p.nombre, s.cantidad, s.precio FROM 
            productos p 
                JOIN
            salidas s
                ON p.id = s.producto_id
                JOIN
            ventas v 
                ON s.venta_id = v.id
            WHERE v.id = '$idVenta'");
            
        // Encabezado Venta
        $venta = $query->fetch(PDO::FETCH_OBJ);

        // Detalles Venta
        $productos = $query2->fetchAll(PDO::FETCH_OBJ);

        http_response_code(200);

        echo json_encode([
            'venta' => $venta,
            'productos' => $productos,
        ]);

        exit();
    }

    public function guardar(){

        $venta = new Venta;

        $num_documento = $this->venta->formatoDocumento($this->venta->ultimoDocumento());

        $venta->setNumeroDocumento($num_documento);
        $venta->setPersonaId($_POST['cliente']);
        $venta->setTotal($_POST['total']);

        $lastId = $venta->registrar($venta);

        $productos = $_POST['productos'];
        $cantidad = $_POST['cantidades'];
        $precio = $_POST['precios'];


        $contador = 0;
        foreach($productos AS $producto){

            $salida = new Salida();
            
            $salida->setProductoId($productos[$contador]);
            $salida->setVentaId($lastId);
            $salida->setCantidad($cantidad[$contador]);
            $salida->setPrecio($precio[$contador]);

            $this->salida->registrar($salida);

            $contador++;
        }

        http_response_code(200);
          
        echo json_encode([
          'titulo' => 'Venta Registrada!',
          'mensaje' => 'Se ha registrado correctamente la venta',
          'tipo' => 'success'
        ]);
  
        exit();

    }

    public function cambiarEstatus($param){
        $id = $this->desencriptar($param);

        $estatus = $this->venta->cambiarEstatus('ventas', $id);

        if($estatus){
            http_response_code(200);

            echo json_encode([
                'titulo' => 'Estatus actualizado',
                'mensaje' => 'Estatus de la venta actualizado correctamente',
                'tipo' => 'success'
            ]);

            exit();
        }else {
            http_response_code(200);

            echo json_encode([
                'titulo' => 'Error al Cambiar estatus',
                'mensaje' => 'Ocurrio un error al intentar cambiar el estatus',
                'tipo' => 'error'
            ]);

            exit();
        }
    }

    public function ventaPDF($param){

        $idVenta = $this->desencriptar($param);

        $query = $this->venta->query("SELECT v.id, v.num_venta, Date_format(v.fecha,'%d/%m/%Y') AS fecha, Date_format(v.fecha,'%H:%i') AS hora, c.documento AS rif_cliente, c.nombre AS cliente, c.direccion, v.total, v.estatus FROM
            ventas v
                LEFT JOIN
            clientes c
                ON v.cliente_id = c.id
            WHERE v.id = '$idVenta' LIMIT 1");

        $query2 = $this->venta->query("SELECT v.id, p.codigo, p.nombre, s.cantidad, s.precio FROM 
            productos p 
                JOIN
            salidas s
                ON p.id = s.producto_id
                JOIN
            ventas v 
                ON s.venta_id = v.id
            WHERE v.id = '$idVenta'");
            
        // Encabezado Venta
        $venta = $query->fetch(PDO::FETCH_OBJ);

        // Detalles Venta
        $productos = $query2->fetchAll(PDO::FETCH_OBJ);

        ob_start();

        View::getViewPDF('FormatosPDF.Venta', [
            'venta' => $venta,
            'productos' => $productos
        ]);

        $html = ob_get_clean();

        $this->crearPDF($html);

    }
}