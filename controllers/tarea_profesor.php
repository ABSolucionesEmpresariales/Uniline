<?php 

require_once '../Modelos/Conexion.php';
include '../Modelos/Archivos.php';

$conexion = New Modelos\Conexion();
$request = $_SERVER['REQUEST_METHOD'];

switch($request) {

   case "POST":
      $bloque = $_POST['bloque'];

      if(!isset($_POST['editar_tarea'])) {

         if(isset($bloque)){
            echo $conexion->consultaPreparada(
                array($_POST['nombre-tarea'], $_POST['descripcion-tarea'], subir_archivo('archivo-tarea'), $bloque),
                "INSERT INTO tarea (nombre, descripcion, archivo_bajada, bloque) VALUES(?,?,?,?)",
                1,
                "ssss",
                false,
                null
            );
         } else {
            echo 0;
         }

      }else {
         $id_tarea = $conexion->consultaPreparada(
            array($bloque),
            "SELECT idtarea from tarea WHERE bloque = ?",
            2,
            "i",
            false, // se reestructira la fila se cambia el id que esta en la primera columna hacia la ultima para que el bind de las variables en la consulta coincida
            null
        );

         echo $conexion->consultaPreparada(
            array($id_tarea[0][0], $_POST['nombre-tarea-edit'], $_POST['descripcion-tarea-edit'], subir_archivo('archivo-tarea-edit'), $bloque),
            "UPDATE tarea SET nombre = ?, descripcion = ?, archivo_bajada = ?, bloque = ? WHERE idtarea = ? ",
            1,
            "ssssi",
            true, // se reestructira la fila se cambia el id que esta en la primera columna hacia la ultima para que el bind de las variables en la consulta coincida
            null
        );
      }

   break;

   case "GET":
      $bloque = $_GET['bloque'];

      if(isset($bloque)){
         $datos_tarea = $conexion->consultaPreparada(
            array($bloque),
            "SELECT nombre, descripcion FROM tarea WHERE bloque = ?",
            3,
            "s",
            false,
            null
         );

         if($datos_tarea) {
            echo json_encode($datos_tarea);
         }else {
            echo 0;
         }
      }
   break;


}


   

?>