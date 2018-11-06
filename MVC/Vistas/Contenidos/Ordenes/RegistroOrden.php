<div id="contenido-principal">
    <div class="container-fluid">
    
        <h2 class="bg-danger text-light font-weight-normal rounded shadow p-2 text-center">Registro de Orden</h2>
        <hr class="bg-danger">
        <form action="?controlador=Orden&accion=GuardarOrden" method="POST" class="formulario">
            <div class="form-group">
                <div class="row pl-2">
                    <label for="fecha_emision" class="col-form-label col-md-3"><strong>Fecha: </strong> <?= date("j-n-y");?></label>

                    <label for="hora_emision" class="col-form-label col-md-3"><strong>Hora: </strong><?= date("h : i");?></label>
                
                </div>
                
                <hr>
                <h3 class="bg-secondary text-light font-weight-normal rounded shadow p-2 text-center">Vehiculo | Caja</h3>
                
                <div class="row mt-3 form-group pl-2">
                    <label for="vehiculo/caja" class="col-form-label col-md-3"></label>
                    <label for="vehiculo/caja" class="col-form-label col-md-9">Placa &nbsp; &nbsp; | &nbsp; &nbsp; Marca &nbsp; &nbsp; | &nbsp; &nbsp; Modelo &nbsp; &nbsp; | &nbsp; &nbsp; Año &nbsp; &nbsp; | &nbsp; &nbsp; Propietario </label>
                </div>
                <div class="row mt-3 form-group pl-2">
                    <label for="vehiculo/caja" class="col-form-label col-md-3">Seleccione Vehiculo/Caja:</label>
                    <div class="col-md-9 p-1">
                        <select class="form-control selectorBusqueda" name="id_vehiculo">
                            <?php
                                foreach($vehiculos as $vehiculos):
                            ?>
                                <option value="<?= $vehiculos->id;?>"><?=$vehiculos->placa." - ".$vehiculos->marca." - ".$vehiculos->modelo." - ".$vehiculos->anio." ----->  ".$vehiculos->identificacion."-".$vehiculos->nombre." ".$vehiculos->apellido;?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
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
                        <select class="form-control" name="id_mecanico[]" multiple size="3" required>
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
                <button type="submit" class="btn btn-success m-2" id="enviar">Registrar</button>
                <button type="reset" class="btn btn-danger m-2">Limpiar</button>
            </div>
        </form>

    </div>
</div>