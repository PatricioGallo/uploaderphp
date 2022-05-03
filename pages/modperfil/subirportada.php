<?php
session_start();
include("../../config/db.php"); //incluir database
include("../php/itemslogin.php"); //incluir items del login


if($_SESSION["autorizado"] == TRUE){

include("../php/verificar.php"); //verificacion de inicio de secion y caducidad

$subido=1;

if($_FILES){

$ruta_fotoSubida = $_FILES['portada']['tmp_name'];
move_uploaded_file($ruta_fotoSubida,"../user/".$id."/perfil/portada2.jpg");
$subido=0;
}
clearstatcache();
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
  <title>UPLOADER / editar portada</title>
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
        <h1>Editar foto de portada</h1>
      </div>

      <div class="cuerpo_linea"></div>
      <form class="" action="subirportada.php" method="post" enctype="multipart/form-data">

        <div class="cuerpo_publicacionPerfil" id="cuerpo_publicacionPerfilMod" >
          <a href="perfil.php"><img src="../user/<?php echo $id."/perfil/portada2.jpg"?>" alt="" id="imagenPortada" ></a>
        </div>
        <div class="cuerpo_linea"></div>
        <div class="publicacion2_formulario">
          <div class="publicacion_formularioTitulo">
            <h1>Aqui puedes seleccionar tu nueva foto de portada</h1>
          </div>
          <?php if($subido==1){ ?>
            <div class="publicacion_cajaInput">
              <input type="file" name="portada" value="">
            </div>
        <!--  <button type="button" name="button" id="subir">Seleccionar</button> -->
<?php }else if($subido==0){
  echo "La foto de portada se guardo con exito";
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
