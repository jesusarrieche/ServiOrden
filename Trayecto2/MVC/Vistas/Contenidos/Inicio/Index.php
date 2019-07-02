<div id="contenido-principal">
    <img src="Assets/imagenes/hidroparts.png" width="100%">
    <hr class="bg-danger">

    <div class="container">
            <p class="font-weight-light">Inicio > Indicadores</p>
            <div class="row justify-content-around">
                <div class="col-lg-3 col-xs-6">
                    <div class=" small-box bg-info">
                        <div class="inner">
                            <h3><?= $usuarios=$this->modeloUsuario->Contar();?></h3>
                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a href="?controlador=usuario" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-xs-6">
                    <div class=" small-box bg-primary">
                        <div class="inner">
                            <h3><?= $usuarios=$this->modeloCliente->Contar();?></h3>
                            <p>Clientes</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-users"></i>
                        </div>
                        <a href="?controlador=cliente" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class=" small-box bg-success">
                        <div class="inner">
                            <h3><?= $usuarios=$this->modeloOrden->Contar();?></h3>
                            <p>Ordenes</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                        </div>
                        <a href="?controlador=orden" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class=" small-box bg-warning">
                        <div class="inner">
                            <h3><?= $usuarios=$this->modeloEmpleado->Contar();?></h3>
                            <p>Empleados</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-wrench"></i>
                        </div>
                        <a href="?controlador=empleado" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div> 
            </div>
            <hr class="bg-danger">

    </div>
</div>
