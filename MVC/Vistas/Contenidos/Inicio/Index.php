<div id="contenido-principal">
    <img src="Assets/imagenes/hidroparts.png" width="100%">    
    <hr class="bg-danger">

    <div class="container">
        <center>
            <h1>Bienvenido a ServiOrden HidroParts</h1>

          <!--   <p>ServiOrden HidroParts es un sistema de informacion para la automatizacion del registro y seguimiento
                de ordenes de servicio.  -->
            </p>
            <br>
            <br>
            <h2 class="bg-danger text-light rounded">Conoce los Distintos Apartados</h2>
            <br>
            <br>
            <div class="row justify-content-around">
                <div class="col-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-danger"><i class="fas fa-user fa-3x"></i></div>
                        <div class="card-body ">
                        <h1 class="card-title"><?= $usuarios=$this->modeloUsuario->Contar();?></h1>
                        <p class="card-text">Usuarios Registrados en el sistema</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-white bg-primary mb-3 bg-secondary" style="max-width: 18rem;">
                        <div class="card-header"><i class="fas fa-users fa-3x"></i></div>
                        <div class="card-body bg-dark">
                        <h1 class="card-title"><?= $usuarios=$this->modeloCliente->Contar();?></h1>
                        <p class="card-text">Clientes Registrados en nuestro sistema</p>
                        </div>
                    </div>
                </div> 
                <div class="col-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header bg-success"><i class="fas fa-clipboard-list fa-3x"></i></div>
                        <div class="card-body">
                        <h1 class="card-title"><?= $this->modeloOrden->Contar();?></h1>
                        <p class="card-text">Ordenes Registradas en el Sistema</p>
                        </div>
                    </div>
                </div>
                
            </div>
            <a href="?controlador=Inicio&accion=GenerarPDF" class="btn btn-danger text-white">Generar PDF</a>
        </center>
    </div>
</div>