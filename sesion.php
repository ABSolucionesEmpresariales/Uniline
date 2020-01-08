<?php
session_start();
include ("modelos/Conexion.php");
$conexion = new Modelos\Conexion();

$usuario = $_SESSION['nombreU'];
$password = $_SESSION['passwordU'];

echo $usuario;

?>