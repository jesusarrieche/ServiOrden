<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Ordenes de Servicio:</h1></center>
        <hr class="bg-danger">
        <div class="row form-group">
            <label for="pripietario" class="col-form-label col-md-1">Propietario:</label>
            <div class="col-md-3 mt-1">
                <strong><?= $propietario->identificacion." ".$propietario->nombre." ".$propietario->apellido;?></strong>
            </div>
            <label for="marca" class="col-form-label col-md-1">Marca:</label>
            <div class="col-md-2 mt-1">
                <strong><?= $propietario->marca;?></strong>
            </div>
            <label for="marca" class="col-form-label col-md-1">Modelo:</label>
            <div class="col-md-2 mt-1">
                <strong><?= $propietario->modelo;?></strong>
            </div>
            <label for="marca" class="col-form-label col-md-1">Año:</label>
            <div class="col-md-1 mt-1">
                <strong><?= $propietario->anio;?></strong>
            </div>
        </div>
        <div class="row form-group">
            <label for="placa" class="col-form-label col-md-1">Placa:</label>
            <div class="col-md-1 mt-1">
                <strong><?= $propietario->placa;?></strong>
            </div>
        </div>
        <div class="row form-group">
            <a href="javascript:history.back(-1);" class="btn btn-secondary m-2"><i class="fas fa-arrow-circle-left"></i> Atras</a>
        </div>
        
        <?php
            if(isset($alerta)){
                echo $alerta;
            }
        ?>
        
        
        <hr class="bg-danger">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-2">

            </div>
        </div>
        <table class="table table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Ordenes Registradas</h4></th>
                </tr>
                <tr>
                    <th><center>#</center></th>
                    <th>Registro</th>
                    <th>Codigo</th>
<!--                    <th>Vehiculo/Caja</th>-->
                    <th>Detalles</th>
                    <th>Revision</th>
                    <th>Observaciones</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $ordenr = 0;
                // var_dump($this->modeloOrden->ListarOrdenes());
                foreach ($ordenes as $orden):
                    $ordenr++;
            ?>
                <tr>
                    <td><?= $ordenr;?></td>
                    <td>
                        <?php
                           $fecha = explode(" ", $orden->fecha_registro);
                           $formato = date("d/m/Y", strtotime($fecha[0]));
                           echo $formato;
                        ?> 
                            
                    </td>
                    <td><?= $orden->codigo;?></td>
              
                    <td>                 
                        <a href="?controlador=Orden&accion=Detalles&id=<?= $orden->id;?>" class="text-dark"><i class="fas fa-eye fa-lg"></i></a>
                    </td>
                    <td>               
                        
                    <?php
                        $inventario = '<a href="?controlador=Orden&accion=ChequeoOrden&id='. $orden->id.'" class="text-secondary ml-5 mr-3"><i class="fas fa-clipboard-list fa-lg"></i></a>';
                        if($orden->serial_motor == "NO APLICA"){
                            
                        } else {
                            echo $inventario;
                        }
                    ?>
                    
                    </td>
                    <td>
                        <a href="?controlador=Orden&accion=Observaciones&id=<?= $orden->id;?>" class="text-secondary ml-3"><i class="fas fa-eye fa-lg"></i></a>        
                    </td>
                    <td>
                        <?php
                            $boton1 = '<button class="btn btn-success" disabled>Completada</button>';
                            $boton2 = '<button class="btn btn-info" disabled>En Proceso</button>';
                            $boton3 = '<button class="btn btn-danger" disabled>Anulada</button>';
                            
                            if(!empty($orden->fecha_anulacion)){
                                echo $boton3;
                            }elseif (empty ($orden->fecha_cierre)) {
                                echo $boton2;
                            } else {
                                echo $boton1;
                            }

                        ?>
                         
                    </td>
    
                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>