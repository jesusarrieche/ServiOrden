<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Gestion de Ordenes de Servicio</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <a href="?controlador=Orden&accion=RegistroOrden" class="btn btn-success btn-lg m-3">Registrar <i class="fas fa-clipboard"></i></a>
        
        </div>
        <hr class="bg-danger">
        <div class="row">
            <div class="col-md-2">
                <p>Hora: <?= date("h:i"); ?></p>
            </div>
            <div class="col-md-2">
                <p>Fecha: <?= date("j / n / y"); ?></p>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th><center>#</center></th>
                    <th>Registro | Cierre</th>
                    <th>Cliente</th>
                    <th>Vehiculo/Caja</th>
                    <th>Descripcion</th>
                    <th>Mecanico Asignado</th>
                    <th>Inventario</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
    </div>
</div>