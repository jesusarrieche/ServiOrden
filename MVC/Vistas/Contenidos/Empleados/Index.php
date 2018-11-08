<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1 class="font-weight-normal">Gestion de Empleados</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <a href="?controlador=Empleado&accion=RegistroEmpleado" class="btn btn-success btn-lg m-3">Registrar <i class="fas fa-user-plus"></i></a>
        </div>
        <hr class="bg-danger">
        <table class="table shadow table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Empleados Registrados</h4></th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Cedula</th>
                    <th>Nombre y Apellido</th>
                    <th>Telefono</th>
                    <th>Cargo</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
               
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($alerta)){
                        echo $alerta;
                    }
                    $orden = 0;
                    foreach( $this->modeloEmpleado->Listar() as $empleado):
                        $orden++;  
                ?>  

                <tr>
                    <td><?= $orden; ?></td>
                    <td><?= $empleado->identificacion;?></td>
                    <td><?= $empleado->nombre . " " . $empleado->apellido; ?></td>
                    <td><?= $empleado->telefono;?></td>
                    <td><?= $empleado->cargo;?></td>
                    <td><a href="?controlador=empleado&accion=RegistroEmpleado&id=<?= $empleado->id?>" class="text-info"><i class="fas fa-sync fa-lg pl-4"></i></a></td>
                    <td><a href="?controlador=empleado&accion=BorrarEmpleado&id=<?= $empleado->id?>" class="text-danger eliminar"><i class="fas fa-trash-alt fa-lg pl-4"></i></a></td>
                
                </tr>

                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>