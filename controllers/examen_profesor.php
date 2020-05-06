<?php
require_once '../Modelos/Conexion.php';
$request = $_SERVER['REQUEST_METHOD'];
$conexion = new Modelos\Conexion();

switch ($request) {

   case "POST":

      $nombre_examen = $_POST['examen'];
      $descripcion_examen = $_POST['descripcion'];
      $bloque = $_POST['nombre_bloque'];
      
      if(isset($nombre_examen) && isset($descripcion_examen) && isset($bloque)){
         if(!isset($_POST['editar_examen'])){
            echo $conexion->consultaPreparada(
               array($nombre_examen, $descripcion_examen, $bloque),
               "INSERT INTO examen (nombre,descripcion, bloque) VALUES (?,?,?)",
               1,
               "sss",
               false,
               null
            );
         }else {
            $id_examen = $conexion->consultaPreparada(
               array($bloque),
               "SELECT idexamen from examen WHERE bloque = ?",
               2,
               "s",
               false, // se reestructira la fila se cambia el id que esta en la primera columna hacia la ultima para que el bind de las variables en la consulta coincida
               null
           );

            echo $conexion->consultaPreparada(
               array($id_examen[0][0], $nombre_examen, $descripcion_examen, $bloque),
               "UPDATE examen SET nombre = ?, descripcion = ?, bloque = ? WHERE idexamen = ? ",
               1,
               "ssss",
               true, // se reestructira la fila se cambia el id que esta en la primera columna hacia la ultima para que el bind de las variables en la consulta coincida
               null
           );
         }
      }
   
   break;

   case "GET":
      $bloque = $_GET['bloque'];

      if(isset($bloque)){
         $datos_examen = $conexion->consultaPreparada(
            array($bloque),
            "SELECT nombre, descripcion FROM examen WHERE bloque = ?",
            2,
            "s",
            false,
            null
         );

         if($datos_examen) {
            echo json_encode($datos_examen);
         }else {
            echo 0;
         }
      }
   break;
}

?>