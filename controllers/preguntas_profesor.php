<?php
require_once '../Modelos/Conexion.php';
$pregunta_examen = $_POST['pregunta'];
$respuestas = $_POST['respuesta'];
$bloque = $_POST['nombre_bloque'];

$conexion = new Modelos\Conexion();

$idexamen = json_encode($conexion->consultaPreparada(
    array($bloque),
    "SELECT idexamen FROM examen WHERE bloque = ?",
    2,
    "s",
    false,
    null
));

if($idexamen){
    $id = json_decode($idexamen);

    if (isset($pregunta_examen) && isset($respuestas)) {
   
        $conexion->consultaPreparada(
            array($pregunta_examen, $respuestas, $id[0][0]),
            "INSERT INTO pregunta (pregunta,respuestas,examen) VALUES (?,?,?)",
            1,
            "sss",
            false,
            null
        );
     
        echo 'creado';     

    } else {
      
        echo 'error al insertar';
   
    }
}else {
    echo 'no existe';
}

?>