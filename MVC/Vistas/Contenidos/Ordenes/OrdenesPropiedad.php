<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Ordenes de Servicio:</h1></center>
        <hr class="bg-danger">
        <div class="row form-group">
            <label for="pripietario" class="col-form-label col-md-2">Propietario:</label>
            <div class="col-md-4">
                <strong>Jesus Arrieche</strong>
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
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Ordenes Registradas</h4></th>
                </tr>
                <tr>
                    <th><center>#</center></th>
                    <th>Registro Cierre</th>
                    <th>Cliente</th>
                    <th>Vehiculo/Caja</th>
                    <th>Descripcion</th>
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
                    <td><?= $orden->nombre ." ". $orden->apellido;?></td>
                    <td><?= $orden->placa." - ".$orden->marca ." - ".$orden->modelo?></td>
                    <td><?= $orden->descripcion;?></td>
    
                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>