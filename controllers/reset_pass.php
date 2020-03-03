<?php 
    session_start();
    require_once("Modelos/Conexion");
    include '../Modelos/Email.php';

    if(isset($_POST['email'])){
        $correo = $_POST['email'];
        echo $correo;
    }

    if(isset($_POST['emailForReset'])){
        $conexion = new Modelos\Conexion();

        $resultado = $conexion->consultaPreparada(
            array($_POST['emailForReset']),
            "SELECT * FROM usuario WHERE email = ?",
            2,
            "s",
            false,
            null
        );
        if(!empty($resultado)){
            $emailClass = new Modelos\Email();
            $vkey = $emailClass->setEmail($_POST['emailForReset']);
            $enviar = $emailClass->enviarEmailRecuperarPass();
            echo "mail_existe";
        }else{
            echo "mail_noExiste";
        }
    }

    if(isset($_POST['newPass'])){
        $conexion = new Modelos\Conexion();
        $encriptado = trim(password_hash($_POST['newPass'],PASSWORD_DEFAULT));
        echo $conexion->consultaPreparada(
            array($encriptado,$_POST['correo']),
            "UPDATE usuario SET password = ? WHERE email = ?",
            1,
            "s",
            false,
            null
        );
    }

?>