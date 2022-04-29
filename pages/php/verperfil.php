<?php

$listaSQL= $conexion ->prepare("SELECT * FROM login");
$listaSQL ->execute();
$listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);

  foreach ($listatabla as $lista) {

    if($id_perfil== $lista['id']){
 $nombre_perfil= $lista['nombre'];
 $apellido_perfil= $lista['apellido'];
 $usuario_perfil= $lista['user'];
 $tipoDeCuenta = $lista['tipoDeCuenta'];
 $cantidadPubli = $lista['cantidadPubli'];
  $nacionalidad = $lista['nacionalidad'];
   $cantidadGigas = $lista['cantidadGigas'];
}
}

?>
