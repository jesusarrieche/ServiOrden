<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>HidroParts</title>

    <!-- Bootstrap CSS -->
    <link href="Assets/css/bootstrap.css" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="shortcut icon" type="text/css" href="Assets/Icon/favicon.ico">

    <!-- Estilos Propios -->
    <link href="Assets/css/menu-lateral.css" rel="stylesheet">
    <link href="Assets/css/estilos.css" rel="stylesheet">
    
    <!-- Sweet-Alert -->
    <link rel="stylesheet" href="Assets/css/sweetalert2.css">
    <script src="Assets/js/sweetalert2.all.js"></script>

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="Assets/css/select2.css">
    
    
</head>

<body>
<?php
    if(isset($alerta)){
        echo $alerta;
    }
?>
<div class="container-fluid login">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="container bg-white rounded p-3 shadow">
                <img src="" width="100%">
                <hr class="bg-danger">
                <center><i class="fas fa-user-circle fa-5x"></i></center>
                <center><h1>Inicio de Sesion</h1></center>
                <hr class="bg-danger">
                <form action="?controlador=Login&accion=IniciarSession"  method="POST" class="h-25 rounded">
                    <div class="row form-group">
                        <label for="id_usuario" class="col-form-label col-md-3">Usuario:</label>
                        <div class="col-md-9">
                            <input name="usuario" type="text" pattern="[A-Za-z0-9._]{2,}" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="password" class="col-form-label col-md-3">Contraseña:</label>
                        <div class="col-md-9">
                            <input name="password" type="password" pattern="[A-Za-z0-9]{2,}" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group justify-content-center">
                        <button type="submit" class="btn btn-success m-2">Iniciar</button>
                        <button type="reset" class="btn btn-secondary m-2">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



 
    <!-- Bootstrap core JavaScript -->
    <script src="Assets/js/jquery/jquery-3.2.1.js"></script>
    <script src="Assets/js/bootstrap/bootstrap.js"></script>
    <script src="Assets/js/menu_lateral.js"></script>
    <script src="Assets/js/validacion.js"></script>
	<script src="Assets/js/select2.js"></script>
</body>

</html>