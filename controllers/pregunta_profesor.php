<?php 

require_once '../Modelos/Conexion.php';

if (isset($_POST['idpregunta']) && !empty($_POST['TPregunta']) && !empty($_POST['respuestas']) && !empty($_SESSION['idexamen'])) {
   echo $conexion->consultaPreparada(
   array($_POST['idpregunta'], $_POST['TPregunta'], $_POST['respuestas'], $_SESSION['idexamen']),
   "INSERT INTO pregunta (idpregunta,pregunta,respuestas,examen) VALUES (?,?,?,?)",
   1,
   "ssss",
   false,
   2
);
} else {
echo "los post no estan llegando correctamente";
}

?>