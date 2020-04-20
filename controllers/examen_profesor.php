<?php
require_once '../Modelos/Conexion.php';
$nombre_examen = $_POST['examen'];
$descripcion_examen = $_POST['descripcion'];
$bloque = $_POST['nombre_bloque'];

if (isset($nombre_examen) && isset($descripcion_examen)) {
   $conexion = new Modelos\Conexion();

   $existe_examen = $conexion->consultaPreparada(
      array($bloque),
      "SELECT idexamen FROM examen WHERE bloque = ?",
      2,
      "s",
      false,
      null
   );

   if (!$existe_examen) {
      $registro = $conexion->consultaPreparada(
         array($nombre_examen, $descripcion_examen, $bloque),
         "INSERT INTO examen (nombre,descripcion, bloque) VALUES (?,?,?)",
         1,
         "sss",
         false,
         null
     );
     if ($registro) {
        echo 'creado';
     } else {
        echo 'no_creado';
     }

   } else {
      
   }
   
}

?>