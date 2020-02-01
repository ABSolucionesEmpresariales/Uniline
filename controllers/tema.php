<?php
session_start();
require_once '../Modelos/Conexion.php';
require_once '../Modelos/Archivos.php';

if (!empty($_POST['accion'])) {

    if (!empty($_FILES['FArchivo']['tmp_name'])) {
        $ruta = subir_archivo('FArchivo', 2);
    } else {
        $ruta = '';
    }
    $conexion = new Modelos\Conexion();

    switch ($_POST['accion']) {

        case "insertar":
            if (isset($_POST['idtema']) && !empty($_POST['TNombre']) && !empty($_POST['TADescripcion']) && !empty($_POST['TVideo']) && !empty($_POST['SBloque'])) {
                $conexion->consultaPreparada(
                    array($_POST['idtema'], $_POST['TNombre'], $_POST['TADescripcion'], $_POST['TVideo'], $ruta, $_POST['SBloque']),
                    "INSERT INTO tema (idtema,nombre,descripcion,video,archivo, bloque) VALUES (?,?,?,?,?,?)",
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
            $respuesta =  $conexion->consultaPreparada(
                array($_POST['idtema']),
                "SELECT archivo FROM tema WHERE idtema  = ?",
                2,
                "s",
                false,
                null
            );
            if (!empty($respuesta) && empty($ruta)) {
                $ruta = $respuesta[0][0];
            }
            json_encode($conexion->consultaPreparada(
                array($_SESSION['idusuario']),
                "SELECT idbloque,bloque.nombre FROM bloque INNER JOIN curso ON bloque.curso = curso.idcurso WHERE profesor = ? ",
                2,
                "s",
                false,
                null
            ));
            if (isset($_POST['idtema']) && !empty($_POST['TNombre']) && !empty($_POST['TADescripcion']) && !empty($_POST['TVideo']) && !empty($_POST['SBloque'])) {
                $conexion->consultaPreparada(
                    array($_POST['idtema'], $_POST['TNombre'], $_POST['TADescripcion'], $_POST['TVideo'], $ruta, $_POST['SBloque']),
                    "UPDATE tema SET nombre = ?, descripcion = ?, video = ? , archivo , bloque WHERE idtema = ? ",
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
                "SELECT idbloque,bloque.nombre FROM bloque WHERE curso =  ? ",
                2,
                "s",
                false,
                null
            ));
            break;

        case 'tabla':
            echo json_encode($conexion->consultaPreparada(
                array($_SESSION['idbloque']),
                "SELECT idtema,nombre,descripcion,video,archivo FROM tema WHERE bloque = ? ORDER BY idtema ASC",
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
