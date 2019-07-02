<div id="contenido-principal">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <h3><center>Gestion de Marcas</center></h3>
                <hr class="bg-danger">
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <a href="?controlador=Vehiculo" class="btn btn-secondary btn-lg mr-2"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                <a href="?controlador=Vehiculo&accion=RegistroMarca" class="btn btn-info btn-lg"><i class="fas fa-wrench"></i> Registrar Marca</a>
            </div>
        </div>
        <hr class="bg-danger">
        <table class="table table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="7" class="text-center bg-primary"><h4 class="font-weight-normal">Marcas Registradas</h4></th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Nombre de la Marca</th>
                    <th>Modelos</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($alerta)){
                        echo $alerta;
                    }
                    $orden = 0;
                    foreach( $this->modeloVehiculo->ListarMarcas() as $marca):
                        $orden++;  
                ?>
                
               <tr>
                    <td><?= $orden; ?></td>
                    <td><?= $marca->nombre; ?></td>
                    <td>
                        <a href="?controlador=Vehiculo&accion=MostrarModelos&id=<?= $marca->id ?>" class="text-dark"><i class="fas fa-search fa-lg "></i></a>
                        
                    </td>
                    <td><a href="?controlador=Vehiculo&accion=RegistroMarca&id=<?= $marca->id?>" class="text-info"><i class="fas fa-sync fa-lg pl-4"></i></a></td>
                    <td><a href="?controlador=Vehiculo&accion=BorrarMarca&id=<?= $marca->id?>" class="text-danger eliminar"><i class="fas fa-trash-alt fa-lg pl-4"></i></a></td>
    
               </tr>
                <?php endforeach ;?>
            </tbody>
        </table>
    </div>
</div>