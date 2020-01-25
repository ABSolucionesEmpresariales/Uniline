<?php

use Modelos\Conexion;

session_start();
require_once '../Modelos/Conexion.php';

$conexion = new Modelos\Conexion();

$consulta = "SELECT * FROM inscripcion WHERE alumno = ? ";
$datos = array($_SESSION['idusuario']);
$resultado = json_encode($conexion->consultaPreparada($datos,$consulta,2,'i', false, null));
$result = json_decode($resultado);


if($resultado != "[]"){
    $consulta_curso = "SELECT * FROM curso WHERE idcurso = ? ";
    $datos_estudiante = array($result[0][1]);
    $longitud = count($datos_estudiante);
    $resultado_curso = json_encode($conexion->consultaPreparada($datos_estudiante,$consulta_curso,2,'i', false, null));
    $result_curso = json_decode($resultado_curso);

    echo $resultado_curso;
}else{
    echo "sin-alumnos";
}


?>