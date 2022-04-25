<?php

$listaSQL= $conexion ->prepare("SELECT * FROM publicaciones ORDER BY id DESC");
$listaSQL ->execute();
$listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);

?>
