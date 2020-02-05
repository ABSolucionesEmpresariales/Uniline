<?php  
require_once '../Modelos/Conexion.php';
include '../Modelos/Email.php';
include '../Modelos/Archivos.php';

$emailClass = new Modelos\Email();

$email = $_POST['TEmail'];
$password = $_POST['TPass'];
$nombre = $_POST['TNombre'];
$telefono = $_POST['TTelefono'];
$vkey = $emailClass->setEmail($email);
$verificado = 0;
$encriptado = trim(password_hash($password,PASSWORD_DEFAULT));

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
          $archivo = subir_archivo('Fimagen',1);
          if ($archivo == "Error"){
              echo $archivo;
          } else if ($archivo == "imagenNoValida"){
              echo $archivo;
          } else if ($archivo == "imagenGrande"){
              echo $archivo;
          } else {
              $consulta_registro_maestros= "INSERT INTO usuario (nombre,edad,escolaridad,imagen,telefono,email,password,vkey,verificado,tipo,estado,municipio,trabajo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
              $datos_registro_maestro = array($nombre,$_POST['TEdad'],$_POST['TGrado'],$archivo,$telefono,$email,$encriptado,$vkey,$verificado,"Maestro",$_POST['TEstado'],$_POST['TMunicipio'],$_POST['TProfesion']);
              $resultado = $conexion->consultaPreparada($datos_registro_maestro,$consulta_registro_maestros,1,'sissssssissss',false,6);
              if($resultado == 1){
                $enviar = $emailClass->enviarEmailConfirmacion();
                echo $resultado;
              }
              echo "error";
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