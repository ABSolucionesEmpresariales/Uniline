<?php
require_once '../Modelos/Conexion.php';
include '../Modelos/Archivos.php';
$request = $_SERVER['REQUEST_METHOD'];
$conexion = new Modelos\Conexion();

switch($request) {

   case "POST":

      $bloque = $_POST['bloque'];

     if(!isset($_POST['editar_tema'])){
         $preferencia = 0;
         $nombre_tema = $_POST['nombre-tema'];
         $descripcion_tema = $_POST['descripcion-tema'];
         $video = 'https://player.vimeo.com/video/';
         $idvideo = explode('/', $_POST['video-tema']);
         $video .= end($idvideo);
         $archivo = subir_archivo('archivo-tema');

         $temas_registrados = $conexion -> consultaPreparada(
            array($bloque),
            "SELECT count(*) from tema WHERE bloque = ?",
            2,
            "s",
            false,
            null
         );

         $preferencia = $temas_registrados[0][0] + 1;
         
         echo $conexion->consultaPreparada(
            array($preferencia, $nombre_tema, $descripcion_tema, $video, $archivo, $bloque),
            "INSERT INTO tema (preferencia,nombre,descripcion,video,archivo, bloque) VALUES(?,?,?,?,?,?)",
            1,
            "ssssss",
            false,
            null
         );
      } else {
         $nombre_tema = $_POST['nombre-tema-edit'];
         $descripcion_tema = $_POST['descripcion-tema-edit'];
         $video = 'https://player.vimeo.com/video/';
         $idvideo = explode('/', $_POST['video-tema-edit']);
         $video .= end($idvideo);
         $archivo = subir_archivo('archivo-tema-edit');

         $query = "UPDATE tema SET nombre = ?, descripcion = ?, video = ? , archivo = ? , bloque = ? WHERE idtema = ? ";
         $posted_data = array($_POST['tema_id'], $nombre_tema, $descripcion_tema, $video, $archivo, $bloque);
         $params = "ssssss";
                
         if($archivo == "") {
            $query = "UPDATE tema SET nombre = ?, descripcion = ?, video = ?, bloque = ? WHERE idtema = ? ";
            unset($posted_data[4]); //eliminamos la imagen del arreglo para no tener problemas en la consulta
            $tmp = array_values($posted_data);
            $posted_data = $tmp;
            $params = "sssss";
         }

         echo $conexion->consultaPreparada(
            $posted_data,
            $query,
            1,
            $params,
            true, // se reestructira la fila se cambia el id que esta en la primera columna hacia la ultima para que el bind de las variables en la consulta coincida
            null
        );
      }
      
   break;

   case "GET":

      $datos_del_tema = $conexion->consultaPreparada(
         array($_GET['tema']),
         "SELECT * FROM tema WHERE idtema = ?",
         3,
         "i",
         false,
         null
     );

     if($datos_del_tema){
      echo json_encode($datos_del_tema);
     } else {
        echo 0;
     }

   break;
   
}

?>