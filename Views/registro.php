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

    <div class="container">
        <div class="contenedor-registro">
            <h2>Registro a la Base de Datos</h2>
            <div class="row">
                <div class="col-lg-5">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Profesores</a></li>
                        <li><a data-toggle="tab" href="#menu1">Cursos</a></li>
                        <li><a data-toggle="tab" href="#mas">bloques y temas</a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="mas" class="tab-pane fade">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="col-2" style="margin-right: 1rem;">
                                <p>selecciona el curso</p>
                                <select id="select-curso-tema" name="SCcurso" class="form-control m-1" style="height: 35px!important">
                                    <option value="0">Selecciona un curso</option>
                                </select>
                            </li>
                            <li class="col-2" style="margin-right: 1rem;">
                                <p>selecciona el bloque</p>
                                <select id="select-bloque-tema" name="SBloque" class="form-control m-1" style="height: 35px!important">
                                    <option value="0">Selecciona un bloque</option>
                                </select>
                            </li>


                            <li><a data-toggle="tab" href="#menu2">Bloques</a></li>
                            <li><a data-toggle="tab" href="#menu3">Temas</a></li>
                            <li><a data-toggle="tab" href="#menu4">Examenes</a></li>
                            <li><a data-toggle="tab" href="#menu5">Tareas</a></li>
                        </ul>

                    </div>
                    <div class="tab-content">
                        <div id="menu2" class="tab-pane fade">
                            <!-- REGISTRO DE BLOQUES -->
                            <h3>Registro de Bloques</h3>
                            <hr>
                            <div class="form col-lg-5">
                                <form class="form-wrap" id="registro-bloques">
                                    <input type="text" id="nombre-bloque" class="form-control" name="TBloques" placeholder="Nombre del Bloque">
                                    <br>

                                    <button id="btn-bloque-añadir" class="btn btn-primary primary-btn text-uppercase" type="button" name="submit">añadir</button>
                                </form>
                            </div>
                            <div class="form col-lg-7">
                                <table id="tabla" class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Curso</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Opcion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datos-bloque">

                                    </tbody>
                                </table>
                                <button id="btn-bloque" class="btn btn-primary primary-btn text-uppercase" type="button" name="submit">Enviar datos</button>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <!-- REGISTRO DE TEMAS -->
                            <h3>Registro de Temas</h3>
                            <hr>
                            <div class="form col-lg-5">
                                <form class="form-wrap" id="registro-temas">
                                    <input type="text" id="nombre-tema" class="form-control" name="TTema" placeholder="Nombre del tema">
                                    <textarea rows="5" cols="50" id="descripcion-tema" class="form-control" name="TDescripcion-tema" placeholder="Descripcion del tema"></textarea>
                                    <div>video<input type="file" id="video-tema" class="form-control" name="TVideo"></div>
                                    <div>archivo<input type="file" id="archivo-tema" class="form-control" name="TArchivo"></div>
                                    <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                                </form>
                            </div>
                            <div class="form col-lg-7">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">video</th>
                                            <th scope="col">archivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
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

                                    <p>nombre del examen</p>
                                    <input type="text" id="nombre-examen" class="form-control" name="TNombre-examen" placeholder="escribe el nombre del examen">
                                    <br>
                                    <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Guardar</button>
                                </form>
                                <form class="form-wrap" id="registro-preguntas">
                                    <hr>
                                    <p>selecciona cual de tus respuestas es la correcta</p>
                                    <div>
                                        <input type="text" id="pregunta" class="form-control" name="TPregunta" placeholder="pregunta">
                                        <div class="col-lg-6">
                                            <div>
                                                <input type="radio" id="resp1" name="RResp">
                                                <label for="resp1"><input type="text" id="respuesta1" class="form-control" name="TRespuesta1" placeholder="respuesta 1"></label>
                                            </div>
                                            <div>
                                                <input type="radio" id="resp2" name="RResp">
                                                <label for="resp2"><input type="text" id="respuesta2" class="form-control" name="TRespuesta2" placeholder="respuesta 2"></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <input type="radio" id="resp3" name="RResp">
                                                <label for="resp3"><input type="text" id="respuesta3" class="form-control" name="TRespuesta3" placeholder="respuesta 3"></label>
                                            </div>
                                            <div>
                                                <input type="radio" id="resp4" name="RResp">
                                                <label for="resp4"><input type="text" id="respuesta4" class="form-control" name="TRespuesta4" placeholder="respuesta 4"></label>
                                            </div>
                                        </div>

                                        <input type="number" id="valor-respuesta-${i}" class="form-control" name="TValor-respuesta-${i}" placeholder="Valor de la respuesta ">
                                    </div>
                                    <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                                </form>
                                <hr>
                            </div>
                            <div class="form col-lg-7">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">examen</th>
                                            <th scope="col">Pregunta</th>
                                            <th scope="col">Respuesta</th>
                                            <th scope="col">valor respuesta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <!-- REGISTRO DE TAREAS -->
                            <h3>Registro de tareas</h3>
                            <hr>
                            <div class="form col-lg-5">
                                <p>Selecciona el bloque y tema en el que quieres registrar una tarea</p>
                                <form class="form-wrap" id="registro-tarea">
                                    <!--<p>selecciona el curso</p>
                        <select id="selec-curso-tarea" name="SCurso" class="form-control m-1" style="height: 35px!important">
                        </select >-->
                                    <p>selecciona el bloque</p>
                                    <select id="select-bloque-tarea" name="SBloque" class="form-control m-1" style="height: 35px!important">
                                    </select>
                                    <br>
                                    <input type="text" id="nombre-tarea" class="form-control" name="TTarea" placeholder="Tarea">
                                    <textarea rows="5" cols="50" id="descripcion-tarea" class="form-control" name="TDescripcion-tarea" placeholder="Descripcion de la tarea"></textarea>
                                    <div>archivo<input type="file" id="archivo-tarea" class="form-control" name="TArchivo-tarea"></div>
                                    <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                                </form>
                                <hr>
                            </div>
                            <div class="form col-lg-7">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">archivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
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
                    <div class="form col-lg-5">
                        <form class="form-wrap" id="registro-profesor">
                            <input type="text" id="registrar-nombre" class="form-control" name="TNombre" placeholder="Nombre">
                            <input type="text" id="registrar-edad" class="form-control" name="TEdad" placeholder="Edad">
                            <select id="registrar-grado" name="TGrado" class="form-control m-1" style="height: 35px!important">
                                <option value="">Selecciona grado de estudios</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Bachillerato">Bachillerato</option>
                                <option value="Universidad">Universidad</option>
                                <option value="Superior">Superior</option>
                            </select>
                            <input type="phone" id="registrar-tel" class="form-control" name="TTel" placeholder="Telefono">
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
                    <div class="col-7">
                        <div class="imagen text-center">
                            <img id="foto-perfil" class="rounded-circle" width="260" height="260" src="../img/users/perfil.png" alt="foto de profesor">
                            <input type="file" name="Fimagen" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <!-- REGISTRO DE CURSOS -->
                    <h3>Registro de Cursos</h3>
                    <hr>
                    <div class="form col-lg-5">
                        <form class="form-wrap" id="registro-curso">
                            <input type="text" id="nombre-curso" class="form-control" name="TCurso" placeholder="Nombre del curso">
                            <textarea rows="5" cols="50" id="descripcion-curso" class="form-control" name="TADescripcion" placeholder="Descripcion del curso"></textarea>
                            <input type="text" id="horas-curso" class="form-control" name="THoras" placeholder="Horas del curso">
                            <select id="selec-profesor" name="TProfesor" class="form-control m-1" style="height: 35px!important">
                            </select>
                            <input type="text" id="costo-curso" class="form-control" name="TCosto" placeholder="Costo del curso">
                            <br>
                            <div>selecciona un video de introduccion para el curso<input type="file" id="video-curso" class="form-control" name="TVideo" placeholder="video"></div>
                            <br>
                            <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                        </form>
                    </div>
                    <div class="col-5">
                        <div class="imagen">
                            <img id="foto-curso" class="rounded-circle" width="260" height="260" src="../img/anadir.png" alt="foto de profesor">
                            <input type="file" name="Fimagen" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon01">
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <script src="../js/registerpage.js"></script>

</body>

</html>