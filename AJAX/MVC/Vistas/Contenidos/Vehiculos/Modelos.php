<div id="contenido-principal">
    <div class="container-fluid">
    	<div class="row justify-content-center">
    		<h3 class="font-weight-normal">Modelos</h3>
    	</div>
    	<hr class="bg-danger">
        <a href="?controlador=Vehiculo&accion=InicioMarca" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-circle-left"></i> Atras</a>
     	<hr class="bg-danger"> 

    	<table class="table table-striped">
    		<thead class="thead-dark">
    			<tr>
    				<th>#</th>
    				<th>Nombre Modelo</th>
    				<th>Año</th>            
                    <th>Eliminar</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php
                        //var_dump($this->modeloVehiculo);
                        if(isset($alerta)){
                            echo $alerta;
                        }
                        $orden = 0;
    				foreach ($this->modeloVehiculo->listarModelos($_GET['id']) as $modelo):
                        $orden++;
    			?>
		
				<tr>
					<td><?= $orden;?></td>
					<td><?= $modelo->nombre; ?></td>
					<td><?= $modelo->anio; ?></td>                    
                    <td><a href="?controlador=Vehiculo&accion=BorrarModelo&id=<?= $modelo->id?>" class="text-danger"><i class="fas fa-trash-alt fa-lg pl-4"></i></a></td>
				</tr>
				

    		<?php endforeach; ?>
    		</tbody>
    	</table>
   </div>
</div>    	