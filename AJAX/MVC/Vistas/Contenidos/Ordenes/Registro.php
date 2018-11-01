<div id="contenido-principal">
    <div class="container-fluid">
    
        <h2 class="bg-success text-light font-weight-normal rounded shadow p-2 text-center">Registro de Orden</h2>
        <hr class="bg-danger">
        <form>
            <div class="form-group">

                <div class="row">
                    <label for="fecha_emision" class="col-form-label col-md-3"><strong>Fecha: </strong> <?= date("j / n / y");?></label>

                    <label for="hora_emision" class="col-form-label col-md-3"><strong>Hora: </strong><?= date("h : i");?></label>
                
                </div>
                
                <hr>
                <h3 class="bg-secondary text-light font-weight-normal rounded shadow p-2 text-center">Vehiculo</h3>

                <div class="row mt-3">
                    <label for="nombre_cliente" class="col-form-label col-md-2"><strong>Propietario:</strong></label>
                    <div class="col-md-4">
                            <h5 class="font-weight-light mt-2"><strong>Jesus Arrieche</strong></h5>
                    </div>

                       
                </div>
                <hr>
                <h3 class="bg-secondary text-light font-weight-normal rounded shadow p-2 text-center">Inventario</h3>     
                <hr>          
                <h2>Reparacion</h2>
                

                <div class="row">
                    <label for="desc_reparacion" class="col-form-label col-md-3">Descripcion de Reparacion:</label>
                    <div class="col-md-8">
                        <input type="texarea" name="" class="form-control">
                    </div>

                    
                </div>
                <hr class="bg-secondary">
                <h2>Personal Mecanico</h2>
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
                <button type="submit" class="btn btn-danger m-2">Registrar</button>
                <button type="reset" class="btn btn-secondary m-2">Limpiar</button>
            </div>
        </form>

    </div>
</div>