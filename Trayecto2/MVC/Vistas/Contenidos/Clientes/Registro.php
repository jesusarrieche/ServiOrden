<div id="contenido-principal">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 justify-content-md-center">
                <h1><center><?= $titulo ;?> Cliente</center></h1>
                <hr class="bg-danger">

                <form action="?controlador=cliente&accion=Guardar" method="POST">
                    <div class="row form-group">
                        <input  name="id" hidden value="<?= $cliente->getId();?>">
                        <label for="nombre" class="col-form-label col-md-2">Nombre:</label>
                        <div class="col-md-4 ">
                            <input type="text" name="nombre" pattern="[A-Za-z ]+" title="Ingrese solo letras" maxlength="30" required="required" class="form-control" placeholder="Nombre" value="<?= $cliente->getNombre();?>">
                        </div> 

                        <label for="apellido" class="col-form-label col-md-2">Apellido:</label>
                        <div class="col-md-4 ">
                            <input type="text" name="apellido" pattern="[A-Za-z ]+" title="Ingrese solo letras" maxlength="30" required="required"  class="form-control" placeholder="Apellido" value="<?= $cliente->getApellido();?>">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="cedula_cliente" class="col-form-label col-md-2">Cedula/RIF:</label>
                        <div class="col-md-1 ">
                            <select class="form-control pl-0 pr-0" name="inicial_identificacion" required="">
                                <option value="" selected="">-</option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                                <option value="J">J</option>
                                <option value="G">G</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" pattern="[0-9]+{6,8}" name="identificacion" minlength="6" maxlength="8" title="Ingrese entre 6 y 8 digitos" class="form-control" placeholder="Identificaion" value="<?= $cliente->getIdentificacion();?>" required="">
                        </div>
                        <label for="telefono" class="col-form-label col-md-2">Telefono:</label>
                        <div class="col-md-4 ">
                            <input type="tel" name="telefono" title="Debe Contener minimo 11 Caracteres numericos" minlength="10"  maxlength="12" pattern="[0-9-]+" required class="form-control" placeholder="Telefono" value="<?= $cliente->getTelefono();?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="correo" class="col-form-label col-md-2">Correo:</label>
                        <div class="col-md-4 ">
                            <input type="email" name="correo" required class="form-control" placeholder="Correo Electronico" value="<?= $cliente->getCorreo();?>">
                        </div>

                        <label for="direccion" class="col-form-label col-md-2">Direccion:</label>
                        <div class="col-md-4">
                            <input type="text" name="direccion" pattern="[A-Za-z0-9/ ]+" required maxlength="150" class="form-control" placeholder="Direccion" value="<?= $cliente->getDireccion();?>">
                        </div>
                    </div>

                    <hr class="bg-secondary">

                    <div class="row form-group justify-content-md-center">
                        <a href="?controlador=Cliente" class="btn btn-secondary m-2"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                        <button type="submit"  class="btn btn-success m-2">Enviar</button>
                        <button type="reset" class="btn btn-danger m-2">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>