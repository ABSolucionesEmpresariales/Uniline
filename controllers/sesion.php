<?php
header('Content-Type: text/html; charset=UTF-8');
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
//Iniciar una nueva sesión o reanudar la existente.
session_start();
//Si existe la sesión "cliente"..., la guardamos en una variable.
if (isset($_SESSION['acceso'])){
    $usuario = $_SESSION['acceso'];
}else{
header('Location: ../views/index.php');//Aqui lo redireccionas al lugar que quieras.
 die() ;

}

?>