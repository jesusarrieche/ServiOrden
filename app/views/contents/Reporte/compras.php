<div class="container-fluid card shadow">
    <center><h1 class="font-weight-normal">Compras</h1></center>
    <hr class="bg-danger">
    <div class="row justify-content-end">
        <a href="#" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i>
        </a>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach($compras AS $compra): ?>

                <tr>
                    <td><?= $compra->num_compra ?></td>
                    <td><?= $compra->fecha ?></td>
                    <td><?= $compra->razon_social ?></td>
                </tr>

            <?php endforeach; ?>


        </tbody>
    </table>
</div>
