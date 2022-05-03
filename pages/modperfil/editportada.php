<?php
session_start();
include("../../config/db.php"); //incluir database
include("../php/itemslogin.php"); //incluir items del login

if($_SESSION["autorizado"] == TRUE){

include("../php/verificar.php"); //verificacion de inicio de secion y caducidad
header("Refresh: 5; URL= subirperfil.php");

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
  <title>UPLOADER / Editar Perfil</title>
</head>

<body>
  <header>
    <div class="header_titulo">
      <h1> <a href="../inicio.php"> Uploader </a></h1>
    </div>
    <h2> <a href="../user/<?php echo $id."/".$usuario.".php" ?>"> Volver </a></h2>
  </header>

  <div class="cuerpo">


    <div class="cuerpo_portada">

      <div class="imagen_portada">
        <img src="../user/<?php echo $id."/perfil/portada2.jpg"?>" alt="">
      </div>
      <div class="portada_perfil">
        <img src="../user/<?php echo $id."/perfil/perfil.jpg"?>" alt="">
      </div>
    </div>


    <div class="cuerpo_debajoPortada">

      <div class="cuerpo_linea"></div>

      <div class="cuerpo_editarportada">
        <h1>Aqui puedes editar tus fotos de perfil o portada</h1>
      </div>
      <div class="cuerpo_linea"></div>
      <div class="cuerpo_botonesDeEdicion">
      <a href="subirperfil.php"> <button type="button" name="button">Foto perfil</button></a>
      <a href="subirportada.php">  <button type="button" name="button">Foto portada</button></a>
      </div>


    </div>




  </div>




</body>

</html>


<?php }

else {
  header("Location:../index.php");
} ?>
