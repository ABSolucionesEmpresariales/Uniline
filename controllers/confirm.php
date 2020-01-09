<?php

use modelos\Conexion;

require_once 'modelos/Conexion.php';    
$conexion = new modelos\Conexion();

//$nombre = $_POST['usuario'];
$vkey=$_GET['vkey'];


$consulta = "SELECT * FROM usuario WHERE vkey = ?";
$datos = array($vkey);
$resultado = json_encode($conexion->consultaPreparada($datos,$consulta,2,'s', false, null));


echo $resultado; 

if($resultado != '[]'){
    echo 'hay resultados';
    $update = "UPDATE usuario SET verificado = 1 WHERE vkey = ?";
    $datos2 = array($vkey);
    $result = json_encode($conexion->consultaPreparada($datos2,$update,2,'s', false, null));

}


?>