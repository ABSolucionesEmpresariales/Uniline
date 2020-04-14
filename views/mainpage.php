<?php
session_start();
$pagina = "mainpage";
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
  <meta property="og:image" content="https://escuelaalreves.com/img/inicio.jpg">
  <meta property="og:url" content="https://escuelaalreves.com">
  <!-- Site Title -->
  <title>Escuela Al Revés</title>

  <!-- #Scripts -->
  <?php include "../Components/scripts.php"; ?> 
  <script src="../js/registro32.js"></script>
  <script src="../js/login9.js"></script>
  <!-- #Scripts -->

</head>

<body>
  <div id="alertas-registro" class="alert alert-danger fixed-top text-center" style="max-height:54px; display: none;">
  </div>

  <!-- #header -->
  <?php include "../Components/header.php"; ?>
  <!-- #header -->

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
              APRENDE DESDE CASA EN EL MOMENTO QUE TÚ QUIERAS.
            </h2>
            <p class="text-white text-center" style="font-family: Century Gothic; font-weight: 400; font-size: 22px; line-height: 25px;">
            Tu salón de clases está en tu casa..
            </p>
            <br>
          </div>
        <?php
        } else {
        ?>
          <div class="banner-content col-lg-11">
            <h2 class="text-white text-center titulo">
            APRENDE DESDE CASA EN EL MOMENTO QUE TÚ QUIERAS.
            </h2>
            <p class="text-white text-center" style="line-height: 25px; font-family: Century Gothic; font-weight: 400; font-size: 22px">
            Tu salón de clases está en tu casa..
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

  <section class="dash-area" style="height: 250px;">
        <div class="row p-0 px-md-5 px-sm-3" style="background: linear-gradient(transparent, rgba(0, 0, 0, 0.664));">
            <div class="col-lg-3 col-md-12 p-5 d-lg-block d-md-none d-none" >
              <i style="font-size: 200px" class="fas fa-laptop-code text-white"></i>
            </div>
            <div class="col-lg-6 col-md-12" >
              <form class="form-group" id="FCupones">
              <p class="text-center h2 text-white" style="text-shadow: 0.1em 0.1em 0.1em #000!important;">Canjea tu Codigo</p>
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-3 mb-md-2">
                          <input name="INCodigo" class="form-control" type="text" placeholder="Codigo" id="codigo">
                        </div>
                        <div class="col-lg-6 col-md-12">
                          <select name="SCurso" class="form-control" 
                            style="height:50px;
                                    line-height:30px;
                                    border-radius: 5px;" 
                            id="curso">
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-12 pt-5">
                      <button class="btn btn-block text-white" style="height:50px; font-size: 20px; background-color: #fd5601;"  type="submit">Canjear codigo</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-3 col-md-12 p-5">
                <p class="h3" style="color: #fd5601;text-shadow: 0.1em 0.1em 0.1em #000!important;">Utiliza tu codigo aqui!!</p>
                <p class="h3 text-white" style="text-shadow: 0.1em 0.1em 0.1em #000!important;">Canjea el cupon para poder iniciar tu curso ahora!!</p>
            </div>
        </div>
</section>
  

 

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
</body>

<!-- start footer Area -->
<?php include "../Components/footer.php"; ?>
<!-- End footer Area -->

</html>