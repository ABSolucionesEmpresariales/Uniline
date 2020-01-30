<?php
include '../Modelos/Archivos.php';
require_once '../Modelos/Conexion.php';

if(isset($_POST['info-cursos'])){
    $conexion = new Modelos\Conexion();

    $consulta = "SELECT idcurso, nombre FROM curso";
    $resultado = json_encode($conexion->obtenerDatosDeTabla($consulta));

    echo $resultado;

}


if(isset($_POST['array'])){
    $data = json_decode($_POST['array']);
    var_dump($data);

}

     

?>