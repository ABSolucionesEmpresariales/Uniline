<?php 
session_start();
require_once("Modelos/Conexion");

if(isset($_POST['email'])){
    $correo = $_POST['email'];
    echo $correo;
}



?>