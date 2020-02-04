<?php  
require_once '../Modelos/Conexion.php';
include '../Modelos/Email.php';

$emailClass = new Modelos\Email();

$email = $_POST['TEmail'];
$password = $_POST['TPass'];
$nombre = $_POST['TNombre'];
$telefono = $_POST['TTelefono'];
$vkey = $emailClass->setEmail($email);
$verificado = 0;
$encriptado = trim(password_hash($password, PASSWORD_DEFAULT));

if(isset($email) && !empty($password) && !empty($nombre) && !empty($telefono)){
    $conexion = new Modelos\Conexion();

    $consulta_verificar = "SELECT * FROM usuario WHERE email = ?";
    $datos_verificar = array($_POST['TEmail']);
    $resultado = json_encode($conexion->consultaPreparada($datos_verificar,$consulta_verificar,2,'s', false, null));
    if($resultado != '[]'){
        echo 'Existe';
    }else{
      if(isset($_FILES['Fimagen'])){
        if(strlen($_FILES['Fimagen']['tmp_name']) != 0){
          $archivo = subir_archivo('Fimagen',2);
          if($archivo != "error"){
               $consulta = "INSERT INTO tarea_completada(id,tarea,usuario,archivo) VALUES (?,?,?,?)";
               $nada = "";
               $datos = array($nada,$_POST['tarea'],$_SESSION['idusuario'],$archivo);
               echo $conexion->consultaPreparada($datos,$consulta,1,"iiis",false,null);
          }else{
               echo 0;
          }
       }
      }else{
        $consulta_registro = "INSERT INTO usuario (nombre, telefono, email, password, vkey, verificado) VALUES (?, ?, ?, ?, ?, ?)";
        $datos_registro = array($nombre, $telefono, $email, $encriptado, $vkey, $verificado);
        $resultado = $conexion->consultaPreparada($datos_registro,$consulta_registro,1,'sssssi', false, 3);
        if($resultado == 1){
          echo $resultado;
          $enviar = $emailClass->enviarEmailConfirmacion();
          
        }
        echo 'error';     
        
      }
    }
    
}

?>