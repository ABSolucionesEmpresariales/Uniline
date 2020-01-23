<?php

use Modelos\Conexion;

session_start();
require_once '../Modelos/Conexion.php';

$conexion = new Modelos\Conexion();

echo $_SESSION['idusuario'];

$consulta = "SELECT * FROM inscripcion WHERE alumno = ? ";
$datos = array($_SESSION['idusuario']);
$resultado = json_encode($conexion->consultaPreparada($datos,$consulta,2,'i', false, null));
$result = json_decode($resultado);

if($resultado != "[]"){
    echo $resultado;
}


?>