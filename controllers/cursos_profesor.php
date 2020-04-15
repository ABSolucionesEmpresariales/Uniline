

<?php 
session_start();
require_once '../Modelos/Conexion.php';
include '../Modelos/Archivos.php';
include '../Modelos/Fecha.php';

if(isset($_POST['nombre-curso']) && isset($_POST['descripcion-curso']) && isset($_POST['horas-curso']) && isset($_POST['costo-curso']) 
&& isset($_POST['video-curso'])){

   $conexion = New Modelos\Conexion();
   $archivo = "";
  
         
           $archivo = subir_imagen('imagen-curso');
           if ($archivo == "error al subir"){
               echo "Error";
           } else if ($archivo == "img no valida"){
               echo "imagenNoValida";
           } else {
               $video = 'https://player.vimeo.com/video/';
               $idvideo = explode('/', $_POST['video-curso']);
               $video .= end($idvideo);
               echo  $conexion->
                   consultaPreparada(
                   array($_POST['nombre-curso'],$_POST['descripcion-curso'],$archivo,$video,$_POST['horas-curso'],$_SESSION['idusuario'],$_POST['costo-curso']), 
                   "INSERT INTO curso (nombre,descripcion,imagen,video,horas,profesor,costo)VALUES(?,?,?,?,?,?,?)", 
                   1, 
                   "ssssiid", 
                   false, 
                   null);
           }
         
   

}