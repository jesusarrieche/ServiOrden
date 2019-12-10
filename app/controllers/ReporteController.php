<?php

namespace App\Controllers;

use App\Models\Compra;
use App\Models\Venta;
use App\Traits\Utility;
use PDO;
use System\Core\Controller;
use System\Core\View;

class ReporteController extends Controller {

    private $compra;
    private $venta;
	
	use Utility;

	public function __construct(){
        $this->compra = new Compra;
        $this->venta = new Venta;
    }
    
    public function index(){
        return View::getView('Reporte.index');
    }

    public function compras($producto){

        $query = $this->compra->query("SELECT c.num_compra, Date_format(c.fecha,'%d/%m/%Y') AS fecha, p.razon_social FROM
            compras c
                JOIN
            proveedores p
                ON c.proveedor_id = p.id
            WHERE c.estatus = 'ACTIVO'");

        $compras = $query->fetchAll(PDO::FETCH_OBJ);

        return View::getView('Reporte.compras', ['compras' => $compras]);
    }

    public function totalTransacciones(){
        $query = $this->compra->query("SELECT SUM(c.total) AS egresos FROM
            compras c
            WHERE c.estatus = 'ACTIVO'");

        $egresos = $query->fetch(PDO::FETCH_COLUMN);

        $query2 = $this->compra->query("SELECT COUNT(c.id) AS compras FROM
            compras c
            WHERE c.estatus = 'ACTIVO'");

        $compras = $query2->fetch(PDO::FETCH_COLUMN);

        $query3 = $this->venta->query("SELECT SUM(v.total) AS ingresos FROM
            ventas v
            WHERE v.estatus = 'ACTIVO'");

        $ingresos = $query3->fetch(PDO::FETCH_COLUMN);

        $query4 = $this->venta->query("SELECT COUNT(v.id) AS ventas FROM
            ventas v
            WHERE v.estatus = 'ACTIVO'");

        $ventas = $query4->fetch(PDO::FETCH_COLUMN);



        return View::getView('Reporte.totalTransacciones', [
            'compras' => $compras,
            'egresos' => $egresos,
            'ventas' => $ventas,
            'ingresos' => $ingresos
            ]);
    }

}