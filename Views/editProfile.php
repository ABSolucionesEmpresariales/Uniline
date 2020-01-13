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
  
 
       
  </head>
  <body>
    <header id="header" id="home">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                <div id="logo" style="height: 10%;">
                    <a href="index.html"><img src="../img/uniline2.png" width="20%" alt="" title="" /></a>
                  </div>
            </div>
          </div>
        </div>
    </div>
    </header><!-- #header -->

    <!-- Editar perfil -->

    <div class="page_section">
        <div class="container">
          <div class="row justify-content-center align-items-center">
  
            <!-- Editar foto de perfil -->
            <div class="col-lg-3 course_box">
              <div class="card">
                <img class="card-img-top" src="../img/perfil.png" alt="foto de perfil">
                <div class="boton-perfil text-center">
                  <button id="mostrar" class="btn btn-secondary" type="file">Editar foto de perfil</button>
                </div>         
                <div id="cargaFoto" class="custom-file" style="display: none">
                  <input type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Selecciona tu archivo</label>
                  <button id="actualizar" class="primary-btn btn-success" type="file" name="Fimagen">Actualizar</button>
                </div>      
              </div>
            </div>
  
            <!-- Popular Course Item -->
            <div class="col-lg-6 course_box">
              <div class="form">
                <div>
                  <form class="form-wrap" id="actualizar-perfil">
                    <div class="alertas"></div>
                    <input type="text" id="registrar-nombre" class="form-control text-success" name="TNombre" placeholder="Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Nombre'" >
                    <input type="phone" id="registrar-tel" class="form-control text-success" name="TTelefono" placeholder="Telefono" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu telefono'" >
                    <input type="email" id="registrar-correo" class="form-control text-success" name="TEmail" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Correo'" >
                    <input type="text" id="registrar-edad" class="form-control text-success" name="TEdad" placeholder="Edad" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu edad'" >
                     <div class="form-select" id="service-select">
                      <select id="registrar-grado" name="TGrado">
                        <option id="estudios">Selecciona grado de estudios</option>
                        <option value="1">Secundaria</option>
                        <option value="2">bachillerato</option>
                        <option value="3">Universidad</option>
                        <option value="4">Superior</option>
                      </select >
                      <hr><br><br>
                      <h4 id="mostrarPass" class="h6" style="cursor: pointer;">Si deseas cambiar tu contraseña haz clic aqui</h4>
                      <div id="cambiarPass" class="ocultar" style="display: none">
                        <input type="password" id="registrar-pass" class="form-control text-success" name="TPass" placeholder=" Tu constraseña actual" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Contraseña actual'" >
                        <input type="password" id="registrar-passNew" class="form-control text-success" name="TPassNew" placeholder="Tu nueva constraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu nueva Contraseña'" >
                      </div>
                    </div>
                    <br><br><br><br><br>
                    <button id="actualizar" class="btn-primary primary-btn text-uppercase" type="submit" name="submit">Actualizar perfil</button>
                  </form>
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
    <script src="../js/actualizar-perfil.js"></script>

<!-- styles course -->
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/custom.js"></script>

  </body>
</html>
