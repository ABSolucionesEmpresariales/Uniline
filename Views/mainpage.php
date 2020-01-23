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
    <link rel="stylesheet" href="../css/stylo.css">
    <link rel="stylesheet" href="../css/stylo-responsive-editPerfil.css">
    <link rel="stylesheet" href="../css/icons/all.css">

    <!--
    JS
    ============================================= -->
    
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/registro.js"></script>
    <script src="../js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    
  </head>
  <body>
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
    <header id="header" id="home">
<!--       <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
              <ul class="text-center">
              <li><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
              <a href="tel:+953 012 3654 896"><span class="fa fa-phone-square"></span> <span class="text">+52 317 123 1234</span></a>
              <a href="mailto:support@colorlib.com"><span class="fa fa-envelope"></span> <span class="text">soporte@ear.com</span></a>
            </div>
          </div>
        </div>
    </div>  -->
      <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo" class="col-lg-4 d-none d-lg-block">
            <a href="mainpage.php"><img src="../img/uniline2.png" width="50%" alt="" title="" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
            <?php
              if(isset($_SESSION['acceso'])){
              ?> 
              <li><a class="text-center" href="mainpage.php">Inicio</a></li>
              <li><a class="text-center" href="misCursos.php">Mis cursos</a></li>             
              <li><a class="text-center" href="contact.html">Contacto</a></li>
              <li><a class="text-center" href="editmisCursos.php"><img src= <?php echo $_SESSION['imagen_perfil'] ?> alt="perfil" class="course_author_image"></a></li>
              <?php
              }else{
              ?>
              <li><a class="text-center" href="mainpage.php">Inicio</a></li>
              <li><a class="text-center" class="cambiarRegistro" href="#reg1">Registrate</a></li>            
              <li><a class="text-center" href="contact.html">Contacto</a></li>
              <li><a class="text-center" id="autobtn" class="btn btn-primary btn-sm" style="color: white;" data-toggle="modal" href=".login">Login</a></li>
              <?php
              }
              ?>
            </ul>
          </nav><!-- #nav-menu-container -->
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
    						<input name="TUsuario" type="text" class="form-control" id="ingresar-usuario" placeholder="Usuario" required="required">
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
            <a id="btn-registrate" class="cambiarRegistro" style="color:blue;" href="#reg1">Registrate</a>
        </p>

    			</div>

    			<div class="modal-footer">
    			</div>

    		</div>
    	</div>
    </div>

    <!-- confirmacion area -->
    
    <div class="confirm modal fade" id="confirmar">
    	<div class="modal-dialog modal-login">
    		<div class="modal-content">
        <div class="modal-header">
    				<button type="button" class="close closeCon" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
              <div class="text-center bg-dark p-4">
                <img src="../img/uniline2.png" width="70%" alt="" title="" />
              </div>
              <div class="container p-4 my-1 bg-primary text-white">
                  <h3 class="h3 text-white">Te enviamos un correo para confirmar tu cuenta, por favor abra el enlace que le enviamos a su correo electronico</h3>  
              </div>
              <div class="text-center bg-dark p-1">
                <p><a class="h4 item-link text-white align-middle" target="_blank" href="http://www.google.com">Ir a gmail</a></p>
              </div>

    		</div>
    	</div>
    </div>

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
          <div class="banner-content col-lg-9 col-md-12">
            <h1 class="text-uppercase">
              ACTUALIZA TUS CONOCIMIENTOS MEDIANTE
              LOS MEJORES CURSOS DE ESPECIALIZACIÓN EN LÍNEA
            </h1>
            <p class="pt-10 pb-10">
              Estamos en la era de la información; prepárate, actualízate y crece a través de nuestros cursos en línea, estamos donde tú estés
            </p>
            <a id="idprueba" href="#" class="cambiarRegistro primary-btn text-uppercase">Comienza ya</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End banner Area -->

    <!-- Start feature Area -->
<!--     <section class="feature-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="single-feature">
              <div class="title">
                <h4>Cursos en linea gratuitos</h4>
              </div>
              <div class="desc-wrap">
                <p>
                  Atrévete a sumergirte en el mundo del conocimiento, suscríbete y ten accesos a nuestros cursos sin costo y lleva tus conocimientos al siguiente nivel.
                </p>
                <a href="#">Únete ahora!</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="single-feature">
              <div class="title">
                <h4>Cursos en linea premium</h4>
              </div>
              <div class="desc-wrap">
                <p>
                  Ser cliente Premium es lo mejor.  Podrás obtener descuentos en cursos, acumular puntos y asistir a cursos presenciales y conferencias sin costo.<br><br>
                </p>
                <a href="#">Únete ahora!</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="single-feature">
              <div class="title">
                <h4>Enseña en</h4>
              </div>
              <div class="desc-wrap">
                <p>
                  If you are a serious astronomy fanatic like a lot of us are, you can probably remember that one event.<br><br>
                </p>
                <a href="#">Únete ahora!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End feature Area -->

    <!-- Popular -->

    <div class="popular page_section">
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

    <!-- Start search-course Area -->
    <section class="search-course-area relative">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-6 col-md-6 search-course-left">
            <h1 class="text-white">
              Regístrate ahora para conseguir cursos desde sólo $100MX cada uno.  <br>
            </h1>
            <p>
              Regístrate ahora mismo, mañana será un día menos de aprendizaje.
            </p>
            <div class="row details-content">
              <div class="col single-detials">
                <span class="fa fa-graduation-cap"></span>
                <a href="#"><h4>Instructores expertos</h4></a>
                <p>
                  Cursos impartidos por instructores experimentados en su área.
                </p>
              </div>
              <div class="col single-detials">
                <span class="fa fa-handshake-o"></span>
                <a href="#"><h4>Cursos certificados</h4></a>
                <p>
                  Certificaciones que avalan los cursos.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 search-course-right section-gap" id="reg1">
            
            <form class="form-wrap" id="registro" method="post">             
              <h4 class="text-white pb-20 text-center mb-30">Registrate y obten acceso a los cursos.</h4>
              <div id="alertas" class="alertas"></div>
              <input type="text" id="registrar-nombre" class="form-control text-dark" name="TNombre" placeholder="Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Nombre'" >
              <input type="phone" id="registrar-tel" class="form-control text-dark" name="TTelefono" placeholder="Telefono" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu telefono'" >
              <input type="email" id="registrar-correo" class="form-control text-dark" name="TEmail" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Correo'" >
              <input type="password" id="registrar-pass" class="form-control text-dark" name="TPass" placeholder="Constraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Contraseña'" >
              
              <button class="btn-registrar primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End search-course Area -->

    <div class="colorlib-trainers">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
            <h2>Nuestros experimentados profesores</h2>
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

    <!-- start footer Area -->
    <footer class="footer-area footer-ipad-pro">
        <div class="align-items-center justify-content-between">
          <div class="row">
            <div class="col-lg-4 col-sm-12 text-center mt-3 mb-4">
              <a class="" href="mainpage.php"><img src="../img/uniline2.png" width="25%" alt="" title="" /></a>
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
<script src="../js/bootstrap.min.js"></script>
<script src="../js/custom.js"></script>

  </body>
</html>
