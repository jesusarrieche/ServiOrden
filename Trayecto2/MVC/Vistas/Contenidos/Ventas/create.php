<div class=" container-fluid p-2">
    <form action="#" method="post">
        
        <div class="card">
            <div class=" card-header bg-gray">
                <div class="row form-row">
                    <label for="nro_factura" class=" col-form-label col-lg-1">
                        <i class="fas fa-table"></i>
                        <strong>Nro Venta:</strong> 
                    </label>
                    <div class="col-lg-1">
                        <input type="text" class="form-control-plaintext" name="nro_factura" disabled value="00000001">
                    </div>
        
                    <label for="vendedor" class=" col-form-label col-lg-1"> <i class="fas fa-user-circle"></i> Vendedor: </label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control-plaintext" name="vendedor" disabled value="Juan Perez">
                    </div>

                    <div class="col-lg-5"></div>
                </div>
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-header">
                                <h4>Cliente</h4>
                            </div>
                            <div class="card-body">
                                <div class="row form-row">
                                    <label for="cliente" class=" col-form-label col-lg-2">
                                        <i class="fas fa-user-alt"></i>
                                        <span> Cliente</span>
                                    </label>
                                    <div class="col-lg-4 form-group">
                                        <input type="text" class="form-control" name="cliente" placeholder="Cedula/Rif">
                                    </div>
                
                                    <div class="col-lg-1 form-group">
                                        <button class="btn btn-success"><i class="fas fa-search-plus"></i></button>
                                    </div>
                
                                    <div class="col-lg-1 form-group">
                                        <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Nuevo Cliente</button>
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <label for="Nombre" class="col-form-label col-lg-2">Nombre </label>
                                    <div class="col-lg-10 form-group">
                                        <input type="text" class="form-control" name="nombre" disabled value="Jose Hernandez">
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <label for="Direccion" class="col-form-label col-lg-2">Direccion </label>
                                    <div class="col-lg-10 form-group">
                                        <input type="text" class="form-control" name="Direccion" disabled value="Duaca, Carrera 4 con calle 12">
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <label for="Telefono" class="col-form-label col-lg-2">Telefono </label>
                                    <div class="col-lg-6 form-group">
                                        <input type="text" class="form-control" name="Telefono" disabled value="0414-5506158">
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <label for="ultima_compra" class="col-form-label col-lg-3">Ultima Compra: </label>
                                    <div class="col-lg-6 form-group">
                                        <input type="text" class="form-control-plaintext" name="ultima_compra" disabled value="25-02-2019">
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>


                    <div class="col-lg">
                        <div class="card">
                            <div class="card-header">
                                <h4>Producto</h4>
                            </div>
                            <div class="card-body">
                                <div class="row form-row">
                                    <label for="Nombre" class="col-form-label col-lg-2">Codigo </label>
                                    <div class="col-lg-4 form-group">
                                        <input type="text" class="form-control" name="nombre" value="P-01">
                                    </div>

                                    <label for="Nombre" class="col-form-label col-lg-2">Precio </label>
                                    <div class="col-lg-4 form-group">
                                        <input type="text" class="form-control" name="nombre" value="8.000" disabled>
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <label for="Direccion" class="col-form-label col-lg-2">Descripcion </label>
                                    <div class="col-lg-7 form-group">
                                        <input type="text" class="form-control" name="Direccion" disabled value="Turbina Mazda 5x-02">
                                    </div>

                                    <label for="Direccion" class="col-form-label col-lg-1">Stock </label>
                                    <div class="col-lg-2 form-group">
                                        <input type="text" class="form-control" name="Direccion" disabled value="5">
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <label for="Telefono" class="col-form-label col-lg-2">Categoria </label>
                                    <div class="col-lg-5 form-group">
                                        <input type="text" class="form-control" name="Telefono" disabled value="Turbinas">
                                    </div>

                                    <label for="Telefono" class="col-form-label col-lg-2">Cantidad </label>
                                    <div class="col-lg-3 form-group">
                                        <select name="#" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-row justify-content-center">
                                    <button class="btn btn-info">
                                        <i class="fas fa-shopping-cart"></i> Agregar
                                    </button>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
                

                <hr class="bg-secondary">

                <div class="row form-row">
                    
                    <div class="col-lg-8">
                        <table class="table table-striped">
                            <thead class=" thead-dark">
                                <tr>
                                    <th>COD</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                    <th>Quitar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>P-01</td>
                                    <td>Turbina Mazda 5x-02</td>
                                    <td>2</td>
                                    <td>8.000</td>
                                    <td>16.000</td>
                                    <td>
                                        <i class="fas fa-trash-alt fa-2x text-danger"></i>
                                    </td>
                                </tr>

                                <tr>
                                    <td>P-02</td>
                                    <td>Rodamiento Chevrolet 3202</td>
                                    <td>3</td>
                                    <td>5.000</td>
                                    <td>15.000</td>
                                    <td>
                                        <i class="fas fa-trash-alt fa-2x text-danger"></i>
                                    </td>
                                </tr>

                                <tr>
                                    <td>P-07</td>
                                    <td>Kit Banner Toyota Celica</td>
                                    <td>1</td>
                                    <td>10.000</td>
                                    <td>10.000</td>
                                    <td>
                                        <i class="fas fa-trash-alt fa-2x text-danger"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-lg-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>IVA</td>
                                    <td>6.560</td>
                                </tr>
                                <tr>
                                    <td>Sub-Total</td>
                                    <td>41.000</td>
                                </tr>
                                <tr class="bg-success">
                                    <td>Total</td>
                                    <td>47.560</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row form-row justify-content-center">
                            <button class="btn btn-primary">
                                <i class="fas fa-check-circle"></i> Finalizar Venta
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>