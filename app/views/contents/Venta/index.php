<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1 class="font-weight-normal">Ventas</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <a href="<?= ROOT;?>Venta/crear" class="btn btn-success m-3"><i class="fas fa-plus-circle"></i> Nueva Venta</a>
        </div>
        <hr class="bg-danger">


        <table class="table shadow table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Ventas Registradas</h4></th>
                </tr>
                <tr>
                    <th>Nro Venta</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th></th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</div>
