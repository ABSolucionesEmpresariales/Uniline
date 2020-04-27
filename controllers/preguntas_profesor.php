<?php
require_once '../Modelos/Conexion.php';
$pregunta_examen = $_POST['pregunta'];
$respuestas = $_POST['respuesta'];
$bloque = $_POST['nombre_bloque']; 

/* $conexion = new Modelos\Conexion();

$existe_examen = $conexion->consultaPreparada(
    array($bloque),
    "SELECT idexamen FROM examen WHERE bloque = ?",
    2,
    "s",
    false,
    null
 );
 if ($existe_examen) {
    $examen = $existe_examen[0][0];
    
    echo $conexion->consultaPreparada(
        array($pregunta_examen, $respuestas, $examen),
        "INSERT INTO pregunta (pregunta,respuestas,examen) VALUES (?,?,?)",
        1,
        "sss",
        false,
        null
    );     
 }else {
     echo 'no existe';
 } */

/* 

if ($existe_examen) {
   
    

} else {
      
    echo 'no existe';
   
} */

?>