<?php
include '../controllers/sesion.php'
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
          <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
            <div id="logo">
              <a href="mainpage.php"><img src="../img/uniline2.png" width="20%" alt="" title="" /></a>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
            <a class="text-center" href="editProfile.php"><img src=<?php echo $_SESSION['imagen_perfil'] ?> alt="perfil" class="course_author_image"></a>
            <a class="btn btn-sm" href="editProfile.php"><span></span>Mi perfil</a>
            <a class="btn btn-sm" style="color: white;" href="../controllers/sesion-destroy.php">Cerrar sesion</a>
          </div>
        </div>
      </div>
    </div>
  </header><!-- #header -->

  <!-- Popular -->

  <div class="popular page_section" style="max-height: 50rem; height: 50rem;">
    <div class="container">
      <div class="section_title text-center">
        <h2 id="hay-cursos" class="h1"></h2>
      </div>
        <hr>

        <div class="table-responsive-sm">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th colspan="2">Cusro</th>
                <th scope="col">Descripción</th>
                <th scope="col">Progreso</th>
              </tr>
            </thead>
            <tbody id="lista-tabla-cursos">
              <!-- carga de la lista de cursos de bd -->
            </tbody>
          </table>
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
  <script src="../js/miscursos.js"></script>

  <!-- styles course -->
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</body>

</html>