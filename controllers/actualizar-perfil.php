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

if(isset($_POST['updatePass'])){
    $password = $_POST['updatePass'];
    $conexion = new modelos\Conexion();
    $consulta = "SELECT password FROM usuario WHERE idusuario = ?";
    $datos = array($_SESSION['id']);
    $resultado = $conexion->consultaPreparada($datos,$consulta,2,'s',false,null);
      if(password_verify($password,$resultado[0][0])){
        echo "true";
    }else{
        echo "";
    }  
    
}
 //actualizar datos de la base

 if(isset($_POST['TNombre']) && isset($_POST['TTelefono']) 
 && isset($_POST['TEmail']) && isset($_POST['TEdad'])) {
    
    function actualizar($archivo){
        $conexion = new modelos\Conexion();
        if(isset($_POST['TPassNew'])){
            $password = $_POST['TPassNew'];
            $encriptado = trim(password_hash($password, PASSWORD_DEFAULT));
        }else{
            $consulta = "SELECT password FROM usuario WHERE idusuario = ?";
            $datos = array($_SESSION['id']);
            $resultado = $conexion->consultaPreparada($datos,$consulta,2,'i', false, null);
            $encriptado = $resultado[0][0];
        }

        $trabajo = $_POST['TPuesto'].'###'.$_POST['TDescripcion'];

        $consultaUP = "UPDATE usuario SET nombre = ?, edad = ?, escolaridad = ?, telefono = ?, email = ?, password = ?, imagen = ?, estado = ?, municipio = ?, trabajo = ? WHERE idusuario = ?";
        $datos = array($_POST['TNombre'],$_POST['TEdad'],$_POST['TGrado'], $_POST['TTelefono'], $_POST['TEmail'],$encriptado,$archivo,$_POST['TEstado'],$_POST['TMunicipio'],$trabajo,$_SESSION['id']);
        
        $resultado = $conexion->consultaPreparada($datos,$consultaUP,1,'sssssssssss',false,5);
        if($resultado != 0){
            if($archivo == ""){
                $_SESSION['imagen_perfil'] = "../img/Users/perfil.png";
            }else{
                $_SESSION['imagen_perfil'] = $archivo;
            }
            
        }
        return $resultado; 
    }


    $encriptado = "";
    $archivo = $_SESSION['imagen_perfil'];
    if (strlen($_FILES['Fimagen']['tmp_name']) != 0) {
        $archivo = subir_archivo('Fimagen',1);
        if ($archivo == "Error"){
            echo $archivo;
        } else if ($archivo == "imagenNoValida"){
            echo $archivo;
        } else if ($archivo == "imagenGrande"){
            echo $archivo;
        } else {
            if($_SESSION['imagen_perfil'] != "../img/Users/perfil.png"){
                unlink($_SESSION['imagen_perfil']);
            }
            if(actualizar($archivo) == 1){
                echo 1;
            }else{
                echo 0;
            }
        }
    }else{
        $conexion = new modelos\Conexion();
        $consulta = "SELECT imagen FROM usuario WHERE idusuario = ?";
        $datos = array($_SESSION['id']);
        $resultado = $conexion->consultaPreparada($datos,$consulta,2,'i', false, null);
        $imagen = $resultado[0][0];
        echo actualizar($imagen);
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