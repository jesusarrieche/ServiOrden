<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1 class="font-weight-normal">Ventas</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <a href="?controlador=venta&accion=create" class="btn btn-success m-3"><i class="fas fa-plus-circle"></i> Nueva Venta</a>
        </div>
        <hr class="bg-danger">


        <table class="table shadow table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Ventas Registradas</h4></th>
                </tr>
                <tr>
                    <th>Nro Venta</th>
                    <th>C.I/RIF</th>
                    <th>Cliente</th>
                    <th>Fecha Venta</th>
                    <th>Hora Venta</th>
                    <th>Estatus</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>V-0001</td>
                    <td>26540950</td>
                    <td>Jesus Arrieche</td>
                    <td>13-07-2018</td>
                    <td>8:25 am</td>
                    <td>
                        <button class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Activo
                        </button>
                    </td>

                    <td>
                        <ul class="list-unstyled ">
                            <li class="list-inline-item">
                                <a href="#" class="text-secondary">
                                    <button class="btn btn-secondary">
                                        <i class="fas fa-eye"></i> Detalles
                                    </button>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-danger">
                                    <button class="btn btn-danger">
                                        <i class="fas fa-file-pdf"></i> PDF
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>V-0001</td>
                    <td>26540950</td>
                    <td>Jesus Arrieche</td>
                    <td>13-07-2018</td>
                    <td>8:25 am</td>
                    <td>
                        <button class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Activo
                        </button>
                    </td>

                    <td>
                        <ul class="list-unstyled ">
                            <li class="list-inline-item">
                                <a href="#" class="text-secondary">
                                    <button class="btn btn-secondary">
                                        <i class="fas fa-eye"></i> Detalles
                                    </button>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-danger">
                                    <button class="btn btn-danger">
                                        <i class="fas fa-file-pdf"></i> PDF
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>V-0003</td>
                    <td>23256369</td>
                    <td>Jose Lopez</td>
                    <td>11-07-2018</td>
                    <td>12:25 pm</td>
                    <td>
                        <button class="btn btn-danger">
                            <i class="fas fa-window-close"></i> Anulada
                        </button>
                    </td>

                    <td>
                        <ul class="list-unstyled ">
                            <li class="list-inline-item">
                                <a href="#" class="text-secondary">
                                    <button class="btn btn-secondary">
                                        <i class="fas fa-eye"></i> Detalles
                                    </button>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-danger">
                                    <button class="btn btn-danger">
                                        <i class="fas fa-file-pdf"></i> PDF
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
