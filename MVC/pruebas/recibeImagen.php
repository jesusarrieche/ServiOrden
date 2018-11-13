<?php

$archivo = $_FILES['imagen']['tmp_name'];
$imagen = $_FILES['imagen']['name'];

//var_dump($_FILES);
//var_dump($_POST);


$descripcion = $_POST['descripcion'];

move_uploaded_file($archivo, "./imagenes/cedulajds.jpg");

echo $archivo." ".$imagen ."<br>" . $descripcion;

