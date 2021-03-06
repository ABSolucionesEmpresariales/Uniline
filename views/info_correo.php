<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Recuperar contraseña</title>
            <style>
                        
                       /*sm*/
                        @media (min-width: 300px) {
                            .responsive{
                                width: 100%; 
                                height: 75%; 
                                border-radius: 1rem;
                            }
        
                        }
                        @media (min-width: 377px) {
                            .responsive{
                                width: 100%; 
                                height: 95%; 
                                border-radius: 1rem;
                            }
        
                        }
                        @media (min-width: 768px) {
                            .responsive{
                                width: 100%; 
                                height: 90%; 
                                border-radius: 1rem;
                            }
        
                        }
                        @media (min-width: 992px) {
                            .responsive{
                                width: 40%; 
                                height: 90%; 
                                border-radius: 1rem;
                            }
        
                        }
                        @media (min-width: 1024px) {
                            .responsive{
                                width: 40%; 
                                height: 95%; 
                                border-radius: 1rem;
                            }
        
                        }
                    </style>
        
            <!--
            CSS
            ============================================= -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
            <link rel="stylesheet" href="../css/font-awesome.min.css">
            <link rel="stylesheet" href="../css/bootstrap.css">
            <link rel="stylesheet" href="../css/main.css">
            <link rel="stylesheet" href="../css/style.css">
        
        </head>
        
        
        <body class="pass-area">
                <header id="header">
        <div class="container main-menu">
            <div class="row justify-content-between">
                <div id="logo" class="col-lg-4 d-none d-lg-block mr-auto">
                    <a href="mainpage.php"><img id="logo-imagen" src="../img/uniline3.png" width="40%" alt="" title="" /></a>
                </div>
                <div class="float-right">
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <?php
                            if (isset($_SESSION['acceso'])) {
                            ?>
                                <li class="mt-3"><a class="text-center" href="mainpage.php" style="font-size: 14px; text-decoration: none;">Inicio</a></li>
                                <li class="mt-3"><a class="text-center" href="mainpage.php#all-cursos" style="font-size: 14px; text-decoration: none;">Cursos disponibles</a></li>
                                <li class="mt-3"><a class="text-center" href="misCursos.php" style="font-size: 14px; text-decoration: none;">Mis cursos</a></li>
                                <li class="mt-3"><a class="text-center" href="mainpage.php#home-contacto" style="font-size: 14px; text-decoration: none;">Contacto</a></li>
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
                                <li class="mt-3"><a class="text-center" href="mainpage.php#all-cursos" style="font-size: 14px; text-decoration: none;">Cursos disponibles</a></li>
                                <li class="mt-3"><a id="registro-user" data-toggle="modal" class="text-center" data-target="#modal-registro" href="#" style="font-size: 14px; text-decoration: none;">Registrate</a></li>
                                <li class="mt-3"><a class="text-center" href="mainpage.php#home-contacto" style="font-size: 14px; text-decoration: none;">Contacto</a></li>
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
            <div class="overlay-bg">
                <div class="container fullscreen flex align-items-center justify-content-center">
                    <div id="ventana" class="align-items-center justify-content-center bg-white responsive p-5">
                    <div class="imagen text-center">
                        <img class="img-fluid" src="../img/uniline3.png" alt="uniline" width="60%">
                    </div>
                    <br>
                    <p>Te hemos enviado un correo para verificar tu cuenta.</p>

                    <p>Una vez confirmada, podrás acceder a UNILINE.</p>

                    <p>En caso de que no veas nuestro correo, puedes revisar tu bandeja
                        de correo no deseado o SPAM.</p>

                    <p>Si aún tienes problemas, comunícate con nosotros o envíanos un
                        correo a <span class="text-primary">atencionalcliente@escuelaalreves.com</span> 
                        tu eres muy importante para nosotros, permítenos ser parte de ti.
                    </p>
                    <p>Atte: Equipo de UNILINE</p>
                    </div>
                </div>
            </div>
        
        
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            
            <script src="../js/jquery.js"></script>
            <script src="../js/jquery-3.2.1.min.js"></script>
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
            <script src="../js/restPass11.js"></script>
            
                <footer class="footer-area">
        <div class="align-items-center justify-content-between">
            <div class="row">
                <div class="col-lg-4 col-sm-12 text-center mt-3 mb-4">
                    <a class="" href="mainpage.php"><img src="../img/uniline2.png" width="25%" alt="" title="" /></a>
                </div>
                <div class="col-lg-4 col-sm-12 mb-4 mt-3 align-bottom text-center">
                    <p class="mb-0 foter">&copy; AB Soluciones Empresariales <script>
                            document.write(new Date().getFullYear());
                        </script>
                        All rights reserved.
                    </p>
                    <ul class="list-inline  mt-0 clock text-center">
                        <li class="list-inline-item">
                            <a href="avisodeprivacidad.php">Politicas de Privacidad</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="imagenCorporativa.php">Imagen Corporativa</a>
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
        </body>
        
        </html>