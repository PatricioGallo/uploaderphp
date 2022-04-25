<?php
session_start();


if($_SESSION){  //si ya esta iniciada la sesion
header("Location:pages/inicio.php");

}

else{ //si no se inicia sesion todo el programa
include("config/db.php"); //incluyo la base de datos
$flag=0;


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
      <h1>Uploader</h1>
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
              echo "<h4>ERROR!, intenta de nuevo</h4>";
            }
         ?>
        <h5>No soy un usuario registrado</h5><a href="pages/registro.php">Registrarse aqui</a>
      </div>

      </form>

    </div>
  </div>

  <footer>
    <div class="footer_legenda">
      <h5>2022 - Todos los derechos reservados</h5>
    </div>

  </footer>
</body>

</html>

<?php } ?>
