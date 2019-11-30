<div class="container-fluid card shadow">
    <center><h1 class="font-weight-normal">Compras</h1></center>
    <hr class="bg-danger">
    <div class="row">
        <a href="<?= ROOT;?>Compra/create" class="btn btn-success m-2"><i class="fas fa-plus-circle"></i> Nueva Compra</a>
    </div>
    <hr class="bg-danger">


    <table class="table shadow table-striped" id="datatable" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Compras</h4></th>
            </tr>
            <tr>
                <th>Nro Compra</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th></th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
</div>

<!-- Modal Detalle Compra -->
<div class="modal fade" id="modalDetalleCompra" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

        <div class="card">

            <div class="card-header">
                <div class="row justify-content-center">
                    <h2 class="card-tittle text-center">Detalle Compra</h2>
                </div>
            </div>

            <div class="card-body">
                <div class="row justify-content-end">
                    <label for="" class="col-form-label col-2"><strong>Nro Compra:</strong> </label>
                    <div class="col-md-2">
                        <input type="text" class="form-control-plaintext" id="numero_compra" disabled>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <label for="" class="col-form-label col-md-2"><strong>REFERENCIA:</strong></label>
                    <div class="col-md-2">
                        <input type="text" id="documento_referencia" class="form-control-plaintext" value="FACTURA" disabled>
                    </div>
                </div>

                <hr>

                <div class="row pl-5">
                    <h4>PROVEEDOR</h4>
                </div>

                <div class="row pl-5">
                    <label for="" class="col-form-label col-md-2"><strong>RAZON SOCIAL:</strong></label>
                    <div class="col-md-3">
                        <input type="text" id="nombre_proveedor" class="form-control-plaintext" value="MICROTECH" disabled>
                    </div>

                    <label for="" class="col-form-label col-md-2"><strong>RIF:</strong></label>
                    <div class="col-md-3">
                        <input type="text" id="rif_proveedor" class="form-control-plaintext" value="J-26540950" disabled>
                    </div>
                </div>

                <div class="row pl-5">
                    <label for="" class="col-form-label col-md-2"><strong>DIRECCION:</strong></label>
                    <div class="col-md-3">
                        <input type="text" id="direccion_proveedor" class="form-control-plaintext" value="BARQUISIMETO" disabled>
                    </div>

                    
                </div>

                <hr>

                <div class="row justify-content-center pl-5">
                    <h4>PRODUCTOS</h4>
                </div>

                <div class="row">
                    <div class=" table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>CANTIDAD</th>
                                    <th>CODIGO</th>
                                    <th>PRODUCTO</th>
                                    <th>PRECIO COMPRA</th>
                                    <th>IMPORTE</th>
                                </tr>
                            </thead>
    
                            <tbody id="cuerpo">
    
                            </tbody>
                        </table>
                    </div>

                </div>
                <hr>
                <div class="row justify-content-end">
                    <label for="" class="col-form-label col-2"><strong>TOTAL:</strong> </label>
                    <div class="col-md-2">
                        <input type="text" class="form-control-plaintext" id="total" disabled>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-center">
                    <button class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
                </div>
            
            </div>


        </div>

        </div>
    </div>
</div>

<script src="<?= ROOT; ?>public/assets/js/compra/index.js"></script>
