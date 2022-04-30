<?php
session_start();


if($_SESSION){  //si ya esta iniciada la sesion
header("Location:inicio.php");

}

else{ //si no se inicia sesion todo el programa
include("../config/db.php"); //incluyo la base de datos
$flag=2;


if(!empty ($_POST['user']) && !empty ($_POST['pswd']) && !empty ($_POST['nombre']) && !empty ($_POST['apellido']) && !empty ($_POST['pswd2']) ){ //si no esta vacio el post

if ($_POST['pswd'] ==  $_POST['pswd2'] ){

  $user = $_POST['user'];
  $pswd = $_POST['pswd'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $id;
  $listaSQL= $conexion ->prepare("INSERT INTO `login` (`user`, `pswd`, `nombre`, `apellido`) VALUES ( '$user', '$pswd', '$nombre', '$apellido')  ");
  $listaSQL ->execute();


  $listaSQL= $conexion ->prepare("SELECT * FROM login");
  $listaSQL ->execute();
  $listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);

    foreach ($listatabla as $lista) {

        if($user == $lista['user']){
        $id= $lista['id'];
        }

        $path = "user/".$id;
        $path2 = "user/".$id."/perfil";
        $path3 = "user/".$id."/media";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            mkdir($path2, 0777, true);
            mkdir($path3, 0777, true);
          }
        }

$fuente = "../media/perfil/perfil.jpg";
$fuente2 ="../media/perfil/portada2.jpg";
$fuente3 = "perfil.php";

$destino = "user/".$id."/perfil/perfil.jpg";
$destino2 = "user/".$id."/perfil/portada2.jpg";
$destino3 ="user/".$id."/".$user.".php";

copy($fuente, $destino);
copy($fuente2, $destino2);
copy($fuente3, $destino3);


$fuentew="user/".$id."/".$user.".php";
$contenidow="<?php $"."id_perfil=".$id.";?>";
$fp = fopen($fuentew, 'r+');
fwrite($fp, $contenidow);
fclose($fp);

// ¡el contenido de 'data.txt' ahora es 123 y no 23!




header("Location:inicio.php");

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
