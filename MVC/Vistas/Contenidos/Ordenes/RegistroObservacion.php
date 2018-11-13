<div id="contenido-principal">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h3 class="font-weight-normal">Registro Observacion</h3>
        </div>
        <hr class="bg-danger">
        <form action="?controlador=Orden&accion=GuardarObservacion" method="POST" enctype="multipart/form-data">
            <input value="<?= $_GET['id'];?>" name="id_orden" hidden>
            <div class="row form-group">
                <label for="descripcion" class="col-form-label col-md-2">Descripcion de la Observacion:</label>
                <div class="col-md-10">
                    <textarea class="form-control col-md-12" name="descripcion"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <label for="imagen" class="col-form-label col-md-2">Seleccione Imagen:</label>
                <div class="col-md-4">
                    <input type="file" class="form-control-file" name="imagen" accept="image/jpeg, image/png">
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="?controlador=Orden" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                <button type="submit" class="btn btn-success ml-2">Enviar</button>
            </div>
        </form>
    </div>
</div>