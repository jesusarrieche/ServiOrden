<div id="contenido-principal">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 justify-content-md-center">
                <h1><center><?= $titulo ;?> Cliente</center></h1>
                <hr class="bg-danger">

                <form action="?controlador=cliente&accion=Guardar" method="POST">
                    <div class="row form-group">
                        <input  name="id" hidden="" value="<?= $cliente->getId();?>">
                        <label for="nombre" class="col-form-label col-md-2">Nombre:</label>
                        <div class="col-md-4 ">
                            <input type="text" name="nombre" required="required" class="form-control" placeholder="Nombre" value="<?= $cliente->getNombre();?>">
                        </div>

                        <label for="apellido" class="col-form-label col-md-2">Apellido:</label>
                        <div class="col-md-4 ">
                            <input type="text" name="apellido" required="required" class="form-control" placeholder="Apellido" value="<?= $cliente->getApellido();?>">
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
                            <input type="text" name="identificacion" class="form-control" placeholder="Identificaion" value="<?= $cliente->getIdentificacion();?>" required="">
                        </div>
                        <label for="telefono" class="col-form-label col-md-2">Telefono:</label>
                        <div class="col-md-4 ">
                            <input type="tel" name="telefono"  maxlength="12" class="form-control" placeholder="Telefono" value="<?= $cliente->getTelefono();?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="correo" class="col-form-label col-md-2">Correo:</label>
                        <div class="col-md-4 ">
                            <input type="email" name="correo" class="form-control" placeholder="Correo Electronico" value="<?= $cliente->getCorreo();?>">
                        </div>

                        <label for="direccion" class="col-form-label col-md-2">Direccion:</label>
                        <div class="col-md-4 ">
                            <input type="text" name="direccion" class="form-control" placeholder="Direccion" value="<?= $cliente->getDireccion();?>">
                        </div>
                    </div>

                    <hr class="bg-secondary">

                    <div class="row form-group justify-content-md-center">
                        <a href="javascript:history.back(-1);" class="btn btn-secondary m-2"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                        <button type="submit"  class="btn btn-success m-2" id="validacion">Enviar</button>
                        <button type="reset" class="btn btn-danger m-2">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>