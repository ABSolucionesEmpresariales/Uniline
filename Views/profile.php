<?php
include '../controllers/sesion.php'
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
    <script src="../js/ajax.js"></script>
 
       
  </head>
  <body>
    <header id="header" id="home">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                <div id="logo">
                    <a href="mainpage.php"><img src="../img/uniline2.png" width="20%" alt="" title="" /></a>
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
                <img src="../img/perfil.png" alt="perfil" class="course_author_image">
                <a class="btn btn-sm" href="editProfile.php"><span></span>Mi perfil</a>
                <a class="btn btn-sm" style="color: white;" href="../controllers/sesion-destroy.php">Cerrar sesion</a>
            </div>
          </div>
        </div>
    </div>
    </header><!-- #header -->

    <!-- Popular -->

    <div class="popular page_section">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="section_title text-center">
                <h1>Mis Cursos</h1>
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
                </div>
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
