<?php
require_once '../Modelos/Conexion.php';

if (!empty($_POST['accion'])) {
    $conexion = new Modelos\Conexion();
    switch ($_POST['accion']) {

        case "insertar":
            $tabla =  json_decode($_POST['JSON']);
            for ($fila = 0; $fila < sizeof($tabla); $fila++) {
                if (!empty($nombre = $tabla[$fila][$columna = 1]) && !empty($curso = $tabla[$fila][$columna = 2])) {
                    $conexion->consultaPreparada(
                        $tabla[$tabla],
                        "INSERT INTO bloque (idbloque,nombre,curso) VALUES (?,?,?)",
                        1,
                        "sss",
                        false,
                        null
                    );
                }
            }
            break;

        case "editar":
            $tabla =  json_decode($_POST['JSON']);
            for ($fila = 0; $fila < sizeof($tabla); $fila++) {
                if (!empty($nombre = $tabla[$fila][$columna = 1]) && !empty($curso = $tabla[$fila][$columna = 2])) {
                    $conexion->consultaPreparada(
                        $tabla[$fila],
                        "UPDATE bloque SET nombre = ?, curso = ? WHERE idbloque = ? ",
                        1,
                        "sss",
                        true,
                        null
                    );
                }
            }
            break;

        case "items":
            echo json_encode($conexion->consultaPreparada(
                array($_SESSION['idusuario']),
                "SELECT idcurso, nombre FROM curso WHERE profesor = ?",
                2,
                "s",
                false,
                null
            ));
            break;

        default:
            echo "El tipo de accion no existe";
            break;
    }
}
