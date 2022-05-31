



























<?php
session_start(); //incio de cesion
include("../../../config/db.php"); //incluir database
//include("../../php/itemslogin.php"); //incluir items del login
include("../../php/verperfil.php");//incluir items del usuario de la web perfil
include("../../php/contadordePubli.php");//incluir contador de publicacion
include("../../php/itemsarchivos.php");//incluir items de la archivos
//include("../../php/borrar.php");


//Borrar archivos
if($_POST){

  if($_POST['nombre_archivo']){
    $nombre_archivoSubido = $_POST['nombre_archivo'];
    $id_PublicacionBorrar =$_POST['id_publicacion'];
    $ruta_archivoEliminado = "media/".$nombre_archivoSubido;
    if (file_exists($ruta_archivoEliminado)) {unlink($ruta_archivoEliminado);}
    $listaSQL= $conexion ->prepare("DELETE FROM `archivos` WHERE id='$id_PublicacionBorrar'  ");
    $listaSQL ->execute();


    header("Refresh:0.01");
  }

}

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
      <h1> <a href="../../inicio.php"> Uploader </a></h1>
    </div>
      <h2> <a href="../../php/cerrar.php">Salir</a></h2>
  </header>

  <div class="cuerpo">

    <div class="cuerpo_portada">

      <div class="imagen_portada">
        <img src="perfil/portada2.jpg" alt="">
      </div>
      <div class="portada_perfil">
        <img src="perfil/perfil.jpg" alt="">
      </div>
      <div class="portada_nombre">
        <h2><?php echo $nombre_perfil." ".$apellido_perfil; ?> </h2>
      </div>
      <div class="cuerpo_lineaPC"></div>
      <div class="botones_portada">
        <a href="<?php echo $usuario_perfil.".php" ?>"> <div class="boton_deLaPortada"><h3 > Publicaciones </h3></div> </a>
        <a href=" <?php echo $usuario_perfil."Archivos.php" ?>"> <div class="boton_deLaPortada"><h3 style="color:green;"> Archivos Subidos </h3></div> </a>
        <a href="#"> <div class="boton_deLaPortada"><h3> Amigos </h3></div> </a>

      </div>

    </div>




<!--                    CUERPO PARA PC                                   -->

