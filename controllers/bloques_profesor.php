<?php 
require_once '../Modelos/Conexion.php';

if (isset($_POST['nombre_bloque']) && isset($_POST['id_curso'])) {
   $conexion = new Modelos\Conexion();
   echo $conexion->consultaPreparada(
       array($_POST['nombre_bloque'], $_POST['id_curso']),
       "INSERT INTO bloque (nombre,curso) VALUES (?,?)",
       1,
       "ss",
       false,
       null
   );
}
?>