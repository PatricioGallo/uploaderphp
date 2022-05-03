<?php

$listaSQL= $conexion ->prepare("SELECT * FROM archivos ORDER BY id DESC");
$listaSQL ->execute();
$listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);

?>
