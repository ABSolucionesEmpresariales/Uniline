<?php
session_start();    
require_once 'modelos/Conexion.php';
include 'modelos/email.php';

$emailClass = new modelos\Email();

$email = $_POST['TEmail'];
$password = $_POST['TPass'];
$nombre = $_POST['TNombre'];
$telefono = $_POST['TTelefono'];
$vkey = $emailClass->setEmail($email);
$verificado = 0;
$encriptado = trim(password_hash($password, PASSWORD_DEFAULT));


if(isset($email) && !empty($password) && !empty($nombre) && !empty($telefono)){
    $conexion = new modelos\Conexion();

    $consulta_verificar = "SELECT * FROM usuarios WHERE email = ?";
    $datos_verificar = array($_POST['TEmail']);
    $resultado = json_encode($conexion->consultaPreparada($datos_verificar,$consulta_verificar,2,'s', false, null));
    if($resultado != '[]'){
        echo 'Existe';
    }else{
          $consulta_registro = "INSERT INTO usuarios (nombre, telefono, email, password, vkey, verificado) VALUES (?, ?, ?, ?, ?, ?)";
          $datos_registro = array($nombre, $telefono, $email, $encriptado, $vkey, $verificado);
          $resultado = $conexion->consultaPreparada($datos_registro,$consulta_registro,1,'sssssi', false, 3);
          if($resultado == 1){
            echo $resultado;
            $enviar = $emailClass->enviarEmailConfirmacion();
            
          }
          
          
    }
    
}

?>