<div class="cuerpo_debajoPortadaArchivos">

  <?php
  if ($_SESSION["id"] == $id_perfil) {?>
  <div class="menu_archivos">
    <a href="../../modperfil/subir.php"> <button type="button" name="button">Subir +</button> </a>
  </div>
  <div class="cuerpo_linea"></div>
<?php } ?>

  <div class="contenido_archivos">
    <h2>Mis archivos</h2>



    <?php
    if ($_SESSION["id"] != $id_perfil) {
      ?>

      <table >
      <tr>
        <th></th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Modificado</th>
        <th>Tamaño</th>
        <th>Tipo</th>
        <th></th>

      </tr>

    <?php  }elseif ($_SESSION["id"] == $id_perfil) {
              ?>
                  <table >
                  <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Modificado</th>
                    <th>Tamaño</th>
                    <th>Tipo</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>

                <?php } ?>







            <?php

            foreach ($listatabla as $lista) {

              $id_userArchivo= $lista['id_userArchivo'];
              $nombre_archivo= $lista['nombre_archivo'];
              $estado_archivo= $lista['estado'];
              $id_publicacion = $lista['id'];
              $fecha_publicacion = $lista['fecha'];
              $tamano_archivo = $lista['tamano_archivo']
              ?>


          <?php
          if ($_SESSION["id"] != $id_perfil) {


           if ($id_userArchivo == $id_perfil && $estado_archivo=="Publico"){
            ?>

            <tr>


                    <?php
                    include("../../php/formatos.php");//incluir formatos
                    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);  // le da a extension la "extension" de la ruta del archivo


                    if(in_array($extension, $formatos_imagenes) ) {     //verifica las extensiones y hace algo distinto en cada caso
                        ?> <td> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="<?php echo "media/".$nombre_archivo; ?>" alt=""></a></td><?php

                    }elseif (in_array($extension, $formatos_videos)) {
                      ?> <td> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  > </a> </td><?php

                    }elseif (in_array($extension, $formatos_pp)) {
                        ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/pp.jpg" alt=""></a></td><?php

                    }elseif (in_array($extension, $formatos_word)) {
                      ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/word.jpg" alt=""></a></td><?php

                    }elseif (in_array($extension, $formatos_pdf)) {
                        ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/pdf.jpg" alt=""></a></td><?php

                    }elseif (in_array($extension, $formatos_excel)) {
                        ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/excel.jpg" alt=""></a></td><?php

                    }else {
                      ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/archivos.jpg" alt=""></a> </td><?php
                    }
                     ?>


                     <td>  <?php echo $nombre_archivo ?> </td>
                    <td><?php echo $fecha_publicacion; ?></td>
                     <td><?php echo $nombre_perfil." ".$apellido_perfil; ?></td>
                     <td>
                       <?php if (0< $tamano_archivo && $tamano_archivo < 1024){
                           echo $tamano_archivo." Bytes";
                         }else if( 1024 <= $tamano_archivo && $tamano_archivo < pow(1024,2)){
                           echo round($tamano_archivo/1024,1) ." Kb";
                         }else if( pow(1024,2) <= $tamano_archivo && $tamano_archivo< pow(1024, 3)){
                           echo round($tamano_archivo/pow(1024,2),2) ." Mb";
                         }else if( pow(1024,3) <= $tamano_archivo){
                           echo round($tamano_archivo/pow(1024,3),3) ." Gb";
                         }

                       ?>
                     </td>
                     <td>  <?php echo $estado_archivo ?></td>
                     <td><a href="../../descarga.php?nombre= <?php echo $nombre_perfil ?>&apellido=<?php echo $apellido_perfil ?>&id=<?php echo $id_perfil ?>&nombre_archivo=<?php echo $nombre_archivo ?>" target="_blank"   > <img src="../../../media/imagenes/link.png" alt=""> </a></td>


                </tr>


          <?php } }elseif ($_SESSION["id"] == $id_perfil) {
                      if ($id_userArchivo == $id_perfil){?>


                        <tr>
                                <?php
                                include("../../php/formatos.php");//incluir formatos
                                $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);  // le da a extension la "extension" de la ruta del archivo


                                if(in_array($extension, $formatos_imagenes) ) {     //verifica las extensiones y hace algo distinto en cada caso
                                    ?> <td> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank" title="VER" ><img src="<?php echo "media/".$nombre_archivo; ?>" alt=""></a></td><?php

                                }elseif (in_array($extension, $formatos_videos)) {
                                  ?> <td> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank" title="VER"  > </a> </td><?php

                                }elseif (in_array($extension, $formatos_pp)) {
                                    ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank" title="VER"  ><img src="../../../media/imagenes/pp.jpg" alt=""></a></td><?php

                                }elseif (in_array($extension, $formatos_word)) {
                                  ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank" title="VER"  ><img src="../../../media/imagenes/word.jpg" alt=""></a></td><?php

                                }elseif (in_array($extension, $formatos_pdf)) {
                                    ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank" title="VER"  ><img src="../../../media/imagenes/pdf.jpg" alt=""></a></td><?php

                                }elseif (in_array($extension, $formatos_excel)) {
                                    ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank" title="VER"  ><img src="../../../media/imagenes/excel.jpg" alt=""></a></td><?php

                                }else {
                                  ?> <td><a href="media/<?php echo $nombre_archivo; ?>" target="_blank" title="VER"  ><img src="../../../media/imagenes/archivos.jpg" alt=""></a> </td><?php
                                }
                                 ?>


                                 <td> <a href="../../modperfil/modificarArchivos.php" title="Modificar"> <?php echo $nombre_archivo ?> </a></td>
                                 <td><?php echo $fecha_publicacion; ?></td>
                                 <td><?php echo $nombre_perfil." ".$apellido_perfil; ?></td>
                                 <td>
                                    <?php if (0< $tamano_archivo && $tamano_archivo < 1024){
                                        echo $tamano_archivo." Bytes";
                                      }else if( 1024 <= $tamano_archivo && $tamano_archivo < pow(1024,2)){
                                        echo round($tamano_archivo/1024,1) ." Kb";
                                      }else if( pow(1024,2) <= $tamano_archivo && $tamano_archivo< pow(1024, 3)){
                                        echo round($tamano_archivo/pow(1024,2),2) ." Mb";
                                      }else if( pow(1024,3) <= $tamano_archivo){
                                        echo round($tamano_archivo/pow(1024,3),3) ." Gb";
                                      }

                                    ?>



                                 </td>
                                 <td> <a href="../../modperfil/modificarArchivos.php" title="Modificar"> <?php echo $estado_archivo ?></a></td>
                              <td><a href="media/<?php echo $nombre_archivo; ?>" download  > <img src="../../../media/imagenes/descarga.jpg" alt=""> </a></td>
                              <td><a href="../../descarga.php?nombre= <?php echo $nombre_perfil ?>&apellido=<?php echo $apellido_perfil ?>&id=<?php echo $id_perfil ?>&nombre_archivo=<?php echo $nombre_archivo ?>" target="_blank"  > <img src="../../../media/imagenes/link.png" alt=""> </a></td>
                              <td> <form  action="<?php echo $nombre_perfil."Archivos.php" ?>" method="post">
                              <input type="hidden" name="nombre_archivo" value="<?php echo $nombre_archivo; ?>">
                              <input type="hidden" name="id" value="<?php echo $nombre_archivo; ?>">
                              <input type="hidden" name="id_publicacion" value="<?php echo $id_publicacion; ?>">
                              <button type="submit" name="eliminar" id="eliminar">  <img src="../../../media/imagenes/eliminar.webp" alt=""></button>
                               </form>
                             </td>

                            </tr>

          <?php }} ?>
          <?php }?>  <!--cierra el foreach-->


          </table>
  </div>
