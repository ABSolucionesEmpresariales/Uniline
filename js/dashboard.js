$(document).ready(function () {
    //lista_temas();
    lista();

    $(document).ready(function(){
        $(".cont-bloque").hide();
        $(".mostrar-tareas").hide();
    });

        /* RESPONSIVE DE CONTENIDOS ESPECIFICOS*/

    contenido = `
    <li class="nav-item rem-nav">
        <a class="nav-link active" data-toggle="tab" href="#contenido-cursos">Contenido del curso</a>
    </li>
            `;
    contenidoCom = `
        <li class="nav-item rem-nav">
            <a class="nav-link" data-toggle="tab" href="#contenido-comentarios">Comentarios del curso</a>
        </li>
            `;


    $("#video").on('ended', function () {
        $(this).attr('src', '../videos/Turntable - 10857.mp4');
    });


    $(document).on('click', '.spam', function () {
        controlId = $(this).attr("id");
        console.log(controlId);
        $("." + controlId).slideToggle("slow");
    });

    /* CALIFICACION DE CURSO*/

    $(document).on('click', '.estrella', function () {
        controlStart = $(this).attr("id");
        if (controlStart == 1 && $('#' + controlStart).hasClass("checked") == true && $('#2').hasClass("checked") == false) {
            $('#' + controlStart).removeClass('checked');
        } else {
            for (i = 1; i <= 5; i++) {
                if (i <= controlStart) {
                    $('#' + i).addClass('checked');
                } else {
                    $('#' + i).removeClass('checked');
                }
            }
        }
    });

    /* PINTAR CONTENIDO DE LAS ACTIVIDADES*/

/*     function lista_temas() {
        template = `<h4 style="padding: 1rem;" class="h4 text-center widget_title mb-0">Contenido del curso</h4>`;
        $.each(datos, function (i, item) {
            for (y = 0; y < datos[i].length; y++) {
                if (y == 0) {
                    template += `
                        <div class="demo row contenedor flex align-items-center cont-actividades">
                            <input type="checkbox" class="chk-examen" id="customCheck-examen-${i + 1}" name="example1">
                            <label for="customCheck-examen-${i + 1}" class="col-2 flex align-items-center"><span></span></label>
                            <a data-idexamen="${i + 1}" style="cursor: pointer;" id="span-${i + 1}" class="mostrar-examen col-10 nav-link font-actividades">${item[y]}</a>
                        </div>      
                    `;
                   
                } else if (y == 1) {
                    template += `
                    <div class="demo row contenedor flex align-items-center cont-actividades">
                        <input type="checkbox" id="customCheck-bloque-${i + 1}" name="example1">
                        <label id="bloque-${i + 1}" for="customCheck-bloque-${i + 1}" class="cont-bloque col-2 flex align-items-center customCheck-examen-${i + 1}"><span></span></label>
                        <a data-idactividad="${i + 1}" style="cursor: pointer;" id="span-${i + 1}" class="mostrar-actividad col-10 spam nav-link font-actividades">${item[y]}</a>
                    <div class="span-${i + 1}" style="display: none;">`;
                } else {
                    template +=
                    `<div class="demo row pt-1 m-0 flex align-items-center">
                        <input type="checkbox" id="customCheck${i + 1 + "-" + y}" name="example1">
                        <label id="tema-${i + 1}" for="customCheck${i + 1 + "-" + y}" class="cont-bloque col-3 text-justify pl-4 flex align-items-center customCheck-examen-${i + 1}"><span></span></label>
                        <a id="cont" class="col-9" style="cursor: pointer; font-family: 'Poppins:100', sans-serif; font-size: 14px; color: rgb(87, 87, 87);">${item[y]}</a>
                    </div>
                `;
                }
            }
            template += `
            <a data-idtarea="${i + 1}" id="mostrar-tareas" class="mostrar-tareas customCheck-examen-${i + 1}" href="#seccion-tareas">
                <h4 class="h5">Tareas del bloque</h4>
                <div class="container">
                    Hacer conexion a BD
                </div>
            </a>

            </div>
        </div>
        `;
        });
        $('.lista-curso-aside').html(template);
    } */
    
    function lista(){
        $.ajax({
            url: "../controllers/dashboard.php",
            type: "POST",
            data: "datos_lista=datos_lista",

            success: function (response) {
                console.log(response);
                datos = JSON.parse(response)
                console.log(datos);
                template = `<h4 style="padding: 1rem;" class="h4 text-center widget_title mb-0">Contenido del curso</h4>`;

                for(i = 0; i < datos.length; i++){
                    for(y = 0; y < datos[i].length; y++){
                         if(y == 0){
                            template += `
                                <div class="demo row contenedor flex align-items-center cont-actividades">
                                    <input type="checkbox" class="chk-examen" id="customCheck-examen-${i+"-"+y + 1}" name="example1">
                                    <label for="customCheck-examen-${i+"-"+y + 1}" class="col-2 flex align-items-center" style = "display:none;"><span></span></label>
                                    <a data-idexamenbase="${datos[i][0][0]}" style="cursor: pointer;" id="span-${i + 1}" class="mostrar-examen col-10 nav-link font-actividades">${datos[i][0][1]}</a>
                                </div>      
                            `;
                        }else if(y == 1){
                            template += `
                            <div class="demo row contenedor flex align-items-center cont-actividades">
                                    <input type="checkbox" id="customCheck-bloque-${i+"-"+y + 1}" name="example1">
                                    <label id="bloque-${i+"-"+ y + 1}" for="customCheck-bloque-${i+"-"+ y + 1}" class="cont-bloque col-2 flex align-items-center customCheck-examen-${i+"-"+y + 1}" style = "display:none;"><span></span></label>
                                    <a data-idbloquebase="${datos[i][1]}" data-idactividad="${i+"-"+ y + 1}" style="cursor: pointer;" id="span-${i +"-"+ y + 1}" class="mostrar-actividad col-10 spam nav-link font-actividades">${datos[i][2]}</a>
                                <div class="span-${i +"-"+ y + 1}" style="display: none;">`;
                            for(z = 0; z< datos[i][3].length; z++){
                                    template +=
                                    `<div class="demo row pt-1 m-0 flex align-items-center">
                                        <input type="checkbox" id="customCheck${i +"-"+ y + "-" + z}" name="example1">
                                        <label id="tema-${i+"-"+ y +"-"+z}" for="customCheck${i +"-"+ y + "-" + z}" class="cont-bloque col-3 text-justify pl-4 flex align-items-center customCheck-examen-${i+"-"+ y +"-"+z}" style = "display:none;"><span></span></label>
                                        <a data-idtemabase="${datos[i][3][z][0]}" id="cont" class="col-9" style="cursor: pointer; font-family: 'Poppins:100', sans-serif; font-size: 14px; color: rgb(87, 87, 87);">${datos[i][3][z][1]}</a>
                                     </div>
                                    `;  
                            }
                        }else if(y == 4){
                            for(z = 0; z< datos[i][4].length; z++){
                                template += `

                                        <div class="">
                                            <a data-idtareabase="${datos[i][4][0][0]}" data-idtarea="${y + 1}" id="mostrar-tareas" class="mostrar-tareas customCheck-examen-${y + 1}" href="#seccion-tareas">
                                                <h4 class="h5">Tareas del bloque</h4>
                                                <div class="ml-5">
                                                    ${datos[i][4][0][1]}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                `;
                            }                          
                        } 
                    }   
                }
               // console.log(template);
                $('.lista-curso-aside').html(template);
            }
        });
    }

    $(window).resize(function () {
        if ($(window).width() < 768) {

            if ($(".rem-nav").length != 1) {
                $(contenido).prependTo("#nav-barra");
                $(contenidoCom).appendTo("#nav-barra");
                $("#nav-status").removeClass("active");
                $("#descripcion").removeClass("active");
                $("#contenido-cursos").removeClass("fade");
                $("#contenido-cursos").addClass("active");
                $("#mov-div").detach().appendTo('#contenido-cursos');
                $("#mov-coments").detach().appendTo('#contenido-comentarios');
                $("#scroll-responsive").addClass("scroll");
                $("#nav-barra").addClass("scrollmenu");
                $("#scroll-responsive").css("height", "30rem");
                $("#contenido-cursos").css("height", "100%");
                $(".bg-color-lista").css("height", "170%");
                $("#navdash").removeClass("d-inline-flex");
                $("#tam-pantalla").css("height", "100%");
                $("#subir-tareas").removeClass("d-inline-flex");
            }

        }
        if ($(window).width() > 768) {
            $("#nav-status").addClass("active");
            $("#descripcion").addClass("active");
            $(".rem-nav").remove();
            $("#mov-div").detach().appendTo('#div-original');
            $("#mov-coments").detach().appendTo('#div-original-comentarios');
            $("#scroll-responsive").removeClass("scroll");
            $("#nav-barra").removeClass("scrollmenu");
            $("#scroll-responsive").css("height", "15rem");
            $(".bg-color-lista").css("height", "100%");
            $("#tam-pantalla").css("height", "50%");
            $("#subir-tareas").addClass("d-inline-flex");

        }
    });

    if ($(window).width() < 768) {
        $(contenido).prependTo("#nav-barra");
        $(contenidoCom).appendTo("#nav-barra");
        $("#mov-div").detach().appendTo('#contenido-cursos');
        $("#mov-coments").detach().appendTo('#contenido-comentarios');
        $("#nav-status").removeClass("active");
        $("#descripcion").removeClass("active");
        $("#contenido-cursos").removeClass("fade");
        $("#contenido-cursos").addClass("active");
        $("#scroll-responsive").addClass("scroll");
        $("#nav-barra").addClass("scrollmenu");
        $("#scroll-responsive").css("height", "30rem");
        $("#contenido-cursos").css("height", "100%");
        $(".bg-color-lista").css("height", "170%");
        $("#navdash").removeClass("d-inline-flex");
        $("#tam-pantalla").css("height", "100%");
        $("#subir-tareas").removeClass("d-inline-flex");
    }
    if ($(window).width() > 768) {
        $("#nav-status").addClass("active");
        $("#descripcion").addClass("active");
        $(".rem-nav").remove();
        $("#mov-div").detach().appendTo('#div-original');
        $("#mov-coments").detach().appendTo('#div-original-comentarios');
        $("#scroll-responsive").removeClass("scroll");
        $("#nav-barra").removeClass("scrollmenu");
        $("#scroll-responsive").css("height", "15rem");
        $(".bg-color-lista").css("height", "100%");
        $("#tam-pantalla").css("height", "50%");
        $("#subir-tareas").addClass("d-inline-flex");

    }

    $(document).ready(function () {

        var height = $(window).height();

        $('#tam-pantalla').height(height);
    });



    /* MOSTRAR AREA DE TAREAS   */
    $('#seccion-tareas').hide();

    $(".mostrar-tareas").on("click", function () {
        $('#seccion-tareas').slideToggle();
    });

    $('.mostrar-tareas').on('click', function (e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: $('#seccion-tareas').offset().top }, 1000);
    });

    /* VERIFICAR SI ESTA MARCADA EL CHECKBOX  */

    
    

    $(document).on('click', '.chk-examen', function () {
        ctrolId = $(this).attr("id");
        console.log(ctrolId);
        if ($("#" + ctrolId).is(':checked')) {
            $("." + ctrolId).slideToggle();

        } else {
            $("." + ctrolId).slideToggle();
        }
    });

    $(document).on('click','.cont-bloque',function(){
        console.log("llehoestamadre");
        $(this).show();
    });

    // CAMBIAR A SELECCIONADO CUANDO TIENE ALGO EL INPUT
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // VALORACION DE ESTRELLAS PARA CALIFICAR

    $(".clasificacion").find("input").change(function(){
        var valor = $(this).val()
        $(".clasificacion").find("input").removeClass("activo")
        $(".clasificacion").find("input").each(function(index){
           if(index+1<=valor){
            $(this).addClass("activo")
           }          
        })
        $("#btn-cali").on("click", function () {
            calificacion = `
            <div class="calificaciones mr-1">${valor}</div>`;
            $(calificacion).appendTo("#cali");
            $('#btn-calificar-tabla').attr("disabled", true);
            $('#btn-calificar-tabla').text("Calificado");
        });
      })
      
      $(".clasificacion").find("label").mouseover(function(){
        var valor = $(this).prev("input").val()
        $(".clasificacion").find("input").removeClass("activo")
        $(".clasificacion").find("input").each(function(index){
           if(index+1<=valor){
            $(this).addClass("activo")
           }
           
        })
      })

      // MOSTRAR EXAMEN AL HACER CLIC EN EL ENLACE

      $(document).on("click",".mostrar-examen", function () {
        console.log($(this).data("idexamenbase"));
            $("#cambio-examen-video").addClass("d-none");
            contExamen = `
                <div id="contenido-examen" class="container p-5" style="height: 100%;">
                    <br>
                    <h3 class="h3">Este es un examen diagnostico para saber tus conocimientos previos de este curso</h3>
                    <hr>
                    <div class="pregresp flex justify-content-center d-inline-block">
                        <div class="pregunta">
                            1. ¿Crees que HTML es una buena tecnología?<br />
                        </div>
                        <div class="respuestas d-inline-flex flex justify-content-between">
                            <li class="list-inline p-2"><input type="radio" name="preg1" value="1" /> Sí</li>
                            <li class="list-inline p-2"><input type="radio" name="preg1" value="2" /> No</li>
                            <li class="list-inline p-2"><input type="radio" name="preg1" value="3" /> es un lenguaje de programacion :v</li>
                        </div>
                    </div>
                    <hr>
                </div>`;
            $(contExamen).appendTo("#cambiar-a-examen"); 
    });

    // MOSTRAR ACTIVIDAD AL HACER CLIC EN EL ENLACE

    $(document).on("click",".mostrar-actividad", function () {
        console.log($(this).data("idactividad"));
        if($(this).data("idactividad") == 1){
            $("#cambio-examen-video").removeClass("d-none");
            $("#contenido-examen").remove();
        }
    });

    // MOSTRAR ACTIVIDAD AL COMPLETAR EL EXAMEN

    $(document).on("click",".ir-actividad", function () {
        $("#cambio-examen-video").removeClass("d-none");
        setTimeout(function() {$("#contenido-examen").remove();},200);
        
        
    });
});