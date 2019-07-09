<div class="container">
    <br>
    <div class="card">
        <div class="card-body">
            <h2 class="card-tittle text-center">Nuevo Producto</h2>
            <hr>
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <form action="/productos" method="post">
                    
                        <div class="row form-row">

                            <label for="codigo" class="col-form-label col-4 col-sm-2 col-md-2 col-lg-2 pr-0">Codigo</label>
                            <div class="col-8 col-sm-4 col-lg-2 pl-0 form-group">
                            <input type="text" name="cod" class=" form-control" placeholder="Codigo">
                               
                            </div>
    
                            <label for="nombre" class="col-form-label col-4 col-sm-2 col-md-2 col-lg-2 pr-0">Nombre</label>
                            <div class="col-8 col-sm-4 pl-0">
                            <input name="nombre" type="text" class=" form-control" placeholder="Nombre">

                            </div>
                        </div>
    
                        <div class="row form-row pl-0">
                            <label for="descripcion" class="col-form-label col-12 col-sm-2 col-md-2 col-lg-2">Descripcion</label>
                            <div class="col-12 col-sm-4 col-lg-10 pl-0 form-group">
                                <textarea name="descripcion" class="form-control" placeholder="Ej. Producto original..."></textarea>
                            </div>
                        </div>
    
                        <div class="row form-row">
    
                            <!-- {{-- <label for="categoria" class="col-form-label col-3 col-sm-2 col-md-2 col-lg-1 pr-0">Categoria:</label>
                            <div class="col-8 col-sm-4 col-lg-2 pl-0">
                                <input type="text" name="categoria" class=" form-control" placeholder="categoria">
                            </div> --}} -->
    
                            <label for="unidad" class="col-form-label col-4 col-sm-2 col-md-2 col-lg-2">Unidad</label>
                            <div class="col-8 col-sm-4 pl-0 form-group">
                                <select name="unidad" class="categoria form-control" >
                                    <option value="" selected>-</option>
                                    <option value="GRAMO">GRAMO</option>
                                    <option value="KILOGRAMO">KILOGRAMO</option>
                                    <option value="LITRO">LITRO</option>
                                    <option value="METRO">METRO</option>
                                    <option value="METRO-CUBICO">METRO-CUBICO</option>
                                    <option value="PIEZA">PIEZA</option>

                                </select>
                            </div>
                        </div>

                        <div class="row form-row">
                            <label for="p_compra" class="col-form-label col-4 col-sm-2 col-md-2 col-lg-2">Precio Compra</label>

                            <div class="col-8 col-sm-4 col-md-4 col-lg-4 form-group">
                                <input class="form-control" type="text" name="p_compra" placeholder="Precio Compra">
                            </div>

                            <label for="p_venta" class="col-form-label col-4 col-sm-2 col-md-2 col-lg-2">Precio Venta</label>

                            <div class="col-8 col-sm-4 col-md-4 col-lg-4 form-group">
                                <input class="form-control" type="text" name="p_venta" placeholder="Precio Venta">
                            </div>
                        </div>

                        <div class="row form-row">
                            <label for="stock_min" class="col-form-label col-4 col-sm-2 col-md-2 col-lg-2">Stock Minimo</label>

                            <div class="col-8 col-sm-4 col-md-4 col-lg-4 form-group">
                                <input class="form-control" type="text" name="stock_min" placeholder="Ej. 5">
                            </div>

                            <label for="stock_max" class="col-form-label col-4 col-sm-2 col-md-2 col-lg-2">Stock Maximo</label>

                            <div class="col-8 col-sm-4 col-md-4 col-lg-4 form-group">
                                <input class="form-control" type="text" name="stock_max" placeholder="E j. 10">
                            </div>
                        </div>

                        <div class="row form-row">
                            <label>Imagen del Producto</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-secondary btn-file">
                                        Buscar 
                                        <input type="file" name="imagen" id="imgInp">
                                    </span>
                                </span>
                                <div class="col-6">
                                    <input type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <img id='img-upload'/>
                        </div>

                        <div class="row form-row justify-content-center p-2">
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>
    
                    </form>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    }); 	
    });
</script>