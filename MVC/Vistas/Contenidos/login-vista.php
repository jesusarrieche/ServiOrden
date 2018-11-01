<div class="container-fluid login">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="container bg-white rounded p-3 shadow">
                <img src="<?php echo SERVERURL ?>vistas/imagenes/hidroparts.png" width="100%">
                <hr class="bg-danger">
                <center><i class="fas fa-user-circle fa-5x"></i></center>
                <center><h1>Inicio de Sesion</h1></center>
                <hr class="bg-danger">
                <form action=""  method="POST" class="h-25 rounded">
                    <div class="row form-group">
                        <label for="id_usuario" class="col-form-label col-md-3">Usuario:</label>
                        <div class="col-md-9">
                            <input type="text" pattern="[A-Za-z0-9._]{2,}" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="password_usuario" class="col-form-label col-md-3">Contraseña:</label>
                        <div class="col-md-9">
                                <input type="password" pattern="[A-Za-z0-9]{2,}"class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group justify-content-center">
                        <button type="submit" class="btn btn-success m-2">Iniciar</button>
                        <button type="submit" class="btn btn-secondary m-2">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>