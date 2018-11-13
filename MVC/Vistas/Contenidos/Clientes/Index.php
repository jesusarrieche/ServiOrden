<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1 class="font-weight-normal">Gestion de Clientes</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <a href="?controlador=cliente&accion=RegistroCliente" class="btn btn-success btn-lg m-3">Registrar Cliente <i class="fas fa-user-plus"></i></a>
        </div>
        <hr class="bg-danger">

    
        <table class="table shadow table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Clientes Registrados</h4></th>
                </tr>
                <tr>
                    <th><center>#</center></th>
                    <th>Cedula/Rif</th>
                    <th>Nombre y Apellido</th>
                    <th>Telefono</th>
                    <th>Vehiculos/Cajas</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>

                <?php
//                    var_dump($alerta);
                    if(isset($alerta)){
                        echo $alerta;
                    }
                    
                    $orden = 0 ;
                    foreach ($this->modeloCliente->Listar() as $cliente):
                        $orden++ ;
                ?>
                <tr>
                    <td><?= $orden;?></td>
                    <td><?= $cliente->identificacion ;?></td>
                    <td><?= $cliente->nombre . " " . $cliente->apellido ;?></td>
                    <td><?= $cliente->telefono;?></td>
                    <td>
                        <a href="?controlador=Vehiculo&accion=PropiedadCliente&id=<?= $cliente->id;?>" class="text-dark"><i class="fas fa-search fa-lg "></i></a>
                    </td>
                    <td><a href="?controlador=cliente&accion=RegistroCliente&id=<?= $cliente->id?>" class="text-info"><i class="fas fa-sync fa-lg pl-4"></i></a></td>
                    <td><a href="?controlador=cliente&accion=BorrarCliente&id=<?= $cliente->id?>" class="text-danger eliminar"><i class="fas fa-trash-alt fa-lg pl-4"></i></a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>