<?php
include '../controllers/sessionCEO.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>

    <div class="cont">
        <div class="contenedor-registro">
            <h2>Registro a la Base de Datos</h2>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Profesores</a></li>
                        <li><a data-toggle="tab" href="#menu1">Cursos</a></li>
                        <li><a data-toggle="tab" href="#mas">bloques y temas</a></li>
                        <li class="col-2" style="margin-right: 1rem;">
                            <select id="select-profe-tema" name="SProfesor" class="form-control m-1" style="height: 35px!important">
                                <option value="0">Selecciona profesor</option>
                            </select>
                        </li>
                        <li class="col-2" style="margin-right: 1rem;">
                            <select id="select-curso" name="SCurso" class="form-control m-1" style="height: 35px!important; width: 20rem; margin-left: 1rem;">
                                <option value="0">Selecciona un curso</option>
                            </select>
                        </li>
                        <li class="col-2" style="margin-right: 1rem;">
                            <select id="select-bloque" name="SBloque" class="form-control m-1" style="height: 35px!important; width: 20rem; margin-left: 1rem;">
                                <option value="0">Selecciona bloque</option>
                            </select>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="mas" class="tab-pane fade">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li><a data-toggle="tab" href="#menu2">Bloques</a></li>
                            <li><a data-toggle="tab" href="#menu3">Temas</a></li>
                            <li><a data-toggle="tab" href="#menu4">Examen</a></li>
                            <li><a data-toggle="tab" href="#menu5">Preguntas examen</a></li>
                            <li><a data-toggle="tab" href="#menu6">Tareas</a></li>
                        </ul>

                    </div>
                    <div class="tab-content">
                        <div id="menu2" class="tab-pane fade">
                            <!-- REGISTRO DE BLOQUES -->
                            <h3 style="margin-left: 1rem;">Registro de Bloques</h3>
                            <hr>
                            <div class="form col-lg-5">
                                <form class="form-wrap" id="registro-bloques">
                                    <input type="text" id="nombre-bloque" class="form-control" name="TBloques" placeholder="Nombre del Bloque">
                                    <br>
                                    <button id="btn-bloque" class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Añadir</button>
                                </form>
                            </div>
                            <div class="form col-lg-7">
                                <table id="tabla-bloques" class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Curso</th>
                                            <th scope="col">Opcion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datos-bloque">

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <!-- REGISTRO DE TEMAS -->
                            <h3>Registro de Temas</h3>
                            <hr>
                            <div class="form col-lg-5">
                                <form class="form-wrap" id="registro-temas">
                                    <input id="accion-tema" type="hidden" value="insertar" name="accion">
                                    <input id='idtema' type="hidden" value="" name="idtema">
                                    <input type="text" id="nombre-tema" class="form-control" name="TNombre" placeholder="Nombre del tema">
                                    <textarea rows="5" cols="50" id="descripcion-tema" class="form-control" name="TADescripcion" placeholder="Descripcion del tema"></textarea>
                                    <input type="text" id="video-tema" class="form-control" name="TVideo" placeholder="URL video"></<input>
                                    <div>Tarea *opcional<input type="file" id="archivo-tema" class="form-control" name="FArchivo"></div>
                                    <br>
                                    <button id="btn-tema" class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Añadir tema</button>
                                </form>
                            </div>
                            <div class="form col-lg-7">
                                <table class="table" id="tabla-temas">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Video</th>
                                            <th scope="col">Archivo</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datos-tema">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <!-- REGISTRO DE EXAMENES -->
                            <h3>Registro de Examenes</h3>
                            <hr>
                            <div class="form col-lg-5">
                                <form class="form-wrap" id="registro-examen">
                                    <input type="text" id="nombre-examen" class="form-control" name="TNombre" placeholder="escribe el nombre del examen">
                                    <textarea rows="5" cols="50" id="descripcion-examen" class="form-control" name="TADescripcion" placeholder="escribe una descripcion de este examen"></textarea>
                                    <br>
                                    <button id="btn-examen" class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Enviar datos</button>
                                </form>
                                <hr>
                            </div>
                            <div class="form col-lg-7">
                                <table class="table" id="tabla-examen">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datos-examen">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <!-- REGISTRO DE PREGUNTAS EXAMENEN -->
                            <h3>Registro de preguntas</h3>
                            <h2 id="labelexamen">
                                <select id="select-examen" name="SExamen" class="form-control m-1" style="height: 35px!important; width: 20rem; margin-left: 1rem;">

                                </select>
                            </h2>
                            <hr>
                            <div class="form col-lg-5">
                                <form class="form-wrap" id="registro-preguntas">
                                    <hr>
                                    <p>Escribe la pregunta y selecciona cual de tus respuestas es la correcta</p>
                                    <div class="col-lg-6">
                                        <input type="text" id="pregunta" class="form-control" name="TPregunta" placeholder="pregunta"> <br>

                                        <div>
                                            <input class="radio-in" type="radio" id="resp1" name="TCorrecta" data-correcta = "1">
                                            <label><input type="text" id="respuesta1" class="form-control" name="TRespuesta" placeholder="respuesta 1"></label>
                                        </div>
                                        <div>
                                            <input class="radio-in" type="radio" id="resp2" name="TCorrecta" data-correcta ="2">
                                            <label><input type="text" id="respuesta2" class="form-control" name="TRespuesta" placeholder="respuesta 2"></label>
                                        </div>
                                        <div>
                                            <input class="radio-in" type="radio" id="resp3" name="TCorrecta" data-correcta ="3">
                                            <label><input type="text" id="respuesta3" class="form-control" name="TRespuesta" placeholder="respuesta 3"></label>
                                        </div>
                                        <div>
                                            <input class="radio-in" type="radio" id="resp4" name="TCorrecta" data-correcta ="4">
                                            <label><input type="text" id="respuesta4" class="form-control" name="TRespuesta" placeholder="respuesta 4"></label>
                                        </div>
                                        <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                                    </div>
                                </form>
                                <hr>
                            </div>
                            <div class="form col-lg-7">
                                <table class="table" id="tabla-preguntas">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Pregunta</th>
                                            <th scope="col">Respuestas</th>
                                            <th scope="col">Respuesta Correcta</th>
                                            <th scope="col">valor respuesta</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datos-preguntas">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu6" class="tab-pane fade">
                            <!-- REGISTRO DE TAREAS -->
                            <h3>Registro de tareas</h3>
                            <hr>
                            <div class="form col-lg-5">

                                <form class="form-wrap" id="registro-tarea">
                                    <input id="accion-tarea" type="hidden" value="insertar" name="accion">
                                    <input id="idtarea" type="hidden" value="" name="idtarea">
                                    <input type="text" id="nombre-tarea" class="form-control" name="TNombre" placeholder="Tarea">
                                    <textarea rows="5" cols="50" id="descripcion-tarea" class="form-control" name="TADescripcion" placeholder="Descripcion de la tarea"></textarea>
                                    <div>archivo<input type="file" id="archivo-tarea" class="form-control" name="FArchivo"></div>
                                    <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                                </form>
                                <hr>
                            </div>
                            <div class="form col-lg-7">
                                <table class="table" id="tabla-tareas">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">archivo</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datos-tarea">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="home" class="tab-pane fade in active">
                    <!-- REGISTRO DE PROFESORES -->
                    <h3>Registro de Profesores</h3>
                    <hr>
                    <div class="form col-lg-3">
                        <form class="form-wrap" id="registro-profesor">
                            <div class="imagen flex">
                                <div class="text-center">
                                    <img id="foto-perfil" class="rounded-circle" width="70" height="70" src="../img/Users/perfil.png" alt="foto de profesor">
                                    <input type="file" name="Fimagen" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                </div>
                            </div>
                            <input type="text" id="registrar-nombre" class="form-control" name="TNombre" placeholder="Nombre">
                            <input type="text" id="registrar-edad" class="form-control" name="TEdad" placeholder="Edad">
                            <select id="registrar-grado" name="TGrado" class="form-control m-1" style="height: 35px!important">
                                <option value="">Selecciona grado de estudios</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Bachillerato">Bachillerato</option>
                                <option value="Universidad">Universidad</option>
                                <option value="Superior">Superior</option>
                            </select>
                            <input type="phone" id="registrar-tel" class="form-control" name="TTelefono" placeholder="Telefono">
                            <input type="email" id="registrar-email" class="form-control" name="TEmail" placeholder="Email">
                            <input type="password" id="registrar-pass" class="form-control" name="TPass" placeholder="Password">
                            <select id="registrar-estado2" name="TEstado" class="form-control m-1" style="height: 35px!important">
                            </select>
                            <input type="text" id="registrar-municipio" class="form-control" name="TMunicipio" placeholder="Municipio">
                            <input type="text" id="registrar-profesion" class="form-control" name="TProfesion" placeholder="Profesion">
                            <br>
                            <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                        </form>

                    </div>
                    <div class="form col-lg-9">
                        <table id="tabla-profesores" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Escolaridad</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Municipio</th>
                                    <th scope="col">Trabajo</th>
                                </tr>
                            </thead>
                            <tbody id="datos-profesores">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <!-- REGISTRO DE CURSOS -->
                    <h3>Registro de Cursos</h3>
                    <hr>
                    <div class="form col-lg-3">
                        <form class="form-wrap" id="registro-curso">
                        <input type="hidden" id="idcurso" name="idcurso" value="">
                        <input type="hidden" id="accion" name="accion" value="insertar">
                            <div class="imagen flex">
                                <div class="text-center">
                                    <img id="foto-curso" class="rounded-circle" width="70" height="70" src="../img/anadir.png" alt="foto de profesor">
                                    <input type="file" name="Fimagen" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon01">
                                </div>
                            </div>
                            <input type="text" id="nombre-curso" class="form-control" name="TNombre" placeholder="Nombre del curso">
                            <textarea rows="5" cols="50" id="descripcion-curso" class="form-control" name="TADescripcion" placeholder="Descripcion del curso"></textarea>
                            <input type="text" id="horas-curso" class="form-control" name="THoras" placeholder="Horas del curso">
                            <input type="text" id="costo-curso" class="form-control" name="TCosto" placeholder="Costo del curso">
                            <br>
                            <input type="text" id="video-curso" class="form-control" name="TVideo" placeholder="URL video"></<input>
                            <br>
                            <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                        </form>
                    </div>
                    <div class="form col-lg-9">
                        <table id="tabla-cursos" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">URL Video</th>
                                    <th scope="col">Horas</th>
                                    <th scope="col">Calificacio</th>
                                    <th scope="col">Profesor</th>
                                    <th scope="col">Costo</th>
                                </tr>
                            </thead>
                            <tbody id="datos-cursos">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <script src="../js/register.js"></script>

</body>

</html>