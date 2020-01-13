<?php 
session_start();
define('RUTA_UNILINE_APP','http://localhost/uniline/Views');
require_once '../modelos/Conexion.php';

$conexion = new Modelos\Conexion();

$usuario = $_POST['TUsuario'];
$password = $_POST['TPassword'];

$consulta = "SELECT * FROM usuario WHERE nombre = ? ";
$datos = array($_POST['TUsuario']);
$resultado = json_encode($conexion->consultaPreparada($datos,$consulta,2,'s', false, null));
$result = json_decode($resultado);

if ($resultado != "[]") {
    if (password_verify($password, $result[0][7])) {
        if($result[0][9] == 1){
            echo '1';
            $_SESSION['acceso'] = $usuario;
        }else{
            echo "NoVerificado";
        }
      
    } else {

        echo "passwordIncorrecta";
    }
}else{
        echo "no existe";
    }

    if (isset($_GET['cerrar_sesion'])) {
        session_unset();
        session_destroy();
        header('Location: ../Views/login.php');
        //se destruye la sesion al dar click en los botones de salir
    }
 ?>