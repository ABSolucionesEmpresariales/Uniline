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
          <div class="col-lg-8 col-md-8 col-8 header-top-left no-padding">
            <a href="index.php"><img class="logo-responsive" src="../img/uniline2.png" alt="" title="" /></a>
          </div>
          <div class="col-4 header-top-right no-padding">
            <a class="btn btn-sm text-center" href="profile.php"><span></span>Mis cursos</a>
          </div>
        </div>
      </div>
    </div>
  </header><!-- #header -->

  <br><br>

  <div class="device-container">
    <section class="dash-area relative">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7 col-md-6 col-sm-4 search-course-left">

            <div class="flex">
              <video id="video" src="../videos/Neon - 21368.mp4" preload="auto" controls width="100%" height="100%" controlslist="nodownload"></video>
            </div>

            <div class="row details-content" style="max-height: 22rem;">
              <div class="col single-detials">
                <div class="jq-tab-wrapper" id="horizontalTab">
                  <div class="jq-tab-menu">
                    <div class="jq-tab-title btn btn-light active text-white" style="background: transparent;" data-tab="1">
                      Descripción</div>
                    <div class="jq-tab-title btn btn-light text-white" style="background: transparent;" data-tab="2">
                      Archivos adjuntos</div>
                  </div>

                  <div class="jq-tab-content-wrapper" style="background: transparent; color: white; height: 22rem;">
                    <div class="jq-tab-content active text-justify h-scroll-box" data-tab="1">
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
                    <div class="jq-tab-content" data-tab="2" style="display: none;">
                      Descargar archivos
                      <br>
                      <br>
                      <a href="download/pack.txt" download="Pack.txt">Descargar</a>
                      <p>¿no se descarga el archivo? <a style="color:blue;" href="download/pack.txt" download="Pack.txt">Click aqui</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5 col-md-6 search-course-right section-gap fondo-lista">
            <div class="col" style=" position:absolute; top:20px;">
              <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <div class="lista-curso-aside single_sidebar_widget post_category_widget mover h-scroll" style="height: 20rem;">
                  </div>
                </ul>
                <ul class="progreso">
                  <br>
                  <div class="single-sidebar-widget tag_cloud_widget m-0 ">
                    <h4 style="padding: 1rem; background-color: rgba(255, 255, 255, 0.2);" class="widget_title h4 text-white text-center">Progreso del curso</h4>
                    <div class="loaders m-0 flex justify-content-center">
                      <div class="row elements_loaders_container col-lg-6">
                        <!-- Loader -->
                        <div class="loader mb-0" data-perc=".50"></div>
                      </div>
                    </div>
                  </div><br>
                  <aside class="single-sidebar-widget newsletter_widget align-content-center align-items-center">
                    <div class="content ">
                      <div class="review-top row flex justify-content-center">
                        <div class="col-lg-8">
                          <h6 class="mb-15" style="color: white;">Calidad del curso</h6>
                          <div class="d-flex flex-row reviews justify-content-between">
                            <span style="color: white;">Regular</span>
                            <div class="star" style="color: yellow">
                              <span id="1" class="fa fa-star start estrella" style="cursor: pointer;"></span>
                              <span id="2" class="fa fa-star start estrella" style="cursor: pointer;"></span>
                              <i id="3" class="fa fa-star start estrella" style="cursor: pointer;"></i>
                              <i id="4" class="fa fa-star start estrella" style="cursor: pointer;"></i>
                              <i id="5" class="fa fa-star start estrella" style="cursor: pointer;"></i>
                            </div>
                            <span style="color: white;">Excelente</span>
                          </div>

                        </div>
                      </div>
                    </div>
                  </aside>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <footer class="py-5 footer-area section-gap">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; AB Soluciones Empresariales
        <script>document.write(new Date().getFullYear());</script>. All rights reserved</p>
    </div>
    <!-- /.container -->
  </footer>

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