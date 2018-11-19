<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Gestion de Clientes</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <a href="?controlador=cliente&accion=RegistroCliente" class="btn btn-success btn-lg m-3">Registrar Cliente <i class="fas fa-user-plus"></i></a>
            <button id="listar" class="btn btn-info m-3">Actualizar</button>
        </div>
        <hr class="bg-danger">

    
        <table class="table shadow table-striped">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Clientes Registrados</h4></th>
                </tr>
                <tr>
          
                    <th>Cedula/Rif</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                 
                </tr>
            </thead>
            <tbody id="cuerpo">

                
            </tbody>
        </table>
    </div>
</div>