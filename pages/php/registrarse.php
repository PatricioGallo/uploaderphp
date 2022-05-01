<?php


if($_POST){

if(!empty ($_POST['user']) && !empty ($_POST['pswd']) && !empty ($_POST['nombre']) && !empty ($_POST['apellido']) && !empty ($_POST['pswd2']) ){ //si no esta vacio el post


  $listaSQL= $conexion ->prepare("SELECT * FROM login");
  $listaSQL ->execute();
  $listatabla = $listaSQL ->fetchALL (PDO::FETCH_ASSOC);
  $bandera=0;
  foreach ($listatabla as $lista) {

      if($_POST['user'] == $lista['user']){
        $bandera=1;
        $flag=3;
      }
    }

    if($bandera==0){
            if ($_POST['pswd'] ==  $_POST['pswd2'] ){

              $user = $_POST['user'];
              $pswd = $_POST['pswd'];
              $nombre = $_POST['nombre'];
              $apellido = $_POST['apellido'];
              $id=0;
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

      }else{
        $flag =2;
      }//fin contraseñas iguales

}//fin de usuario

} else {
  $flag=1;
} //fin de vacio

}//fin post

 ?>
