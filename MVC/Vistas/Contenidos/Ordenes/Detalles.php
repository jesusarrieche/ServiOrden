<div id="contenido-principal">
    <div class="container-fluid">
   
        <h2 class="bg-info text-light font-weight-normal rounded shadow p-2 text-center">Detalles de Orden</h2>
        <hr class="bg-danger">
        <form>
            <div class="form-group">
               
                <div class="row pl-2">
                    <label for="fecha_emision" class="col-form-label col-md-6"><strong>Fecha de Registro: <?=$fechaRegistro;?> </strong></label>
                    <label for="fecha_emision" class="col-form-label col-md-6"><strong> Hora: </strong><?= $horaRegistro;?></label>
                </div>
                <div class="row pl-2">
                    <label for="fecha_anulacion" class="col-form-label col-md-6"><strong>Fecha de Anulacion: </strong> <?php if(isset($fechaAnulacion)){ echo $fechaAnulacion;}?></label>
                    <label for="fecha_anulacion" class="col-form-label col-md-6"><strong> Hora: </strong><?php if(isset($horaAnulacion)){ echo $horaAnulacion;}?></label>
                </div>
                <div class="row pl-2">
                    <label for="fecha_cierre" class="col-form-label col-md-6"><strong>Fecha de Cierre: </strong> <?php if(isset($fechaCierre)){ echo $fechaCierre;}?></label>
                    <label for="fecha_cierre" class="col-form-label col-md-6"><strong> Hora: </strong><?php if(isset($horaCierre)){ echo $horaCierre;}?></label>
                </div>
                
                <hr>
                <h3 class="bg-secondary text-light font-weight-normal rounded shadow p-2 text-center">Vehiculo | Caja</h3>

                <div class="row mt-3 form-group pl-2">
                    <label for="nombre_cliente" class="col-form-label col-md-2"><strong>Propietario:</strong></label>
                    <div class="col-md-3">
                            <h5 class="font-weight-light mt-2"><strong><?= $orden->nombre." ".$orden->apellido ;?></strong></h5>
                    </div>

                    <label for="marca" class="col-form-label col-md-1"><strong>Marca:</strong></label>
                    <div class="col-md-1">
                        <h5 class="mt-2"><?= $orden->marca;?></h5>
                    </div> 

                    <label for="marca" class="col-form-label col-md-1"><strong>Modelo:</strong></label>
                    <div class="col-md-1">
                        <h5 class="mt-2"><?= $orden->modelo;?></h5>
                    </div>

                    <label for="marca" class="col-form-label col-md-1"><strong>Año:</strong></label>
                    <div class="col-md-1">
                        <h5 class="mt-2"><?= $orden->anio;?></h5>
                    </div>                        
                </div>

                <div class="row form-group pl-2">
                    <label for="Identificacion" class="col-form-label col-md-2"><strong>Identificacion:</strong></label>
                    <div class="col-md-3">
                            <h5 class="font-weight-light mt-2"><strong><?= $orden->identificacion;?></strong></h5>
                    </div>

                    <label for="Identificacion" class="col-form-label col-md-1"><strong>Placa:</strong></label>
                    <div class="col-md-2">
                            <h5 class="font-weight-light mt-2"><strong><?= $orden->placa;?></strong></h5>
                    </div>

                    <label for="Identificacion" class="col-form-label col-md-1"><strong>S/Caja:</strong></label>
                    <div class="col-md-2">
                        <h5 class="font-weight-light mt-2"><strong><?php if (isset($orden->serial_caja)){ echo $orden->serial_caja;}?></strong></h5>
                    </div>
                </div>

                <hr>
                <h3 class="bg-secondary text-light font-weight-normal rounded shadow p-2 text-center">Reparacion</h3>     
                <hr>          
                <div class="row pl-2">
                    <label for="desc_reparacion" class="col-form-label col-md-3">Descripcion de Reparacion:</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="descripcion" disabled><?= $orden->descripcion;?></textarea>
                    </div>

                    
                </div>
                <hr class="bg-secondary">
                <h3 class="bg-secondary text-light font-weight-normal rounded shadow p-2 text-center">Personal Mecanico</h3>
                <hr class="bg-secondary">

                <div class="row form-group">
                    <label for="mecanico" class="col-form-label col-md-3">Mecanicos Asignados:</label>
                    <div class="col-md-9">
                    <?php
                        foreach ($mecanicos as $mecanico):
                    ?>
                        <div class="row">
                            <strong><?= $mecanico->identificacion." - ".$mecanico->nombre." ".$mecanico->apellido." - ".$mecanico->cargo;?></strong>
                        </div>
                    <?php 
                        endforeach;
                    ?>
                    </div>
                </div>

                <hr class="bg-secondary">
                
                
            </div>

            <hr class="btn-danger">

            <div class="row justify-content-md-center">
                <a href="?controlador=Orden" class="btn btn-secondary m-2"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                <a href="?controlador=Orden&accion=Anular&id=<?= $_GET['id'];?>" class="btn btn-danger m-2">Anular Orden</a>
                <a href="?controlador=Orden&accion=Cerrar&id=<?= $_GET['id'];?>" class="btn btn-success m-2">Cerrar Orden</a>

            </div>
        </form>

    </div>
</div>