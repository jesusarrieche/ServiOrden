
<div class="container-fluid shadow">
    <center><h1 class="font-weight-normal">Categorias</h1></center>
    <hr class="bg-danger">
    <div class="row">
        <button class="btn btn-success m-2" data-toggle="modal" data-target="#modalRegistroCategoria"><i class="fas fa-plus-circle"></i> Nueva Categoria</button>
    </div>
    <hr class="bg-danger">

    <div class="table-responsive">
        <table class="table shadow table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Categorias Registrados</h4></th>
                </tr>
                <tr>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Registro -->
<div class="modal fade" id="modalRegistroCategoria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

        <div class="card">
        <div class="card-body">
            <h2 class="card-tittle text-center">Nueva Categoria</h2>
            <hr>
          
                <form action="#" method="POST" id="formularioRegistrarCategoria" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nombre"> <i class="fas fa-tag"></i> Nombre Categoria</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" onkeyup = "this.value=this.value.toUpperCase()" placeholder="ej. cajas">
                    </div>
                    
                    <div class="form-group">
                        <label for="descripcion"> <i class="fas fa-id-card-alt"></i> Descripcion</label>
                        <textarea name="descripcion" onkeyup = "this.value=this.value.toUpperCase()" id="descripcion" class="form-control" cols="30" rows="3" placeholder="descripcion de la categoria..."></textarea>
                    </div>


                    <div class="form-row justify-content-center">
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                    
                </form>   
        </div>


    </div>

        </div>
    </div>
</div>

<!-- Modal Mostrar -->
<div class="modal fade" id="modalMostrarCategoria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="card">
        <div class="card-body">
            <h2 class="card-tittle text-center">Nuevo Categoria</h2>
            <hr>
            <form action="#" method="POST" id="formularioMostrarCategoria" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nombre"> <i class="fas fa-tag"></i> <strong>Nombre Categoria</strong></label>
                    <input type="text" name="nombre" id="nombre" class="form-control-plaintext" disabled onkeyup = "this.value=this.value.toUpperCase()" placeholder="ej. cajas">
                </div>
                
                <div class="form-group">
                    <label for="descripcion"> <i class="fas fa-id-card-alt"></i> <strong>Descripcion</strong></label>
                    <textarea name="descripcion" onkeyup = "this.value=this.value.toUpperCase()" id="descripcion" class="form-control-plaintext" disabled cols="30" rows="3" placeholder="descripcion de la categoria..."></textarea>
                </div>


                <div class="form-row justify-content-center">
                    <button class="btn btn-success" data-dismiss="modal">Atras</button>
                </div>
                
            </form>
        </div>


    </div>

        </div>
    </div>
</div>

<!-- Modal Actualizar -->
<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="card">
        <div class="card-body">
            <h2 class="card-tittle text-center">Nuevo Categoria</h2>
            <hr>
          
            <form action="#" method="POST" id="formularioActualizarCategoria" enctype="multipart/form-data">
                <input type="text" name="id" id="id" hidden>
                <div class="form-group">
                    <label for="nombre"> <i class="fas fa-tag"></i> Nombre Categoria</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" onkeyup = "this.value=this.value.toUpperCase()" placeholder="ej. cajas">
                </div>
                
                <div class="form-group">
                    <label for="descripcion"> <i class="fas fa-id-card-alt"></i> Descripcion</label>
                    <textarea name="descripcion" onkeyup = "this.value=this.value.toUpperCase()" id="descripcion" class="form-control" cols="30" rows="3" placeholder="descripcion de la categoria..."></textarea>
                </div>


                <div class="form-row justify-content-center">
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>
                
            </form>   
        </div>


    </div>

        </div>
    </div>
</div>


<script src="<?= ROOT; ?>public/assets/js/categoria/index.js"></script>

