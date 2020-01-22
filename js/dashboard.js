$(document).ready(function () {
    lista_temas();

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

    function lista_temas() {
        datos_actividad = ["Examen diagnostico Previo", "Activiad 1.  Creacion de bases de datos en MySQL y PHP",
            "Tema 1.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 1.2 .- la mota no es adiccion",
            "Tema 1.3 .- la mota no es adiccion",
            "Tema 1.4 .- la mota no es adiccion",
            "Tema 1.5 .- la mota no es adiccion",
            "Tema 1.6 .- la mota no es adiccion",
            "Tema 1.7 .- la mota no es adiccion",
        ];
        datos_actividad2 = ["Examen diagnostico Previo", "Activiad 2.  Creacion de bases de datos",
            "Tema 2.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 2.2 .- la mota no es adiccion",
            "Tema 2.3 .- la mota no es adiccion",
            "Tema 2.4 .- la mota no es adiccion",
            "Tema 2.5 .- la mota no es adiccion",
            "Tema 2.6 .- la mota no es adiccion",
            "Tema 2.7 .- la mota no es adiccion",
        ];
        datos_actividad3 = ["Examen diagnostico Previo", "Activiad 3.   Creacion de bases de datos",
            "Tema 3.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 3.2 .- la mota no es adiccion",
            "Tema 3.3 .- la mota no es adiccion",
            "Tema 3.4 .- la mota no es adiccion",
            "Tema 3.5 .- la mota no es adiccion",
            "Tema 3.6 .- la mota no es adiccion",
            "Tema 3.7 .- la mota no es adiccion",
        ];
        datos_actividad4 = ["Examen diagnostico Previo", "Activiad 4.   Creacion de bases de datos",
            "Tema 4.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 4.2 .- la mota no es adiccion",
            "Tema 4.3 .- la mota no es adiccion",
            "Tema 4.4 .- la mota no es adiccion",
            "Tema 4.5 .- la mota no es adiccion",
            "Tema 4.6 .- la mota no es adiccion",
            "Tema 4.7 .- la mota no es adiccion",
        ];
        datos_actividad5 = ["Examen diagnostico Previo", "Activiad 5.   Creacion de bases de datos",
            "Tema 5.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 5.2 .- la mota no es adiccion",
            "Tema 5.3 .- la mota no es adiccion",
            "Tema 5.4 .- la mota no es adiccion",
            "Tema 5.5 .- la mota no es adiccion",
            "Tema 5.6 .- la mota no es adiccion",
            "Tema 5.7 .- la mota no es adiccion",
        ];
        datos_actividad6 = ["Examen diagnostico Previo", "Activiad 6.   Creacion de bases de datos",
            "Tema 6.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 6.2 .- la mota no es adiccion",
            "Tema 6.3 .- la mota no es adiccion",
            "Tema 6.4 .- la mota no es adiccion",
            "Tema 6.5 .- la mota no es adiccion",
            "Tema 6.6 .- la mota no es adiccion",
            "Tema 7.7 .- la mota no es adiccion",
        ];
        datos_actividad7 = ["Examen diagnostico Previo", "Activiad 7.   Creacion de bases de datos",
            "Tema 7.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 7.2 .- la mota no es adiccion",
            "Tema 7.3 .- la mota no es adiccion",
            "Tema 7.4 .- la mota no es adiccion",
            "Tema 7.5 .- la mota no es adiccion",
            "Tema 7.6 .- la mota no es adiccion",
            "Tema 7.7 .- la mota no es adiccion",
        ];
        datos_actividad8 = ["Examen diagnostico Previo", "Activiad 8.   Creacion de bases de datos",
            "Tema 8.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 8.2 .- la mota no es adiccion",
            "Tema 8.3 .- la mota no es adiccion",
            "Tema 8.4 .- la mota no es adiccion",
            "Tema 8.5 .- la mota no es adiccion",
            "Tema 8.6 .- la mota no es adiccion",
            "Tema 8.7 .- la mota no es adiccion",
        ];
        datos_actividad9 = ["Examen diagnostico Previo", "Activiad 9.   Creacion de bases de datos",
            "Tema 9.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 9.2 .- la mota no es adiccion",
            "Tema 9.3 .- la mota no es adiccion",
            "Tema 9.4 .- la mota no es adiccion",
            "Tema 9.5 .- la mota no es adiccion",
            "Tema 9.6 .- la mota no es adiccion",
            "Tema 9.7 .- la mota no es adiccion",
        ];
        datos_actividad10 = ["Examen diagnostico Previo", "Activiad 10.   Creacion de bases de datos",
            "Tema 8.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 8.2 .- la mota no es adiccion",
            "Tema 8.3 .- la mota no es adiccion",
            "Tema 8.4 .- la mota no es adiccion",
            "Tema 8.5 .- la mota no es adiccion",
            "Tema 8.6 .- la mota no es adiccion",
            "Tema 8.7 .- la mota no es adiccion",
        ];
        datos_actividad11 = ["Examen diagnostico Previo", "Activiad 11.   Creacion de bases de datos",
            "Tema 8.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
            "Tema 8.2 .- la mota no es adiccion",
            "Tema 8.3 .- la mota no es adiccion",
            "Tema 8.4 .- la mota no es adiccion",
            "Tema 8.5 .- la mota no es adiccion",
            "Tema 8.6 .- la mota no es adiccion",
            "Tema 8.7 .- la mota no es adiccion",
        ];

        datos = [datos_actividad, datos_actividad2, datos_actividad3, datos_actividad4, datos_actividad5, datos_actividad6, datos_actividad7, datos_actividad8, datos_actividad9, datos_actividad10, datos_actividad11];
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
    }

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

   
    $(".cont-bloque").hide();
    $(".mostrar-tareas").hide();
    
    

    $(document).on('click', '.chk-examen', function () {
        ctrolId = $(this).attr("id");
        console.log(ctrolId);
        if ($("#" + ctrolId).is(':checked')) {
            $("." + ctrolId).slideToggle();

        } else {
            $("." + ctrolId).slideToggle();
        }
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
        console.log($(this).data("idexamen"));
        if($(this).data("idexamen") == 1){
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
                    <br>
                    <div>
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModalExam">Enviar</button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModalExam" role="dialog">
                      <div class="modal-dialog">
              
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title h4">¡Listo!</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body text-center no-padding">
                            <h4 class="h4">Tu calificacion es de ___</h4>
                            <p>Con esta califiacion puedes saltarte hasta el tema 3 de este bloque</p>
                          </div>
                          <div class="modal-footer">
                            <button id="btn-cali" type="button" class="btn btn-default ir-actividad" data-dismiss="modal">OK</button>
                          </div>
                        </div>
              
                      </div>
                    </div>


                </div>`;
            $(contExamen).appendTo("#cambiar-a-examen"); 
        }
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