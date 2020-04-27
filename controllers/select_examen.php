<?php 
require_once '../Modelos/Conexion.php';

$bloque = $_GET['bloque'];
$conexion = New Modelos\Conexion();

$existe_examen = $conexion->consultaPreparada(
   array($bloque),
   "SELECT idexamen FROM examen WHERE bloque = ?",
   2,
   "s",
   false,
   null
);

if ($existe_examen) {
   $datos_examen = $conexion->consultaPreparada(
      array($bloque),
      "SELECT nombre, descripcion FROM examen WHERE bloque = ?",
      2,
      "s",
      false,
      null
   );

   echo json_encode($datos_examen);
} else {
   echo 0;
}
?>