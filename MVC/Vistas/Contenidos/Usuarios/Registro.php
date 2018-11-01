<div id="contenido-principal">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 justify-content-md-center">
            <center><h1 class="font-weight-light"><?= $titulo;?>  Usuario</h1></center>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="font-weight-light">Datos Personales</h3>
                </div>
            </div>
            <hr class="bg-danger">
            <form action="?controlador=usuario&accion=Guardar" method="POST" class="form-group">
                <div class="row">
                    <input name="id" hidden value="<?= $usuario->getId();?>">
                    <label for="cedula_usuario" class="col-form-label col-md-1">Cedula:</label>
                    <div class="col-md-1">
                        <select class="form-control"  name="inicial_identificacion"  required="">
                            <option value="" >-</option>
                            <option value="V">V</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    
                    <div class="col-md-2 pl-0">
                        <input type="text" name="identificacion" class="form-control" placeholder="Cedula" value="<?= $usuario->getIdentificacion();?>">
                    </div>
                
                    <label for="nombre_usuario" class="col-form-label col-md-1">Nombre:</label>
                    <div class="col-md-3">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?= $usuario->getNombre();?>">
                    </div>

                    <label for="apellido_usuario" class="col-form-label col-md-1">Apellido:</label>
                    <div class="col-md-3">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="<?= $usuario->getApellido();?>">
                    </div>

                </div>
                <div class="row mt-2">
                    
                    <label for="telefono" class="col-form-label col-md-1">Telefono:</label>
                    <div class="col-md-3">
                        <input type="tel" name="telefono" class="form-control" placeholder="Ej: xxxx-xxx xxxx" value="<?= $usuario->getTelefono();?>">
                    </div>

                    <label for="correo" class="col-form-label col-md-1">Correo:</label>
                    <div class="col-md-3">
                        <input type="email" name="correo" class="form-control" placeholder="Correo" value="<?= $usuario->getCorreo();?>">
                    </div>
                    
                    <label for="direccion" class="col-form-label col-md-1">Direccion:</label>
                    <div class="col-md-3">
                        <input type="text" name="direccion" class="form-control" placeholder="Direccion" value="<?= $usuario->getDireccion();?>">
                    </div>

                </div>
                <hr class="bg-secondary">
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="font-weight-light">Datos Cuenta</h3>
                    </div>
                </div>
                <hr class="bg-danger">
                <div class="row form-group">

                    <label for="usuario" class="col-form-label col-md-1">Nombre Usuario:</label>
                    <div class="col-md-3">
                        <input type="text" name="usuario" class="form-control" value="<?= $usuario->getUsuario();?>">
                    </div>
                        
                    <label for="password1" class="col-form-label col-md-1">Password:</label>
                    <div class="col-md-3">
                        <input type="password" name="password" class="form-control">
                    </div>
                    
                    <label for="password2" class="col-form-label col-md-1">Confirmar <br> Password:</label>
                    <div class="col-md-3">
                        <input type="password" name="password2" class="form-control">
                    </div>

                </div>
                
                <div class="row from-group">
                    <label for="privilegio" class="col-form-label col-md-2">Nivel de Acceso:</label>
                    <div class="col-md-1">
                        <select name="privilegio" class="form-control">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <hr class="bg-secondary">

                <div class="row justify-content-md-center">
                    <a href="javascript:history.back(-1);" class="btn btn-secondary m-2"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="submit"  class="btn btn-success m-2" id="validacion">Enviar</button>
                    <button type="reset" class="btn btn-danger m-2">Limpiar</button>
                </div>


            </form>
            </div>
        </div>

    </div>
</div>