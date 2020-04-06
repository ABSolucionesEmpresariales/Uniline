<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="icon" type="image/png" href="/img/favicon.png" />
  <!-- Author Meta -->
  <meta name="author" content="AB soluciones empresariales">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  
  <meta property="og:title" content="Escuela Al Revés UNILINE">
  <meta property="og:description" content="Aprende en nuestra escuela en linea.">
  <meta property="og:image" content="https://www.escuelaalreves.com/img/inicio.jpg">
  <meta property="og:url" content="https://www.escuelaalreves.com">
  
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
  <script src="https://player.vimeo.com/api/player.js"></script>
  <script src="../js/registro32.js"></script>
  <script src="../js/login9.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


</head>

<body>

  <div id="alertas-registro" class="alert alert-danger fixed-top text-center" style="max-height:54px; display: none;">
  </div>

  <!-- Start Registro Area -->
  <div class="modal fade" id="modal-registro">
    <div class="modal-dialog modal-login">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Regístrate y obtén acceso a los cursos</h4>
          <button type="button" class="fas fa-times close" style="font-size: 30px;" data-dismiss="modal"></button>
        </div>
        <div class="modal-body row justify-content-center align-items-center">
          <div class="col-lg-12 col-md-7 search-course-right" id="reg1">

            <form class="form-wrap" id="registro" method="post">
