    <div class="container-fluid shadow">
        <center><h1 class="font-weight-normal">Gestion de Usuarios</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <!-- <a href=" ROOT;?>Usuario/registro" class="btn btn-success btn-lg m-3">Registrar Usuario <i class="fas fa-user-plus"></i></a> -->
            <a href="#" class="btn btn-success btn-lg m-3" data-toggle="modal" data-target="#modalRegistroUsuario" >Registrar Usuario <i class="fas fa-user-plus"></i></a>

        </div>
        <hr class="bg-danger">

        <div class="table-responsive">
            <table class="table shadow table-striped" id="datatable" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Usuarios</h4></th>
                    </tr>
                    <tr>
                        <th class='text-center'>Cedula/Rif</th>
                        <th class='text-center'>Nombre y Apellido</th>
                        <th class='text-center'>Usuario</th>
                        <th class='text-center'>Rol</th>
                        <th class='text-center'></th>
                        <!-- <th class="col-md-1">Acciones</th> -->
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Registro -->
    <div class="modal fade" id="modalRegistroUsuario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="card">
                    <div class="card-header">
                            <h2 class="text-center">Nuevo Usuario</h2>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data" id="formularioRegistrarUsuario">

                            <div class="form-row justify-content-center">
                                <h4 class="text-center">Datos Personales</h4>
                            </div>

                            <hr>

                            <div class="row form-group">
                                <input  name="id" id="id" hidden>
                                <label for="nombre" class="col-form-label col-md-2">Nombre:</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="nombre" id="nombre" pattern="[A-Za-z ]+" title="Ingrese solo letras" maxlength="30" required="required" class="form-control" placeholder="Nombre">
                                </div> 

                                <label for="apellido" class="col-form-label col-md-2">Apellido:</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="apellido" id="apellido" pattern="[A-Za-z ]+" title="Ingrese solo letras" maxlength="30" required="required"  class="form-control" placeholder="Apellido">
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="cedula_cliente" class="col-form-label col-md-2">Cedula/RIF:</label>
                                <div class="col-md-1 ">
                                    <select class="form-control pl-0 pr-0" name="inicial_documento" id="inicial_documento" required="">
                                        <option value="" selected="">-</option>
                                        <option value="V">V</option>
                                        <option value="E">E</option>
                                        <option value="J">J</option>
                                        <option value="G">G</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" pattern="[0-9]{6,8}" name="documento" id="documento" minlength="6" maxlength="8" title="Ingrese entre 6 y 8 digitos" class="form-control" placeholder="Identificaion" required="">
                                </div>
                                <label for="telefono" class="col-form-label col-md-2">Telefono:</label>
                                <div class="col-md-4 ">
                                    <input type="tel" name="telefono" id="telefono" title="Debe Contener minimo 11 Caracteres numericos" minlength="10"  maxlength="12" pattern="[0-9-]+" required class="form-control" placeholder="Telefono">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="correo" class="col-form-label col-md-2">Correo:</label>
                                <div class="col-md-4 ">
                                    <input type="email" name="correo" id="correo" required class="form-control" placeholder="Correo Electronico">
                                </div>

                                <label for="direccion" class="col-form-label col-md-2">Direccion:</label>
                                <div class="col-md-4">
                                    <input type="text" name="direccion" id="direccion" pattern="[A-Za-z0-9/ ]+" required maxlength="150" class="form-control" placeholder="Direccion" >
                                </div>
                            </div>

                            <hr class="bg-secondary">

                            <div class="form-row justify-content-center">
                                <h4 class="text-center">Usuario</h4>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="user">Nombre de Usuario</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="pass">Password</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="pass">Confirmar Password</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <hr class="bg-secondary">

                            <div class="form-row justify-content-center">
                                <h4 class="text-center">Rol de Usuario</h4>
                            </div>

                            
                            <div class="form-row">
                                <small class=" form-text">**Por favor seleccione un rol de usuario</small>
                            </div>
                            <hr>

                            <div class="form-row" id="listadoRoles">
                                <div class="custom-control custom-radio pr-3">
                                    <input type="radio" id="rolUsuario1" name="rolUsuario" class="custom-control-input">
                                    <label class="custom-control-label" for="rolUsuario1">Super Administrador</label>
                                </div>
                                <div class="custom-control custom-radio pr-3">
                                    <input type="radio" id="rolUsuario2" name="rolUsuario" class="custom-control-input">
                                    <label class="custom-control-label" for="rolUsuario2">Administrador</label>
                                </div>

                                <div class="custom-control custom-radio pr-3">
                                    <input type="radio" id="rolUsuario3" name="rolUsuario" class="custom-control-input">
                                    <label class="custom-control-label" for="rolUsuario3">Vendedor</label>
                                </div>
                                <div class="custom-control custom-radio pr-3">
                                    <input type="radio" id="rolUsuario4" name="rolUsuario" class="custom-control-input">
                                    <label class="custom-control-label" for="rolUsuario4">Almacenista</label>
                                </div>

                                <div class="custom-control custom-radio pr-3">
                                    <input type="radio" id="rolUsuario5" name="rolUsuario" class="custom-control-input">
                                    <label class="custom-control-label" for="rolUsuario5">Recepcionista</label>
                                </div>
                                
                            </div>

                            <hr>

                            <div class="row form-group justify-content-md-center">
                                <a href="#" class="btn btn-secondary m-2" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i> Cerrar</a>
                                <button type="submit"  class="btn btn-success m-2">Enviar</button>
                                <button type="reset" class="btn btn-danger m-2">Limpiar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal mostrar -->
    <div class="modal fade" id="modalMostrarUsuario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="card">
                    <div class="card-header">
                            <h2 class="text-center">Usuario</h2>
                    </div>
                    <div class="card-body">
                        <form id="formularioMostrarUsuario">
                            <div class="row form-group">
                                <input  name="id" id="id" value="" hidden>
                                <label for="nombre" class="col-form-label col-md-2"><strong>Nombre:</strong></label>
                                <div class="col-md-4 ">
                                    <input type="text" name="nombre" id="nombre" value="" class="form-control-plaintext" disabled placeholder="Nombre">
                                </div> 

                                <label for="apellido" class="col-form-label col-md-2"><strong>Apellido:</strong></label>
                                <div class="col-md-4 ">
                                    <input type="text" name="apellido" id="apellido" class="form-control-plaintext" disabled placeholder="Apellido">
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="cedula_cliente" class="col-form-label col-md-2"><strong>Cedula|RIF:</strong></label>
                              
                                <div class="col-md-4">
                                    <input type="text" id="documento" class="form-control-plaintext" placeholder="Identificaion" disabled>
                                </div>
                                <label for="telefono" class="col-form-label col-md-2"><strong>Telefono:</strong></label>
                                <div class="col-md-4 ">
                                    <input type="tel" id="telefono" class="form-control-plaintext" disabled placeholder="Telefono">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="correo"><strong>Correo:</strong></label>
                                <input type="email" id="correo" class="form-control-plaintext" disabled placeholder="Correo Electronico">
                            </div>

                            <div class="form-group">
                                <label for="direccion"><strong>Direccion:</strong></label> 
                                <input type="text" id="direccion" class="form-control-plaintext" disabled placeholder="Direccion" > 
                            </div>

                            <hr class="bg-secondary">
                            
                            <div class="row form-group justify-content-md-center">
                                <a href="#" class="btn btn-secondary m-2" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i> Cerrar</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal actualizar -->
    <div class="modal fade" id="modalActualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="card">
                    <div class="card-header">
                            <h2 class="text-center">Actualizar Usuario</h2>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data" id="formularioActualizarUsuario">
                            <div class="row form-group">
                                <input  name="id" id="id" hidden>
                                <label for="nombre" class="col-form-label col-md-2">Nombre:</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="nombre" id="nombre" pattern="[A-Za-z ]+" title="Ingrese solo letras" maxlength="30" required="required" class="form-control" placeholder="Nombre">
                                </div> 

                                <label for="apellido" class="col-form-label col-md-2">Apellido:</label>
                                <div class="col-md-4 ">
                                    <input type="text" name="apellido" id="apellido" pattern="[A-Za-z ]+" title="Ingrese solo letras" maxlength="30" required="required"  class="form-control" placeholder="Apellido">
                                </div>
                            </div>

                            <div class="row form-group">
                                <label for="cedula_cliente" class="col-form-label col-md-2">Cedula/RIF:</label>
                                <div class="col-md-1 ">
                                    <select class="form-control pl-0 pr-0" name="inicial_documento" id="inicial_documento" required="">
                                        <option value="" selected="">-</option>
                                        <option value="V">V</option>
                                        <option value="E">E</option>
                                        <option value="J">J</option>
                                        <option value="G">G</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" pattern="[0-9]{6,8}" name="documento" id="documento" minlength="6" maxlength="8" title="Ingrese entre 6 y 8 digitos" class="form-control" placeholder="Identificaion" required="">
                                </div>
                                <label for="telefono" class="col-form-label col-md-2">Telefono:</label>
                                <div class="col-md-4 ">
                                    <input type="tel" name="telefono" id="telefono" title="Debe Contener minimo 11 Caracteres numericos" minlength="10"  maxlength="12" pattern="[0-9-]+" required class="form-control" placeholder="Telefono">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="correo" class="col-form-label col-md-2">Correo:</label>
                                <div class="col-md-4 ">
                                    <input type="email" name="correo" id="correo" required class="form-control" placeholder="Correo Electronico">
                                </div>

                                <label for="direccion" class="col-form-label col-md-2">Direccion:</label>
                                <div class="col-md-4">
                                    <input type="text" name="direccion" id="direccion" pattern="[A-Za-z0-9/ ]+" required maxlength="150" class="form-control" placeholder="Direccion" >
                                </div>
                            </div>

                            <hr class="bg-secondary">

                            <div class="row form-group justify-content-md-center">
                                <a href="#" class="btn btn-secondary m-2" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i> Cerrar</a>
                                <button type="submit"  class="btn btn-success m-2">Enviar</button>
                                <button type="reset" class="btn btn-danger m-2">Limpiar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="<?= ROOT; ?>public/assets/js/usuario/index.js"></script>


