<?php
session_start();
require_once '../Modelos/Conexion.php';

if (isset($_POST['idexamen']) && !empty($_POST['TNombre']) && !empty($_POST['TADescripcion']) && !empty($_POST['SBloque']) && !empty($_POST['accion'])) {

    $conexion = new Modelos\Conexion();
    $datos = [$_POST['idexamen'], $_POST['TNombre'], $_POST['TADescripcion'], $_POST['SBloque']];

    switch ($_POST['accion']) {

        case "insertar":
            $resultado =  $conexion->consultaPreparada(
                array($_POST['SBloque']),
                "SELECT idexamen FROM examen WHERE bloque = ?",
                2,
                "s",
                false,
                null
            );
            if (empty($resultado)) {
                $conexion->consultaPreparada(
                    $datos,
                    "INSERT INTO examen (idexamen,nombre,descripcioon,bloque) VALUES (?,?,?,?)",
                    1,
                    "ssss",
                    false,
                    null
                );
            } else {
                echo "El bloque ya contine un examen";
            }
            break;

        case "editar":
            $conexion->consultaPreparada(
                $datos,
                "UPDATE examen SET nombre = ?, descripcion = ?, curso = ? WHERE idbloque = ? ",
                1,
                "ssss",
                true, // se reestructira la fila se cambia el id que esta en la primera columna hacia la ultima para que el bind de las variables en la consulta coincida
                null
            );
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

        case 'tabla':
            echo json_encode($conexion->consultaPreparada(
                array($_SESSION['idcurso']),
                "SELECT idexamen,examen.nombre,examen.descripcion,bloque,bloque.nombre FROM examen INNER JOIN bloque 
                ON examen.bloque = idbloque INNER JOIN curso ON bloque.curso = idcurso WHERE curso = ? ORDER BY idexamen ASC",
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
