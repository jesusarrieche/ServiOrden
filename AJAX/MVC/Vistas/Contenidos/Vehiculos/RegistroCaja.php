<div id="contenido-principal">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <h3><center>Registro Caja</center></h3>
                <hr class="bg-danger">
<?php 
    if(isset($alerta)){
        echo $alerta;
    }
?>
                <form action="?controlador=Vehiculo&accion=GuardarVehiculo" method="POST">
                    <div class="row form-group">
                        <label for="propietario" class="col-form-label col-md-4"> <strong>Asignar Propietario:</strong></label>
                    </div>
                    <div class="row form-group">
                        <label for="identificacion" class=" col-form-label col-md-1">Cliente: </label>
                        
                        <div class="col-md-6 p-2">
                            <select class="selectorBusqueda form-control" name="id_cliente" required=>
                                <option value="">-</option>
                        <?php
                            foreach( $this->modeloCliente->Listar() as $cliente):
                        ?>
                            
                                <option value="<?= $cliente->id;?>"><?= $cliente->identificacion . " - " . $cliente->nombre . " ". $cliente->apellido ;?></option>
                                
                        <?php endforeach; ?>   

                            </select>
                        </div>
                    </div>
              
                    <hr class="bg-secondary">
          
                    <div class="row form-group">
                        <label for="marca" class="col-form-label col-md-2 pr-0">Marca | Modelo | Año:</label>
                        <div class="col-md-5 pt-2">
                            <select class="selectorBusqueda form-control" required name="id_modelo">
                                <option value="" selected>-</option>
                                
                        <?php
                            foreach( $modelos as $modelo):
                        ?>
                            
                                <option value="<?= $modelo->id;?>"><?= $modelo->marca;?> - <?= $modelo->modelo;?> - <?= $modelo->anio;?></option>
                        <?php endforeach; ?>
                            </select>
                        </div>  
                    </div>

                    <div class="row form-group">
                    </div>
                    <div class="row form-group">
                        <label for="serial_caja" class="col-form-label col-md-1">S/Caja:</label>
                        <div class="col-md-3">
                            <input type="text" name="serial_caja" class="form-control">
                        </div>

                        <label for="estatus" class="col-form-label col-md-1">Estatus:</label>
                        <div class="col-md-2">
                            <select name="estatus" class="form-control">
                                <option value="ACTIVO">Activo</option>
                                <option value="INACTIVO">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-8">
                            <p class="d-block font-weight-light">Si la caja no posee Serial, deje este campo Vacio</p>
                        </div>
                    </div>

                    

                    <hr class="btn-danger">

                    <div class="row justify-content-md-center">
                        <button type="submit" class="btn btn-success m-2">Enviar</button>
                        <button type="reset" class="btn btn-secondary m-2">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>