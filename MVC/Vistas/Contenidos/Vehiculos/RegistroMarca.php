<div id="contenido-principal">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h3 class="font-weight-normal"><?= $titulo;?> Marca</h3>
        </div>

        <?php
//        var_dump($marca);
            if(isset($alerta)){
                echo $alerta;
            }
        ?>
        <form action="?controlador=Vehiculo&accion=GuardarMarca" method="POST">
            <input name="id" value="<?= $marca->getId();?>" hidden>
            <div class="row form-group">
                <label for="propietario" class="col-form-label col-md-2"> <strong>Datos de la Marca:</strong></label>
            </div>
            <div class="row form-group">
                <label for="marca" class=" col-form-label col-md-1">Nombre: </label>
                <div class="col-md-4 text-center pl-0">
                    <input type="text" class="form-control" name="marca" value="<?= $marca->getMarca(); ?>" placeholder="Nombre de la marca">
                </div>
                
               
                    <input type="text" name="estatus" value="ACTIVO" hidden>
                
                <button type="submit" class="btn btn-info">Enviar</button>
                <button type="reset" class="btn btn-secondary ml-1">Limpiar</button>
            </div>

            <hr class="btn-danger">
            <a href="javascript:history.back(-1);" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Atras</a>

        </form>
    </div>
</div>