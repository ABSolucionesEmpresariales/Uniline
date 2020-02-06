<?php 
session_start();
require_once '../Modelos/Conexion.php';
include '../Modelos/Archivos.php';
include '../Modelos/Fecha.php';

if(isset($_POST['TNombre']) && isset($_POST['TADescripcion']) && isset($_POST['THoras']) && isset($_POST['TCosto']) 
&& isset($_POST['TVideo']) && isset($_POST['accion'])){
    $conexion = New Modelos\Conexion();
    $archivo = "";
    if($_POST['accion'] == "insertar"){
        if (strlen($_FILES['Fimagen']['tmp_name']) != 0) {
            $archivo = subir_archivo('Fimagen',1);
            if ($archivo == "Error"){
                echo $archivo;
            } else if ($archivo == "imagenNoValida"){
                echo $archivo;
            } else if ($archivo == "imagenGrande"){
                echo $archivo;
            } else {
                echo  $conexion->
                    consultaPreparada(
                    array($_POST['TNombre'],$_POST['TADescripcion'],$archivo,$_POST['TVideo'],$_POST['THoras'],$_SESSION['idusuario'],$_POST['TCosto']), 
                    "INSERT INTO curso (nombre,descripcion,imagen,video,horas,profesor,costo)VALUES(?,?,?,?,?,?,?)", 
                    1, 
                    "ssssiid", 
                    false, 
                    null);
            }
        }
    }else{
        function editar_curso($imagen,$conexion){
            return $conexion->
            consultaPreparada(
            array($_POST['idcurso'],$_POST['TNombre'],$_POST['TADescripcion'],$imagen,$_POST['TVideo'],$_POST['THoras'],$_SESSION['idusuario'],$_POST['TCosto']), 
            "UPDATE curso SET nombre = ?,descripcion = ?,imagen = ?,video = ?,horas = ?,profesor = ?,costo = ? WHERE idcurso = ?", 
            1, 
            "ssssssis", 
            true, 
            null);
        }
        if (strlen($_FILES['Fimagen']['tmp_name']) != 0) {
            $archivo = subir_archivo('Fimagen',1);
            if ($archivo == "Error"){
                echo $archivo;
            } else if ($archivo == "imagenNoValida"){
                echo $archivo;
            } else if ($archivo == "imagenGrande"){
                echo $archivo;
            } else {
                echo editar_curso($archivo,$conexion);
            }
        }else{
            $imagen = $conexion->
            consultaPreparada(
            array($_POST['idcurso']), 
            "SELECT imagen FROM curso WHERE idcurso = ?", 
            2, 
            "i", 
            false, 
            null);
            if($imagen != ""){
               echo editar_curso($imagen[0][0],$conexion);
            }
        }
    }
}

if(isset($_POST['cursos'])){
    $conexion = New Modelos\Conexion();
    echo json_encode($conexion->obtenerDatosDeTabla("SELECT * FROM curso"));
}