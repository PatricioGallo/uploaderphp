<?php
session_start(); //incio de cesion
//include("../config/db.php"); //incluir database
//include("../../php/itemslogin.php"); //incluir items del login
//include("php/verperfil.php");//incluir items del usuario de la web perfil
//include("php/itemspubli.php");//incluir items de la publicacion


$nombre_descarga = $_GET['nombre'];
$apellido_descarga = $_GET['apellido'];
$id_descarga = $_GET['id'];
$nombre_archivoDescarga = $_GET['nombre_archivo'];
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
  <link rel="shortcut icon" href="../../../media/imagenes/icono.png">

  <title>UPLOADER / Perfil</title>
</head>

<body>
  <header>
    <div class="header_titulo">
      <h1> <a href="inicio.php"> Uploader </a></h1>
    </div>
  </header>

  <div class="cuerpo">


<!--                    CUERPO PARA PC                              -->
<div class="cuerpo_descarga">

  <div class="contenido_archivosSubidos">



        <div class="perfil_archivosSubidos">
          <a href="perfil.html"><img src="user/<?php echo $id_descarga."/perfil/perfil.jpg"?>" alt=""></a>
          <h1><?php echo $nombre_descarga." ".$apellido_descarga; ?></h1>

        </div>

        <div class="cuerpo_lineaPC"></div>

        <div class="contenido_subirArchivos">


              <h1>Aqui puedes descagar el archivo: <?php echo $nombre_archivoDescarga ?></h1>




      <div class="cuerpo_lineaPC"></div>
      <a href="user/<?php echo $id_descarga."/media/".$nombre_archivoDescarga; ?>" download> <button name="button">Descargar</button> </a>


    </div>
</div>

  </div>
</div>




<!--                    CUERPO PARA CELULAR                              -->



  </div>



</body>

</html>
