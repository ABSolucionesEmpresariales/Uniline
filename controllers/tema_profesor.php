<?php 
session_start();
require_once '../Modelos/Conexion.php';
include '../Modelos/Archivos.php';


   $conexion = New Modelos\Conexion();

   if(isset($_POST['bloque'])){
   $temas_registrados = $conexion -> consultaPreparada(
      array($_POST['bloque']),
      "SELECT count(*) from tema WHERE bloque = ?",
      2,
      "s",
      false,
      null
   );
   
   $preferencia = $temas_registrados[0][0] + 1;

   $video = 'https://player.vimeo.com/video/';
   $idvideo = explode('/', $_POST['video-tema']);
   $video .= end($idvideo);
   echo $conexion->consultaPreparada(
       array($preferencia, $_POST['nombre-tema'], $_POST['descripcion-tema'], $video, subir_archivo('archivo-tema'), $_POST['bloque']),
       "INSERT INTO tema (preferencia,nombre,descripcion,video,archivo, bloque) VALUES(?,?,?,?,?,?)",
       1,
       "ssssss",
       false,
       null
   );
} else {
   echo 0;
}
?>