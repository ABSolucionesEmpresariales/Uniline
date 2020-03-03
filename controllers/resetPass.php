<?php
    use Modelos\Conexion;
    require_once '../Modelos/Conexion.php'; 
    session_start();

if(isset($_GET['vkey'])){
    $conexion = new Modelos\Conexion();
    $vkey=$_GET['vkey'];
    $resultado = $conexion->consultaPreparada(
        array("",$_GET['correo'],$_GET['vkey']),
        "INSERT INTO lista_negra_correos (id,correos_usuario,vkey_negro) VALUES (?,?,?)",
        1,
        "iss",
        false,
        null
    );

      if($resultado == 1){?>
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
                        height: 60%; 
                        border-radius: 1rem;
                    }

                }
                @media (min-width: 377px) {
                    .responsive{
                        width: 100%; 
                        height: 70%; 
                        border-radius: 1rem;
                    }

                }
                @media (min-width: 768px) {
                    .responsive{
                        width: 100%; 
                        height: 80%; 
                        border-radius: 1rem;
                    }

                }
                @media (min-width: 992px) {
                    .responsive{
                        width: 40%; 
                        height: 80%; 
                        border-radius: 1rem;
                    }

                }
                @media (min-width: 1024px) {
                    .responsive{
                        width: 40%; 
                        height: 80%; 
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
    <div class="overlay-bg">
        <div class="container fullscreen flex align-items-center justify-content-center">
            <div id="ventana" class="align-items-center justify-content-center bg-white responsive">               
                    <div class="imagen text-center">
                    <img class="img-fluid" src="../img/uniline3.png" alt="uniline" width="60%" style="margin-top: 1rem;">
                    </div>
                    <br>
                    <div class="contenido text-center">
                        <div>
                            <p style="font-weight: bold">Contraseña nueva:</p>
                            <input id="new-pass" type="text"  class="form-control" style="max-width: 15rem; margin-left: auto; margin-right: auto;">
                        </div>
                        <div>
                            <p style="font-weight: bold">Verificar contraseña:</p>
                            <input id="confirm-new-pass" type="text"  class="form-control" style="max-width: 15rem; margin-left: auto; margin-right: auto;">
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>               
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
<?php }
}
?>
