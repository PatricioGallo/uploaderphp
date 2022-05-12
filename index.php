<?php
session_start();


if($_SESSION){  //si ya esta iniciada la sesion
header("Location:pages/inicio.php");

}

else{ //si no se inicia sesion todo el programa
include("config/db.php"); //incluyo la base de datos
$flag=0;
$flags=0;
include("pages/php/registrarseinicio.php"); //incluyo el registro

if(!empty ($_POST['user']) && !empty ($_POST['pswd'])){ //si no esta vacio el post

    $listaSQL= $conexion ->prepare("SELECT * FROM login");
    $listaSQL ->execute();
    $listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);
    $flag=0;


      foreach ($listatabla as $lista) {
         if ($lista['user']== $_POST['user'] &&  $lista['pswd']== $_POST['pswd']) {
           $flag=1;
           $_SESSION["autorizado"] = true;
           $_SESSION["id"]=$lista["id"];
           session_regenerate_id();
         }
      }

        if ($flag==1) {
          header("Location:pages/inicio.php");
        }
        else {
          $flag=2;
        }

}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="stylesheet" href="css/index.css">

  <title>Uploader</title>
</head>

<body>

  <header>
    <div class="header_titulo">
     <h1>  <a href="index.php">Uploader</a></h1>
    </div>
    <div class="espacio"></div>
    <div class="formulario_header">
    <form action="index.php" method="POST">
      <input type="text"  name="user" placeholder="Usuario">
      <input type="password"  name="pswd" placeholder="Pass">
    <button type="submit" name="button">Ingresar</button>
    </form>
  </div>
  </header>

  <div class="cuerpo">

    <div class="cuerpo_formulario">

      <form action="index.php" method="POST">
        <label for="fname">Usuario</label>
        <input type="text"  name="user" placeholder="Tu usuario">

        <label for="lname">Contraseña</label>
        <input type="password"  name="pswd" placeholder="Contraseña">

      <button type="submit" name="button">Ingresar</button>

      <div class="formulario_registro">
        <?php
            if ($flag==2) {
              echo "<h4>ERROR!, Intenta nuevamente</h4>";
            }
         ?>
        <h5>No soy un usuario registrado</h5><a href="pages/registro.php">Registrarse aqui</a>
      </div>

      </form>

    </div>




      <div class="cuerpo_imagen">
            <img src="media/imagenes/inicio.jpg" alt="">
      </div>

        <div class="cuerpo_registro">
          <div class="bordes_registro">
            <form action="index.php" method="POST">

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

  </div>

  <footer>
    <div class="footer_legenda">
      <h5>2022 - <a href="#">Patricio Gallo</a>. Todos los derechos reservados</h5>
    </div>

  </footer>
</body>

</html>

<?php } ?>
