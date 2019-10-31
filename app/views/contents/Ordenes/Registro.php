<div id="contenido-principal">
    <div class="container-fluid">
    
        <h1>Registro de Orden</h1>
        <hr class="bg-danger">
        <form>
            <div class="form-group">

                <div class="row">
                    <label for="fecha_emision" class="col-form-label col-md-1">Fecha:</label>
                    <div class="col-md-1">
                        <input type="text" name="fecha_emision" disabled="disabled" class="form-control">
                    </div>

                    <label for="hora_emision" class="col-form-label col-md-1">Hora:</label>
                    <div class="col-md-1">
                        <input type="text" name="hora_emision" disabled="disabled" class="form-control">
                    </div>
                </div>

                <hr class="bg-secondary">
                <h3>Cliente</h3>
                <div class="row mt-3">
                    <label for="cedula_cliente" class="col-form-label col-md-1">Cedula:</label>
                    <div class="col-md-1">
                        <select class="form-control">
                            <option value="" selected>-</option>
                            <option value="v">V</option>
                            <option value="e">E</option>
                        </select>
                    </div>
                    
                    <div class="col-md-2">
                        <input type="text" name="cedula_cliente" class="form-control"   >
                    </div>

                    <label for="nombre_cliente" class="col-form-label col-md-2">Nombre Cliente:</label>
                    <div class="col-md-2">
                        <input type="text" name="nombre_cliente" class="form-control" disabled>
                    </div>

                        <label for="apellido_cliente" class="col-form-label col-md-2">Apellido Cliente:</label>
                    <div class="col-md-2">
                        <input type="text" name="apellido_cliente" class="form-control" disabled>
                    </div>
                </div>


                <div class="row mt-3">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>cod</th>
                                <th>Vehiculo</th>
                                <th>Serial/Motor</th>
                                <th>Modelo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Ford K</td>
                                <td>123562234</td>
                                <td>F-K</td>
                                <td><input type="checkbox" name=""></td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>Ford K</td>
                                <td>123562234</td>
                                <td>F-K</td>
                                <td><input type="checkbox" name=""></td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>Ford K</td>
                                <td>123562234</td>
                                <td>F-K</td>
                                <td><input type="checkbox" name=""></td>
                            </tr>
                        </tbody>    
                    </table>
                </div>

                <div class="row mt-3">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>cod</th>
                                <th>Caja</th>
                                <th>Serial/Caja</th>
                                <th>Modelo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Ford K</td>
                                <td>123562234</td>
                                <td>F-K</td>
                                <td><input type="checkbox" name=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="bg-secondary">
                <h2>Personal Mecanico</h2>
                <hr class="bg-secondary">

                <div class="row form-group">
                    <label for="mecanico" class="col-form-label col-md-3">Nombre Mecanico:</label>
                    <div class="col-md-5">
                        <select class="form-control">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>

                <hr class="bg-secondary">
                <h2>Reparacion</h2>
                <hr class="bg-secondary">

                <div class="row">
                    <label for="desc_reparacion" class="col-form-label col-md-3">Descripcion de Reparacion:</label>
                    <div class="col-md-3">
                        <input type="text" name="" class="form-control">
                    </div>

                    <label for="rep_reparacion" class="col-form-label col-md-2">Repuestos a utilizar:</label>
                    <div class="col-md-4">
                        <input type="text" name="rep_reparacion" class="form-control">
                    </div>
                </div>
                
            </div>

            <hr class="btn-danger">

            <div class="row justify-content-md-center">
                <button type="submit" class="btn btn-danger m-2">Registrar</button>
                <button type="reset" class="btn btn-secondary m-2">Limpiar</button>
            </div>
        </form>

    </div>
</div>