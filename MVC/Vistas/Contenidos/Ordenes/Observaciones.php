<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Observaciones</h1></center>
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

        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <div class="row justify-content-center">
            <a href="?controlador=Orden&accion=RegistroObservacion&id=<?= $_GET['id'];?>" class="btn btn-success">Registrar Observacion</a>
        </div>
    </div>
</div>