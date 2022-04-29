<?php

$subido=1;
if($_FILES){

$nombre_archivoSubido = $_FILES['archivo']['name'];
$ruta_archivoSubido = $_FILES['archivo']['tmp_name'];
$descripcion_archivo = $_POST['descripcion_archivo'];
$tamano_archivo = $_FILES['archivo']['size'];
move_uploaded_file($ruta_archivoSubido,"../user/".$id."/media/".$nombre_archivoSubido);



$listaSQL= $conexion ->prepare("INSERT INTO `archivos` (`id_userArchivo`, `nombre_archivo`, `descripcion_archivo`, `tamano_archivo`) VALUES ( '$id', '$nombre_archivoSubido', '$descripcion_archivo', '$tamano_archivo')  ");
$listaSQL ->execute();
$subido=0;

}
 ?>
