<div id="contenido-principal">
    <div class="container-fluid">
        
        <div class="container-fluid">
            
            <div class="row form-group justify-content-center">
                <h1 class="font-weight-normal">Propiedades</h1>
            </div>
            <div class="row form-group">   
                <label for="cliente" class="col-form-label col-md-2">Cliente:</label>
                <div class="col-md-4 pt-1">
                    <strong><?= $cliente->getNombre()." ".$cliente->getApellido();?></strong>
                </div>
            </div>
            <hr class="bg-danger">    
            <div class="row">
                <a href="javascript:history.back(-1);" class="btn btn-secondary btn-lg m-3"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                <a href="?controlador=Vehiculo&accion=RegistroVehiculo&id=<?= $_GET['id']; ?>" class="btn btn-success btn-lg m-3 font-weight-light"><i class="fas fa-car"></i> Registrar Vehiculo </a>
                <a href="?controlador=Vehiculo&accion=RegistroCajaCliente&id=<?= $_GET['id']; ?>" class="btn btn-primary btn-lg m-3 font-weight-light"><i class="fas fa-box"></i> Registrar Caja </a>
            </div>
        </div>
        <hr class="bg-danger">
        
        <table class="table shadow table-striped">
            <thead class="thead-dark">
                <tr>
                    <th colspan="8" class="text-center bg-primary"><h4 class="font-weight-normal">Vehiculos | Cajas</h4></th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Placa</th>
                    <th>Marca | Modelo | Año</th>
                    <th>Ordenes</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $orden = 0;
//                var_dump($this->modeloVehiculo->listarVehiculos());
                foreach ( $vehiculos as $vehiculo):
                    $orden++;
            ?>
                <tr>
                    <td><?= $orden;?></td>
                    <td></td>
                    <td><?= $vehiculo->placa;?></td>
                    <td><?= $vehiculo->marca . " - " .$vehiculo->modelo . " - " . $vehiculo->anio;?></td>
                    <td>
                        <a href="?controlador=Orden&accion=OrdenesPropiedad&id=<?= $vehiculo->id; ?>" class="text-dark"><i class="fas fa-search fa-lg "></i></a>
                    </td>
                    <td><a href="?controlador=Vehiculo" class="text-info"><i class="fas fa-sync fa-lg pl-4"></i></a></td>
                    <td><a href="?controlador=Vehiculo" class="text-danger"><i class="fas fa-trash-alt fa-lg pl-4"></i></a></td>
                </tr>    
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="container-fluid">

        <hr class="bg-danger">
        
       <?php
            if(isset($alerta)){
                echo $alerta;
            }
       ?>
    </div>
</div>