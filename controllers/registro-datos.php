<?php
include '../Modelos/Archivos.php';
require_once '../Modelos/Conexion.php';
$conexion = new Modelos\Conexion();

$consulta = "SELECT nombre FROM curso";
$resultado = json_encode($conexion->obtenerDatosDeTabla($consulta));

foreach($resultado as $opciones);


echo '<option value="'.$valores[id].'">'.$valores[paises].'</option>';


     

?>