</div>







<!--                    CUERPO PARA CELULAR                              -->

    <div class="cuerpo_debajoPortada">
      <div class="cuerpo_usuario">
        <h2><?php echo $nombre_perfil." ".$apellido_perfil; ?> </h2>
      </div>

<?php if ($id_perfil == $_SESSION["id"]) { ?>
      <a href="../../modperfil/editportada.php">  <button type="button" name="button">Editar Perfil</button></a>
<?php  }  ?>

      <div class="cuerpo_linea"></div>

      <div class="cuerpo_informacion">

        <ul>

          <li>

            <p>Tipo de cuenta: <?php
            if ($tipoDeCuenta==0) {
                echo "Normal</p>";
            }elseif ($tipoDeCuenta==1) {
                echo "Premium</p>";
            }elseif ($tipoDeCuenta==2) {
                echo "Admin</p>";
            }

              ?>
          </li>
          <li>
            <p>Cantidad de gigas disponibles: <?php echo " ".$contador_gigas;

            if ($tipoDeCuenta==0) {
                echo " "."de 3 Gb</p>";
            }elseif ($tipoDeCuenta==1) {
                echo " "."de 10 Gb</p>";
            }elseif ($tipoDeCuenta==2) {
                echo " "."de ilimitado</p>";
            }
            ?>
          </li>
          <li>
            <p>Cantidad publicaciones realizadas: <?php echo " ".$contador_publicaciones; ?></p>
          </li>

          <li>
            <p>Cantidad de archivos subidos: <?php echo " ".$contador_archivosSubidos; ?></p>
          </li>

        </ul>
      </div>

      <?php if ($id_perfil == $_SESSION["id"]) { ?>

                  <button type="button" name="button">Editar detalles</button>
      <?php  }  ?>



      <div class="cuerpo_linea"></div>


      <?php if ($id_perfil == $_SESSION["id"]) { ?>
              <a href="../../modperfil/subir.php">  <button type="button" name="button">Subir archivo</button></a>
      <?php  }  ?>



  <div class="caja_perfil" id="caja_perfil">
      <div class="caja_botonPerfil" >
        <a href="<?php echo $usuario_perfil.".php#caja_perfil" ?>"> <h2>Publicaciones</h2> </a>
      </div>
      <div class="caja_botonPerfil" style="border: 1px white solid; border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 10px; border-bottom-right-radius: 10px;" >
        <a href="<?php echo $usuario_perfil."Archivos.php#caja_perfil" ?>"> <h2>Archivos</h2> </a>
      </div>
  </div>


