<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
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
  <link rel="stylesheet" href="../css/stylo.css">
  <link rel="stylesheet" href="../css/stylo-responsive-editPerfil.css">
  <link rel="stylesheet" href="../css/icons/all.css">

  <!--
    JS
    ============================================= -->
  <script src="https://js.stripe.com/v3/"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
  <script src="../js/registro2.js"></script>
  <script src="../js/login.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


</head>

<body>

  <div id="alertas-registro" class="alert alert-danger fixed-top text-center" style="max-height:54px; display: none;">
  </div>

  <!-- Start Registro Area -->
  <div class="modal fade" id="modal-registro" style="height: 60rem;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content  search-course-area">
        <div class="overlay-bg">
          <!-- confirmacion area -->
          <div class="modal-body row justify-content-center align-items-center">
            <div class="header-top">
              <i class="fas fa-times text-white close" style="font-size: 30px;" data-dismiss="modal"></i>
            </div>

            <div class="col-lg-12 col-md-7 search-course-right section-gap" id="reg1">

              <form class="form-wrap" id="registro" method="post">
                <h4 class="text-white pb-20 text-center mb-30">Registrate y obten acceso a los cursos.</h4>
                <input type="text" id="registrar-nombre" class="form-control text-dark" name="TNombre" placeholder="Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Nombre'">
                <input type="phone" id="registrar-tel" class="form-control text-dark" name="TTelefono" placeholder="Telefono" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu telefono'">
                <input type="email" id="registrar-correo" class="form-control text-dark" name="TEmail" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Correo'">
                <input type="password" id="registrar-pass" class="form-control text-dark" name="TPass" placeholder="Constraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Contraseña'">

                <button id="btnSubmit" class="btn-primary" style="width: 100%; height: 50px;" type="submit" name="submit">
                  Registrar
                  <div id="hope" class="spinner-border ml-5 d-none" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
                </button>

              </form>
              <br>
              <div id="alertas" class="alert alert-success text-center" style="max-height:54px; width:83%; display: none; margin-left: 40px;"></div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End search-course Area -->


  <!-- Modal Contenido del curso-->
  <div class="modal fade" id="modal-cursos" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content back-modal">
        <div class="modal-header">
          <div id="logo" class="ml-0">
            <a href="mainpage.php"><img src="../img/uniline2.png" width="30%" alt="" title="" /></a>
          </div>
          <button type="button w-2" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container view-curso"></div>
        </div>
        <div class="modal-footer boton-footer"></div>
      </div>
    </div>
  </div>
  <!---------end modal ----------->
  <header id="header">
    <div class="container main-menu">
      <div class="row justify-content-between">
        <div id="logo" class="col-lg-4 d-none d-lg-block mr-auto">
          <a href="mainpage.php"><img src="../img/uniline2.png" width="40%" alt="" title="" /></a>
        </div>
        <div class="float-right">
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <?php
              if (isset($_SESSION['acceso'])) {
              ?>
                <li class="mt-3"><a class="text-center" href="#home-banner" style="font-size: 14px; text-decoration: none;">Inicio</a></li>
                <li class="mt-3"><a class="text-center" href="#all-cursos" style="font-size: 14px; text-decoration: none;">Cursos disponibles</a></li>
                <li class="mt-3"><a class="text-center" href="misCursos.php" style="font-size: 14px; text-decoration: none;">Mis cursos</a></li>
                <li class="mt-3"><a class="text-center" href="#home-contacto" style="font-size: 14px; text-decoration: none;">Contacto</a></li>
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
                <div id="drop" class="dropdown-menu opciones-perfil">
                  <li><a class="enlaces-perfil" href="editProfile.php">Mi perfil</a></li>
                  <li><a class="enlaces-perfil" href="../controllers/sesion-destroy.php?cerrar=true">Cerrar sesión</a></li>
                </div>

              <?php
              } else {
              ?>
                <li class="mt-3"><a class="text-center" href="mainpage.php" style="font-size: 14px; text-decoration: none;">Inicio</a></li>
                <li class="mt-3"><a class="text-center" href="#all-cursos" style="font-size: 14px; text-decoration: none;">Cursos disponibles</a></li>
                <li class="mt-3"><a id="registro-user" data-toggle="modal" class="text-center" data-target="#modal-registro" href="#" style="font-size: 14px; text-decoration: none;">Registrate</a></li>
                <li class="mt-3"><a class="text-center" href="#home-contacto" style="font-size: 14px; text-decoration: none;">Contacto</a></li>
                <li class="mt-3"><a class="text-center" id="autobtn" style="font-size: 14px; text-decoration: none; color:rgb(255, 94, 0)" data-toggle="modal" href=".login">Iniciar sesion</a></li>
              <?php
              }
              ?>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </div>
    </div>
  </header><!-- #header -->

  <!-- LOGIN -->

  <div class="login modal fade" id="login">
    <div class="modal-dialog modal-login">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="color: #EF5602; font-weight: bold;">Iniciar Sesión</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="alerta-login"></div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">

          </ul>
          <form method="post" id="myLogin">
            <div class="form-group">
              <i class="fa fa-user"></i>
              <input name="TEmail" type="text" class="form-control" id="ingresar-email" placeholder="Correo electronico o usuario" required="required">
            </div>
            <div class="form-group">
              <i class="fa fa-lock"></i>
              <input name="TPassword" type="password" class="form-control" id="ingresar-password" placeholder="Contraseña" required="required">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-lg" style="background: #EF5602; color: white;" value="Login">
            </div>
          </form>

          <!-- Register -->
          <p>¿No tienes cuenta?
            <a id="ir-a-registro" data-toggle="modal" class="text-center" data-target="#modal-registro" href="#">Registrate</a>
          </p>

        </div>

        <div class="modal-footer">
        </div>

      </div>
    </div>
  </div>



  <!-- start banner Area -->
  <section class="banner-area relative" id="home-banner">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row fullscreen d-flex align-items-center justify-content-between">
        <?php
        if (isset($_SESSION['acceso'])) {
        ?>
          <div class="banner-content col-lg-12">
            <h2 class="text-uppercase text-white h2">
              ACTUALIZA TUS CONOCIMIENTOS MEDIANTE
              LOS MEJORES CURSOS DE ESPECIALIZACIÓN EN LÍNEA
            </h2>
            <p class="pt-10 pb-10">
              Estamos en la era de la información; prepárate, actualízate y crece a través de nuestros cursos en línea, estamos donde tú estés
            </p>

          </div>
        <?php
        } else {
        ?>
          <div class="banner-content col-lg-12">
            <h2 class="text-uppercase text-white h2">
              ACTUALIZA TUS CONOCIMIENTOS MEDIANTE
              LOS MEJORES CURSOS DE ESPECIALIZACIÓN EN LÍNEA
            </h2>
            <p class="pt-10 pb-10">
              Estamos en la era de la información; prepárate, actualízate y crece a través de nuestros cursos en línea, estamos donde tú estés
            </p>
            <a href="#" data-toggle="modal" data-target="#modal-registro" class="btn btn-primary text-uppercase">Comienza ya</a>
          </div>

      </div>

  </section>
  <!-- End banner Area -->
  <section class="search-course-area relative">
    <div class="overlay" style="background-color: rgba(255, 255, 255, 0.9)"></div>
    <div class="container" style="padding: 5rem;">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-12">
          <h2 class="h1">
            Regístrate ahora para conseguir cursos desde sólo $100MX cada uno. <br>
          </h2>
          <p class="text-black-50" style="font-size: 18px;">
            Regístrate ahora mismo, mañana será un día menos de aprendizaje.
          </p>
          <div class="row details-content">
            <div class="col single-detials">
              <span class="fa fa-graduation-cap text-primary" style="font-size: 100px;"></span>
              <h4 class="text-dark">Instructores expertos</h4>
              <p class="text-black-50" style="font-size: 18px;">

                Cursos impartidos por instructores experimentados en su área.
              </p>
            </div>
            <div class="col single-detials">
              <span class="fa fa-handshake-o text-primary" style="font-size: 100px;"></span>
              <h4 class="text-dark">Cursos certificados</h4>
              <p class="text-black-50" style="font-size: 18px;">
                Certificaciones que avalan los cursos.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
        }
  ?>
  </section>

  <!-- Start Profesores Area -->

  <div class="colorlib-trainers">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
          <h2 class="h2">Nuestros experimentados profesores</h2>
          <p>Nuestros instructores tienen la mayor experiencia en su area, lo que te ayudara a aprender de los mejores.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="trainer-img" style="background-image: url(../img/person1.jpg)"></div>
            <div class="desc">
              <h3>Chi chong na</h3>
              <span>Teacher</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="trainer-img" style="background-image: url(../img/person2.jpg)"></div>
            <div class="desc">
              <h3>Harry Potter</h3>
              <span>Professor</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="trainer-img" style="background-image: url(../img/person3.jpg)"></div>
            <div class="desc">
              <h3>Tim Cook</h3>
              <span>Teacher</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 animate-box">
          <div class="trainers-entry">
            <div class="trainer-img" style="background-image: url(../img/person4.jpg)"></div>
            <div class="desc">
              <h3>Scarlett Johanson</h3>
              <span>Teacher</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Popular -->

  <div id="all-cursos" class="popular page_section">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="section_title text-center">
            <h1>Cursos populares</h1>
            <p>
              Otras personas se actualizaron con estos cursos, descubre ¿por qué?
            </p>
          </div>
        </div>
      </div>
      <div class="cursos"></div>
    </div>
    <button id="date-modal" type="button" class="btn btn-info btn-lg d-none" data-toggle="modal" data-target="#modal-cursos"></button>
  </div>
  <!-- start banner Area -->
  <section class="banner-area relative" style="min-height: 50rem;">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center mt-10">
        <div class="col-lg-12 text-center" style="margin-top: 14rem;">
          <h1 class="text-white">
            Contacto
          </h1>
          <div class="col-lg-12 d-lg-flex d-sm-inline-block text-white justify-content-between">
            <div class="single-contact-address d-inline-block">
              <div class="icon">
                <span class="fa fa-home"></span>
              </div>
              <div class="contact-details">
                <h5>Autlán de Navarro, Jalisco</h5>
                <p>
                  Obregón #124 F
                </p>
              </div>
            </div>
            <div class="single-contact-address d-inline-block">
              <div class="icon">
                <span class="fa fa-phone"></span>
              </div>
              <div class="contact-details">
                <h5>+52 (958) 9865 562</h5>
                <p>Lunes - Viernes con atención de 9 am - 4 pm</p>
              </div>
            </div>
            <div class="single-contact-address d-inline-block">
              <div class="icon">
                <span class="fa fa-envelope"></span>
              </div>
              <div class="contact-details">
                <h5>soporte@udemy.com</h5>
                <p>Envianos tu duda en cualquier momento!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End contact-page Area -->
  <div id="home-contacto"></div>

  <!-- start footer Area -->
  <footer class="footer-area footer-ipad-pro">
    <div class="align-items-center justify-content-between">
      <div class="row">
        <div class="col-lg-4 col-sm-12 text-center mt-3 mb-4">
          <a class="" href="mainpage.php"><img src="../img/uniline2.png" width="25%" alt="" title="" /></a>
        </div>
        <div class="col-lg-4 col-sm-12 mb-4 mt-3 align-bottom text-center">
          <p class="mb-0">&copy; AB Soluciones Empresariales <script>
              document.write(new Date().getFullYear());
            </script>
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



  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

  <!-- styles course -->
  <script src="../js/popper.js"></script>


</body>

</html>