<?php
include '../Modelos/Archivos.php';
require_once '../Modelos/Conexion.php';
session_start();


if(isset($_POST['info-cursos'])){
    $conexion = new Modelos\Conexion();

    $consulta = "SELECT * FROM usuario";
    echo json_encode($conexion->obtenerDatosDeTabla($consulta));

 

}

if(isset($_POST['SProfesor'])){
    $_SESSION['idusuario'] = $_POST['SProfesor'];
    echo $_SESSION['idusuario'];

}
if(isset($_POST['SCurso'])){
    $_SESSION['idcurso'] = $_POST['SCurso'];
    echo $_SESSION['idcurso'];

}

/*if(isset($_POST['info-examen'])){
    $conexion = new Modelos\Conexion();
    $consulta = "SELECT e.idexamen, e.nombre, e.descripcion, b.nombre FROM examen e LEFT JOIN bloque b ON e.bloque = b.idbloque";
    $resultado = json_encode($conexion->obtenerDatosDeTabla($consulta));
    echo $resultado;

}*/
if(isset($_POST['info-profesores'])){
    $conexion = new Modelos\Conexion();
    $consulta = "SELECT * FROM usuario";
    $resultado = json_encode($conexion->obtenerDatosDeTabla($consulta));
    echo $resultado;

}

     

?>