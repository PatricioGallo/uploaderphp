<?php
session_start();
include("../../config/db.php"); //incluir database
include("../php/itemslogin.php"); //incluir items del login


if($_SESSION["autorizado"] == TRUE){

include("../php/verificar.php"); //verificacion de inicio de secion y caducidad
include("../php/guardar.php"); //guardar archivos subidos archivos a una carpeta

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
  <title>UPLOADER / Publicacion</title>
</head>

<body>

  <header>
    <div class="header_titulo">
      <h1> <a href="../inicio.php"> Uploader </a></h1>
    </div>
    <h2> <a href="../user/<?php echo $id."/".$usuario.".php" ?>"> Volver </a></h2>
  </header>

  <div class="cuerpo">


    <div class="cuerpo_publicacion2">
      <div class="cuerpo_publicacion2Titutlo">
        <h1>Subir archivo</h1>
      </div>

      <div class="cuerpo_linea"></div>
      <form class="" action="subir.php" method="post" enctype="multipart/form-data">

        <div class="cuerpo_publicacionPerfil">
          <a href="perfil.html"><img src="../user/<?php echo $id."/perfil/perfil.jpg"?>" alt=""></a>
          <h1><?php echo $nombre_user." ".$apellido_user; ?></h1>
        </div>
        <div class="cuerpo_linea"></div>
        <div class="publicacion2_formulario">

          <h1>Aqui puedes seleccionar un archivo para subir a tu cuenta</h1>
          <label for="fname">Descripcion</label>
          <input type="text" name="descripcion_archivo" value="">

          <?php if($subido==1){ ?>
          <input type="file" name="archivo" value="">
        <!--  <button type="button" name="button" id="subir">Seleccionar</button> -->
<?php }else if($subido==0){
  echo "El archivo: ".$nombre_archivoSubido." se guardo con exito";
} ?>
          <div class="cuerpo_linea"></div>
          <button type="submit" name="button">Subir</button>


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
