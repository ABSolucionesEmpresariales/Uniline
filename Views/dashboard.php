<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="../img/fav.png">
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
  <script src="../js/jquery-3.2.1.min.js"></script>


</head>

<body>
  <header id="header" id="home">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div id="logo-res" class="col-lg-2 col-md-2 col-1 header-top-left no-padding">
            <a href="index.php"><img class="logo-responsive" src="../img/uniline2.png" alt="" title="" /></a>
          </div>
          <div class="col-lg-8 col-md-8 col-6 header-top-left no-padding">
            <a class="btn btn-sm text-center" href="#">Nombre del curso</a>
          </div>
          <nav id="nav-menu-container">
            <div class="col-2 header-top-right no-padding">
              <a class="btn btn-sm text-center" href="profile.php"><span></span>Mis cursos</a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header><!-- #header -->

  <br><br>

  <div class="device-container">
    <section class="relative">
      <div class="contenedor">
        <div id="div-original" class="row">
          
          <div class="col-lg-9 col-md-7 col-sm-12 no-padding">
            <div class="flex bg-color justify-content-center">
              <video class="col-lg-9 col-md-12 col-sm-12 no-padding" id="video" src="../videos/Neon - 21368.mp4" preload="auto" controls width="100%" height="100%" controlslist="nodownload"></video>
            </div>

            <div class="col details-content no-padding" style="max-height: 35rem;">
              <div class="jq-tab-wrapper no-padding" id="horizontalTab">
                <nav class="navbar navbar-expand-lg navbar-light bg-light no-padding">
                  <ul class="nav nav-tabs no-padding" id="nav-barra">                  
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

                <div id="scroll-responsive" class="tab-content container" style="height: 20rem;">
                  <div class="tab-pane container fade" id="contenido-cursos">
                      <!--contenido de los cursos cuando es responsive-->
                  </div>
                  <div class="tab-pane container text-justify h-scroll" id="descripcion" style="font-family: 'Poppins:100', sans-serif; font-size: 16px; color: rgb(87, 87, 87);">
                    When you enter into any new area of science, you almost always find yourself with a baffling new
                    language of technical terms to learn before you can converse with the experts. This is certainly true
                    in astronomy both in terms of terms that refer to the cosmos and terms that describe the tools of the
                    trade, the most prevalent being the telescope.
                    <br>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum.
                    </div>
                    <div class="tab-pane container fade" id="archivos">
                      Descargar archivos
                      <br>
                      <br>
                      <a href="download/pack.txt" download="Pack.txt">Descargar</a>
                      <p>¿no se descarga el archivo? <a style="color:blue;" href="download/pack.txt" download="Pack.txt">Click aqui</a>
                      </p>
                    </div>
                    <div class="tab-pane container fade" id="progress">
                      <div class="row">
                        <div class="col-lg-5 col-md-5 single-sidebar-widget tag_cloud_widget m-0 ">
                          <div class="loaders m-0 flex justify-content-center">
                            <div class="row elements_loaders_container col-lg-8">
                              <!-- Loader -->
                              <div class="loader mb-0" data-perc=".50"></div>
                            </div>
                          </div>
                        </div><br>

                        

                        <div class="col-lg-6 col-md-7">
                          <div class="container footer-bottom">
                            <h6 class="mb-15 h3">Calidad del curso</h6>
                            <div class="d-flex flex reviews justify-content-xl-around">
                              <span>Regular</span>
                                <div class="star" style="color: yellow">
                                  <i id="1" class="fa fa-star start estrella" style="cursor: pointer;"></i>
                                  <i id="2" class="fa fa-star start estrella" style="cursor: pointer;"></i>
                                  <i id="3" class="fa fa-star start estrella" style="cursor: pointer;"></i>
                                  <i id="4" class="fa fa-star start estrella" style="cursor: pointer;"></i>
                                  <i id="5" class="fa fa-star start estrella" style="cursor: pointer;"></i>
                                </div>
                              <span>Excelente</span>
                            </div>
                          </div>
                        </div>   
                          
                        
                      </div>
                    </div>
                  </div>
                <!--</div>-->
              </div>
            </div>
          </div>

          <div id="mov-div" class="col-lg-3 col-md-5 col-sm-12 search-course-right section-gap fondo-lista">
            <div class="col bg-color-lista no-padding">             
                  <div class="lista-curso-aside single_sidebar_widget post_category_widget mover h-scroll " style="height: 100%;">
                  <!--loades lista-->
                  </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- start footer Area -->
  <footer class="footer-area">
        <div class="align-items-center justify-content-between">
          <div class="row">
            <div class="col-lg-4 col-sm-12 text-center mt-3 mb-4">
              <a class="" href="index.php"><img src="../img/uniline2.png" width="35%" alt="" title="" /></a>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4 mt-3 align-bottom text-center">
              <p class="mb-0">&copy; AB Soluciones Empresariales <script>document.write(new Date().getFullYear());</script>
                All rights reserved.
              </p>
              <ul class="list-inline  mt-0 clock text-center">
                <li class="list-inline-item">
                  <a href="#">Politicas de Privacidad</a>
                </li>
                <li class="list-inline-item">
                  <a href="#">Imagen Corporativa</a>
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
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/stellar.js"></script>
  <script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="../js/owl-carousel-thumb.min.js"></script>
  <script src="../js/jquery.ajaxchimp.min.js"></script>
  <script src="../vendors/counter-up/jquery.counterup.js"></script>
  <script src="../js/mail-script.js"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="../js/gmaps.min.js"></script>
  <script src="../js/theme.js"></script>

  <script src="../js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="../js/vendor/bootstrap.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
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
  <script src="../js/dashboard.js"></script>

</body>

</html>