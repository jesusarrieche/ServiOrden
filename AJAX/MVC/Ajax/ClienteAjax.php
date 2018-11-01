<?php
    $peticionAjax = TRUE;
    require_once '../Modelos/Conexion.php';
	if(isset($_POST['identificacion'])){
		require_once "../Controladores/ClienteControlador.php";

		$cliente = new ClienteControlador();

		echo $cliente->Guardar();
	}
?>