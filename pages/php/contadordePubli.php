<?php

$listaSQL= $conexion ->prepare("SELECT * FROM archivos");
$listaSQL ->execute();
$listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);
$contador_archivosSubidos = 0;
$contador_gigas = 0;
  foreach ($listatabla as $lista) {

    if($id_perfil== $lista['id_userArchivo']){
$contador_archivosSubidos = $contador_archivosSubidos +1;
$contador_gigas = $contador_gigas + $lista['tamano_archivo'];
}

$contador_gigas = round($contador_gigas / 1000);

}


$listaSQL= $conexion ->prepare("SELECT * FROM publicaciones");
$listaSQL ->execute();
$listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);
$contador_publicaciones = 0;
  foreach ($listatabla as $lista) {

    if($id_perfil== $lista['id_user']){
$contador_publicaciones = $contador_archivosSubidos +1;
}

}

 ?>
