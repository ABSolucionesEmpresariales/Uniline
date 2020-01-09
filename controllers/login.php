<?php 
session_start();
require_once 'modelos/Conexion.php';

$conexion = new Modelos\Conexion();

$usuario = $_POST['TUsuario'];
$password = $_POST['TPassword'];

$consulta = "SELECT * FROM usuario WHERE nombre = ? ";
$datos = array($_POST['TUsuario']);
$resultado = json_encode($conexion->consultaPreparada($datos,$consulta,2,'s', false, null));
$result = json_decode($resultado);

if ($resultado != "[]") {
    if (password_verify($password, $result[0][4])) {
        if($result[0][6] == 1){
            echo '1';
            $_SESSION['nombreU'] = $usuario;
            $_SESSION['passwordU'] = $password;
        }else{
            echo "NoVerificado";
        }
      
    } else {

        echo "passwordIncorrecta";
    }
}else{
        echo "no existe";
    }

 ?>