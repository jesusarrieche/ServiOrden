<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PDF</title>

    <style type="text/css">

        .container{
            padding: 0px 0px;
            color:lightslategrey;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

    </style>
</head>
<body>
    <div class="container">

        <table style="width:725px">
            <tbody>
                <tr>
                    <td colspan="4" style="width:50%">
                        <img style="width:375px;height:70px;" src="http://localhost/FrameworkJD/public/assets/img/logo1.png" alt="">
                    </td>
                    <td colspan="4" style="width:50%">
                            <p class="text-right" style="display:block"><strong>Fecha:</strong> <span><i><?= $venta->fecha; ?></i></span></p>
                            <p class="text-right" style="display:block"><strong>Nro Venta:</strong> <span><i><?= $venta->num_venta; ?></i></span></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="8">
                        <h1 class="text-center">DETALLE VENTA</h1>
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td colspan="8">
                        <h3><u>CLIENTE</u></h3>
                    </td>
                </tr>

                <tr>
                    <td colspan="1">
                        <p><strong>NOMBRE:</strong></p>
                    </td>
                    <td colspan="3">
                        <p><?= $venta->cliente;?></p>
                    </td>
                    <td colspan="1">
                        <p><strong>RIF:</strong></p>
                    </td>
                    <td colspan="3">
                        <p><?= $venta->rif_cliente;?></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="1">
                        <p><strong>DIRECCION:</strong></p>
                    </td>
                    <td colspan="7">
                        <p><?= $venta->direccion;?></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="8">
                        <h3 class="text-center"><u>PRODUCTOS</u></h3>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="width:725px;">
                <tr>
                    <th colspan="1" style="width:15%" class="text-center">
                        CANTIDAD
                    </th>
                    <th colspan="2" style="width:15%" class="text-center">
                        CODIGO
                    </th>
                    <th colspan="3" style="width:30%" class="text-center">
                        PRODUCTO
                    </th>
                    <th colspan="2" style="width:20%" class="text-center">
                        PRECIO VENTA
                    </th>
                    <th colspan="2" style="width:20%" class="text-center">
                        IMPORTE
                    </th>
                </tr>
                <tr>
                    <td colspan="10">
                        <hr>
                    </td>
                </tr>

                <?php 

                    $subtotal = 0;

                    foreach($productos AS $producto):

                        $subtotal += $producto->cantidad * $producto->precio;
                ?>

                <tr>
                    <td colspan="1" class="text-center" >
                        <?= $producto->cantidad; ?>
                    </td>
                    <td colspan="2" class="text-center" >
                        <?= $producto->codigo; ?>
                    </td>
                    <td colspan="3" class="text-center" >
                        <?= $producto->nombre; ?>
                    </td>
                    <td colspan="2" class="text-center" >
                        <?= $producto->precio; ?>
                    </td>
                    <td colspan="2" class="text-center" >
                        <?= $producto->precio * $producto->cantidad; ?>
                    </td>
                </tr>

                <?php
                    endforeach;
                ?>

                <!-- <tr>
                    <td colspan="1" class="text-center" >
                        2
                    </td>
                    <td colspan="2" class="text-center" >
                        P135468
                    </td>
                    <td colspan="3" class="text-center" >
                        Caja automatica
                    </td>
                    <td colspan="2" class="text-center" >
                        5000
                    </td>
                    <td colspan="2" class="text-center" >
                        10000
                    </td>
                </tr>

                <tr>
                    <td colspan="1" class="text-center" >
                        2
                    </td>
                    <td colspan="2" class="text-center" >
                        P135468
                    </td>
                    <td colspan="3" class="text-center" >
                        Caja automatica
                    </td>
                    <td colspan="2" class="text-center" >
                        5000
                    </td>
                    <td colspan="2" class="text-center" >
                        10000
                    </td>
                </tr>

                <tr>
                    <td colspan="1" class="text-center" >
                        2
                    </td>
                    <td colspan="2" class="text-center" >
                        P135468
                    </td>
                    <td colspan="3" class="text-center" >
                        Caja automatica
                    </td>
                    <td colspan="2" class="text-center" >
                        5000
                    </td>
                    <td colspan="2" class="text-center" >
                        10000
                    </td>
                </tr> -->

                <tr>
                    <td colspan="8"></td>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td colspan="10">

                    </td>
                </tr>

                <tr>
                    <td colspan="6">
                        <hr>

                    </td>
                    <td colspan="2" class="text-center">
                        <strong>SUB-TOTAL:</strong>
                    </td>
                    <td colspan="2" class="text-center">
                        <strong><?= $subtotal; ?></strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="6">

                    </td>
                    <td colspan="2" class="text-center">
                        <strong>IVA(16.00%):</strong>
                    </td>
                    <td colspan="2" class="text-center">
                        <strong><?= $subtotal* 0.16; ?></strong>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="6">

                    </td>
                    <td colspan="2" class="text-center">
                        <strong>TOTAL:</strong>
                    </td>
                    <td colspan="2" class="text-center">
                        <strong><?= $venta->total; ?></strong>
                    </td>
                </tr>
        </table>

   
        
           
            
    </div>
</body>
</html>