<?php 
require_once '../Modelos/Conexion.php';

$request = $_SERVER['REQUEST_METHOD'];
$conexion = new Modelos\Conexion();

switch($request) {

    case "POST":
        if (isset($_POST['nombre_bloque']) && isset($_POST['id_curso'])) {
            if(!isset($_POST['editar_bloque'])){
                echo $conexion->consultaPreparada(
                    array($_POST['nombre_bloque'], $_POST['id_curso']),
                    "INSERT INTO bloque (nombre,curso) VALUES (?,?)",
                    1,
                    "ss",
                    false,
                    null
                );
            } else {
                echo $conexion->consultaPreparada(
                    array($_POST['id_bloque'], $_POST['nombre_bloque'], $_POST['id_curso']),
                    "UPDATE bloque SET nombre = ?, curso = ? WHERE idbloque = ? ",
                    1,
                    "sss",
                    true,
                    null
                );
            }
         }
    break;

    case "GET":
        if(isset($_GET['bloque'])){
            $bloque = $conexion->consultaPreparada(
                array($_GET['bloque']),
                "SELECT nombre FROM bloque WHERE idbloque = ?",
                3,
                "s",
                false,
                null
            );

            echo json_encode($bloque);
        }
    break;
}

?>