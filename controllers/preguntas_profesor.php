<?php
require_once '../Modelos/Conexion.php';
$request = $_SERVER['REQUEST_METHOD'];
$conexion = new Modelos\Conexion();

switch($request) {

    case "POST":

        if(!isset($_POST['editar_pregunta'])) {
            $pregunta_examen = $_POST['pregunta'];
            $respuestas = $_POST['respuesta'];
            $bloque = $_POST['nombre_bloque'];

            $idexamen = json_encode($conexion->consultaPreparada(
                array($bloque),
                "SELECT idexamen FROM examen WHERE bloque = ?",
                2,
                "s",
                false,
                null
            ));
            
            if($idexamen){
                $id = json_decode($idexamen);
            
                if (isset($pregunta_examen) && isset($respuestas)) {
               
                    if($conexion->consultaPreparada(
                        array($pregunta_examen, $respuestas, $id[0][0]),
                        "INSERT INTO pregunta (pregunta,respuestas,examen) VALUES (?,?,?)",
                        1,
                        "sss",
                        false,
                        null
                    ) == 1) {
                        echo 'creado';   
                    }else {
                        echo 'No se pudo insertar';
                    }  
            
                } else {
                  
                    echo 'error al insertar';
               
                }
            }else {
                echo 'no existe';
            }
        } else {

            /* Aqui va el codigo cuando vamos a editar UPDATE */

        }

    break;

    case "GET":

       $pregunta = $_GET['pregunta'];

       $datos_pregunta = $conexion->consultaPreparada(
            array($pregunta),
            "SELECT * FROM pregunta WHERE idpregunta = ?",
            3,
            "i",
            false,
            null
        );

        if($datos_pregunta) {
            echo json_encode($datos_pregunta);
        } else {
            echo 0;
        }


    break;


}



?>