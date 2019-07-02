<?php

$nombre = "jesus.daniel.arrieche.jpg.sss";

$extension = explode('.', $nombre);

$extension = array_pop($extension);

echo $extension;