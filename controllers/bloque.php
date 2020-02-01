<?php
session_start();
require_once '../Modelos/Conexion.php';

if (!empty($_POST['accion'])) {

$conexion = new Modelos\Conexion();


    switch ($_POST['accion']) {
        

        case "insertar":    
           if(isset($_POST['idbloque']) && !empty($_POST['TNombre']) && !empty($_POST['SCurso'])){
                    echo $conexion->consultaPreparada(
                        array($_POST['idbloque'],$_POST['TNombre'],$_POST['SCurso']),
                        "INSERT INTO bloque (idbloque,nombre,curso) VALUES (?,?,?)",
                        1,
                        "sss",
                        false,
                        null
                    );
                }
            break;

        case "editar":
            if(isset($_POST['idbloque']) && !empty($_POST['TNombre']) && !empty($_POST['SCurso'])){
                echo $conexion->consultaPreparada(
                        array($_POST['idbloque'],$_POST['TNombre'],$_POST['SCurso']),
                        "UPDATE bloque SET nombre = ?, curso = ? WHERE idbloque = ? ",
                        1,
                        "sss",
                        true,
                        null
                    );
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

            case 'tabla':
                echo json_encode($conexion->consultaPreparada(
                    array($_SESSION['idcurso']),
                    "SELECT idbloque,bloque.nombre,curso,curso.nombre FROM bloque INNER JOIN curso ON curso = idcurso WHERE idcurso = ?",
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
