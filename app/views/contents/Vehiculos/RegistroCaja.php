<div id="contenido-principal">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <h3><center><?= $titulo;?> Caja</center></h3>
                <hr class="bg-danger">
<?php 
    if(isset($alerta)){
        echo $alerta;
    }
    
//    var_dump($caja);
?>
                
                <form action="?controlador=Vehiculo&accion=GuardarVehiculo" method="POST" class="formulario">
                    <input name="id" value="<?= $caja->getId();?>" hidden>
                    <div class="row form-group">
                        <label for="propietario" class="col-form-label col-md-4"> <strong>Asignar Propietario:</strong></label>
                    </div>
                    <p class="text-secondary">Los campos que contengan (*) son obligatorios</p>
                    <div class="row form-group">
                        <label for="identificacion" class=" col-form-label col-md-1">Cliente*: </label>
                        
                        <div class="col-md-6 p-2">
                            <select class="selectorBusqueda form-control" name="id_cliente" required=>
                                <option value="">-</option>
                        <?php
                            foreach( $this->modeloCliente->Listar() as $cliente):
                                if($cliente->id == $caja->getId_cliente()){
                                        $opcion = "selected";
                                    } else {
                                        $opcion = NULL;
                                    }
                        ?>
                            
                                <option value="<?= $cliente->id;?>" <?= $opcion;?>><?= $cliente->identificacion . " - " . $cliente->nombre . " ". $cliente->apellido ;?></option>
                                
                        <?php endforeach; ?>   

                            </select>
                        </div>
                    </div>
                    <hr class="bg-secondary">
                    <div class="row form-group">
                        <label for="marca" class="col-form-label col-md-2 pr-0">Marca | Modelo*:</label>
                        <div class="col-md-3 pt-2">
                            <select class="selectorBusqueda form-control" required name="id_modelo">
                                <option value="" selected>-</option>
                                
                        <?php
                            foreach( $modelos as $modelo):
                                if($modelo->id == $caja->getId_modelo()){
                                        $opcion = "selected";
                                    } else {
                                        $opcion = NULL;
                                    }
                        ?>
                            
                                <option value="<?= $modelo->id;?>" <?= $opcion;?>><?= $modelo->marca;?> - <?= $modelo->modelo;?></option>
                        <?php endforeach; ?>
                            </select>
                        </div>

                      
                        <label class="col-form-label col-md-2">Año del Vehiculo*:</label>
                        <div class="col-md-2">
                            <select class="form-control" name="anio">
                                <?php

                                $anio = date("Y");

                                for($i=1945 ; $i<=$anio; $i++){
                                    
                                    if($i == $caja->getAnio()){
                                        $opcion = "selected";
                                    } else {
                                        $opcion = NULL;
                                    }

                                    echo '<option value="'.$i.'" '.$opcion.'>'.$i.'</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="placa" class="col-form-label col-md-1">Placa*:</label>
                        <div class="col-md-3">
                            <input type="text" name="placa" value="<?= $caja->getPlaca();?>" class="form-control" pattern="[A-Za-z0-9]{7}" maxlength="7" title="La Placa debe contener 7 Caracteres" placeholder="XXXXXXX" required>
                        </div>
                        <label for="serial_caja" class="col-form-label col-md-1">S/Caja:</label>
                        <div class="col-md-3">
                            <input type="text" name="serial_caja" value="<?= $caja->getSerial_caja();?>" class="form-control" placeholder="Opcional...">
                        </div>
                    </div>
                    <div class="row form-group">

                        

                        <input type="text" name="estatus" value="ACTIVO" hidden>
                    </div>

                    

                    <hr class="btn-danger">

                    <div class="row justify-content-md-center">
                        <a href="?controlador=Vehiculo" class="btn btn-secondary m-2"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                        <button type="submit" class="btn btn-success m-2" id="enviar">Enviar</button>
                        <button type="reset" class="btn btn-secondary m-2">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>