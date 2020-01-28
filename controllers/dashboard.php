<?php
require_once '../Modelos/Conexion.php';

if(isset($_POST['datos_lista'])){
    $conexion = New Modelos\Conexion();
    // consulta que trae los bloques del curso  
    $consulta_bloque_curso = "SELECT b.idbloque,b.nombre FROM bloque b WHERE b.curso = ?";
    $datos_bloques = array(1);
    $datos_consulta_bloque = $conexion->consultaPreparada($datos_bloques,$consulta_bloque_curso,2,"i",false,null);

    $array_datos_examen = array();
    $array_datos_temas = array();
    $array_datos_tarea = array();
    $array_datos_total_examen_curso = array();
    
     for($i = 0; $i < count($datos_consulta_bloque); $i++){

    // <<< consulta que trae los Examenenes del curso y si el usuario ya lo contesto  >>> 
        $consulta_examen_bloque = "SELECT a.idexamen,a.nombre,a.descripcion,b.calificacion,case when b.examen is null then 0 else 1 end as examenes_realizados 
        FROM examen a LEFT JOIN (SELECT * FROM examen_completado tm WHERE tm.usuario = ?) b on a.idexamen = b.examen INNER JOIN bloque c ON c.idbloque = a.bloque 
        WHERE c.curso = ? AND a.bloque = ?";
        $datos_examen = array(1,1,$datos_consulta_bloque[$i][0]);
        $array_temporales_examen = $conexion->consultaPreparada($datos_examen,$consulta_examen_bloque,2,"iis",false,null);
        //echo json_encode($array_temporales_examen); 

    // <<< consulta que trae los temas del curso del usuario  >>> 
        $datos_consulta_temas = array(1,$datos_consulta_bloque[$i][0],1);
        $consulta_temas_bloque = "SELECT a.idtema,a.nombre,a.descripcion,a.video,a.archivo,case when b.tema is null then 0 else 1 end as temas_vistos 
        FROM tema a LEFT JOIN (SELECT * FROM tema_completado tm WHERE tm.usuario = ?) b on a.idtema = b.tema 
        INNER JOIN bloque c ON c.idbloque = a.bloque
        WHERE a.bloque = ? AND c.curso = ?";
        $array_temporales_temas = $conexion->consultaPreparada($datos_consulta_temas,$consulta_temas_bloque,2,"isi",false,null);

    // <<< consulta que trae las tareas del curso>>> 
        $consulta_tarea_curso = "SELECT * FROM tarea WHERE bloque = ?";
        $bloque_actual = array($datos_consulta_bloque[$i][0]);
        $array_datos_tarea = $conexion->consultaPreparada($bloque_actual,$consulta_tarea_curso,2,"i",false,null);
         
       // echo count($datos_consulta_bloque[$i])+2;
       // Funcion que restructur el arreglo final donde llevara toda oa infomacion
         for($y = 0; $y < count($datos_consulta_bloque[$i]) + 3; $y++){
            if($y == 0){
                //Metemos el examen en la pocicion 0
                $array_datos_exame[$y] = $array_temporales_examen[$y];
            }else if($y == count($datos_consulta_bloque[$i]) + 1){
                //Metemos los temas del examen en la penultima posicion del arreglo
                $array_datos_exame[$y] = $array_temporales_temas;
            }else if($y == count($datos_consulta_bloque[$i]) + 2){
                //Metemos las tareas en la ultima posicion del arreglo
                $array_datos_exame[$y] = $array_datos_tarea;
            }else{
                //Metemos la demas infomacion del bloque
                $array_datos_exame[$y] = $datos_consulta_bloque[$i][$y-1];
            }
        }
        //Le damos a un array global que llevara el bloque ya estructurado para mostrar en el frente
        $array_datos_total_examen_curso[$i] = $array_datos_exame; 
    } 
    //Imprimimos el array con los bloques estructurados
    echo json_encode($array_datos_total_examen_curso); 
}

if(isset($_POST['examenBLoques'])){
    $conexion = New Modelos\Conexion();
    $datos_examen = array($_POST['examenBLoques']);
    $consulta_examen_bloque = "SELECT e.descripcion,p.idpregunta,p.pregunta,p.respuestas,p.respuesta_correcta 
    FROM pregunta p INNER JOIN examen e ON e.idexamen = p.examen WHERE p.examen = ?";
    echo json_encode($conexion->consultaPreparada($datos_examen,$consulta_examen_bloque,2,"i",false,null));
}

if(isset($_POST['DatosTemaAcutual'])){
    $conexion = New Modelos\Conexion();
    $datos_tema = array($_POST['DatosTemaAcutual']);
    $consulta = "SELECT t.video,t.nombre,t.descripcion,t.archivo FROM tema t WHERE t.idtema = ?";
    echo json_encode($conexion->consultaPreparada($datos_tema,$consulta,2,"i",false,null));
}

if(isset($_POST['temaCompleto'])){
    $conexion = New Modelos\Conexion();
    $datos_tema = array($_POST['temaCompleto'],1);
    $consulta = "INSERT INTO tema_completado (tema,usuario) VALUES (?,?)";
    echo $conexion->consultaPreparada($datos_tema,$consulta,1,"ii",false,null);
}  