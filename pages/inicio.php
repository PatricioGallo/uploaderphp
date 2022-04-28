<?php
session_start();
include("../config/db.php"); //incluir database
include("php/itemslogin.php"); //incluir items del login
include("php/itemspubli.php");//incluir items de la publicacion

if($_SESSION["autorizado"] == TRUE){

include("php/verificar.php"); //verificacion de inicio de secion y caducidad


 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/perfil.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
  <title>UPLOADER / Perfil</title>
</head>

<body>
  <header>
    <div class="header_titulo">
      <h1> <a href="#"> Uploader </a></h1>
    </div>
    <div class="header_perfil">
      <a href=" <?php echo "user/".$id."/".$usuario.".php"; ?> "><img src="<?php echo "user/".$id."/perfil/perfil.jpg" ?> " alt=""></a>
    </div>
  </header>


  <div class="cuerpo">

    <div class="cuerpo_publicacion">
      <div class="publicacion_foto">
        <a href="<?php echo "user/".$id."/".$usuario.".php"; ?>  "><img src="<?php echo "user/".$id."/perfil/perfil.jpg" ?> " alt=""></a>
      </div>

      <div class="publicacion_texto">
        <a href="modperfil/publicacion.php"> <input type="text" name="" value="" placeholder="¿Que estas pensando?" > </a>
      </div>

    </div>



<?php

foreach ($listatabla as $lista) {

  $nombre_pu= $lista['nombre'];
  $apellido_pu= $lista['apellido'];
  $mg= $lista['mg'];
  $contenido= $lista['contenido'];
  $id_user = $lista['id_user'];
  $user_pu = $lista['user'];
  ?>

  <div class="cuerpo_archivossubidos">
    <div class="archivos_perfil">
    <a href="<?php echo "user/".$id_user."/".$user_pu.".php"; ?> ">  <img src="<?php echo "user/".$id_user."/perfil/perfil.jpg" ?>" alt=""> </a>
    <a href=" <?php echo "user/".$id_user."/".$user_pu.".php"; ?> ">  <h4> <?php echo $nombre_pu." ".$apellido_pu; ?> </h4></a>
    </div>
    <div class="archivos_contenido">

        <?php echo $contenido; ?>  
    </div>
    <div class="archivos_footer">

    </div>
  </div>


<?php }?>


  </div>
</body>

</html>

<?php }

else {
  header("Location:../index.php");
} ?>