<div class="cajas_archivosSubidos">



  <?php

  foreach ($listatabla as $lista) {

    $id_userArchivo= $lista['id_userArchivo'];
    $nombre_archivo= $lista['nombre_archivo'];
    $estado_archivo= $lista['estado'];
    ?>


<?php
if ($_SESSION["id"] != $id_perfil) {


 if ($id_userArchivo == $id_perfil && $estado_archivo=="Publico"){
  ?>



    <div class="cuerpo_subidaDeArchivos">
      <div class="archivos_perfilSubidos">
          <?php echo "<h4>".$nombre_perfil." ".$apellido_perfil."</h4>"; ?>
      </div>
      <div class="archivos_contenidoSubidos">

          <?php
          include("../../php/formatos.php");//incluir formatos
          $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);  // le da a extension la "extension" de la ruta del archivo


          if(in_array($extension, $formatos_imagenes) ) {     //verifica las extensiones y hace algo distinto en cada caso
              ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="<?php echo "media/".$nombre_archivo; ?>" alt=""></a><?php

          }elseif (in_array($extension, $formatos_videos)) {
            ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><video  autoplay muted>
              <source src="<?php echo "media/".$nombre_archivo; ?>" type="video">
            </video> </a><?php

          }elseif (in_array($extension, $formatos_pp)) {
              ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/pp.jpg" alt=""></a><?php

          }elseif (in_array($extension, $formatos_word)) {
            ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/word.jpg" alt=""></a><?php

          }elseif (in_array($extension, $formatos_pdf)) {
              ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/pdf.jpg" alt=""></a><?php

          }elseif (in_array($extension, $formatos_excel)) {
              ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/excel.jpg" alt=""></a><?php

          }else {
            ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/archivos.jpg" alt=""></a> <?php
          }
          echo "<p>".$nombre_archivo."</p>";

           ?>
      </div>

      <div class="archivos_footerSubidos">
        <a href="media/<?php echo $nombre_archivo; ?>" download  > <button type="button" name="button">Descargar</button> </a>
      </div>
    </div>


<?php } }elseif ($_SESSION["id"] == $id_perfil) {
            if ($id_userArchivo == $id_perfil){?>


<div class="cuerpo_subidaDeArchivos">
  <div class="archivos_perfilSubidos">
      <?php echo "<h4>".$nombre_perfil." ".$apellido_perfil."</h4>"; ?>
      <p> <?php echo $estado_archivo; ?> </p>
  </div>
  <div class="archivos_contenidoSubidos">

      <?php
      $formatos_imagenes =  array('jpg','jpge' ,'gif','bmp','png','tif','tiff');
      $formatos_videos =  array('mp4','avi' ,'mkv','flv','mov','wmv','divx','xvid','rm','MOV');
      $formatos_pp =  array('ppt','pptx','pptm');
      $formatos_word =  array('doc','docm' ,'docx');
      $formatos_pdf =  array('pdf');
      $formatos_excel =  array('xlsx','xlsm' ,'slxb','xltx');
      $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);  // le da a extension la "extension" de la ruta del archivo


      if(in_array($extension, $formatos_imagenes) ) {     //verifica las extensiones y hace algo distinto en cada caso
          ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="<?php echo "media/".$nombre_archivo; ?>" alt=""></a><?php

      }elseif (in_array($extension, $formatos_videos)) {
        ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><video src="videofile.ogg" autoplay controls>
          <source src="<?php echo "media/".$nombre_archivo; ?>" type="video/">
        </video> </a><?php

      }elseif (in_array($extension, $formatos_pp)) {
          ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/pp.jpg" alt=""></a><?php

      }elseif (in_array($extension, $formatos_word)) {
        ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/word.jpg" alt=""></a><?php

      }elseif (in_array($extension, $formatos_pdf)) {
          ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/pdf.jpg" alt=""></a><?php

      }elseif (in_array($extension, $formatos_excel)) {
          ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/excel.jpg" alt=""></a><?php

      }else {
        ?> <a href="media/<?php echo $nombre_archivo; ?>" target="_blank"  ><img src="../../../media/imagenes/archivos.jpg" alt=""></a> <?php
      }
      echo "<p>".$nombre_archivo."</p>";

       ?>
  </div>

  <div class="archivos_footerSubidos">
    <a href="media/<?php echo $nombre_archivo; ?>" download  > <button type="button" name="button">Descargar</button> </a>
  </div>
</div>

<?php }} ?>
<?php }?>  <!--cierra el foreach-->



</div>

    </div>


  </div>



</body>

</html>
