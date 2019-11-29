<?php

namespace App\Controllers;

use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Entrada;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Traits\Utility;
use PDO;
use System\Core\Controller;
use System\Core\View;

class CompraController extends Controller{

    private $cliente;
    private $producto;
    private $proveedor;
    private $compra;
    private $entrada;

    use Utility;

    public function __construct(){
        $this->cliente = new Cliente;
        $this->producto = new Producto;
        $this->proveedor = new Proveedor;
        $this->compra = new Compra;
        $this->entrada = new Entrada;
    }

    public function index(){
        return View::getView('Compra.index');
    }

    public function create(){

        $num_documento = $this->compra->formatoDocumento($this->compra->ultimoDocumento());
        $proveedores = $this->proveedor->getAll('proveedores', "estatus = 'ACTIVO'");
        $productos = $this->producto->getAll('v_inventario', "estatus = 'ACTIVO'");

        return View::getView('Compra.create', 
            [ 
                'productos' => $productos, 
                'proveedores' => $proveedores,
                'numeroDocumento' => $num_documento
            ]);
    }

    public function listar(){

        $method = $_SERVER['REQUEST_METHOD'];

            if( $method != 'POST'){
            http_response_code(404);
            return false;
            }

            $compras = $this->compra->listar();

            foreach($compras as $compra){

                if($compra->estatus == 'ACTIVO'){
                    $compra->estado = "<button class='btn btn-success'><i class='fas fa-check-circle'></i> Activa</button>";
                }else{
                    $compra->estado = "<button class='btn btn-danger'><i class='fas fa-window-close'></i> Anulada</button>";
                }

                $compra->button = 
                "<a href='/FrameworkJD/compra/mostrar/". $this->encriptar($compra->id) ."' class='mostrar btn btn-info'><i class='fas fa-search'></i></a>".
                "<a href='#' class='editar btn btn-danger m-1'><i class='fas fa-file-pdf'></i></a>";
                // "<a href='". $this->encriptar($compra->id) ."' class='eliminar btn btn-danger'><i class='fas fa-trash-alt'></i></a>";

            }

        http_response_code(200);

        echo json_encode([
        'data' => $compras
        ]);

    }

    public function mostrar($param){

        $idCompra = $this->desencriptar($param);

        $query = $this->compra->query("SELECT c.id, c.num_compra, Date_format(c.fecha,'%d/%m/%Y') AS fecha, Date_format(c.fecha,'%H:%i') AS hora, p.documento AS rif_proveedor, p.razon_social AS proveedor, p.direccion, c.estatus FROM
            compras c
                LEFT JOIN
            proveedores p
                ON c.proveedor_id = p.id
            WHERE c.id = '$idCompra' LIMIT 1");

        $query2 = $this->compra->query("SELECT c.id, p.codigo, p.nombre, e.cantidad, e.precio FROM 
            productos p 
                JOIN
            entradas e
                ON p.id = e.producto_id
                JOIN
            compras c 
                ON e.compra_id = c.id
            WHERE c.id = '$idCompra'");
            
        // Encabezado Compra
        $compra = $query->fetch(PDO::FETCH_OBJ);

        // Detalles Compra
        $productos = $query2->fetchAll(PDO::FETCH_OBJ);

        http_response_code(200);

        echo json_encode([
            'compra' => $compra,
            'productos' => $productos,
        ]);

        exit();
    }

    public function guardar(){

        $compra = new Compra;

        $num_documento = $this->compra->formatoDocumento($this->compra->ultimoDocumento());

        $compra->setNumeroDocumento($num_documento);
        $compra->setDocumentoReferencia($this->limpiaCadena($_POST['documentoReferencia']));
        $compra->setPersonaId($_POST['proveedor']);
        $compra->setTotal($_POST['total']);

        $lastId = $compra->registrar($compra);

        $productos = $_POST['productos'];
        $cantidad = $_POST['cantidades'];
        $precio = $_POST['precios'];


        $contador = 0;
        foreach($productos AS $producto){

            $entrada = new Entrada();
            
            $entrada->setProductoId($productos[$contador]);
            $entrada->setCompraId($lastId);
            $entrada->setCantidad($cantidad[$contador]);
            $entrada->setPrecio($precio[$contador]);

            $this->entrada->registrar($entrada);

            $contador++;
        }

        http_response_code(200);
          
        echo json_encode([
          'titulo' => 'Compra Registrada!',
          'mensaje' => 'Se ha registrado correctamente la compra',
          'tipo' => 'success'
        ]);
  
        exit();

    }

    public function buscarCliente($identificacion){
        $cliente = $this->cliente->query("SELECT * FROM CLIENTES WHERE documento = $identificacion")->fetch();
        
        echo json_encode([
            'cliente' => $cliente
        ]);
    }
}