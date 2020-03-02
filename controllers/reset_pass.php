<?php 
    session_start();
    require_once("Modelos/Conexion");
    include '../Modelos/Email.php';

    if(isset($_POST['email'])){
        $correo = $_POST['email'];
        echo $correo;
    }

    if(isset($_POST['emailForReset'])){
        $emailClass = new Modelos\Email();
        $vkey = $emailClass->setEmail($_POST['emailForReset']);
        $enviar = $emailClass->enviarEmailRecuperarPass();
    }
?>