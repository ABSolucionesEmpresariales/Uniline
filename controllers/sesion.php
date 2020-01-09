<?php
session_start();

$usuario = $_SESSION['nombreU'];
$password = $_SESSION['passwordU'];

echo $usuario;

?>