<?php
session_start();


if($_SESSION){  //si ya esta iniciada la sesion
header("Location:inicio.php");

}

else{ //si no se inicia sesion todo el programa
include("../config/db.php"); //incluyo la base de datos
$flags=0;
include("php/registrarse.php"); //incluyo el registro


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="stylesheet" href="../css/index.css">

  <title>Uploader / Registro</title>
</head>

<body>

  <header>
    <div class="header_titulo">
         <h1>  <a href="../index.php">Uploader</a></h1>
    </div>
  </header>

  <div class="cuerpo">

    <div class="cuerpo_formulario">

      <form action="registro.php" method="POST">

        <label for="fname">Nombre</label>
        <input type="text"  name="nombre" placeholder="Tu nombre">

        <label for="fname">Apellido</label>
        <input type="text"  name="apellido" placeholder="Tu apellido">


        <label for="fname">Usuario</label>
        <input type="text"  name="user" placeholder="Tu usuario">

        <label for="lname">Contraseña</label>
        <input type="password"  name="pswd" placeholder="Contraseña">

        <label for="lname">Repetir contraseña</label>
        <input type="password"  name="pswd2" placeholder="Repetir contraseña">

      <button type="submit" name="button">Registrar</button>

      <div class="formulario_registro">
        <?php
            if ($flags==1) {
              echo "<h4>ERROR!. No dejes campos sin rellenar.</h4>";
            } elseif ($flags==2) {
              echo "<h4>ERROR! Las contraseñas no coinciden.</h4>";
            }
            elseif ($flags==3) {
              echo "<h4>ERROR! El usuario elegido ya se encuentra registrado.</h4>";
            }

?>

      </div>
      </form>

    </div>
  </div>

  <footer>
    <div class="footer_legenda">
      <h5>2022 - <a href="#">Patricio Gallo</a>. Todos los derechos reservados.</h5>
    </div>

  </footer>
</body>

</html>

<?php } ?>
