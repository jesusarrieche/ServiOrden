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
                        <label for="propietario" class="col-form-label col-md-4"> <strong>Propietario:</strong></label>
                    </div>
                    <div class="row form-group">
                        <label for="identificacion" class=" col-form-label col-md-1">Cliente: </label>
                        <input name="id_cliente" value="<?= $cliente->getId();?>" hidden>
                        <div class="col-md-6 p-2">
                            <strong>
                                <?= $cliente->getTipoIdentificacion()."-".$cliente->getIdentificacion()." ".$cliente->getNombre()." ".$cliente->getApellido() ;?>
                            </strong>
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
                        <label class="col-form-label col-md-2">Placa Vehiculo</label>
                        <div class="col-md-3">
                            <input type="text" name="placa" class="form-control" pattern="[A-Za-z0-9]{7}" title="Se Admiten solo numeros y letras" required>
                        </div>

                        <label for="serial_caja" class="col-form-label col-md-1">S/Caja:</label>
                        <div class="col-md-3">
                            <input type="text" name="serial_caja" class="form-control">
                        </div>

                        <input name="estatus" value="ACTIVO" hidden>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-8">
                            <p class="d-block font-weight-light text-danger">Si la caja no posee Serial, deje el campo Vacio</p>
                        </div>
                    </div>

                    

                    <hr class="btn-danger">

                    <div class="row justify-content-md-center">
                        <a href="javascript:history.back(-1);" class="btn btn-secondary m-2"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                        <button type="submit" class="btn btn-success m-2">Enviar</button>
                        <button type="reset" class="btn btn-secondary m-2">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>