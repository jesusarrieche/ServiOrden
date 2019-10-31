<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1 class="font-weight-normal">Gestion de Usuarios</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <a href="?controlador=Usuario&accion=RegistroUsuario" class="btn btn-success btn-lg m-3">Registrar <i class="fas fa-user-plus"></i></a>
        </div>
        <hr  class="bg-danger">
        <table class="table shadow table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Usuarios Registrados</h4></th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Identificacion</th>
                    <th>Nombre y Apellido</th>
                    <th>Usuario</th>
                    <th>Privilegio</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($alerta)){
                    echo $alerta;
                }
                $orden = 0 ;
                foreach ($this->modeloUsuario->Listar() as $usuario): ?>
                <tr>
                    <?php $orden++ ;?>
                    <td><?= $orden ?></td>
                    <td><?= $usuario->identificacion ?></td>
                    <td><?= $usuario->nombre . " " . $usuario->apellido ?></td>
                    <td><?= $usuario->usuario ?></td>
                    <td><?= $usuario->privilegio ?></td>
                    <td><a href="?controlador=usuario&accion=RegistroUsuario&id=<?= $usuario->id ?>" class="pl-4 text-info"><i class="fas fa-sync-alt fa-lg"></i></a></td>
                    <td><a href="?controlador=usuario&accion=BorrarUsuario&id=<?= $usuario->id ?>" class="pl-4 text-danger eliminar"><i class="fas fa-trash-alt fa-lg"></i></a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>    
    </div>
</div>