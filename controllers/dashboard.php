<?php
require_once '../Modelos/Conexion.php';

if(isset($_POST['datos_lista'])){
    $conexion = New Modelos\Conexion();
    /* consulta que trae los bloques del curso  */
    $consulta_bloque_curso = "SELECT b.idbloque,b.nombre FROM bloque b WHERE b.curso = ?";
    $datos_bloques = array(1);
    $datos_consulta_bloque = $conexion->consultaPreparada($datos_bloques,$consulta_bloque_curso,2,"i",false,null);
/*     $consulta_extamen_bloque = "SELECT * FROM examen WHERE bloque = ?";
    $datos_bloques = array($datos_consulta_bloque[0][0]);
    echo json_encode($array_temporales_examen = $conexion->consultaPreparada($datos_bloques,$consulta_bloque_curso,2,"i",false,null)); */

    $array_datos_examen = array();
    $array_datos_temas = array();
    $array_datos_tarea = array();
    $array_datos_total_examen_curso = array();

    
     for($i = 0; $i < count($datos_consulta_bloque); $i++){

    // <<< consulta que trae los Examenenes del curso del curso  >>> 
        $consulta_extamen_bloque = "SELECT * FROM examen WHERE bloque = ?";
        $datos_examen = array($datos_consulta_bloque[$i][0]);
        $array_temporales_examen = $conexion->consultaPreparada($datos_examen,$consulta_extamen_bloque,2,"i",false,null);
        //echo json_encode($array_temporales_examen); 

    // <<< consulta que trae los temas del curso del usuario  >>> 
        $datos_consulta_temas = array(1,$datos_consulta_bloque[$i][0],1);
        $consulta_temas_bloque = "SELECT a.idtema,a.nombre, case when b.tema is null then 0 else 1 end as temas_vistos 
        FROM tema a LEFT JOIN (SELECT * FROM tema_completado tm WHERE tm.usuario = ?) b on a.idtema = b.tema 
        INNER JOIN bloque c ON c.idbloque = a.bloque
        WHERE a.bloque = ? AND c.curso = ?";
        $array_temporales_temas = $conexion->consultaPreparada($datos_consulta_temas,$consulta_temas_bloque,2,"isi",false,null);

    // <<< consulta que trae las tareas del curso>>> 
        $consulta_tarea_curso = "SELECT * FROM tarea WHERE bloque = ?";
        $array_datos_tarea = $conexion->consultaPreparada($datos_examen,$consulta_tarea_curso,2,"i",false,null);
         
       // echo count($datos_consulta_bloque[$i])+2;
        for($y = 0; $y < count($datos_consulta_bloque[$i]) + 3; $y++){
            if($y == 0){
                $array_datos_exame[$y] = $array_temporales_examen[$y];
            }else if($y == count($datos_consulta_bloque[$i]) + 1){
                $array_datos_exame[$y] = $array_temporales_temas;
            }else if($y == count($datos_consulta_bloque[$i]) + 2){
                $array_datos_exame[$y] = $array_datos_tarea;
            }else{
                $array_datos_exame[$y] = $datos_consulta_bloque[$i][$y-1];
            }
        }
        $array_datos_total_examen_curso[$i] = $array_datos_exame;
    } 
    echo json_encode($array_datos_total_examen_curso); 
}