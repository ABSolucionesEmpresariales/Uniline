<?php
session_start();
require_once '../Modelos/Conexion.php';

if (!empty($_POST['accion'])) {

    $conexion = new Modelos\Conexion();

    switch ($_POST['accion']) {

        case "insertar":

            if (isset($_POST['idpregunta']) && !empty($_POST['TPregunta']) && !empty($_POST['respuestas']) && !empty($_POST['SExamen'])) {
                $conexion->consultaPreparada(
                    array($_POST['idpregunta'], $_POST['TPregunta'], $_POST['respuestas'], $_POST['SExamen']),
                    "INSERT INTO pregunta (idpregunta,pregunta,respuestas,examen) VALUES (?,?,?,?)",
                    1,
                    "ssss",
                    false,
                    null
                );
            } else {
                echo "los post no estan llegando correctamente";
            }
            break;

        case "editar":
            if (isset($_POST['idpregunta']) && !empty($_POST['TPregunta']) && !empty($_POST['respuestas']) && !empty($_POST['SExamen'])) {
                $conexion->consultaPreparada(
                    array($_POST['idpregunta'], $_POST['TPregunta'], $_POST['respuestas'], $_POST['SExamen']),
                    "UPDATE pregunta SET pregunta = ?, respuestas = ?, examen = ? WHERE idpregunta = ? ",
                    1,
                    "ssss",
                    true, // se reestructira la fila se cambia el id que esta en la primera columna hacia la ultima para que el bind de las variables en la consulta coincida
                    null
                );
            } else {
                echo "los post no estan llegando correctamente";
            }
            break;

        case "items":
            echo json_encode($conexion->consultaPreparada(
                array($_SESSION['idcurso']),
                "SELECT idexamen,examen.nombre FROM examen INNER JOIN bloque ON bloque = idbloque WHERE curso = ?",
                2,
                "s",
                false,
                null
            ));
            break;

        case 'tabla':
            echo json_encode($conexion->consultaPreparada(
                array($_SESSION['idcurso']),
                "SELECT idpregunta,pregunta,respuestas,examen,examen.nombre FROM pregunta INNER JOIN examen 
                ON examen = idexamen INNER JOIN bloque ON bloque = idbloque WHERE curso = ? ORDER BY examen ASC",
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
