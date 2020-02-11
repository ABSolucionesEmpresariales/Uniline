<?php
header('Content-Type: text/html; charset=UTF-8');
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
//Iniciar una nueva sesión o reanudar la existente.
//Si existe la sesión "cliente"..., la guardamos en una variable.
if (!empty($_SESSION['acceso']) && !empty($_SESSION['verificado']) && !empty($_SESSION['idusuario'])){
    header('Location: ../views/mainpage.php');
}else{
//Aqui lo redireccionas al lugar que quieras.
 die();

}

?>