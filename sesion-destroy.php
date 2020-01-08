<?php
session_start();
include ("modelos/Conexion.php");

unset($_SESSION["nombreU"]);
unset($_SESSION["passwordU"]);
session_unset();
session_destroy();
    

header('Location: views/index.html');

?>