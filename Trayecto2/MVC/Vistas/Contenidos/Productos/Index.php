<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1 class="font-weight-normal">Productos</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <a href="?controlador=producto&accion=create" class="btn btn-success m-3"><i class="fas fa-plus-circle"></i> Nuevo Producto</a>
            <a href="?controlador=producto&accion=create" class="btn btn-danger m-3"><i class="fas fa-plus-circle"></i> Categorias</a>
        </div>
        <hr class="bg-danger">


        <table class="table shadow table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Productos Registrados</h4></th>
                </tr>
                <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Fecha-Ingreso</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>P-01</td>
                    <td>Turbina Mazda 5x-02</td>
                    <td>Turbinas</td>
                    <td>10-05-2019</td>
                    <td>8.000</td>
                    <td>
                        <button disabled="disabled" class="btn btn-success">10</button>
                    </td>
                    <td>
                        <button class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Activo
                        </button>
                    </td>
                    <td>
                        <ul class="list-unstyled ">
                            <li class="list-inline-item">
                                <a href="#" class="text-secondary">
                                    <i class="fas fa-pen-square fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-danger">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>P-02</td>
                    <td>Caja Ford 351</td>
                    <td>Cajas</td>
                    <td>12-03-2019</td>
                    <td>500.000</td>
                    <td>
                        <button disabled="disabled" class="btn btn-danger">2</button>
                    </td>
                    <td>
                        <button class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Activo
                        </button>
                    </td>
                    <td>
                        <ul class="list-unstyled ">
                            <li class="list-inline-item">
                                <a href="#" class="text-secondary">
                                    <i class="fas fa-pen-square fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-danger">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>P-03</td>
                    <td>kit banner Celica</td>
                    <td>Kits</td>
                    <td>23-02-2019</td>
                    <td>10.000</td>
                    <td> 
                        <button class="btn btn-success" disabled>30</button> 
                    </td>
                    <td>
                        <button class="btn btn-danger">
                            <i class="fas fa-window-close"></i> Inactivo
                        </button>
                    </td>
                    <td>
                        <ul class="list-unstyled ">
                            <li class="list-inline-item">
                                <a href="#" class="text-secondary">
                                    <i class="fas fa-pen-square fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-danger">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>P-04</td>
                    <td>Turbina Baby Camry 98</td>
                    <td>Turbinas</td>
                    <td>15-01-2019</td>
                    <td>250.000</td>
                    <td>
                        <button disabled="disabled" class="btn btn-danger">3</button>
                    </td>
                    <td>
                        <button class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Activo
                        </button>
                    </td>
                    <td>
                        <ul class="list-unstyled ">
                            <li class="list-inline-item">
                                <a href="#" class="text-secondary">
                                    <i class="fas fa-pen-square fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-danger">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>P-05</td>
                    <td>Caja Toyota Corolla 2000</td>
                    <td>Cajas</td>
                    <td>12-10-2019</td>
                    <td>650.000</td>
                    <td>
                        <button disabled="disabled" class="btn btn-danger">1</button>
                    </td>
                    <td>
                        <button class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Activo
                        </button>
                    </td>
                    <td>
                        <ul class="list-unstyled ">
                            <li class="list-inline-item">
                                <a href="#" class="text-secondary">
                                    <i class="fas fa-pen-square fa-2x"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-danger">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
