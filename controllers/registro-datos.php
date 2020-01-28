<?php
include '../Modelos/Archivos.php';
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

$conexion = new Modelos\Conexion();

    $consulta_verificar = "SELECT * FROM usuario WHERE email = ?";
    $datos_verificar = array($_POST['TEmail']);
    $resultado = json_encode($conexion->consultaPreparada($datos_verificar,$consulta_verificar,2,'s', false, null));
    if($resultado != '[]'){
        echo 'Existe';
    }else{
          $consulta_registro = 
          "INSERT INTO usuario (nombre, edad, escolaridad, imagen, telefono, email, password,
           vkey, verificado, tipo, estado, municipio, trabajo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $datos_registro = array($nombre, $telefono, $email, $encriptado, $vkey, $verificado);
          $resultado = $conexion->consultaPreparada($datos_registro,$consulta_registro,1,'sissssssissss', false, 3);
          if($resultado == 1){
            echo $resultado;
            $enviar = $emailClass->enviarEmailConfirmacion();
            
          }
     echo 'error';     
          
    }

?>