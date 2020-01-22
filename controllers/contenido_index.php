<?php
require_once '../modelos/Conexion.php';

if(isset($_POST['cursos'])){
    $conexion = new modelos\Conexion();
    $consuta = "SELECT c.idcurso,c.nombre,c.descripcion,c.imagen,c.calificacion,c.horas,u.nombre,u.imagen,c.costo
    FROM curso c INNER JOIN usuario u ON c.profesor = u.idusuario";
    echo json_encode($conexion->obtenerDatosDeTabla($consuta));
    
}

if(isset($_POST['cursos-modal'])){
    $conexion = new modelos\Conexion();
    $data = array($_POST['cursos-modal']);
    $consuta = "SELECT c.idcurso,c.nombre,c.descripcion,c.calificacion,c.horas,u.nombre,u.imagen,c.costo,c.video
    FROM curso c INNER JOIN usuario u ON c.profesor = u.idusuario WHERE c.idcurso = ?";
    echo json_encode($conexion->consultaPreparada($data,$consuta,2,"i",false,null));
}