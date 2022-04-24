<?php


session_start(); //incio de cesion
include("../config/db.php"); //incluir database
include("modperfil/itemslogin.php"); //incluir items del login

if($_SESSION["autorizado"] == TRUE){

include("modperfil/verificar.php"); //verificacion de inicio de secion y caducidad


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
      <h1> <a href="inicio.php"> Uploader </a></h1>
    </div>
      <h2> <a href="modperfil/cerrar.php">Cerrar</a></h2>
  </header>

  <div class="cuerpo">

    <div class="cuerpo_portada">

      <div class="imagen_portada">
        <img src="../media/portada2.jpg" alt="">
      </div>
      <div class="portada_perfil">
        <img src="../media/perfil.jpg" alt="">
      </div>
    </div>

    <div class="cuerpo_debajoPortada">
      <div class="cuerpo_usuario">
        <h2><?php echo $nombre_user." ".$apellido_user; ?> </h2>
      </div>
      <a href="modperfil/editportada.html">  <button type="button" name="button">Editar Perfil</button></a>
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

    <a href="modperfil/subir.html">  <button type="button" name="button">Subir archivo</button></a>


      <div class="cuerpo_archivossubidos">
          <div class="archivos_perfil">
              <img src="../media/perfil.jpg" alt=""> <h4>Usuario</h4>
          </div>
          <div class="archivos_contenido">

          </div>
          <div class="archivos_footer">

          </div>
      </div>


      <div class="cuerpo_archivossubidos">
          <div class="archivos_perfil">
              <img src="../media/perfil.jpg" alt=""> <h4>Usuario</h4>
          </div>
          <div class="archivos_contenido">

          </div>
          <div class="archivos_footer">

          </div>
      </div>

      <div class="cuerpo_archivossubidos">
          <div class="archivos_perfil">
              <img src="../media/perfil.jpg" alt=""> <h4>Usuario</h4>
          </div>
          <div class="archivos_contenido">

          </div>
          <div class="archivos_footer">

          </div>
      </div>

      <div class="cuerpo_archivossubidos">
          <div class="archivos_perfil">
              <img src="../media/perfil.jpg" alt=""> <h4>Usuario</h4>
          </div>
          <div class="archivos_contenido">

          </div>
          <div class="archivos_footer">

          </div>
      </div>

      <div class="cuerpo_archivossubidos">
          <div class="archivos_perfil">
              <img src="../media/perfil.jpg" alt=""> <h4>Usuario</h4>
          </div>
          <div class="archivos_contenido">

          </div>
          <div class="archivos_footer">

          </div>
      </div>

      <div class="cuerpo_archivossubidos">
          <div class="archivos_perfil">
              <img src="../media/perfil.jpg" alt=""> <h4>Usuario</h4>
          </div>
          <div class="archivos_contenido">

          </div>
          <div class="archivos_footer">

          </div>
      </div>

      <div class="cuerpo_archivossubidos">
          <div class="archivos_perfil">
              <img src="../media/perfil.jpg" alt=""> <h4>Usuario</h4>
          </div>
          <div class="archivos_contenido">

          </div>
          <div class="archivos_footer">

          </div>
      </div>

      <div class="cuerpo_archivossubidos">
          <div class="archivos_perfil">
              <img src="../media/perfil.jpg" alt=""> <h4>Usuario</h4>
          </div>
          <div class="archivos_contenido">

          </div>
          <div class="archivos_footer">

          </div>
      </div>

      <div class="cuerpo_archivossubidos">
          <div class="archivos_perfil">
              <img src="../media/perfil.jpg" alt=""> <h4>Usuario</h4>
          </div>
          <div class="archivos_contenido">

          </div>
          <div class="archivos_footer">

          </div>
      </div>




    </div>


  </div>



</body>

</html>
<?php }

else {
  header("Location:../index.php");
} ?>
