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
            if (isset($_POST['idtarea']) && !empty($_POST['TNombre']) && !empty($_POST['TADescripcion']) && !empty($_SESSION['idbloque'])) {
               echo $conexion->consultaPreparada(
                    array($_POST['idtarea'], $_POST['TNombre'], $_POST['TADescripcion'], $ruta, $_SESSION['idbloque']),
                    "INSERT INTO tarea (idtarea,nombre,descripcion,archivo_bajada,bloque) VALUES (?,?,?,?,?)",
                    1,
                    "sssss",
                    false,
                    null
                );
            } else {
                echo "los post no estan llegando correctamente";
            }
            break;

        case "editar":
            $respuesta =  $conexion->consultaPreparada(
                array($_POST['idtarea']),
                "SELECT archivo_bajada FROM tarea WHERE idtarea  = ?",
                2,
                "s",
                false,
                null
            );
            if (!empty($respuesta) && empty($ruta)) {
                $ruta = $respuesta[0][0]; //si hay una archivo registrado en el sistema y si no hay una carga nueva de archivo optene el archivo existente registrado
            } else if (!empty($respuesta) && !empty($ruta)) {
                $ruta = $respuesta[0][0]; //si hay un archivo registrado y hay una nueva carga de archivo borra el anterior y registra el nuevo en la base de datos 
                unlink($ruta);
            }
            if (!empty($_POST['idtarea']) && !empty($_POST['TNombre']) && !empty($_POST['TADescripcion']) && !empty($_POST['SBloque'])) {
                    $conexion->consultaPreparada(
                    array($_POST['idtema'], $_POST['TNombre'], $_POST['TADescripcion'], $ruta, $_POST['SBloque']),
                    "UPDATE terea SET nombre = ?, descripcion = ?, archivo_bajada = ? , bloque = ? WHERE idtarea = ? ",
                    1,
                    "sssss",
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
                "SELECT idtarea,nombre,descripcion,archivo_bajada FROM tarea WHERE bloque = ? ORDER BY idtarea ASC",
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