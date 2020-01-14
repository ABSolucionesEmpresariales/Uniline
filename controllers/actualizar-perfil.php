<?php 
include '../modelos/Archivos.php';
require_once '../modelos/Conexion.php';

session_start();

//traer datos de la base
if(isset($_POST['datos'])){
    $id = $_SESSION['id'];
    $conexion = new modelos\Conexion();
    $consulta = "SELECT * FROM usuario WHERE idusuario = ?";
    $datos = array($id);
    $resultado = json_encode($conexion->consultaPreparada($datos,$consulta,2,'i', false, null));
    echo $resultado;
}
 //actualizar datos de la base

 if(isset($_POST['id'])){
    $conexion = new modelos\Conexion();
    $consultaUP = "UPDATE usuario SET nombre = ?, edad = ?, escolaridad = ?, telefono = ?, email = ?, password = ? WHERE idusuario = ?";
    $datos = array($_POST['TNombre'], $_POST['TTelefono'], $_POST['TEmail'], $_POST['TEdad'], $_POST['TGrado'], $_POST['TPass'], $_POST['TPassNew'], $_POST['id']);
    $resultado = $conexion->consultaPreparada($datos,$consultaUP,1,'sissssi', false, null);
    if($resultado != 0){
        echo "datos actualizados";
    }    
}

/*

function subirImagen($estado_imagen,$accion){
 
        $conexion = new modelos\Conexion();
        $estado_imagen;
            

        if($accion == 1){
            $consulta_guardar_imagen = "INSERT INTO usuario (fotografia) VALUES (?)";
            $tipos_de_datos = "s";
            $respuesta = $conexion->consultaPreparada($estado_imagen, $consulta_guardar_imagen,1, $tipos_de_datos, false,null);
            return $respuesta;
        }else{
            $consulta_editar_imagen = "UPDATE usuario SET fotografia = ? WHERE idusuario = ?";
            $tipos_de_datos = "si";
            $respuesta = $conexion->consultaPreparada($estado_imagen, $consulta_editar_imagen,1, $tipos_de_datos, true,null);
            return $respuesta;

        }

    }

 if (strlen($_FILES['Fimagen']['tmp_name']) != 0) {
    $archivo = subir_archivo('Fimagen',1);
    if ($archivo == "Error") {
        echo $archivo;
    } else if ($archivo == "imagenNoValida") {
        echo $archivo;
    } else if ($archivo == "imagenGrande") {
        echo $archivo;
    } else {
        $respuesta = subirImagen($archivo,1);
        
    }
} else {
    $respuesta = subirImagen("",1);
    
}
*/
?>