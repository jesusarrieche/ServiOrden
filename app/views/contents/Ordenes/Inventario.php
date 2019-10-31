<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Inventario</h1></center>
        <hr class="bg-danger">
        <div class="row form-group">
            <label for="pripietario" class="col-form-label col-md-2">Propietario:</label>
            <div class="col-md-4">
                <strong>Jesus Arrieche</strong>
            </div>
        </div>
        
        <?php
            if(isset($alerta)){
                echo $alerta;
            }
        ?>
        
        
        <hr class="bg-danger">

        <div class="row form-group">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="row form-group">
                    <a href="?controlador=Orden&accion=RegistroInventario&id=<?= $_GET['id']; ?>" class="btn btn-success btn-lg ml-2" >Registrar <i class="fas fa-clipboard"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>