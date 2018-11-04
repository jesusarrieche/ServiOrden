<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1 class="font-weight-normal">Gestion de Ordenes de Servicio</h1></center>
        <hr class="bg-danger">
        <div class="row form-group">
            <a href="?controlador=Orden&accion=RegistroOrden" class="btn btn-success btn-lg m-3">Registrar <i class="fas fa-clipboard"></i></a>
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
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Ordenes Registradas</h4></th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Codigo</th>
                    <th>Registro</th>
                    <th>Cliente</th>
                    <th>Propiedad</th>
                    <th>Detalles</th>
                    <th>Revision</th>
                    <th>Observaciones</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $or= 0;
                // var_dump($this->modeloOrden->ListarOrdenes());
                foreach ($this->modeloOrden->ListarOrdenes() as $orden):
                    $or++;
            ?>
                <tr>
                    <td><?= $or;?></td>
                    <td><?= $orden->codigo;?></td>
                    <td>
                        <?php
                           $fecha = explode(" ", $orden->fecha_registro);
                           $formato = date("d/m/Y", strtotime($fecha[0]));
                           echo $formato;
                        ?>         
                    </td>
                    <td><?= $orden->nombre ." ". $orden->apellido;?></td>
                    <td>
                        <?php
                            if($orden->serial_motor == "NO APLICA"){
                                echo "CAJA";
                            } else {
                                echo "VEHICULO";
                            }
                        ?>
                    </td>
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