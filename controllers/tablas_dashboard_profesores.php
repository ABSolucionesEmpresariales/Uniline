<?php
session_start();
require_once '../Modelos/Conexion.php';
if (!empty($_POST['tabla'])) {

    $conexion = new Modelos\Conexion();
    switch ($_POST['tabla']) {

        case "tabla_cursos":
            echo json_encode(
                $conexion->consultaPreparada(
                    array($_SESSION['idusuario']),
                    "SELECT idcurso,nombre,descripcion,imagen,video,horas,calificacion,costo,publicacion FROM curso WHERE profesor = ?",
                    3,
                    's',
                    false,
                    null

                ),
                JSON_UNESCAPED_SLASHES
            );
            break;

        case "tabla_bloques":
            echo json_encode(
                $conexion->consultaPreparada(
                    array($_POST['curso']),
                    "SELECT idbloque,nombre FROM bloque WHERE curso = ?",
                    3,
                    's',
                    false,
                    null

                )
            );
            break;

        case "tabla_examenes":
            echo json_encode(
                $conexion->consultaPreparada(
                    array($_POST['bloque']),
                    "SELECT idexamen,nombre,descripcion FROM examen WHERE bloque = ?",
                    3,
                    's',
                    false,
                    null

                )
            );
            break;

        case "tabla_temas":
            echo json_encode(
                $conexion->consultaPreparada(
                    array($_POST['bloque']),
                    "SELECT idtema,preferencia,nombre,descripcion,video,archivo FROM tema WHERE bloque = ? ORDER BY preferencia ASC",
                    3,
                    's',
                    false,
                    null

                )
            );
            break;

        case "tabla_preguntas":
            echo json_encode(
                $conexion->consultaPreparada(
                    array($_POST['bloque']),
                    "SELECT idpregunta,pregunta,respuestas FROM pregunta INNER JOIN examen ON idexamen = examen WHERE bloque = ?",
                    3,
                    's',
                    false,
                    null

                )
            );
            break;

        case "tabla_tareas":
            echo json_encode(
                $conexion->consultaPreparada(
                    array($_POST['bloque']),
                    "SELECT idtarea,nombre,descripcion,archivo_bajada FROM tarea WHERE bloque = ?",
                    3,
                    's',
                    false,
                    null

                )
            );
            break;


        default:
            echo "Tabla no encontrada";
    }
}
