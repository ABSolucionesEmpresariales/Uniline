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
    <link rel="stylesheet" href="../css/stylo-responsive-editPerfil.css">

    <!--
    JS
    ============================================= -->
    
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
 
       
  </head>
  <body>
    <header id="header" id="home">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                <div id="logo" style="height: 10%;">
                    <a href="index.php"><img src="../img/uniline2.png" width="20%" alt="" title="" /></a>
                  </div>
            </div>
          </div>
        </div>
    </div>
    </header><!-- #header -->

    <!-- Editar perfil -->
    <form class="form-wrap" id="actualizar-perfil">
    <div class="page_section">
        <div class="container">
          <div class="row justify-content-center">
  
            <!-- Editar foto de perfil -->
            <div class="col-lg-3 course_box load-picture">
              <div class="card">
                <img id="FotoPerfil" class="rounded-circle" width="260" height="260" src=<?php echo $_SESSION['imagen_perfil']?> alt="foto de perfil">    
                <div id="cargaFoto" class="custom-file">
                  <input type="file" name="Fimagen" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label h5" for="inputGroupFile01">Editar foto de perfil</label>
                </div>      
              </div>
            </div>

            <div id="alertas" class="alert alert-danger fixed-top text-center" style="max-height:50px; display: none;">
            </div>
            <!-- Popular Course Item -->
            <div class="col-lg-5 course_box">
              <div class="form">
                <div>
                      <div class="input-group m-1">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" id="registrar-nombre" class="form-control text-success" name="TNombre" placeholder="Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Nombre'" >
                      </div>
                      <div class="input-group m-1">
                        <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                        <input type="phone" id="registrar-tel" class="form-control text-success" name="TTelefono" placeholder="Telefono" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu telefono'" >
                      </div>
                      <div class="input-group m-1">
                        <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="registrar-correo" class="form-control text-success" name="TEmail" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Correo'" >
                      </div>
                      <div class="input-group m-1">
                        <span class="input-group-addon"><i class="fas fa-sort-numeric-up-alt"></i></span>
                        <input type="text" id="registrar-edad" class="form-control text-success" name="TEdad" placeholder="Edad" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu edad'" >
                      </div>
                      <select id="registrar-grado" name="TGrado" class="form-control m-2" style="height: 35px!important">
                        <option value="">Selecciona grado de estudios</option>
                        <option value="Secundaria">Secundaria</option>
                        <option value="Bachillerato">Bachillerato</option>
                        <option value="Universidad">Universidad</option>
                        <option value="Superior">Superior</option>
                      </select >  
                      <select id="registrar-estado" name="TEstado" class="form-control m-2" style="height: 35px!important">
                      </select >
                    <div class="input-group m-1">
                      <span class="input-group-addon"><i class="fas fa-flag"></i></span>
                      <input type="text" id="registrar-municipio" class="form-control text-success" name="TMunicipio" placeholder="Municipio" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu municipio'" >
                    </div>
                      <select id="verifi-trabajo" class="form-control" style="height: 35px!important">
                        <option value="">Trabajo</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                      </select >
                    <div class="show-date" style="display: none;">
                      <div class="input-group m-1">
                        <span class="input-group-addon"><i class="fas fa-briefcase"></i></span>
                        <input type="text" id="registrar-puesto" class="form-control text-success" name="TPuesto" placeholder="Puesto de trabajo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Puesto de trabajo'" >
                      </div>
                      <div class="input-group m-1">
                        <span class="input-group-addon"><i class="fas fa-address-book"></i></span>
                        <input type="text" id="registrar-Descripcion" class="form-control text-success" name="TDescripcion" placeholder="Descripcion del Trabajo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Descripcion del Trabajo'" >
                      </div>
                    </div>
                      <p id="mostrarPass" class="h4 text-center" style="cursor: pointer;">Si deseas cambiar tu contraseña haz clic aqui</p>
                      <div id="cambiarPass" class="ocultar text-center" style="display: none">
                      <p>Ingresa tu contrasena actual para poder editar la contrasena</p>
                      <div class="input-group m-1">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" id="registrar-pass" class="form-control text-success" name="TPass" placeholder=" Tu constraseña actual" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu Contraseña actual'" >
                      </div>
                      <div class="input-group m-1">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" id="registrar-passNew" class="form-control text-success" disabled name="TPassNew" placeholder="Tu nueva constraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tu nueva Contraseña'" >
                      </div>
                      <div class="alert alerta-pass" role="alert" style="display: none;">
                      </div>
                      </div>
                    
                    <button id="actualizar" class="btn-primary primary-btn text-uppercase btn-sm-block" type="submit" name="submit">Actualizar perfil</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    


    


    <!-- start footer Area -->
    <footer class="footer-area">
        <div class="row footer-social text-center border-bottom ">
               <a class="h1 text-primary col-4 facebook m-0 pt-5 pb-5" href="#">
                  <p>Ya nos sigues ?</p>
                  <i class="fab fa-facebook"></i>
              </a>
              <div class="col-4 pt-5 pb-5">
                <h4 class="text-center text-primary">Contactanos!!</h4>
                <p class="text-center">Te gustaria compartir tu conocimientos, impartiendo clases, contactanos y prodras hacerlo!!</p>
              </div>
              <a class="h1 text-primary col-4 whatsapp m-0 pt-5 pb-5" href="#">
              <p>Contactanos por whatsapp</p>
                <i class="fab fa-whatsapp"></i>
              </a>
        </div>
        <div class="row align-items-center mt-3 justify-content-between">
          <div class="hy-auto m-0 col-sm-block">
            <p class="mb-0">Copyright &copy; <script>document.write(new Date().getFullYear());</script>
            All rights reserved by AB Soluciones Empresariales .
              
            </p>
            <ul class="list-inline mt-0 clock text-center">
              <li class="list-inline-item">
                <a href="#">Politicas de Privacidad</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Imagen Corporativa</a>
              </li>
            </ul>
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