<div class="form-group">
                  <i class="fa fa-at"></i>
                <input type="email" id="registrar-correo" class="form-control text-dark" name="TEmail" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Correo'">
              </div>
              <div class="form-group">
                  <i class="fa fa-lock"></i>
                <input type="password" id="registrar-pass" class="form-control text-dark" name="TPass" placeholder="Constraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Contraseña'">
              </div>
              <div class="form-group">
                  <i class="fa fa-user"></i>
                <input type="text" id="registrar-nombre" class="form-control text-dark" name="TNombre" placeholder="Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Nombre'">
              </div>
              <div class="form-group">
                  <i class="fa fa-phone"></i>
                <input type="phone" id="registrar-tel" class="form-control text-dark" name="TTelefono" placeholder="Telefono (Opcional)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu telefono'">
              </div>
              <button id="btnSubmit" class="btn-primary" style="width: 100%; height: 50px;" type="submit" name="submit">
                Registrar
                <div id="hope" class="spinner-border ml-5 d-none" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </button>

            </form>
            <br>
            <div id="alertas" class="alert alert-success text-center" style="width:100%; display: none;"></div>

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
      <div class="modal-content ">
        <div class="modal-header header-curso" ></div>
        <div class="modal-body">
          <div class="view-curso"></div>
        </div>
        <div class="modal-footer boton-footer"></div>
      </div>
    </div>
  </div>
  <!---------end modal ----------->
  <header id="header">
    <div class="container-fluid main-menu">
      <div class="row justify-content-between">
        <div id="logo" class="col-lg-4 d-none d-lg-block mr-auto">
          <a href="mainpage.php"><img id="logo-imagen" src="../img/uniline3.png" width="32%" alt="" title="" /></a>
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
                <li class="mt-3"><a id="registro-user" data-toggle="modal" class="text-center" data-target="#modal-registro" href="#" style="font-size: 14px; text-decoration: none;">Regístrate</a></li>
                <li class="mt-3"><a class="text-center" href="#home-contacto" style="font-size: 14px; text-decoration: none;">Contacto</a></li>
                <li class="mt-3"><a class="text-center" id="autobtn" style="font-size: 14px; text-decoration: none; color:rgb(255, 94, 0)" data-toggle="modal" href=".login">Iniciar sesión</a></li>
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
          <h4 class="modal-title">Iniciar Sesión</h4>
          <button type="button" class="fas fa-times close" style="font-size: 30px;" data-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="alerta-login"></div>
        <div class="modal-body">
          <form method="post" id="myLogin">
            <div class="form-group">
              <i class="fa fa-user"></i>
              <input name="TEmail" type="text" class="form-control" id="ingresar-email" placeholder="Correo electrónico" required="required">
            </div>
            <div class="form-group">
              <i class="fa fa-lock"></i>
              <input name="TPassword" type="password" class="form-control" id="ingresar-password" placeholder="Contraseña" required="required">
            </div>
            <div class="form-group">
              <input type="submit" class="btn-primary btn-block btn-lg" value="Entrar">
            </div>
          </form>

          <!-- Register -->
          <p class="extra-options">¿No tienes cuenta? 
            <a id="ir-a-registro" data-toggle="modal" class="text-center" data-target="#modal-registro" href="#">Regístrate</a>
          </p>
          <p class="extra-options">
          ¿Olvidaste tu contraseña?
            <a id="show-pass-reset" data-toggle="modal" class="text-center" style="cursor:pointer">Clic aquí</a>
          </p>
          
          <!-- Reset password -->
          <div id="reset-pass-div">
            <hr/>
            <form id="resetForm">
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon addon-ico"><p><i class="fas fa-envelope"></i></p></span>
                    <input id="ingresar-email2" name="emailForReset" type="text" class="form-control reset-pass" placeholder="Ingresa tu correo">
                  <div class="input-group-btn">
                    <button id="resetPassBtn" class="btn btn-primary reset-pass-btn">
                        
                            &nbsp;&nbsp;<i id="arrow" class="fas fa-arrow-right ml-0"></i>&nbsp;&nbsp;
                       
                          
                        <div id="spiner-reset" class="spinner-border text-light  d-none" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            <h5 id="hint">Te enviaremos un correo con los pasos para recuperar tu contraseña.</h6>
             <div id="alertas-reset-email" class="alert alert-danger d-none" role="alert">
            </div>
          </div>
          
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
          <div class="banner-content col-lg-11">
            <h2 class="text-white text-center titulo">
             Desarróllate a través de nuestros cursos en línea.
            </h2>
            <p class="text-white text-center" style="font-family: Century Gothic; font-weight: 400; font-size: 22px; line-height: 25px;">
              Capacitate en cursos especializados desde cualquier lugar del mundo;
              donde tú estés, nosotros estamos.
            </p>
            <br>
          </div>
        <?php
        } else {
        ?>
          <div class="banner-content col-lg-11">
            <h2 class="text-white text-center titulo">
             Desarróllate a través de nuestros cursos en línea.
            </h2>
            <p class="text-white text-center" style="line-height: 25px; font-family: Century Gothic; font-weight: 400; font-size: 22px">
            Capacitate en cursos especializados desde cualquier lugar del mundo;
              donde tú estés, nosotros estamos.
            </p>
            <br>
            <div class="flex justify-content-center">
              <a href="#" data-toggle="modal" data-target="#modal-registro" class="btn btn-primary text-uppercase" style="width: 40rem; font-size: 30px; font-weight: 600;">
                COMENZAR AHORA <i class="fas fa-chevron-right ml-1"></i></a>
            </div>
            <br>
          </div>
      </div>
      <?php
        }
  ?>

  </section>
  
  <!-- End banner Area -->


  
  <!-- Popular -->

  <div id="all-cursos" class="popular">
    <div class="container">
      <div class="row">
        <div class="col text-center">
            <p class="h1" style="font-weight: bold;">Nuestros cursos</p>
        </div>
      </div>
      <div class="cursos"></div>
    </div>
    <button id="date-modal" type="button" class="btn btn-info btn-lg d-none" data-toggle="modal" data-target="#modal-cursos"></button>
  </div>

 

  <!-- start banner Area -->
  <section class="banner-area relative" style="min-height: 30rem;">
    <div class="overlay overlay-bg-footer"></div>
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center mt-10">
        <div class="col-lg-12 text-center">
          <h1 class="text-white">
            Contacto
          </h1>
          <br>
          <br>
          
          <div class="col-lg-12 d-lg-flex d-sm-inline-block text-white justify-content-between" style="margin-left: 0">
            <div class="single-contact-address d-inline-block" style="max-width: 20rem;">
              <div class="icon">
                <span class="fa fa-home" style="font-size: 30px"></span>
              </div>
              <div class="contact-details">
                <h5>Autlán de Navarro, Jalisco</h5>
                <p>
                 Corona Araiza #540 Col.IPEVI C.P.48900
                </p>
              </div>
            </div>
            <div class="single-contact-address d-inline-block" style="max-width: 20rem;">
              <div class="icon">
                <span class="fa fa-phone" style="font-size: 30px"></span>
              </div>
              <div class="contact-details">
                <h5>3171035768</h5>
                <p>Lunes a Viernes con atención de 9:00 a 16:00 horas</p>
              </div>
            </div>
            <div class="single-contact-address d-inline-block" style="max-width: 20rem;">
              <div class="icon">
                <span class="fa fa-envelope" style="font-size: 30px"></span>
              </div>
              <div class="contact-details">
                  <p>Atención a clientes</p>
                <h5>atencionaclientes@escuelaalreves.com</h5>
                <p>¡No dudes en escribirnos!</p>
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
              <a href="avisodeprivacidad.php">Políticas de Privacidad</a>
            </li>
            <li class="list-inline-item">
              <a href="imagenCorporativa.php">Imagen Corporativa</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-sm-12 text-center align-bottom mb-4 mt-2">
          <div class="social-network mt-0">
            <p class="h4 text-white">Síguenos</p>
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