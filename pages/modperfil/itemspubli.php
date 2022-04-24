<?php

$listaSQL= $conexion ->prepare("SELECT * FROM publicaciones");
$listaSQL ->execute();
$listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);

?>
