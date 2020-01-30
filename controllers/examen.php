<?php
session_start();
require_once '../Modelos/Conexion.php';

if (!empty($_POST['accion'])) {

    $conexion = new Modelos\Conexion();
    switch ($_POST['accion']) {

        case "insertar":
            $tabla =  json_decode($_POST['JSON']);
            for ($fila = 0; $fila < sizeof($tabla); $fila++) {
                if (!empty($nombre = $tabla[$fila][$columna = 1]) && !empty($descripcion = $tabla[$fila][$columna = 2]) && !empty($bloque = $tabla[$fila][$columna = 3])) { //si los valores requeridos en el renglon de la tabla examen no estan vacios se hace el registro
                    $conexion->consultaPreparada(
                        $tabla[$fila], //se manda la fila a insertar
                        "INSERT INTO examen (idexamen,nombre,descripcioon,bloque) VALUES (?,?,?,?)",
                        1,
                        "ssss",
                        false,
                        null
                    );
                } else {
                    echo 'La fila ' . $fila . ' no fue insertada';
                }
            }
            break;

        case "editar":
            $tabla =  json_decode($_POST['JSON']);
            for ($fila = 0; $fila < sizeof($tabla); $fila++) {
                if (!empty($nombre = $tabla[$fila][$columna = 1]) && !empty($descripcion = $tabla[$fila][$columna = 2]) && !empty($bloque = $tabla[$fila][$columna = 3])) { //si los valores requeridos en el renglon de la tabla examen no estan vacios se hace el registro
                    $conexion->consultaPreparada(
                        $tabla[$fila],
                        "UPDATE examen SET nombre = ?, descripcion = ?, curso = ? WHERE idbloque = ? ",
                        1,
                        "ssss",
                        true, // se reestructira la fila se cambia el id que esta en la primera columna hacia la ultima para que el bind de las variables en la consulta coincida
                        null
                    );
                } else {
                    echo 'La fila ' . $fila . ' no fue actualizada';
                }
            }
            break;

        case "items":
            echo json_encode($conexion->consultaPreparada(
                array($_SESSION['idusuario']),
                "SELECT idbloque,bloque.nombre FROM bloque INNER JOIN curso ON bloque.curso = curso.idcurso WHERE profesor = ? ",
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
