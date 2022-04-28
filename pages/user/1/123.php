<?php $id_perfil=1;?>
<?php
session_start(); //incio de cesion
include("../../../config/db.php"); //incluir database
//include("../../php/itemslogin.php"); //incluir items del login
include("../../php/verperfil.php");//incluir items de la publicacion
include("../../php/itemspubli.php");//incluir items de la publicacion

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
      <a href="../../modperfil/editportada.html">  <button type="button" name="button">Editar Perfil</button></a>
      <div class="cuerpo_linea"></div>
      <div class="cuerpo_informacion">

        <ul>
          <li>
            <p>Estudió Electronics and Communication engineering en UNT Argentina</p>
          </li>
          <li>
            <p>Estudió en Instituto Tecnico Salesiano Lorenzo Massa</p>
          </li>
          <li>
            <p>Vive en San Miguel de Tucumán</p>
          </li>
          <li>
            <p>Soltero</p>
          </li>

        </ul>
      </div>
      <button type="button" name="button">Editar detalles</button>
      <div class="cuerpo_linea"></div>

    <a href="../../modperfil/subir.html">  <button type="button" name="button">Subir archivo</button></a>


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
