<div id="contenido-principal">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 justify-content-md-center">
                <h1 class=" text-center"><?= $titulo;?> Empleado</h1>
                <hr class="bg-danger">
                <form action="?controlador=Empleado&accion=Guardar" method="POST" class="formulario">

                    <div class="row form-group">
                        <input name="id" value="<?= $empleado->getId();?>" hidden>
                        <label for="identificacion" class="col-form-label col-md-1">Cedula:</label>
                        <div class="col-md-1">
                            <select class="form-control" required name="inicial_identificacion">
                                <option value="" selected>-</option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                        
                        <div class="col-md-2 pl-0">
                            <input type="number" value="<?= $empleado->getIdentificacion();?>" name="identificacion" class="form-control" placeholder="Identificacion">
                        </div>
                    
                        <label for="nombre" class="col-form-label col-md-1">Nombre:</label>
                        <div class="col-md-3">
                            <input type="text" value="<?= $empleado->getNombre();?>" name="nombre" class="form-control" placeholder="Nombre">
                        </div>

                        <label for="apellido" class="col-form-label col-md-1">Apellido:</label>
                        <div class="col-md-3">
                            <input type="text" value="<?= $empleado->getApellido();?>" name="apellido" class="form-control" placeholder="Apellido">
                        </div>

                    </div>
                    <div class="row form-group">
                        
                        <label for="telefono" class="col-form-label col-md-1">Telefono:</label>
                        <div class="col-md-3">
                            <input type="tel" value="<?= $empleado->getTelefono();?>" name="telefono" class="form-control" placeholder="Ej: xxxx-xxx xxxx">
                        </div>

                        <label for="correo" class="col-form-label col-md-1">Correo:</label>
                        <div class="col-md-3">
                            <input type="email" value="<?= $empleado->getCorreo();?>" name="correo" class="form-control" placeholder="Correo">
                        </div>
                        
                        <label for="direccion" class="col-form-label col-md-1">Direccion:</label>
                        <div class="col-md-3">
                            <input type="text" value="<?= $empleado->getDireccion();?>" name="direccion" class="form-control" placeholder="Direccion">
                        </div>

                    </div>
                    <div class="row form-group">
                        <label for="cargo" class=" col-form-label col-md-1">Cargo:</label>
                        <div class="col-md-4">
                            <select name="cargo" class="form-control" required>
                                <option value="" selected>-</option>
                                <option value="mecanico">Mecanico</option>
                                <option value="ayudante mecanico">Ayudante Mecanico</option>
                                <option value="administrador">Administrador</option>
                            </select>
                        </div>

                        <input type="text" name="estatus" value="ACTIVO" hidden>
                    </div>
    
                    <hr class="btn-danger">

                    <div class="row justify-content-md-center">
                        <button type="submit" class="btn btn-danger m-2" id="enviar">Enviar</button>
                        <button type="reset" class="btn btn-secondary m-2">Limpiar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>