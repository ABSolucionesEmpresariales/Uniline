<?php 

require_once '../Modelos/Conexion.php';
include '../Modelos/Archivos.php';


   $conexion = New Modelos\Conexion();

   if(isset($_POST['bloque'])){

   echo $conexion->consultaPreparada(
       array($_POST['nombre-tarea'], $_POST['descripcion-tarea'], subir_archivo('archivo-tarea'), $_POST['bloque']),
       "INSERT INTO tarea (nombre, descripcion, archivo_bajada, bloque) VALUES(?,?,?,?)",
       1,
       "ssss",
       false,
       null
   );
} else {
   echo 0;
}

?>