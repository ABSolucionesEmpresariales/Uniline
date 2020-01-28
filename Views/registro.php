<?php
include '../controllers/registro-datos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    
</head>
<body>

<div class="container">
    <div class="contenedor-registro flex text-center">
        <h2>Registro a la Base de Datos</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Profesores</a></li>
            <li><a data-toggle="tab" href="#menu1">Cursos</a></li>
            <li><a data-toggle="tab" href="#menu2">Bloques</a></li>
            <li><a data-toggle="tab" href="#menu3">Temas</a></li>
            <li><a data-toggle="tab" href="#menu4">Examenes</a></li>
            <li><a data-toggle="tab" href="#menu5">Tares</a></li>
        </ul>

        <div class="tab-content" >
            <div id="home" class="tab-pane fade in active">
                <h3>Registro de Profesores</h3>
                <hr>
                <div class="form col-lg-5">
                    <form class="form-wrap" id="registro-profesor" method="post">
                        <input type="text" id="registrar-nombre" class="form-control" name="TNombre" placeholder="Nombre">
                        <input type="text" id="registrar-edad" class="form-control" name="TTelefono" placeholder="Edad">
                        <select id="registrar-grado" name="TGrado" class="form-control m-1" style="height: 35px!important">
                            <option value="">Selecciona grado de estudios</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Bachillerato">Bachillerato</option>
                            <option value="Universidad">Universidad</option>
                            <option value="Superior">Superior</option>
                        </select > 
                        <input type="phone" id="registrar-tel" class="form-control" name="TPass" placeholder="Telefono">
                        <input type="email" id="registrar-email" class="form-control" name="TNombre" placeholder="Email">
                        <input type="password" id="registrar-pass" class="form-control" name="TTelefono" placeholder="Password">
                        <select id="registrar-estado2" name="TEstado" class="form-control m-1" style="height: 35px!important">
                        </select >
                        <input type="text" id="registrar-municipio" class="form-control" name="TNombre" placeholder="Municipio">
                        <input type="text" id="registrar-profesion" class="form-control" name="TTelefono" placeholder="Profesion">
                        <br>
                        <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                    </form>
                </div>
                <div class="col-5">
                    <div class="imagen">
                        <img id="Foto-perfil" class="rounded-circle" width="260" height="260" src="../img/users/perfil.png" alt="foto de profesor">
                        <input type="file" name="Fimagen" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    </div> 
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
            <h3>Registro de Cursos</h3>
                <hr>
                <div class="form col-lg-5">
                    <form class="form-wrap" id="registro" method="post">
                        <input type="text" id="nombre-curso" class="form-control" name="TNombre" placeholder="Nombre del curso">
                        <input type="text" id="descripcion-curso" class="form-control" name="TTelefono" placeholder="Descripcion del curso">
                        <input type="file" id="video-curso" class="form-control" name="TPass" placeholder="video">
                        <input type="email" id="registrar-nombre" class="form-control" name="TNombre" placeholder="Email">
                        <input type="password" id="registrar-tel" class="form-control" name="TTelefono" placeholder="Password">
                        <select id="registrar-estado2" name="TEstado" class="form-control m-1" style="height: 35px!important">
                        </select >
                        <input type="text" id="registrar-nombre" class="form-control" name="TNombre" placeholder="Municipio">
                        <input type="text" id="registrar-tel" class="form-control" name="TTelefono" placeholder="Profesion">
                        <br>
                        <button class="btn btn-primary primary-btn text-uppercase" type="submit" name="submit">Registrar</button>
                    </form>
                </div>
                <div class="col-5">
                    <div class="imagen">
                        <img id="FotoCurso" class="rounded-circle" width="260" height="260" src="../img/anadir.png" alt="foto de profesor">
                        <input type="file" name="Fimagen" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    </div> 
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
            <div id="menu4" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
            <div id="menu5" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>
        
        
    </div>
</div>

<script src="../js/registerpage.js"></script>
    
</body>
</html>