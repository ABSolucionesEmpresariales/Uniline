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

<?php }
}
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <title>Recuperar contraseña</title>
            <style>
                .centrado{
                    margin-top: 10%;
                    margin-left: 30%;
                    width: 400px;
                    height: 400px;
                }
               /*sm*/
                @media (min-width: 300px) {

                }
                @media (min-width: 375px) {

                }
                @media (min-width: 300px) {

                }
                @media (min-width: 300px) {

                }
                @media (min-width: 300px) {

                }
                @media (min-width: 300px) {

                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="border border-dark centrado">
                    <div>
                        <div class="">
                            <p>Contraseña nueva:</p>
                            <input type="text">
                        </div>
                        <div>
                            <p>Recuperar contraseñ:</p>
                            <input type="text">
                        </div>
                    </div>                    
                </div>
            </div>
        </body>
        </html>