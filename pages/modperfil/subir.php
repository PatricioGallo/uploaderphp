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
  <title>UPLOADER / Subir archivos</title>
</head>

<body>

  <header>
    <div class="header_titulo">
      <h1> <a href="../inicio.php"> Uploader </a></h1>
    </div>
    <h2> <a href="../user/<?php echo $id."/".$usuario."Archivos.php" ?>"> Volver </a></h2>
  </header>

  <div class="cuerpo">


    <!--               PARA PC                      -->

    <div class="cuerpo_portada">

      <div class="imagen_portada">
        <img src="../user/<?php echo $id; ?>/perfil/portada2.jpg" alt="">
      </div>
      <div class="portada_perfil">
        <img src="../user/<?php echo $id; ?>/perfil/perfil.jpg" alt="">
      </div>
      <div class="portada_nombre">
        <h2><?php echo $nombre_user." ".$apellido_user; ?> </h2>
      </div>
      <div class="cuerpo_lineaPC"></div>
      <div class="botones_portada">
        <a href="../user/<?php echo $id."/".$usuario.".php" ?>"> <div class="boton_deLaPortada"><h3 > Publicaciones </h3></div> </a>
        <a href="../user/<?php echo $id."/".$usuario."Archivos.php" ?>"> <div class="boton_deLaPortada"><h3 > Archivos Subidos </h3></div> </a>
        <a href="#"> <div class="boton_deLaPortada"><h3> Amigos </h3></div> </a>
        <a href="#"> <div class="boton_deLaPortada"><h3 style="color:green;"> Subir </h3></div> </a>

      </div>

    </div>

    <div class="cuerpo_debajoPortadaArchivos">
      
      <div class="contenido_archivosSubidos">

        <?php if($subido==1){ ?>
          <form class="" action="subir.php" method="post" enctype="multipart/form-data">

            <div class="perfil_archivosSubidos">
              <a href="perfil.html"><img src="../user/<?php echo $id."/perfil/perfil.jpg"?>" alt=""></a>
              <h1><?php echo $nombre_user." ".$apellido_user; ?></h1>
              <select name="estado">
                <option value="Publico">Publico</option>
                <option value="Privado">Privado</option>
              </select>
            </div>

            <div class="cuerpo_lineaPC"></div>

            <div class="contenido_subirArchivos">


                  <h1>Aqui puedes seleccionar un archivo para subir a tu cuenta</h1>


            <input type="file" name="archivo" value="">

          <div class="cuerpo_lineaPC"></div>
          <button type="submit" name="button">Subir</button>

                <!--  <button type="button" name="button" id="subir">Seleccionar</button> -->
          <?php }else if($subido==0){
            ?>
            <div class="contenido_subirArchivos"> <?php
          echo "<p>El archivo: ".$nombre_archivoSubido." se guardo con exito</p>";
          } ?>
        </div>


          </form>

        </div>
    </div>




<!--               PARA CELULARES                      -->

    <div class="cuerpo_publicacion2">
      <div class="cuerpo_publicacion2Titutlo">
        <h1>Subir archivo</h1>
      </div>

      <div class="cuerpo_linea"></div>



          <?php if($subido==1){ ?>
            <form class="" action="subir.php" method="post" enctype="multipart/form-data">

              <div class="cuerpo_publicacionPerfil">
                <a href="perfil.html"><img src="../user/<?php echo $id."/perfil/perfil.jpg"?>" alt=""></a>
                <h1><?php echo $nombre_user." ".$apellido_user; ?></h1>
                <select name="estado">
                  <option value="Publico">Publico</option>
                  <option value="Privado">Privado</option>
                </select>
              </div>

              <div class="cuerpo_linea"></div>
              <div class="publicacion2_formulario">
                  <div class="publicacion_formularioTitulo">
                    <h1>Aqui puedes seleccionar un archivo para subir a tu cuenta</h1>
                  </div>
            <div class="publicacion_cajaInput">
              <input type="file" name="archivo" value="">
            </div>
            <div class="cuerpo_linea"></div>
            <button type="submit" name="button">Subir</button>
        <!--  <button type="button" name="button" id="subir">Seleccionar</button> -->
<?php }else if($subido==0){
  echo "<p>El archivo: ".$nombre_archivoSubido." se guardo con exito</p>";
} ?>



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
