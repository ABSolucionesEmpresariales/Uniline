<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="colorlib">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Cursos</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/styles/courses_styles.css">
    <link rel="stylesheet" type="text/css" href="css/styles/courses_responsive.css">
    <link rel="stylesheet" href="css/icons/all.css">
  </head>
  <body>
    <header id="header" id="home">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
              <ul>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
              <a href="tel:+953 012 3654 896"><span class="fa fa-phone-square"></span> <span class="text">+52 317 123 1234</span></a>
              <a href="mailto:support@colorlib.com"><span class="fa fa-envelope"></span> <span class="text">soporte@udemy.com</span></a>
            </div>
          </div>
        </div>
    </div>
      <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
            <a href="mainpage.html"><img src="img/1.png" width="50%" alt="" title="" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li><a href="mainpage.html">Inicio</a></li>
              <li><a href="courses.html">Cursos</a></li>
              <li><a href="events.html">Eventos</a></li>
              <li><a href="gallery.html">Galeria</a></li>
              <li><a href="contact.html">Contacto</a></li>
              <li><a class="btn btn-primary btn-sm" style="color: white;" data-toggle="modal" href=".login">Login</a></li>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </div>
    </header><!-- #header -->

    <div class="login modal fade" id="login">
    	<div class="modal-dialog modal-login">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h4 class="modal-title" style="color: #EF5602; font-weight: bold;">Iniciar Sesión</h4>
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    			</div>
    			<div class="modal-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" id="nav-Usuario-tab" data-toggle="tab" href="#Cliente" role="tab" aria-controls="Cliente" aria-selected="false" style="color: #0574CB;">Usuario</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" id="nav-Instructor-tab" data-toggle="tab" href="#Asesor" role="tab" aria-controls="Asesor" aria-selected="true" style="color: #0574CB;">Instructor</a>
              </li>
          </ul>
    				<form action="/examples/actions/confirmation.php" method="post" id="myLogin">
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
            <a style="color:blue;" href="registrar.html">Registrate</a>
        </p>

    			</div>

    			<div class="modal-footer">
    			</div>

    		</div>
    	</div>
    </div>

    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
          <div class="about-content col-lg-12">
            <h1 class="text-white">
              Cursos
            </h1>
            <p class="text-white link-nav"><a href="mainpage.html">Inicio </a>  <span class="fa fa-arrow-right"></span>  <a href="gallery.html"> Cursos</a></p>
          </div>
        </div>
      </div>
    </section>
    <!-- End banner Area -->

    <!-- Popular -->

  	<div class="popular page_section">
  		<div class="container">
  			<div class="row">
  				<div class="col">
  					<div class="section_title text-center">
  						<h1>Listado de cursos</h1>
  					</div>
  				</div>
  			</div>

  			<div class="row course_boxes">

          <!-- Popular Course Item -->
          <div class="col-lg-4 course_box">
            <div class="card">
              <img class="card-img-top" src="img/html5.png" alt="https://unsplash.com/@kellybrito">
              <div class="card-body text-center">
                <div class="card-title"><a href="courses.html">Guía HTML desde cero</a></div>
                <div class="card-text">Todo sobre html 5, CSS, Javascript & Bootstrap.</div>
              </div>
              <div class="price_box d-flex flex-row align-items-center">
                <div class="course_author_image">
                  <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                </div>
                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
              </div>
            </div>
          </div>

          <!-- Popular Course Item -->
          <div class="col-lg-4 course_box">
            <div class="card">
              <img class="card-img-top" src="img/progra.jpg" alt="https://unsplash.com/@cikstefan">
              <div class="card-body text-center">
                <div class="card-title"><a href="courses.html">Programación desde cero</a></div>
                <div class="card-text">Fundamentos de Programación & POO.</div>
              </div>
              <div class="price_box d-flex flex-row align-items-center">
                <div class="course_author_image">
                  <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                </div>
                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
              </div>
            </div>
          </div>

          <!-- Popular Course Item -->
          <div class="col-lg-4 course_box">
            <div class="card">
              <img class="card-img-top" src="img/php.png" alt="https://unsplash.com/@dsmacinnes">
              <div class="card-body text-center">
                <div class="card-title"><a href="courses.html">PHP avanzado</a></div>
                <div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
              </div>
              <div class="price_box d-flex flex-row align-items-center">
                <div class="course_author_image">
                  <img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                </div>
                <div class="course_author_name">Michael Smith, <span>Author</span></div>
                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
              </div>
            </div>
          </div>

  				<!-- Popular Course Item -->
  				<div class="col-lg-4 course_box">
  					<div class="card">
  						<img class="card-img-top" src="img/course_1.jpg" alt="https://unsplash.com/@claybanks1989">
  						<div class="card-body text-center">
  							<div class="card-title"><a href="courses.html">HTML para principiantes</a></div>
  							<div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
  						</div>
  						<div class="price_box d-flex flex-row align-items-center">
  							<div class="course_author_image">
  								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
  							</div>
  							<div class="course_author_name">Michael Smith, <span>Author</span></div>
  							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
  						</div>
  					</div>
  				</div>

  				<!-- Popular Course Item -->
  				<div class="col-lg-4 course_box">
  					<div class="card">
  						<img class="card-img-top" src="img/course_2.jpg" alt="https://unsplash.com/@element5digital">
  						<div class="card-body text-center">
  							<div class="card-title"><a href="courses.html">Photoshop avanzado</a></div>
  							<div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
  						</div>
  						<div class="price_box d-flex flex-row align-items-center">
  							<div class="course_author_image">
  								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
  							</div>
  							<div class="course_author_name">Michael Smith, <span>Author</span></div>
  							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
  						</div>
  					</div>
  				</div>

  				<!-- Popular Course Item -->
  				<div class="col-lg-4 course_box">
  					<div class="card">
  						<img class="card-img-top" src="img/course_3.jpg" alt="https://unsplash.com/@gaellemm">
  						<div class="card-body text-center">
  							<div class="card-title"><a href="courses.html">Guia completa para el diseño</a></div>
  							<div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
  						</div>
  						<div class="price_box d-flex flex-row align-items-center">
  							<div class="course_author_image">
  								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
  							</div>
  							<div class="course_author_name">Michael Smith, <span>Author</span></div>
  							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
  						</div>
  					</div>
  				</div>

  				<!-- Popular Course Item -->
  				<div class="col-lg-4 course_box">
  					<div class="card">
  						<img class="card-img-top" src="img/course_4.jpg" alt="https://unsplash.com/@juanmramosjr">
  						<div class="card-body text-center">
  							<div class="card-title"><a href="courses.html">Beginners guide to HTML</a></div>
  							<div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
  						</div>
  						<div class="price_box d-flex flex-row align-items-center">
  							<div class="course_author_image">
  								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
  							</div>
  							<div class="course_author_name">Michael Smith, <span>Author</span></div>
  							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
  						</div>
  					</div>
  				</div>

  				<!-- Popular Course Item -->
  				<div class="col-lg-4 course_box">
  					<div class="card">
  						<img class="card-img-top" src="img/course_5.jpg" alt="https://unsplash.com/@kimberlyfarmer">
  						<div class="card-body text-center">
  							<div class="card-title"><a href="courses.html">Advanced Photoshop</a></div>
  							<div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
  						</div>
  						<div class="price_box d-flex flex-row align-items-center">
  							<div class="course_author_image">
  								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
  							</div>
  							<div class="course_author_name">Michael Smith, <span>Author</span></div>
  							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
  						</div>
  					</div>
  				</div>

          <!-- Popular Course Item -->
  				<div class="col-lg-4 course_box">
  					<div class="card">
  						<img class="card-img-top" src="img/course_6.jpg" alt="https://unsplash.com/@kimberlyfarmer">
  						<div class="card-body text-center">
  							<div class="card-title"><a href="courses.html">Advanced Photoshop</a></div>
  							<div class="card-text">Adobe Guide, Layes, Smart Objects etc...</div>
  						</div>
  						<div class="price_box d-flex flex-row align-items-center">
  							<div class="course_author_image">
  								<img src="images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
  							</div>
  							<div class="course_author_name">Michael Smith, <span>Author</span></div>
  							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span>$29</span></div>
  						</div>
  					</div>
  				</div>

  			</div>
  		</div>
  	</div>


    <!-- Start cta-two Area -->
    <section class="cta-two-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 cta-left">
            <h1>Not Yet Satisfied with our Trend?</h1>
          </div>
          <div class="col-lg-4 cta-right">
            <a class="primary-btn wh" href="#">view our blog</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End cta-two Area -->

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


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
      <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/jquery.tabs.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
