<?php

require_once "Modelos/Conexion.php";

if (!isset($_GET['controlador'])) {
    require_once "Controladores/InicioControlador.php";
    $controlador = new InicioControlador();
    call_user_func(array($controlador, "Inicio"));
} else {
    $controlador= $_GET['controlador'];
    require_once "Controladores/".ucwords($controlador) . "Controlador.php"; // si en la url viene controlador= vehiculo entonces ucwors-> Vehiculo -->> Controladores/VehiculoControlador.php
    $controlador = $controlador . "Controlador";	// $controlador = "VehiculoControlador";
    $controlador = new $controlador();				// Crea un Objeto de la Clase VehiculoControlador
    $accion = isset($_GET['accion']) ? $_GET['accion'] : "Inicio" ; // Si viene definida la accion entonces $accion = accion de lo contrario $accion = "inicio"
    call_user_func(array($controlador, "$accion"));	// se utiliza un objeto para llamar a la accion que se le pase.
}
