<div id="contenido-principal">
    <img src="Assets/imagenes/hidroparts.png" width="100%">    
    <hr class="bg-danger">

    <div class="container">
        <center>
            <h1>Bienvenido a ServiOrden HidroParts</h1>

            <p>ServiOrden HidroParts es un sistema de informacion para la automatizacion del registro y seguimiento
                de ordenes de servicio. 
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
                        <h1 class="card-title"><?= $usuarios=$this->modeloCliente   ->Contar();?></h1>
                        <p class="card-text">Clientes Registrados en nuestro sistema</p>
                        </div>
                    </div>
                </div> 
                <div class="col-3">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header"><i class="fas fa-user fa-3x"></i></div>
                        <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </center>
    </div>
</div>