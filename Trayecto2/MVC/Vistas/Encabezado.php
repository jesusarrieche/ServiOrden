<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>HidroParts</title>

    <script src="lib/DataTables/jQuery-3.3.1/jquery-3.3.1.js" type="text/javascript"></script>


    <!-- Bootstrap CSS -->
    <link href="Assets/css/bootstrap.css" rel="stylesheet">

    <!-- Admin -->
    <link rel="stylesheet" href="Assets/css/AdminLTE.css">

    <!-- Iconos -->
    <link rel="stylesheet" type="text/css" href="Assets/Icon/css/all.css">
    <link rel="shortcut icon" type="text/css" href="Assets/Icon/favicon.ico">

    <!-- Estilos Propios -->
    <link href="Assets/css/menu-lateral.css" rel="stylesheet">
    <link href="Assets/css/estilos.css" rel="stylesheet">


    <!-- Sweet-Alert -->
    <link rel="stylesheet" href="Assets/css/sweetalert2.css">

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="Assets/css/select2.css">
    <script src="Assets/js/sweetalert2.all.js"></script>

    <!-- DataTable -->
    <link href="lib/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
</head>

<body>

    <?php

        session_start();

        var_dump($_SESSION);

        if(!isset($_SESSION['usuario'])){

            header("location:?controlador=Login&accion=Login");
        }

    ?>

    <!-- Inicio Contenedor Principal -->
    <div id="contenedor-principal" class="mostrar">

        <!-- Contenedor Lateral -->
        <div id="contenedor-lateral">
            <ul class="text-light" id="menu-lateral">
                <a href="?controlador=Inicio" class="nav-link"><center><span class="font-weight-normal text-white" id="titulo">Hidro<span id="resaltado">Parts</span></span></center></a>
                <div class="dropdown-divider m-2"></div>
                <li>
                    <div class="row">
                        <div class="col-12">
                            <center><img src="Assets/imagenes/usuario.png" height="100" width="100" class= "rounded-circle"></center>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                           <center><span><?= $_SESSION['usuario'];?></span> </center>
                        </div>
                    </div>
                    <div class="row justify-content-center" id="iconos">
                        <div class="col-2 pl-0">
                           <a href="?controlador=Inicio"><i class="fas fa-home d-flex"></i></a>
                        </div>
<!--                        <div class="col-2 pl-0">
                            <a href="#"><i class="fas fa-cog d-flex"></i></a>
                        </div>-->
                        <div class="col-2 pl-0 d">
                                <a href="?controlador=Login&accion=CerrarSession"><i class="fas fa-power-off d-flex"></i></a>
                        </div>
                </li>
                <div class="dropdown-divider m-2"></div>
                <?php
                  if ($_SESSION['privilegio'] == 2):
                 ?>
                <li>
                    <a class= "sombra" href="?controlador=usuario">
                        <div class="row m-0 p-0">
                            <div class="col-md-3 p-0">
                                <i class="fas fa-user fa-lg mt-3"></i>
                            </div>
                            <div class="col-md-9 mt-1">
                                <span>Usuarios</span>
                            </div>
                        </div>
                    </a>
                </li>
                <?php
                  endif;
                 ?>
                <li>
                    <a class= "sombra" href="?controlador=cliente">
                        <div class="row m-0 p-0">
                            <div class="col-md-3 p-0">
                                <i class="fas fa-users fa-lg mt-3"></i>
                            </div>
                            <div class="col-md-9 mt-1">
                                <span>Clientes</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class= "sombra" href="?controlador=Vehiculo">
                        <div class="row m-0 p-0">
                            <div class="col-md-3 p-0">
                                <i class="fas fa-car fa-lg mt-3"></i>
                            </div>
                            <div class="col-md-9 mt-1">
                                <span>Vehiculos/Cajas</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class= "sombra" href="?controlador=Empleado">
                        <div class="row m-0 p-0">
                            <div class="col-3 p-0">
                                <i class="fas fa-briefcase fa-lg mt-3"></i>
                            </div>
                            <div class="col-9 mt-1">
                                <span>Empleados</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class= "sombra" href="?controlador=orden">
                        <div class="row m-0 p-0">
                            <div class="col-3 p-0">
                                <i class="fas fa-clipboard-list fa-lg mt-3"></i>
                            </div>
                            <div class="col-9 mt-1">
                                <span>Ordenes</span>
                            </div>
                        </div>
                    </a>
                </li>

                <div class="dropdown-divider m-2"></div>
                <li>
                    <a class="sombra" href="?controlador=Reporte">
                        <div class="row m-0 p-0">
                            <div class="col-md-3">
                                <i class="fas fa-chart-bar fa-2x mt-2 d-flex"></i>
                            </div>
                           <div class="col-md-9 mt-1">
                               <span>Reportes</span>
                           </div>
                        </div>
                    </a>
                </li>

                <div class="dropdown-divider m-2"></div>
                <li>
                    <a class="sombra" href="#">
                        <div class="row m-0 p-0">
                            <div class="col-md-3">
                                <i class="fas fa-question-circle fa-2x mt-2 d-flex"></i>
                            </div>
                           <div class="col-md-9 mt-1">
                               <span>Ayuda</span>
                           </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Fin Contenedor Lateral -->

        <!-- Barra Superior -->
        <nav class="navbar navbar-dark bg-dark p-0 shadow sticky-top borde">
            <a href="#menu-mostrar" class="btn btn-dark m-1" id="menu-mostrar"><i class="fas fa-bars"></i> Menu</a>
            <ul class="navbar-nav px-3">
                <li class="nav-item">
                    <a class="nav-link" href="?controlador=Login&accion=CerrarSession"><i class="fas fa-sign-out-alt"></i> Salir</a>
                </li>
            </ul>
        </nav>
        <!-- Fin Barra Superior -->

         <!-- Contenido Principal -->
