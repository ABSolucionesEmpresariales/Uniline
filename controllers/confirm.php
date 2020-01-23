<?php
use modelos\Conexion;
require_once '../modelos/Conexion.php'; 
session_start();

$conexion = new Modelos\Conexion();
$vkey=$_GET['vkey'];
$consulta = "SELECT * FROM usuario WHERE vkey = ?";
$datos = array($vkey);
$resultado = json_encode($conexion->consultaPreparada($datos,$consulta,2,'s', false, null));
$result = json_decode($resultado);

if($resultado != '[]'){
    $update = "UPDATE usuario SET verificado = 1 WHERE vkey = ?";
    $datos2 = array($vkey);
    $resultUp = json_encode($conexion->consultaPreparada($datos2,$update,1,'i', false, null));
    $_SESSION['acceso'] = $result[0][1];
    $_SESSION['id'] = $result[0][0];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuenta verificada</title>

    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="../css/linearicons.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main_styles.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/styles/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/icons/all.css">

    <!--
    JS
    ============================================= -->
    
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="container p-3 my-3 bg-primary text-white center-block">
        <h2 class="h2 text-white">¡Cuenta verificada!</h2>
        <a class="text-black" href="../views/mainpage.php">inicia sesion aqui</a>
    </div>
    
</body>
</html>