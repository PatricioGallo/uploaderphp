<?php $id_perfil=35;?>


















<?php
session_start(); //incio de cesion
include("../../../config/db.php"); //incluir database
//include("../../php/itemslogin.php"); //incluir items del login
include("../../php/verperfil.php");//incluir items del usuario de la web perfil
include("../../php/itemspubli.php");//incluir items de la publicacion
include("../../php/contadordePubli.php");//incluir contador de publicacion

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../../css/perfil.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
  <title>UPLOADER / Perfil</title>
</head>

<body>
  <header>
    <div class="header_titulo">
      <h1> <a href="../../inicio.php"> Uploader </a></h1>
    </div>
      <h2> <a href="../../php/cerrar.php">Cerrar</a></h2>
  </header>

  <div class="cuerpo">

    <div class="cuerpo_portada">

      <div class="imagen_portada">
        <img src="perfil/portada2.jpg" alt="">
      </div>
      <div class="portada_perfil">
        <img src="perfil/perfil.jpg" alt="">
      </div>
    </div>

    <div class="cuerpo_debajoPortada">
      <div class="cuerpo_usuario">
        <h2><?php echo $nombre_perfil." ".$apellido_perfil; ?> </h2>
      </div>

<?php if ($id_perfil == $_SESSION["id"]) { ?>
      <a href="../../modperfil/editportada.php">  <button type="button" name="button">Editar Perfil</button></a>
<?php  }  ?>

      <div class="cuerpo_linea"></div>

      <div class="cuerpo_informacion">

        <ul>
          <li>
            <p>Nacionalidad: <?php echo " ".$nacionalidad; ?></p>
          </li>
          <li>
            <p>Tipo de cuenta: <?php echo " ".$tipoDeCuenta; ?></p>
          </li>
          <li>
            <p>Cantidad de gigas disponibles: <?php echo " ".$contador_gigas; ?></p>
          </li>
          <li>
            <p>Cantidad publicaciones realizadas: <?php echo " ".$contador_publicaciones; ?></p>
          </li>

          <li>
            <p>Cantidad de archivos subidos: <?php echo " ".$contador_archivosSubidos; ?></p>
          </li>

        </ul>
      </div>

      <?php if ($id_perfil == $_SESSION["id"]) { ?>

                  <button type="button" name="button">Editar detalles</button>
      <?php  }  ?>



      <div class="cuerpo_linea"></div>


      <?php if ($id_perfil == $_SESSION["id"]) { ?>
              <a href="../../modperfil/subir.php">  <button type="button" name="button">Subir archivo</button></a>
      <?php  }  ?>



    <?php

    foreach ($listatabla as $lista) {

      $nombre_pu= $lista['nombre'];
      $apellido_pu= $lista['apellido'];
      $mg= $lista['mg'];
      $contenido= $lista['contenido'];
      $id_user = $lista['id_user'];
      ?>

<?php if ($id_user == $id_perfil){ //corregir para hacer web unica?>



      <div class="cuerpo_archivossubidos">
        <div class="archivos_perfil">
          <img src="<?php echo "perfil/perfil.jpg" ?>" alt="">
          <h4> <?php echo $nombre_pu." ".$apellido_pu; ?> </h4>
        </div>
        <div class="archivos_contenido">
            <?php echo $contenido; ?>
        </div>
        <div class="archivos_footer">

        </div>
      </div>
<?php } ?>

    <?php }?>








    </div>


  </div>



</body>

</html>
