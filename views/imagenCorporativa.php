<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Imagen corporativa</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <script src="https://js.stripe.com/v3/"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
    <script src="../js/registro16.js"></script>
    <script src="../js/login.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
         @media (min-width: 377px) {
            .contenido {
            margin-left: 10rem;
            margin-right: 10rem;
            padding-left:5rem;
            padding-right:5rem;
        }
                }
        a{
            font-size: 15px;
        }
        p {
            text-align: justify;
            color: black;
        }

        h1 {
            text-align: center;
            font-weight: bold;
        }
        h5 {

            font-size: 20px;
        }
        body {
            margin: 0;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }
        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }
        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        #contenedorimg img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 90%;
        }

        .contenido {

            padding-left:5rem;
            padding-right:5rem;
        }

        .foter {
            color: white;
        }
        .texto{
            padding-left: 1rem;
            padding-right: 1rem;
            line-height: 20px;
            font-size: 16px;
        }
        .hover{
            position: relative;
            display: inline-block;
            background-color: green;
            margin-right: 10px;
            transition: all 0.4s ease;
        }
        .hover:hover {
            transform: scale(1.1);
            margin-right: 40px;
            margin-left: 26px;
        }
    </style>
</head>

<body>
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


    <div class="card contenido">
        <div class="card-body">
            <div id="contenedorimg" style="margin-top: 3rem;">
                <img class="img-fluid" src="../img/imagenCorporativa.png">
            </div>
            <br>
        </div>
        <div class="text-center">
            <div id="divparrafo1" style=" margin-bottom: 5rem;">
                <h3 style="font-weight: bold;">Nuestro Sueño </h3>
                    <h3 class="">Ayudar a trabajadores, empresarios, emprendedores, 
                        profesores, alumnos y toda persona que quiera desarrollarse y 
                        crecer profesionalmente a través de nuestros cursos en línea. 
                    </h3>
                    <br>
                    <h3 style="font-weight: bold">Valores</h3>
                    <br>
                    <div class="row text-center justify-content-between d-lg-flex d-sm-inline-block">
                        
                       <div class="col-lg-3 text-white hover" style="background: #08917a; border-radius: 1rem;">
                        <h3>Coherencia</h3>
                        <i class="fas fa-puzzle-piece text-white" style="font-size: 80px"></i>
                        <br>
                        <br>
                            <p class="texto text-white">Cada curso ofrecido dentro de nuestra plataforma será por una 
                                persona experta en el área la cual tiene conocimientos y experiencia, 
                                la mezcla entre estas dos partes nos permite ofrecer cursos con un alto 
                                contenido de valor profesional.  
                            </p>
                       </div>

                       <div class="col-lg-3 text-white hover"  style="background: #016693; border-radius: 1rem;">
                            <h3>Innovación</h3>
                            <i class="far fa-lightbulb text-white" style="font-size: 80px"></i>
                            <br>
                            <br>
                            <p class="texto text-white">Siempre en búsqueda de ofrecer la mejor experiencia hacia el usuario, 
                                en UNILINE nos dedicamos a crear metodologías tanto de navegación como
                                de aprendizaje para ofrecer una experiencia agradable en cada segundo 
                                que nos visualices.  
                            </p>
                        </div>

                        <div class="col-lg-3 text-white hover" style="background: #014765; border-radius: 1rem;">
                            <h3>Actualización</h3>
                            <i class="fas fa-redo-alt text-white" style="font-size: 80px"></i>
                            <br>
                            <br>
                            <p class="texto text-white">Trabajaremos todos los días en la actualización de contenido, 
                                buscando ofrecer las mejores herramientas a cualquiera que tome 
                                uno de nuestros cursos, con la finalidad de que pueda sentir un 
                                verdadero cambio al termino de estos.  
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>

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


</body>

</html>