<?php
session_start();
require_once '../Modelos/Conexion.php';
include '../controllers/sesion.php';
$_SESSION['idcurso'] = $_GET['idcurso'];

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Author Meta -->
  <meta name="author" content="colorlib">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Escuela Al Revés</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <!--
    CSS
    ============================================= -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="../css/linearicons.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <link rel="stylesheet" href="../css/nice-select.css">
  <link rel="stylesheet" href="../css/animate.min.css">
  <link rel="stylesheet" href="../css/owl.carousel.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/main_styles.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <link rel="stylesheet" href="../css/styles/login.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/icons/all.css">
  <link rel="stylesheet" href="../css/stylo.css">

  <!--
    JS
    ============================================= -->

  <script src="../js/jquery.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>

</head>

<body>

    <div class="modal fade" id="modalCalificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Calificacion del curso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="col-lg-12">

              <div class="container text-center">
                <h6 class="h3">Calidad del curso</h6>
                  <div class="">
                  <div class="star m-5" style="color: gray">
                    <i id="1" class="fa fa-star start estrella h2 m-2" style="cursor: pointer;"></i>
                    <i id="2" class="fa fa-star start estrella h2 m-2" style="cursor: pointer;"></i>
                    <i id="3" class="fa fa-star start estrella h2 m-2" style="cursor: pointer;"></i>
                    <i id="4" class="fa fa-star start estrella h2 m-2" style="cursor: pointer;"></i>
                    <i id="5" class="fa fa-star start estrella h2 m-2" style="cursor: pointer;"></i>
                  </div>
                </div>
              </div>
              


              <div class="form-group text-center">
                <label for="exampleFormControlTextarea1">Deja tu comentario</label>
                <textarea id="text_area_curso" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div id="alertas-curso" class="alert alert-danger" role="alert">
                Ups! Algo salio mal.  
              </div>

          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="guardarCurso" type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>

  <div id="alertas" class="alert alert-danger fixed-top text-center" style="max-height:85px;display: none;">
  </div>

  <div class="modal fade" id="examenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Examen de diagnostico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body calificacion">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary final" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <header id="header">
    <div class="header-top">
      <div class="container">
        <div class="row justify-content-between">
          <div id="logo" class="col-lg-4 d-none d-lg-block mr-auto">
            <a href="mainpage.php"><img src="../img/uniline2.png" width="40%" alt="" title="" /></a>
          </div>
          <div class="float-right">
            <nav id="nav-menu-container">
              <ul class="nav-menu">
              <button style="display: none;" id="startConfetti">Start</button>
              <button style="display: none;" id="stopConfetti">Stop</button>
                <li class="mt-3"><a class="text-center" href="mainpage.php" style="font-size: 14px; text-decoration: none;">Inicio</a></li>
                <li class="mt-3"><a class="text-center" href="mainpage.php#all-cursos" style="font-size: 14px; text-decoration: none;">Cursos disponibles</a></li>
                <li class="mt-3"><a class="text-center" href="misCursos.php" style="font-size: 14px; text-decoration: none;">Mis cursos</a></li>
                <li class="mt-3"><a class="text-center" href="mainpage.php#home-contacto" style="font-size: 14px; text-decoration: none;">Contacto</a></li>
                <a role="button" class="dropdown-toggle d-flex justify-content-center" data-toggle="dropdown">
                  <?php
                  $url = "";
                  if ($_SESSION['imagen_perfil'] != "../img/perfil.png") {
                    $exlpode = explode("/", $_SESSION['imagen_perfil']);
                    $url = "../" . $exlpode[1] . "/min_" . $exlpode[2];
                  } else {
                    $url = $_SESSION['imagen_perfil'];
                  }
                  ?>
                  <img src=<?php echo $url ?> alt="perfil" class="course_author_image">
                </a>
                <div class="dropdown-menu opciones-perfil">
                  <li><a class="enlaces-perfil" href="editProfile.php">Mi perfil</a></li>
                  <li><a class="enlaces-perfil" href="../controllers/sesion-destroy.php?cerrar=true">Cerrar sesión</a></li>
                </div>
              </ul>
            </nav><!-- #nav-menu-container -->
          </div>
        </div>
      </div>
    </div>
  </header><!-- #header -->

 

  <br><br>

  <div class="device-container">
    <section class="relative">
      <div class="contenedor">
        <div id="div-original" class="row">

          <div id="cambiar-a-examen" class="col-lg-9 col-md-7 col-sm-12 no-padding">
            <div id="contenido-examen" class="ml-5 p-5 d-none" style="min-height: 100rem;margin-left:120px!important;">

            </div>
            <div id="cambio-examen-video">
              <div id="jalaporfa2" class="flex bg-color justify-content-center">
                <iframe src="" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
              </div>


              <div class="col details-content no-padding" style="min-height: 27rem;border-bottom: rgb(0,0,0);">
                <div class="jq-tab-wrapper no-padding" id="horizontalTab">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light no-padding nav-style">
                    <ul class="nav no-padding" id="nav-barra" style="padding-left: 2rem;">
                      <li class="nav-item no-padding">
                        <a id="nav-status" class="nav-link" data-toggle="tab" href="#descripcion">Descripción</a>
                      </li>
                      <li class="nav-item no-padding">
                        <a class="nav-link" data-toggle="tab" href="#archivos">Archivos adjuntos</a>
                      </li>
                      <li class="nav-item no-padding">
                        <a class="nav-link" data-toggle="tab" href="#progress">Progreso del curso</a>
                      </li>

                    </ul>
                  </nav>

                  <div id="scroll-responsive" class="tab-content container pr-0" style="height: 10rem;">
                    <div class="tab-pane container fade" id="contenido-cursos">
                      <!--contenido de los cursos cuando es responsive-->
                    </div>
                    <div class="tab-pane container text-justify h-scroll" id="descripcion" style=" padding-top:2rem; font-family: 'Poppins:100', sans-serif; font-size: 16px; color: rgb(87, 87, 87);">
                      <h2 id="titulo-curso" class="h2">Acerca de este curso</h2>
                      <br>
                      <div class="container descripcion-tema">

                      </div>
                    </div>
                    <div class="tab-pane container fade" id="archivos" style=" padding-top:2rem;">
                      Descargar archivos
                      <br>
                      <br>
                      En este apartado podras descargar los archivos de cada tema <a class="descarga" href="download/pack.txt" download="Pack.txt"> descargar</a>
                      </p>
                    </div>
                    <div class="tab-pane container fade" id="progress">
                      <div class="">
                        <div class=" single-sidebar-widget tag_cloud_widget m-0 ">
                          <div class="loaders m-0 flex justify-content-center">
                            <div class=" elements_loaders_container col-lg-3">
                              <!-- Loader -->
                              <?php
                              $conexion = new Modelos\Conexion();
                              $datos_tema = array($_SESSION['idcurso']);
                              $cosulta_temas_curso = "SELECT COUNT(idtema) AS cantidadTemas FROM tema t 
                                  INNER JOIN bloque b ON t.bloque = b.idbloque WHERE b.curso = ?";
                              $result = $conexion->consultaPreparada($datos_tema, $cosulta_temas_curso, 2, "i", false, null);

                              $temas_curso = $result[0][0];

                              $consulta_temas_alumno = "SELECT COUNT(tema) FROM tema_completado tm 
                                  INNER JOIN tema t ON t.idtema = tm.tema 
                                  INNER JOIN bloque b ON b.idbloque = t.bloque WHERE b.curso = ? AND tm.usuario = ?";
                              $datos_temas_vistos = array($_SESSION['idcurso'], $_SESSION['idusuario']);

                              $result2 = $conexion->consultaPreparada($datos_temas_vistos, $consulta_temas_alumno, 2, "ii", false, null);

                              $temas_vistos = $result2[0][0];
                              $calculo = (100 / intval($temas_curso)) * intval($temas_vistos);
                              $colculo = round($calculo);
                              if ($colculo == 100) {
                                $colculo = 1;
                              }else if($colculo < 10){
                                $colculo = ".0".$colculo;
                              }else {
                                $colculo = "." . $colculo;
                              }
                              ?>
                              <div id="progreso" class="loader mb-0" data-perc=".04"></div>
                            </div>
                          </div>
                        </div>
                        <button id="calificacion-curso-user" type="button" class="btn btn-primary" style="margin-left: 41%; font-size: 18px;" data-toggle="modal" data-target="#modalCalificacion">Caificar el curso</button>
                      </div>
                      
                    </div>





                    <div class="tab-pane container fade" id="contenido-comentarios">
                      <!--contenido de los cursos cuando es responsive-->
                    </div>
                  </div>
                  <!--</div>-->
                </div>
              </div>

              <!-- seccion de comentarios -->
              <div id="div-original-comentarios">
                <div id="mov-coments" class="container col" style="min-height: 30rem; height: 45rem; background-color: rgb(243, 243, 243); padding: 2rem 5rem;">
                  <h3 class="h3">Comentarios del curso</h3>
                  <br>
                  <section id="area-comentarios" class="c-scroll area-comentarios border">

                  </section>
                  
                  <section id="area-agregar-comentario" class="container flex justify-content-center" style="padding: 0;">
                    <div class="row d-inline-flex" style="width: 100%;">
                      <form action="" style="width: 100%;">
                        <input class="col-lg-10 col-md-8 col-sm-7 input-field comment-curso" type="text" placeholder="Escribe un comentario..">
                        <input class="col-lg-2 col-md-3 col-sm-2  btn-primary" type="submit" name="enviar" id="enviar" value="Enviar" style="height: 5rem;">
                      </form>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>

          <div id="mov-div" class="col-lg-3 col-md-5 col-sm-12 search-course-right section-gap fondo-lista">
            <div class="col bg-color-lista no-padding">
              <div id="tam-pantalla" class="lista-curso-aside single_sidebar_widget post_category_widget mover h-scroll sticky-aside" style="height: 50%; padding-right: 1rem;">
                <!--loades lista-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- area de tareas -->

  <div id="seccion-tareas" class="area-tareas pl-5 pr-5" style="display:none;">
    <div id="tareas">
      <h4 class="h4">Sube tus tareas aqui</h4>
      <p>sube tus tareas para que los profesores y demas usuarios de este curso puedan calificarte</p>
      <form id="subir-tareas" class="form-control d-inline-flex col-lg-6 col-sm-12" style="background-color: white; border:0;">
        <div class="input-group">
          <div class="custom-file col-lg-10 col-sm-12 border no-padding" style="height: 4rem;">
            <input type="file" name="Fimagen" class="text-black col-lg-10 col-sm-5 no-padding" id="customFile" style="height: 4rem;">            
            <input type="hidden" name="archivo" value="3">
            <input class="actuali-homework" type="hidden" name="tarea">
            <input class="bloque-archivo" type="hidden" name="bloque-tarea">
          </div>
          <div class="input-group-append">
            <button class="btn btn-outline-primary texce" type="submit" style="height: 4rem;">Subir</button>
          </div>
        </div>
      </form>
      <br><br>
      <hr>
      
      <br>
      <div class="table-responsive">     
      <p class="ml-3 h3">Tu tarea del bloque</p>
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th>Usuarios</th>
              <th>Descargar tarea</th>
            </tr>
          </thead>         
          <tbody class="bg-light cuerpo-tb-user">
          </tbody>
        </table>
      </div>
    </div>
    <br>
    <h4 class="h4">
      Sección de tareas
    </h4>
    <p class="h6">En este apartado puedes calificar las tareas de otros usuarios que estan en este curso</p>
    <br>
    <div class="contenedor-tareas table-responsive">

      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th>Usuarios</th>
            <th>Tarea</th>
            <th>Calificaciones recividas</th>
            <th>Calificacion</th>
            <th>Calificar</th>
          </tr>
        </thead>
        <tbody class="bg-light tabla-tareas-completadas">
        </tbody>
      </table>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <div class="text-center">
                <h4 class="modal-title h4 ">Califica esta tarea</h4>
              </div>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body no-padding">
              <div class="hide-calific text-center">
                <div class="calificar">
                  <p class="clasificacion">
                    <input class="calificar-tarea" id="radio1" type="radio" name="estrellas" value="1">
                    <label for="radio1">★</label>
                    <input class="calificar-tarea" id="radio2" type="radio" name="estrellas" value="2">
                    <label for="radio2">★</label>
                    <input class="calificar-tarea" id="radio3" type="radio" name="estrellas" value="3">
                    <label for="radio3">★</label>
                    <input class="calificar-tarea" id="radio4" type="radio" name="estrellas" value="4">
                    <label for="radio4">★</label>
                    <input class="calificar-tarea" id="radio5" type="radio" name="estrellas" value="5">
                    <label for="radio5">★</label>
                  </p>
                </div>

                <div class="cometario p-3">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deja tu comentario</label>
                    <textarea id="coment-user" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                </div>

              </div>
              <div class="mostrar-comentario m-3">

              </div>
            </div>

            <div class="modal-footer">
              <button id="btn-cali" type="button" class="btn btn-primary" data-dismiss="modal">Listo</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- start footer Area -->

  <footer class="footer-area">
    <div class="align-items-center justify-content-between">
      <div class="row">
        <div class="col-lg-4 col-sm-12 text-center mt-3 mb-4">
          <a class="" href="mainpage.php"><img src="../img/uniline2.png" width="35%" alt="" title="" /></a>
        </div>
        <div class="col-lg-4 col-sm-12 mb-4 mt-3 align-bottom text-center">
          <p class="mb-0">&copy; AB Soluciones Empresariales <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved.
          </p>
          <ul class="list-inline  mt-0 clock text-center">
            <li class="list-inline-item">
              <a href="avisodeprivacidad.php">Politicas de Privacidad</a>
            </li>
            <li class="list-inline-item">
              <a href="imagenCorporativa.php">Imagen Corporativa</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-sm-12 text-center align-bottom mb-4 mt-2">
          <div class="social-network mt-0">
            <p class="h4 text-white">Siguenos en Redes Sociales</p>
            <a class="h3 m-3 text-white" href="#"><i class="fab fa-facebook"></i></a>
            <a class="h3 m-3 text-white" href="#"><i class="fab fa-twitter"></i></a>
            <a class="h3 m-3 text-white" href="#"><i class="fab fa-whatsapp"></i></a>
            <a class="h3 m-3 text-white" href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer Area -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script src="../js/jquery-3.2.1.min.js"></script>
  <!-- <script src="../js/bootstrap.min.js"></script> -->
  <script src="../js/stellar.js"></script>
  <script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="../js/owl-carousel-thumb.min.js"></script>
  <script src="../js/jquery.ajaxchimp.min.js"></script>
  <script src="../vendors/counter-up/jquery.counterup.js"></script>
  <script src="../js/mail-script.js"></script>
  <!--gmaps Js-->
  <script src="../js/gmaps.min.js"></script>
  <script src="../js/theme.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="../js/vendor/bootstrap.min.js"></script>

  <script src="../js/easing.min.js"></script>
  <script src="../js/hoverIntent.js"></script>
  <script src="../js/superfish.min.js"></script>
  <script src="../js/jquery.ajaxchimp.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/jquery.tabs.min.js"></script>
  <script src="../js/jquery.nice-select.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/mail-script.js"></script>
  <script src="../js/main.js"></script>

  <!-- Course/Elements -->

  <script src="../plugins/greensock/TweenMax.min.js"></script>
  <script src="../plugins/greensock/TimelineMax.min.js"></script>
  <script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
  <script src="../plugins/greensock/animation.gsap.min.js"></script>
  <script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
  <script src="../plugins/progressbar/progressbar.min.js"></script>
  <script src="../plugins/scrollTo/jquery.scrollTo.min.js"></script>
  <script src="../plugins/easing/easing.js"></script>
  <script src="../js/elements_custom.js"></script>
  <script src="../js/jquery.confetti.js"></script>
  <script src="https://player.vimeo.com/api/player.js"></script>
  <script src="../js/dashboard42.js"></script>
  

</body>

</html>