<div id="contenido-principal">
    <div class="container-fluid">
    
        <h2 class="bg-danger text-light font-weight-normal rounded shadow p-2 text-center">Registro de Orden</h2>
        <hr class="bg-danger">
        <form>
            <div class="form-group">

                <div class="row pl-2">
                    <label for="fecha_emision" class="col-form-label col-md-3"><strong>Fecha: </strong> <?= date("j-n-y h:i:s");?></label>

                    <label for="hora_emision" class="col-form-label col-md-3"><strong>Hora: </strong><?= date("h : i");?></label>
                
                </div>
                
                <hr>
                <h3 class="bg-secondary text-light font-weight-normal rounded shadow p-2 text-center">Vehiculo | Caja</h3>

                <div class="row mt-3 form-group pl-2">
                    <label for="nombre_cliente" class="col-form-label col-md-2"><strong>Propietario:</strong></label>
                    <div class="col-md-3">
                            <h5 class="font-weight-light mt-2"><strong>Jesus Arrieche</strong></h5>
                    </div>

                    <label for="marca" class="col-form-label col-md-1"><strong>Marca:</strong></label>
                    <div class="col-md-1">
                        <h5 class="mt-2">FORD</h5>
                    </div> 

                    <label for="marca" class="col-form-label col-md-1"><strong>Modelo:</strong></label>
                    <div class="col-md-1">
                        <h5 class="mt-2">FIESTA</h5>
                    </div>

                    <label for="marca" class="col-form-label col-md-1"><strong>Año:</strong></label>
                    <div class="col-md-1">
                        <h5 class="mt-2">2001</h5>
                    </div>                        
                </div>

                <div class="row form-group pl-2">
                    <label for="Identificacion" class="col-form-label col-md-2"><strong>Identificacion:</strong></label>
                    <div class="col-md-3">
                            <h5 class="font-weight-light mt-2"><strong>V-26540950</strong></h5>
                    </div>

                    <label for="Identificacion" class="col-form-label col-md-1"><strong>Placa:</strong></label>
                    <div class="col-md-2">
                            <h5 class="font-weight-light mt-2"><strong>V-26540950</strong></h5>
                    </div>

                    <label for="Identificacion" class="col-form-label col-md-1"><strong>S/Caja:</strong></label>
                    <div class="col-md-2">
                            <h5 class="font-weight-light mt-2"><strong>2D2654E6</strong></h5>
                    </div>
                </div>

                <hr>
                <h3 class="bg-secondary text-light font-weight-normal rounded shadow p-2 text-center">Reparacion</h3>     
                <hr>          
                <div class="row pl-2">
                    <label for="desc_reparacion" class="col-form-label col-md-3">Descripcion de Reparacion:</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="descripcion" placeholder="Descripcion de la Reparacion"></textarea>
                    </div>

                    
                </div>
                <hr class="bg-secondary">
                <h3 class="bg-secondary text-light font-weight-normal rounded shadow p-2 text-center">Personal Mecanico</h3>
                <hr class="bg-secondary">

                <div class="row form-group">
                    <label for="mecanico" class="col-form-label col-md-3">Nombre Mecanico:</label>
                    <div class="col-md-5">
                        <select class="form-control" multiple size="3">
                        <?php foreach ( $mecanicos as $mecanico): ?>

                            <option value="<?= $mecanico->id; ?>"><?= $mecanico->nombre . " - " . $mecanico->cargo;?></option>
                            
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <hr class="bg-secondary">
                
                
            </div>

            <hr class="btn-danger">

            <div class="row justify-content-md-center">
                <a href="javascript:history.back(-1);" class="btn btn-secondary m-2"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                <button type="submit" class="btn btn-success m-2">Registrar</button>
                <button type="reset" class="btn btn-danger m-2">Limpiar</button>
            </div>
        </form>

    </div>
</div>