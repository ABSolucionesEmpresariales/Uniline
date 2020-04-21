<?php
session_start();
include '../controllers/sesion.php';

/* Damos formato a la url de la imagen del perfil */
$url = "";
if ($_SESSION['imagen_perfil'] != "../img/perfil.png") {
   $split = explode("/", $_SESSION['imagen_perfil']);
   $url = "../" . $split[1] . "/min_" . $splits[2];
} else {
   $url = $_SESSION['imagen_perfil'];
}

/* Damos formato al nombre, lo que se mostrara será primer nombre y apellido paterno */
$nombres_separados = explode(" ", $_SESSION['nombre']);
$nombre = (sizeof($nombres_separados) > 2) ? $nombres_separados[0] . ' ' . $nombres_separados[2] : $_SESSION['nombre'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--FONT AWESOME-->

   <!--BOOTSTRAP 4--->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <title>Dashboard Cursos</title>
</head>

<body>

   <!--navbar-->
   <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar w/ text</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
         aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Pricing</a>
            </li>
         </ul>
         <span class="navbar-text">
            Navbar text with an inline element
         </span>
      </div>
   </nav> -->

   <div class="row">

      <div class="col-lg-3 py-5 vh-100 border-right navbar-expand shadow">

         <div class="media mb-5">
            <img src=<?php echo $url ?> alt="prof" class="mx-3 w-25 rounded-circle img-fluid align-self-center">

            <div class="media-body">
               <h5 class="mt-2"><?php echo $nombre ?></h5>
               <p class="mb-0"><?php echo $_SESSION['tipo'] ?></p>

            </div>

         </div>

         <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="cursos-tab" data-toggle="pill" href="#cursos" role="tab" aria-controls="v-pills-cursos" aria-selected="true">Cursos</a>
            <a class="nav-link" id="contenido-curso-tab" data-toggle="pill" href="#contenido-curso" role="tab" aria-controls="v-pills-contenido-curso" aria-selected="false">Contenido del Curso</a>
            <a class="nav-link" id="estadisticas-tab" data-toggle="pill" href="#v-pills-estadisticas" role="tab" aria-controls="v-pills-estadisticas" aria-selected="false">Estadísticas</a>
            <a class="nav-link" id="v-pills-perfil-tab" data-toggle="pill" href="#v-pills-perfil" role="tab" aria-controls="v-pills-perfil" aria-selected="false">Editar Perfil</a>
         </div>
      </div>

      <!--MAIN CONTENT-->

      <div class="col-lg-9 p-4">

         <!-- COMBO BOX SUPERIORES -->
         <div class="row mb-5">

            <div class="col-lg-6">

               <p class="small m-0">&nbsp;</p>
               <select class="shadow custom-select form-control custom-select-lg text-danger" name="cursos" id="cursos-select">

               </select>
            </div>

            <div class="col-lg-6">
               <p id="info-select-bloque" class="small text-danger m-0">*Selecciona un curso para mostrar bloques</p>
               <select class="shadow custom-select form-control custom-select-lg text-danger" name="bloques" id="bloques-select">
               </select>
            </div>
         </div>


         <div class="tab-content" id="v-pills-tabContent">

            <!-- CURSOS TAB -->
            <div class="tab-pane fade show active" id="cursos" role="tabpanel" aria-labelledby="cursos-tab">

               <div class="accordion" id="accordionExample">
                  <div class="card bg-light shadow">
                     <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                           <button id="nuevo-curso" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <h5><i class="fas fa-plus-circle"></i> Nuevo Curso</h5>
                           </button>
                        </h2>
                     </div>

                     <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                           <form id="registrar-curso">
                              <div class="text-center">
                                 <img src="../img/cursos/no_course.png" id="foto-curso" alt="curso" class="align-self-center  mb-3 w-25" />
                              </div>
                              <div class="form-group">
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-image" name="imagen-curso">
                                    <label class="custom-file-label" for="file-image" id="image-name">Imagen del
                                       Curso</label>
                                 </div>
                              </div>


                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <input type="text" class="input-curso form-control form-control-sm" name="nombre-curso" placeholder="Nombre del Curso">
                                 </div>
                                 <div class="form-group col-md-12">
                                    <textarea class="input-curso form-control form-control-sm" name="descripcion-curso" placeholder="Descripción del curso"></textarea>
                                 </div>
                              </div>
                              <div class="form-row">
                                 <div class="form-group col-md-6">
                                    <input type="number" id="horas-curso" name="horas-curso" placeholder="Horas del Curso" class="input-curso form-control form-control-sm">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <input type="number" id="costo-curso" name="costo-curso" placeholder="Costo de Curso" class="input-curso form-control form-control-sm">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <input type="text" class="input-curso form-control form-control-sm" name="video-curso" placeholder="URL video">
                              </div>

                              <div class="alert alert-success mt-3 d-none" role="alert" id="alerta">
                                 <p class="m-0"> ¡<b>Curso creado:</b> se ha creado el curso con éxito!</p>
                              </div>

                              <div class="form-row mt-3">
                                 <div class="col-lg-2 text-center">
                                    <div class="spinner-border text-primary d-none" role="status">
                                       <span class="sr-only">Loading...</span>
                                    </div>
                                 </div>
                                 <button type="submit" name="submit" class="col-lg-4 offset-lg-6 btn btn-success btn-md">Crear</button>
                              </div>

                           </form>

                        </div>
                     </div>
                  </div>

                  <!-- AÑADIR BLOQUES -->
                  <div class="card bg-light shadow">
                     <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                           <button id="aniadir-bloque" class="btn btn-link collapsed disabled" type="button" data-toggle="collapse" data-target="#collapseBloque" aria-expanded="false" aria-controls="collapseBloque">
                              <h5><i class="fas fa-plus-circle"></i> Añadir Bloques</h5>
                           </button>
                        </h2>
                     </div>
                     <div id="collapseBloque" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                           <form id="registrar-bloque">

                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <input type="text" name="nombre-bloque" id="nombre-bloque" placeholder="Nombre del Bloque" class="input-bloque form-control form-control-sm">
                                 </div>
                              </div>

                              <div class="alert alert-success mt-3 d-none" role="alert" id="alerta-bloque">
                                 <p class="m-0"> ¡<b>Bloque creado:</b> se ha creado el bloque con éxito!</p>
                              </div>

                              <div class="form-row mt-3">
                                 <div class="col-lg-2 text-center">
                                    <div class="spinner-border text-primary d-none" role="status">
                                       <span class="sr-only">Loading...</span>
                                    </div>
                                 </div>

                                 <button type="submit" name="submit" class="col-lg-4 offset-lg-6 btn btn-success btn-md">Crear</button>
                              </div>

                           </form>
                        </div>
                     </div>
                  </div>

                  <!-- AÑADIR EXAMEN -->
                  <div class="card bg-light shadow">
                     <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                           <button id="aniadir-examen" class="btn btn-link collapsed disabled" type="button" data-toggle="collapse" data-target="#collapseExamen" aria-expanded="false" aria-controls="collapseExamen">
                              <h5><i class="fas fa-plus-circle"></i> Añadir Examen</h5>
                           </button>
                        </h2>
                     </div>
                     <div id="collapseExamen" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                           <form id="registrar-examen">

                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <input type="text" name="nombre-examen" id="nombre-examen" placeholder="Nombre del Examen" class="input-examen form-control form-control-sm">
                                 </div>
                              </div>

                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <textarea name="descripcion-examen" class="input-examen form-control form-control-sm" placeholder="Descripción del exámen"></textarea>
                                 </div>
                              </div>

                              <div class="alert alert-success mt-3 d-none" role="alert" id="alerta-bloque">
                                 <p class="m-0"> ¡<b>Exámen creado:</b> se ha creado el exámen con éxito!</p>
                              </div>

                              <div class="form-row mt-3">
                                 <div class="col-lg-2 text-center">
                                    <div class="spinner-border text-primary d-none" role="status">
                                       <span class="sr-only">Loading...</span>
                                    </div>
                                 </div>

                                 <button type="submit" name="submit" class="col-lg-4 offset-lg-6 btn btn-success btn-md">Crear</button>
                              </div>


                           </form>
                        </div>
                     </div>

                  </div>
               </div>

               <table class="table my-5 w-100 shadow">
                  <thead id="theadgrupo1" class="bg-info">
                     <tr>
                        <th scope="col" class="text-light">#</th>
                        <th scope="col" class="text-light">First</th>
                        <th scope="col" class="text-light">Last</th>
                        <th scope="col" class="text-light">Handle</th>
                     </tr>
                  </thead>
                  <tbody id="tbodygrupo1">
                     <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                     </tr>
                     <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                     </tr>
                     <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                     </tr>
                  </tbody>
               </table>


            </div>




            <!-- CONTENIDO CURSOS TAB -->
            <div class="tab-pane fade" id="contenido-curso" role="tabpanel" aria-labelledby="contenido-curso-tab">




               <!-- ACCORDION -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="accordion" id="accordionContenido">
                        <div class="card bg-light shadow">
                           <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="text-success"><i class="fas fa-plus-circle"></i> Añadir Temas de Bloque
                                    </h5>
                                 </button>
                              </h2>
                           </div>

                           <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionContenido">
                              <div class="card-body">
                                 <form>

                                    <div class="form-row">
                                       <div class="form-group col-md-12">
                                          <input type="text" class="form-control form-control-sm" placeholder="Nombre del Tema">
                                       </div>
                                       <div class="form-group col-md-12">
                                          <textarea class="form-control form-control-sm" placeholder="Descripción del Tema"></textarea>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <input type="text" class="form-control form-control-sm" placeholder="URL video">
                                    </div>

                                    <div class="form-group">
                                       <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Subir Archivo</label>
                                       </div>
                                    </div>

                                    <div class="form-row">
                                       <button type="submit" class="col-lg-4 offset-lg-8 btn btn-success btn-md">Añadir</button>
                                    </div>

                                 </form>

                              </div>
                           </div>
                        </div>

                        <div class="card bg-light shadow">
                           <div class="card-header" id="headingTwo">
                              <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h5 class="text-success"><i class="fas fa-plus-circle"></i> Añadir Pregunta Examen
                                    </h5>
                                 </button>
                              </h2>
                           </div>
                           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionContenido">
                              <div class="card-body">
                                 <form>

                                    <!-- PREGUNTA -->
                                    <div class="form-row">
                                       <div class="form-group col-md-12">
                                          <input type="text" name="pregunta-examen" id="pregunta-examen" placeholder="Escriba la pregunta" class="form-control form-control-sm">
                                       </div>
                                    </div>
                                    <!-- RESPUESTA A -->
                                    <div class="form-row">
                                       <div class="form-group col-lg-1">
                                          <div class="custom-control custom-radio">
                                             <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                             <label class="custom-control-label" for="customRadio1"></label>
                                          </div>
                                       </div>
                                       <div class="form-group col-lg-11">
                                          <input type="text" name="respuesta1" id="respuesta1" placeholder="Respuesta A" class="form-control form-control-sm">
                                       </div>
                                    </div>
                                    <!-- RESPUESTA B -->
                                    <div class="form-row">
                                       <div class="form-group col-lg-1">
                                          <div class="custom-control custom-radio">
                                             <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                             <label class="custom-control-label" for="customRadio2"></label>
                                          </div>
                                       </div>
                                       <div class="form-group col-lg-11">
                                          <input type="text" name="respuesta2" id="respuesta2" placeholder="Respuesta B" class="form-control form-control-sm">
                                       </div>
                                    </div>
                                    <!-- RESPUESTA C -->
                                    <div class="form-row">
                                       <div class="form-group col-lg-1">
                                          <div class="custom-control custom-radio">
                                             <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                             <label class="custom-control-label" for="customRadio3"></label>
                                          </div>
                                       </div>
                                       <div class="form-group col-lg-11">
                                          <input type="text" name="respuesta3" id="respuesta3" placeholder="Respuesta C" class="form-control form-control-sm">
                                       </div>
                                    </div>
                                    <!-- RESPUESTA D -->
                                    <div class="form-row">
                                       <div class="form-group col-lg-1">
                                          <div class="custom-control custom-radio">
                                             <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                             <label class="custom-control-label" for="customRadio4"></label>
                                          </div>
                                       </div>
                                       <div class="form-group col-lg-11">
                                          <input type="text" name="respuesta4" id="respuesta4" placeholder="Respuesta D" class="form-control form-control-sm">
                                       </div>
                                    </div>

                                    <div class="form-row">
                                       <button type="submit" class="col-lg-4 offset-lg-8 btn btn-success btn-md">Añadir</button>
                                    </div>

                                 </form>
                              </div>
                           </div>
                        </div>

                        <div class="card bg-light shadow">
                           <div class="card-header" id="headingThree">
                              <h2 class="mb-0">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h5 class="text-success"><i class="fas fa-plus-circle"></i> Añadir Tarea</h5>
                                 </button>
                              </h2>
                           </div>
                           <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionContenido">
                              <div class="card-body">
                                 <form>
                                    <div class="form-row">
                                       <div class="form-group col-md-12">
                                          <select class="custom-select form-control custom-select-sm" name="cursos" id="cursos-select">
                                             <option selected value="">Elija el Curso</option>
                                             <option value="">Curso 1</option>
                                             <option value="">Curso 2</option>
                                             <option value="">Curso 3</option>
                                             <option value="">Curso 4</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="form-row">
                                       <div class="form-group col-md-12">
                                          <select class="custom-select form-control custom-select-sm" name="cursos" id="cursos-select">
                                             <option selected value="">Elija el Bloque</option>
                                             <option value="">Bloque 1</option>
                                             <option value="">Bloque 2</option>
                                             <option value="">Bloque 3</option>
                                             <option value="">Bloque 4</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="form-row">
                                       <div class="form-group col-md-12">
                                          <input type="text" name="nombre-tarea" id="nombre-tarea" placeholder="Nombre de la Tarea" class="form-control form-control-sm">
                                       </div>
                                    </div>

                                    <div class="form-row">
                                       <div class="form-group col-md-12">
                                          <textarea class="form-control form-control-sm" placeholder="Descripción de la Tarea"></textarea>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                                       </div>
                                    </div>

                                    <div class="form-row">
                                       <button type="submit" class="col-lg-4 offset-lg-8 btn btn-success btn-md">Añadir</button>
                                    </div>

                                 </form>
                              </div>
                           </div>

                        </div>
                     </div>
                  </div>
               </div>



               <table class="table my-5 w-100 shadow">
                  <thead id="theadgrupo2" class="bg-success">
                     <tr>
                        <th scope="col" class="text-light">#</th>
                        <th scope="col" class="text-light">First</th>
                        <th scope="col" class="text-light">Last</th>
                        <th scope="col" class="text-light">Handle</th>
                     </tr>
                  </thead>
                  <tbody id="tbodygrupo2">
                     <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                     </tr>
                     <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                     </tr>
                     <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                     </tr>
                  </tbody>
               </table>
            </div>


            <!-- ESTADÍSTICAS TAB -->
            <div class="tab-pane fade" id="v-pills-estadisticas" role="tabpanel" aria-labelledby="estadisticas-tab">
               <h1>ESTADISTICAS</h1>
            </div>

            <!-- EDITAR PERFIL -->
            <div class="tab-pane fade" id="v-pills-perfil" role="tabpanel" aria-labelledby="perfil-tab">
               <h1>EDITAR PERFIL</h1>
            </div>
         </div>




      </div>
   </div>



   <!--JAVASCRIPT BOOTSTRAP 4-->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
   </script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
   </script>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <!-- jQUERY -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   <!-- LOCAL SCRIPTS -->
   <script src="../js/dashboard_profesor.js"></script>
</body>

</html>