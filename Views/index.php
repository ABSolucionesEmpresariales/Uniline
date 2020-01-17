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

    <!--
    JS
    ============================================= -->
    
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/registro.js"></script>
    <script src="../js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    
  </head>
  <body>
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
            <a href="index.php"><img src="../img/uniline2.png" width="50%" alt="" title="" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
            <?php
              if(isset($_SESSION['acceso'])){
              ?> 
              <li><a class="text-center" href="index.php">Inicio</a></li>
              <li><a class="text-center" href="profile.php">Mis cursos</a></li>             
              <li><a class="text-center" href="contact.html">Contacto</a></li>
              <li><a class="text-center" href="editProfile.php"><img src= <?php echo $_SESSION['imagen_perfil'] ?> alt="perfil" class="course_author_image"></a></li>
              <?php
              }else{
              ?>
              <li><a class="text-center" href="index.php">Inicio</a></li>
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
            <a id="idprueba" href="#" class="primary-btn text-uppercase">Comienza ya</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End banner Area -->

    <!-- Start feature Area -->
    <section class="feature-area">
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
    </section>
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

        <div class="row course_boxes">

          <!-- Popular Course Item -->
          <div class="col-lg-4 course_box">
            <div class="card">
              <img class="card-img-top" src="../img/html5.png" alt="https://unsplash.com/@kellybrito">
              <div class="card-body text-center">
                <div class="card-title"><a href="courses.html">Guía HTML desde cero</a></div>
                <div class="card-text">Todo sobre html 5, CSS, Javascript & Bootstrap.</div>
              </div>
              <div class="price_box d-flex flex-row align-items-center">
                <div class="course_author_image">
                  <img src="../images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                </div>
                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
              </div>
            </div>
          </div>

          <!-- Popular Course Item -->
          <div class="col-lg-4 course_box">
            <div class="card">
              <img class="card-img-top" src="../img/progra.jpg" alt="https://unsplash.com/@cikstefan">
              <div class="card-body text-center">
                <div class="card-title"><a href="courses.html">Programación desde cero</a></div>
                <div class="card-text">Fundamentos de Programación & POO.</div>
              </div>
              <div class="price_box d-flex flex-row align-items-center">
                <div class="course_author_image">
                  <img src="../images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                </div>
                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
              </div>
            </div>
          </div>

          <!-- Popular Course Item -->
          <div class="col-lg-4 course_box">
            <div class="card">
              <img class="card-img-top" src="../img/php.png" alt="https://unsplash.com/@dsmacinnes">
              <div class="card-body text-center">
                <div class="card-title"><a href="courses.html">PHP avanzado</a></div>
                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
              </div>
              <div class="price_box d-flex flex-row align-items-center">
                <div class="course_author_image">
                  <img src="../images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                </div>
                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


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
    <footer class="footer-area section-gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Temas mas buscados</h4>
              <ul>
                <li><a href="#">Capacitaciones</a></li>
                <li><a href="#">Programación</a></li>
                <li><a href="#">Desarrollo Web</a></li>
                <li><a href="#">Recursos Humanos</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Quick links</h4>
              <ul>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Brand Assets</a></li>
                <li><a href="#">Investor Relations</a></li>
                <li><a href="#">Terms of Service</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Features</h4>
              <ul>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Brand Assets</a></li>
                <li><a href="#">Investor Relations</a></li>
                <li><a href="#">Terms of Service</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Resources</h4>
              <ul>
                <li><a href="#">Guides</a></li>
                <li><a href="#">Research</a></li>
                <li><a href="#">Experts</a></li>
                <li><a href="#">Agencies</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4  col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Newsletter</h4>
              <p>Stay update with our latest</p>
              <div class="" id="mc_embed_signup">
                 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
                  <div class="input-group">
                    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <span class="lnr lnr-arrow-right"></span>
                      </button>
                    </div>
                      <div class="info"></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom row align-items-center justify-content-between">
          <p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          <div class="col-lg-6 col-sm-12 footer-social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
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
