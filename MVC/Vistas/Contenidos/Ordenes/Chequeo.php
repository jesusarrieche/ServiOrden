<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Revision de Accesorios</h1></center>
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
            <div class="col-md-4 mt-1">
                <strong><?=$orden->placa;?></strong>
            </div>
        </div>
        
        <?php
            if(isset($alerta)){
                echo $alerta;
            }
        ?>
        
        
        <hr class="bg-danger">

        <div class="row form-group">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Articulo</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               
                                foreach ($accesorios as $accesorio):
                                 
                            ?>
                            <tr>
                                <td><span class="text-success"><i class="fas fa-check-circle fa-lg"></i></span></td>
                                <td><?= $accesorio->nombre;?></td>
                            </tr>
                            <?php
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row form-group">
                    <a href="?controlador=Orden&accion=RegistroInventario&id=<?= $_GET['id']; ?>" class="btn btn-success btn-lg ml-2" >Registrar <i class="fas fa-clipboard"></i></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="?controlador=Orden" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Atras</a>
        </div>
    </div>
</div>