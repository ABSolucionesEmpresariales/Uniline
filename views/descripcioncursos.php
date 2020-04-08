<?php
session_start();
$_SESSION['idcurso'] = $_GET['idcurso'];
$pagina = "general";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../controllers/metadatos.php";
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!-- #Scripts -->
    <?php include "../Components/scripts.php"; ?>
    <script src="../js/descripcion-cursos.js"></script>
    <script src="../js/registro.js"></script>
    <script src="../js/login9.js"></script>
    <!-- #Scripts -->

 

</head>

<body>
    <!-- #header -->
    <?php include "../Components/header.php"; ?>
    <!-- #header -->

    <div class="container-fluid relative" style="margin-top: 4rem;">
        <div class="contenido-titulo banner-area row">
            <div class="overlay overlay-bg"></div>
            <div class="d-sm-block d-lg-flex">
                <div id="imagen-curso" class="col-12 col-lg-3">
                    <!-- imagen del curso -->
                </div>
                <div class="col-12 col-lg-9 flex align-items-center">
                    <div">
                        <div id="titulo-curso" class="titulo-curso">
                            <!-- titulo del curso -->
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contenido-informacion">
        <div class="row">
            <div class="d-sm-block d-lg-flex mx-lg-5">
                <div class="detalles-curso col-12 col-lg-3 pt-3 px-5">
                    <div class="sticky">
                        <div id="informacion-curso">
                            <!-- informacion del curso -->
                        </div>
                        <hr>
                        <h3 class="text-center">¡Compártelo con tus amigos!</h2>
                        <div class="mt-3 text-center">
                            <a class="whatsapp" href="whatsapp://send?text=https://unilineprueba.000webhostapp.com/views/descripcioncursos.php?idcurso=<?php echo $_SESSION['idcurso'] ?>"><i class="fab fa-whatsapp"></a></i>
                            <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Funilineprueba.000webhostapp.com%2Fviews%2Fdescripcioncursos.php%3Fidcurso%3D<?php echo $_SESSION['idcurso'] ?>&layout=button&size=large&width=103&height=28&appId" width="103" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div id="contenido-video" class="mt-3">
                        <!-- Contenido video y descripcion -->
                    </div>
                </div>
                <div class="contenido-curso text-center col-12 col-lg-3">
                    <div class="titulo-contenido">
                        <h3 class="text-white">Contenido del curso</h2>
                    </div>
                    <br>
                    <div class="contenido-informacion">
                        <br>
                        <ul id="contenido-contenido">
                            <!-- Contenido -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- start footer Area -->
<?php include "../Components/footer.php"; ?>
<!-- End footer Area -->

</html>