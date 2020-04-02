<?php
session_start();
include '../controllers/sesion.php';
$_SESSION['idcurso'] = $_GET['idcurso'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción de los cursos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


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
    <link rel="stylesheet" href="../css/stylo.css">
    <link rel="stylesheet" href="../css/style-descripcion-cursos.css">
    <link rel="stylesheet" href="../css/stylo-responsive-editPerfil.css">
    <link rel="stylesheet" href="../css/icons/all.css">

    <!--
        JS
        ============================================= -->

    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>

</head>

<body>
    <header id="header">
        <div class="header-top">
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <div id="logo" class="col-lg-4 d-none d-lg-block mr-auto">
                        <a href="mainpage.php"><img src="../img/uniline2.png" width="30%" alt="" title="" /></a>
                    </div>
                    <div class="float-right">
                        <nav id="nav-menu-container">
                            <ul class="nav-menu">
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
                                <div class="dropdown-menu opciones-perfil">
                                    <li><a class="enlaces-perfil" href="editProfile.php">Mi perfil</a></li>
                                    <li><a class="enlaces-perfil" href="../controllers/sesion-destroy.php?cerrar=true">Cerrar sesión</a></li>
                                </div>
                            </ul>
                        </nav><!-- #nav-menu-container -->
                    </div>
                </div>
            </div>
        </div>
    </header><!-- #header -->

    <div class="container-fluid relative" style="margin-top: 4rem;">
        <div class="contenido-titulo banner-area row">
            <div class="overlay overlay-bg"></div>
            <div class="col-3">
                <!-- imagen del curso -->
            </div>
            <div class="col-9 flex align-items-center">
                <div">
                    <div id="titulo-curso" class="titulo-curso">
                        <!-- titulo del curso -->
                    </div>
                    <div class="descripcion-curso">
                        <h2 class="h4 text-white">(descripcion pequeña opcional)</h2>
                    </div>
                    <div class="informacion-curso">
                        <h2 class="h4 text-white">(algunos datos del curso opcional)</h2>

                    </div>
                </div">

            </div>
        </div>
        <div class="contenido-informacion">
            <div class="row">
                <div class="detalles-curso col-3 pt-3">
                    <div id="informacion-curso" class="sticky">
                        <!-- informacion del curso -->
                    </div>
                </div>
                <div class="col-9 row">
                    <div id="contenido-video" class="mt-3 col-8">
                        <!-- Contenido video y descripcion -->
                    </div>
                    <div class="contenido-curso text-center col-4">
                        <div class="titulo-contenido">
                            <h2 class="h3 text-white">Contenido del curso</h2>
                        </div>
                        <br>
                        <div class="contenido-informacion">
                            <br>
                            <ul id="contenido-contenido">

                            </ul>
                            <!-- Contenido -->
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
                    <p class="mb-0">&copy; AB Soluciones Empresariales <script>
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
    <script src="../js/descripcion-cursos.js"></script>

    <!-- styles course -->
    <script src="../js/popper.js"></script>
</body>

</html>