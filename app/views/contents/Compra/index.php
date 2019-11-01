<div class="container-fluid card shadow">
    <center><h1 class="font-weight-normal">Compras</h1></center>
    <hr class="bg-danger">
    <div class="row">
        <button class="btn btn-success m-2" data-toggle="modal" data-target="#modalRegistroCompra"><i class="fas fa-plus-circle"></i> Nueva Compra</button>
    </div>
    <hr class="bg-danger">


    <table class="table shadow table-striped" id="datatable" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Ventas Registradas</h4></th>
            </tr>
            <tr>
                <th>Nro Compra</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Producto</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>C000001</td>
                <td>15-10-2019</td>
                <td>Jesus Arrieche</td>
                <td>Rodamineto JH5</td>
                <td>
                    
                    <a href='#' class='mostrar btn btn-info'><i class='fas fa-search'></i></a>
                    <a href='#' class='editar btn btn-warning m-1'><i class='fas fa-pencil-alt'></i></a>
                    <a href='#' class='eliminar btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                       
                </td>
            </tr>
        </tbody>
    </table>
</div>


<!-- Modal Registro -->
<div class="modal fade" id="modalRegistroCompra" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="card">
            <div class="card-header">
                <h2 class="card-tittle text-center">Nueva Compra</h2>
                <hr>
                <div class="form-row">
                    <label for="codigo" class="col-form-label col-md-2">Nro Compra</label> 
                    
                    <div class="col-md-10">
                        <input type="text" name="codigo" id="codigo" class=" form-control-plaintext" value="C000001"required disabled >
                    </div>
            
                </div>

            </div>
        <div class="card-body">
          
                <form action="#" method="POST" id="formularioRegistroProducto" enctype="multipart/form-data">
    

                    
                    <div class="form-group">
                        <label for="proveedor"> <i class="fas fa-user"></i> Proveedor </label>
                        <select name="proveedor" id="proveedor" class="form-control select2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>                        
                    </div>

                    <div class="form-group">
                        <label> <i class="fas fa-tag"></i> Producto </label>
                        <select name="producto" id="producto" class="form-control select2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>                        
                    </div>
                   
                    <hr>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <i class="fas fa-angle-double-down"></i> <label for="cantidad">Cantidad</label>
                            <input class="form-control" type="number" name="cantidad" id="cantidad" placeholder="Ej. 5" required >
                        </div>

                        <div class="form-group col-md-6">
                            <i class="fas fa-angle-double-up"></i> <label for="precio">Precio</label>
                            <input class="form-control" type="number" name="precio" id="precio" placeholder="E j. 10" required >
                        </div>
                    </div>

                    <hr>

                    <div class="form-row justify-content-center">
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </form>   
        </div>


    </div>

        </div>
    </div>
</div>

<script src="<?= ROOT; ?>public/assets/js/compra/index.js"></script>
