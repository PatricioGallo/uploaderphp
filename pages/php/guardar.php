<?php

$subido=1;
if($_FILES){

$nombre_archivoSubido = $_FILES['archivo']['name'];
$ruta_archivoSubido = $_FILES['archivo']['tmp_name'];
$tamano_archivo = $_FILES['archivo']['size'];
$estado_archivo = $_POST['estado'];
move_uploaded_file($ruta_archivoSubido,"../user/".$id."/media/".$nombre_archivoSubido);



$listaSQL= $conexion ->prepare("INSERT INTO `archivos` (`id_userArchivo`, `nombre_archivo`,  `tamano_archivo`,`estado`) VALUES ( '$id', '$nombre_archivoSubido', '$tamano_archivo','$estado_archivo')  ");
$listaSQL ->execute();
$subido=0;

}
 ?>
