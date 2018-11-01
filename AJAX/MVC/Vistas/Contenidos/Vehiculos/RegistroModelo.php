<div id="contenido-principal">
    <div class="container-fluid">
    	<div class="row justify-content-center">
    		<h3 class="font-weight-normal"><?= $titulo;?> Modelos</h3>
    	</div>
    	<hr class="bg-danger">

    	<form action="?controlador=Vehiculo&accion=GuardarModelo" method="POST">
            <input name="id_marca" value="<?= $_GET['id_marca']; ?>" hidden="">
            <input name="id_modelo" value="<?= $modelo->getId(); ?>" hidden="">
            <div class="row form-group">
                <label for="nombreModelo" class="col-form-label col-md-2">Nombre del Modelo:</label>
                <div class="col-md-3">
                    <input type="text" name="modelo" class="form-control" placeholder="Modelo">
                </div>
        
                <label for="anio" class="col-form-label col-md-1">Año:</label>
                <div class="col-md-2">
                    <input type="text" name="anio" class="form-control" placeholder="Año">
                </div>

                <label for="estatus" class="col-form-label col-md-1">Estatus:</label>
                <div class="col-md-2">
                    <select class="form-control" name="estatus">
                        <option value="ACTIVO">Activo</option>
                        <option value="INACTIVO">Inactivo</option>
                    </select>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="row form-group justify-content-center">
                <button class="btn btn-success" type="submit">Enviar</button>
                <button class="btn btn-secondary ml-1" type="reset">Limpiar</button> 
            </div>
                
          
        </form>

   </div>
</div>    