<?php
 $conexion = new Modelos\Conexion();
 $conulta = "UPDATE pregunta SET respuesta = 'local mente,#De internet,De steam,Solo de descarga' WHERE idpregunta = ?";

 //for($i = 1)