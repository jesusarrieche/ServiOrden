<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Observaciones</h1></center>
        <hr class="bg-danger">
        <div class="row form-group">
            <label for="pripietario" class="col-form-label col-md-1">Propietario:</label>
            <div class="col-md-3 mt-1">
                <strong><?=$orden->nombre." ".$orden->apellido;?></strong>
            </div>

            <label for="marca" class="col-form-label col-md-1">Marca:</label>
            <div class="col-md-2 mt-1">
                <strong><?=$orden->marca;?></strong>
            </div>

            <label for="modelo" class="col-form-label col-md-1">Modelo:</label>
            <div class="col-md-2 mt-1">
                <strong><?=$orden->modelo;?></strong>
            </div>

            <label for="Año" class="col-form-label col-md-1">Año:</label>
            <div class="col-md-1 mt-1">
                <strong><?=$orden->anio;?></strong>
            </div>
        </div>
        <div class="row form-group">
            <label for="pripietario" class="col-form-label col-md-1">Placa:</label>
            <div class="col-md-3 mt-1">
                <strong><?=$orden->placa;?></strong>
            </div>
            <label for="pripietario" class="col-form-label col-md-1">Orden:</label>
            <div class="col-md-2 mt-1">
                <strong><?=$orden->codigo;?></strong>
            </div>
        </div>
        
        <?php
            if(isset($alerta)){
                echo $alerta;
            }
        ?>
        
        
        <hr class="bg-danger">

        
        <table class="table table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
             <?php
                $orden = 0;
                foreach ($observaciones as $observacion):
                    $orden++;
             ?>
                <tr>
                    <td><?= $orden;?></td>
                    <td><?= $observacion->descripcion;?></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?= $orden;?>">
                          Ver Imagen
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter<?= $orden;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Imagen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <div class="container-fluid">
                                      <img src="<?= $observacion->imagen;?>" style=" width: 100%; height: 100%;"/>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </td>
                    <td>
                        <a href="?controlador=Orden&accion=BorrarObservacion&id_orden=<?= $_GET['id'];?>&id=<?= $observacion->id?>" class="text-danger eliminar">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </a>
                    </td>
                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>
        <div class="row justify-content-center">
            <a href="?controlador=Orden" class="btn btn-secondary mr-2">Atras</a>
            <a href="?controlador=Orden&accion=RegistroObservacion&id=<?= $_GET['id'];?>" class="btn btn-success">Registrar Observacion</a>
        </div>
    </div>
</div>