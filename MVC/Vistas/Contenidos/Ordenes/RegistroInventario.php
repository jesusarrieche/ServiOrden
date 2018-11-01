<div id="contenido-principal">
    <div class="container-fluid">
    
        <h2 class="bg-danger text-light font-weight-normal rounded shadow p-2 text-center">Inventario</h2>
        <div class="row form-group">
	        <label for="inventario" class="col-form-label col-md-1"><strong>Articulos:</strong></label> 
	    </div>      
        <form action="?controlador=Orden&accion=GuardarInventario" method="POST">
            <input name="id" value="<?= $_GET['id'];?>" hidden>
            <div class="row">
                <div class="col-12">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">  
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="1">
                                <label class="form-check-label" for="radio">Reproductor</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="2">
                                <label class="form-check-label" for="radio">Limpia Parabrisas</label>           
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="3">
                                <label class="form-check-label" for="radio">Caucho de Repuesto</label>     
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">      
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="4">
                                <label class="form-check-label" for="radio">Antena</label>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="5">
                                <label class="form-check-label" for="inlineCheckbox1">Tapiz Interior</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="6">
                                <label class="form-check-label" for="inlineCheckbox1">Extintor</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="7">
                                <label class="form-check-label" for="inlineCheckbox1">Cinturones</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="8">
                                <label class="form-check-label" for="inlineCheckbox1">Alfombras</label>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="9">
                                <label class="form-check-label" for="inlineCheckbox1">Encendedor</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="10">
                                <label class="form-check-label" for="inlineCheckbox1">Triangulo de Seguridad</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="11">
                                <label class="form-check-label" for="inlineCheckbox1">Parasoles</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="12">
                                <label class="form-check-label" for="inlineCheckbox1">Caja de Herramientas</label>
                            </div>
                        </div>
                    </div>      

                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="13">
                                <label class="form-check-label" for="inlineCheckbox1">Aire Acondicionado</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="14">
                                <label class="form-check-label" for="inlineCheckbox1">GPS</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="inventario[]" value="15">
                                <label class="form-check-label" for="inlineCheckbox1">Alarma</label>
                            </div>
                        </div>
                    </div>

                    <hr class="bg-secondary">

                    <div class="row justify-content-center">
                        <a href="javascript:history.back(-1);" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                        <button type="submit" class="btn btn-success ml-2">Enviar</button>
                        <button type="reset" class="btn btn-danger ml-2">Limpiar</button>
                    </div>
                </div>
            </div>
        </form>
            
        

    </div>
</div>