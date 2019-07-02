<div id="contenido-principal">
    <div class="container-fluid">
        
      
        <div class="container-fluid">
            
            <div class="row form-group justify-content-center">
                <h1 class="font-weight-normal">Gestion de Vehiculos</h1>
            </div>
            <hr class="bg-danger">    
            <div class="row">
                <a href="?controlador=Vehiculo&accion=RegistroVehiculo" class="btn btn-success btn-lg m-3 font-weight-light"><i class="fas fa-car"></i> Registrar Vehiculo </a>
                <a href="?controlador=Vehiculo&accion=RegistroCaja" class="btn btn-primary btn-lg m-3 font-weight-light"><i class="fas fa-box"></i> Registrar Caja </a>
                <a href="?controlador=Vehiculo&accion=InicioMarca" class="btn btn-info btn-lg m-3 font-weight-light"> <i class="fas fa-trademark"></i> Marcas</a>
                <!-- <a href="?controlador=cliente&accion=RegistroCliente" class="btn btn-success btn-lg m-3">Registrar Modelo <i class="fas fa-user-plus"></i></a> -->
            </div>
        </div>
        <hr class="bg-danger">
        
        <table class="table shadow table-striped" id="datatable" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th colspan="8" class="text-center bg-primary"><h4 class="font-weight-normal">Vehiculos | Cajas</h4></th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Placa</th>
                    <th>Tipo</th>
                    <th>Marca | Modelo </th>
                    <th>Ordenes</th>
                    <th>Actualizar</th>
       
                    <th>Propietario</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
                $orden = 0;
//                var_dump($this->modeloVehiculo->listarVehiculos());
                foreach ( $this->modeloVehiculo->listarVehiculos() as $vehiculo):
                    $orden++;
            ?>
                <tr>
                    <td><?= $orden;?></td>
                    <td><?= $vehiculo->placa;?></td>
                    <td>
                    <?php
                            if($vehiculo->serial_motor == "NO APLICA"){
                                echo "CAJA";
                            } else {
                                echo "VEHICULO";
                            }
                        ?>
                    </td>
                    <td><?= $vehiculo->marca . " - " .$vehiculo->modelo;?></td>
                    <td>
                        <a href="?controlador=Orden&accion=OrdenesPropiedad&id=<?= $vehiculo->id; ?>" class="text-dark"><i class="fas fa-search fa-lg "></i></a>
                    </td>
                    <td><a href="?controlador=Vehiculo&accion=Registro<?php if($vehiculo->serial_motor == "NO APLICA"){ echo "Caja";} else {echo "Vehiculo";}?>&id=<?= $vehiculo->id;?>" class="text-info"><i class="fas fa-sync fa-lg pl-4"></i></a></td>
                   
                    <td><?= $vehiculo->nombre . " " . $vehiculo->apellido;?></td>
                </tr>    
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="container-fluid">

        <hr class="bg-danger">
        
       <?php
            if(isset($alerta)){
                echo $alerta;
            }
       ?>
    </div>
</div>