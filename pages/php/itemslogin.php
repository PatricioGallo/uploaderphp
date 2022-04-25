<?php

$listaSQL= $conexion ->prepare("SELECT * FROM login");
$listaSQL ->execute();
$listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);

  foreach ($listatabla as $lista) {

    if($_SESSION["id"]== $lista['id']){
 $nombre_user= $lista['nombre'];
 $apellido_user= $lista['apellido'];
 $estado= $lista['estado'];
 $id= $lista['id'];
 $usuario= $lista['user'];
}
}

?>
