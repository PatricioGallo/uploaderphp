<?php
session_start(); //incio de cesion
include("../../config/db.php"); //incluir database
include("../php/itemslogin.php"); //incluir items del login

if($_SESSION["autorizado"] == TRUE){

include("../php/verificar.php"); //verificacion de inicio de secion y caducidad


if(!empty ($_POST['contenido']) ){ //si no esta vacio el post

  $contenido = $_POST['contenido'];
  $listaSQL= $conexion ->prepare("INSERT INTO `publicaciones` (`id_user`, `user`, `nombre`, `apellido`, `contenido`) VALUES ( '$id', '$usuario', '$nombre_user', '$apellido_user', '$contenido')");
  $listaSQL ->execute();



header("Location:../inicio.php");

}

 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/perfil.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../../media/imagenes/icono.png">

  <title>UPLOADER / Publicacion</title>
</head>

<body>

  <header>
    <div class="header_titulo">
      <h1> <a href="../inicio.php"> Uploader </a></h1>
    </div>
    <h2> <a href="../inicio.php"> Volver </a></h2>
  </header>

  <div class="cuerpo">


    <div class="cuerpo_publicacion2">
      <div class="cuerpo_publicacion2Titutlo">
        <h1>Crear publicacion</h1>
      </div>

      <div class="cuerpo_linea"></div>
        <form  action="publicacion.php" method="post">

      <div class="cuerpo_publicacionPerfil">
        <a href="../perfil.html"><img src="<?php echo "../user/".$id."/perfil/perfil.jpg" ?> " alt=""></a>
        <h1><?php echo $nombre_user." ".$apellido_user; ?></h1>
      </div>
      <div class="cuerpo_linea"></div>
      <div class="publicacion2_formulario">

          <textarea name="contenido" rows="8" cols="80" placeholder="¿Que estas pensando?"></textarea>
          <div class="cuerpo_linea"></div>
          <button type="submit" name="button">Publicar</button>
        </form>
      </div>

    </div>

  </div>

</body>

</html>

<?php }

else {
  header("Location:../index.php");
} ?>
