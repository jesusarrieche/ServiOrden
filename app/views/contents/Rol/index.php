    <div class="container-fluid shadow">
        <center><h1 class="font-weight-normal">Gestion de Roles</h1></center>
        <hr class="bg-danger">
        <div class="row">
            <!-- <a href=" ROOT;?>Rol/registro" class="btn btn-success btn-lg m-3">Registrar Rol <i class="fas fa-user-plus"></i></a> -->
            <a href="#" class="btn btn-success btn-lg m-3" data-toggle="modal" data-target="#modalRegistroRol" >Registrar Rol <i class="fas fa-user-plus"></i></a>

        </div>
        <hr class="bg-danger">

        <div class="table-responsive">
            <table class="table shadow table-striped" id="datatable" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="10" class="text-center bg-danger"><h4 class="font-weight-normal">Roles</h4></th>
                    </tr>
                    <tr>
                        <th class='text-center'>#</th>
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
    <div class="modal fade" id="modalRegistroRol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="card">
                    <div class="card-header">
                            <h2 class="text-center">Nuevo Rol</h2>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data" id="formularioRegistrarRol">

                            <div class="form-group">
                                <label for="nombre">Nombre del Rol</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="nombre">Descripcion del Rol</label>
                                <textarea name="descripcionRol" id="descripcionRol" cols="30" rows="2" class="form-control"></textarea>
                            </div>

                            <h4 class="text-center">Listado de Permisos</h4>
                            <hr>

                            <div class="form-row">

                                <div class="col-md-6">
                                
                                
                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck1" value="1">
                                            <label class="custom-control-label" for="customCheck1"><strong>Usuarios</strong></label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck2" value="2">
                                            <label class="custom-control-label" for="customCheck2">Registrar</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck3" value="3">
                                            <label class="custom-control-label" for="customCheck3">Editar</label>
                                        </div>
                                    </div>
            

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck4" value="4">
                                            <label class="custom-control-label" for="customCheck4">Eliminar</label>
                                        </div>
                                    </div>

                                </div>
                                <hr class="bg-secondary">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md">

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck5" value="5">
                                                    <label class="custom-control-label" for="customCheck5"><strong>Clientes</strong></label>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck6" value="6">
                                                    <label class="custom-control-label" for="customCheck6">Registrar</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck7" value="7">
                                                    <label class="custom-control-label" for="customCheck7">Editar</label>
                                                </div>
                                            </div>
                    
    
                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck27" value="8">
                                                    <label class="custom-control-label" for="customCheck27">Eliminar</label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                

                                
                            </div>

                            <hr class="bg-secondary">

                            <div class="form-row">

                                <div class="col-md-6">
                                
                                
                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck8" value="9">
                                            <label class="custom-control-label" for="customCheck8"><strong>Empleados</strong></label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck9" value="10">
                                            <label class="custom-control-label" for="customCheck9">Registrar</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck10" value="11">
                                            <label class="custom-control-label" for="customCheck10">Editar</label>
                                        </div>
                                    </div>
            

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck11" value="12">
                                            <label class="custom-control-label" for="customCheck11">Eliminar</label>
                                        </div>
                                    </div>

                                </div>
                                <hr class="bg-secondary">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md">

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck12" value="13">
                                                    <label class="custom-control-label" for="customCheck12"><strong>Vehiculos</strong></label>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck13" value="14">
                                                    <label class="custom-control-label" for="customCheck13">Registrar</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck14" value="15">
                                                    <label class="custom-control-label" for="customCheck14">Editar</label>
                                                </div>
                                            </div>
                    
    
                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck15" value="16">
                                                    <label class="custom-control-label" for="customCheck15">Eliminar</label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>

                                <hr>
                                
                            </div>

                            <hr class="bg-secondary">

                            <div class="form-row">

                                <div class="col-md-6">
                                
                                
                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck81" value="17">
                                            <label class="custom-control-label" for="customCheck81"><strong>Ordenes</strong></label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck91" value="18">
                                            <label class="custom-control-label" for="customCheck91">Registrar</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck101" value="19">
                                            <label class="custom-control-label" for="customCheck101">Editar</label>
                                        </div>
                                    </div>
            

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck111" value="20">
                                            <label class="custom-control-label" for="customCheck111">Anular</label>
                                        </div>
                                    </div>

                                </div>
                                <hr class="bg-secondary">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md">

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck121" value="21">
                                                    <label class="custom-control-label" for="customCheck121"><strong>Inventario</strong></label>
                                                </div>
                                            </div>

                                            <hr>

                                        </div>
                                    </div>

                                </div>

                                <hr>
                                
                            </div>

                            <hr class="bg-secondary">

                            <div class="form-row">

                                <div class="col-md-6">
                                
                                
                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck22" value="26">
                                            <label class="custom-control-label" for="customCheck22"><strong>Productos</strong></label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck23" value="27">
                                            <label class="custom-control-label" for="customCheck23">Registrar</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck24" value="28">
                                            <label class="custom-control-label" for="customCheck24">Editar</label>
                                        </div>
                                    </div>
            

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck25" value="29">
                                            <label class="custom-control-label" for="customCheck25">Eliminar</label>
                                        </div>
                                    </div>

                                </div>
                                <hr class="bg-secondary">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md">

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck262" value="22">
                                                    <label class="custom-control-label" for="customCheck262"><strong>Categorias (Productos)</strong></label>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck263" value="23">
                                                    <label class="custom-control-label" for="customCheck263">Registrar</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck264" value="24">
                                                    <label class="custom-control-label" for="customCheck264">Editar</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck265" value="25">
                                                    <label class="custom-control-label" for="customCheck265">Eliminar</label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                

                                
                            </div>

                            <hr class="bg-secondary">

                            <div class="form-row">

                                <div class="col-md-6">
                                
                                
                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck16" value="34">
                                            <label class="custom-control-label" for="customCheck16"><strong>Compras</strong></label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck17" value="35">
                                            <label class="custom-control-label" for="customCheck17">Registrar</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck18" value="36"> 
                                            <label class="custom-control-label" for="customCheck18">Anular</label>
                                        </div>
                                    </div>

                                </div>
                                <hr class="bg-secondary">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md">

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck19" value="37">
                                                    <label class="custom-control-label" for="customCheck19"><strong>Ventas</strong></label>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck20" value="38">
                                                    <label class="custom-control-label" for="customCheck20">Registrar</label>
                                                </div>
                                            </div>                    
    
                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck21" value="39">
                                                    <label class="custom-control-label" for="customCheck21">Anular</label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                

                                
                            </div>

                            <hr class="bg-secondary">

                            <div class="form-row">

                                <div class="col-md-6">
                                
                                
                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck161" value="41">
                                            <label class="custom-control-label" for="customCheck161"><strong>Roles</strong></label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck171" value="42">
                                            <label class="custom-control-label" for="customCheck171">Registrar</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck181" value="43"> 
                                            <label class="custom-control-label" for="customCheck181">Editar</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck1811" value="44"> 
                                            <label class="custom-control-label" for="customCheck1811">Eliminar</label>
                                        </div>
                                    </div>

                                </div>
                                <hr class="bg-secondary">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md">

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck1612" value="30">
                                                    <label class="custom-control-label" for="customCheck1612"><strong>Proveedores</strong></label>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck1712" value="31">
                                                    <label class="custom-control-label" for="customCheck1712">Registrar</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck1812" value="32"> 
                                                    <label class="custom-control-label" for="customCheck1812">Editar</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck18112" value="33"> 
                                                    <label class="custom-control-label" for="customCheck18112">Eliminar</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>  
                                
                            </div>

                            <hr class="bg-secondary">

                            <div class="form-row">

                                <div class="col-md-6">
                                </div>
                                <hr class="bg-secondary">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md">

                                            <div class="row">
                                                <div class="custom-control custom-checkbox pr-3">
                                                    <input type="checkbox" name="permisos[]" class="custom-control-input" id="customCheck16123" value="40">
                                                    <label class="custom-control-label" for="customCheck16123"><strong>Reportes</strong></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

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
    <div class="modal fade" id="modalMostrarRol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="card">
                    <div class="card-header">
                            <h2 class="text-center">Rol</h2>
                    </div>
                    <div class="card-body">
                        <form id="formularioMostrarRol">
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
    <div class="modal fade" id="modalActualizarRol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="card">
                    <div class="card-header">
                            <h2 class="text-center">Actualizar Rol</h2>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data" id="formularioActualizarRol">
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


    <script src="<?= ROOT; ?>public/assets/js/rol/index.js"></script>


