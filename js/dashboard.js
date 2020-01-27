$(document).ready(function () {
    //lista_temas();
    lista();
    let id_actual_base = "";
    let id_control_direccionamiento = "";

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
                //console.log(response);
                datos = JSON.parse(response)
                console.log(datos);
                template = `<h4 style="padding: 1rem;" class="h4 text-center widget_title mb-0">Contenido del curso</h4>`;
                control_seleccion = "";
                control_video = "";
                control_del_chequeo = "";
                for(i = 0; i < datos.length; i++){
                    for(y = 0; y < datos[i].length; y++){
                         if(y == 0){
                             //Verifico si el examen ya se realizo (si es 1 agrega atributo checked si es 0 el disabled)
                             //la clase temas vistos es para poder checkear los temas a voluntad por el usuario (Solo si el examen esta realizado)
                             if(datos[i][0][4] == 1){
                                control_seleccion = "checked";
                                control_del_chequeo = "temas_vistos";
                             }else{
                                control_del_chequeo = "";
                                control_seleccion = "disabled";
                             }
                            template += `
                                <div class="demo row contenedor flex align-items-center cont-actividades">
                                    <input type="checkbox" class="chk-examen" id="customCheck-examen-${i+"-"+y}" name="example1" ${control_seleccion}>
                                    <label data-bloque="bloque-${(i+1)+"-"+(y-1)}" id="examen-${(i+1)}" for="customCheck-examen-${i+"-"+y}" class="col-2 flex align-items-center" ><span></span></label>
                                    <a id="" data-idexamenbase="${datos[i][0][0]}" data-desbloqueo="desbloqueo-${i}" style="cursor: pointer;" class="mostrar-examen col-10 nav-link font-actividades">+${datos[i][0][1]}</a>
                                </div>`;
                        }else if(y == 1){
                            template += `
                            <div class="demo row contenedor flex align-items-center cont-actividades">
                                    <input type="checkbox" id="customCheck-bloque-${(i+1)+"-"+(y-1)}" name="example1" ${control_seleccion}>
                                    <label id="bloque-${(i+1)+"-"+(y-1)}" for="customCheck-bloque-${(i+1)+"-"+(y-1)}" class="col-2 flex align-items-center desbloqueo-${i}"><span></span></label>
                                    <a data-idbloquebase="${datos[i][1]}" data-idactividad="${(i+1)+"-"+(y-1)}" style="cursor: pointer;" id="span-${(i+1)+"-"+(y-1)}" class="mostrar-actividad col-10 spam nav-link font-actividades">-${datos[i][2]}</a>
                                <div class="span-${(i+1)+"-"+(y-1)}" style="display: none;">`;
                                cont = 0;
                            for(z = 0; z< datos[i][3].length; z++){
                                    if(control_seleccion == 'checked' && datos[i][3][0][5] == 0 && cont == 0){
                                        control_seleccion = "checked";
                                        //guardo el id proviniente de la base de datos del tema
                                        id_actual_base = datos[i][3][z][0];
                                        //guardo el link del video para mostrarlo
                                        control_video = datos[i][3][z][3];
                                        //guardo el id con el que se lleva el control del cambio de la infomacion del tema
                                        id_control_direccionamiento = (i+1)+"-"+(z+1);
                                        cont++;
                                    }
                                    if(datos[i][3][z][5] == 1){
                                        control_seleccion = "checked";
                                        //guardo el id proviniente de la base de datos del tema
                                        id_actual_base = datos[i][3][z+1][0];
                                        //guardo el link del video para mostrarlo
                                        control_video = datos[i][3][z+1][3];
                                        //guardo el id con el que se lleva el control del cambio de la infomacion del tema
                                        id_control_direccionamiento = (i+1)+"-"+(z+2);
                                        cont++;
                                    }else{
                                        control_seleccion = "disabled";
                                    }
                                    template +=
                                    `<div class="demo row pt-1 m-0 flex align-items-center">
                                        <input class="" type="checkbox" id="customCheck-${(i+1)+"-"+(z+1)}" name="example1" ${control_seleccion}>
                                        <label data-idtemabase="${datos[i][3][z][0]}" id="tema-${(i+1)+"-"+(z+1)}" for="customCheck-${(i+1)+"-"+(z+1)}" class="${control_del_chequeo} col-3 text-justify desbloqueo-${i} pl-4 flex align-items-center"><span></span></label>
                                        <a id="${(i+1) +"-"+(z+1)}" data-videotema="${datos[i][3][z][3]}" class="col-9 mostrar-tema" style="cursor: pointer; font-family: 'Poppins:100', sans-serif; font-size: 14px; color: rgb(87, 87, 87);">${datos[i][3][z][1]}</a>
                                     </div>
                                    `;  
                            }
                        }else if(y == 4){
                            for(z = 0; z< datos[i][4].length; z++){
                                template += `
                                        <div class="">
                                            <a data-idtareabase="${datos[i][4][0][0]}" data-idtarea="${y + 1}" id="mostrar-tareas" class="mostrar-tareas" href="#seccion-tareas">
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
                
                obtenerMostrarDatosTema(id_actual_base);
            }
        });
    }

    function obtenerMostrarDatosTema(id_de_base){
        $.ajax({
            url:"../controllers/dashboard.php",
            type:"POST",
            data:"DatosTemaAcutual="+id_de_base,

            success: function(response){
                //console.log(response);
                datos_tema = JSON.parse(response);
                //console.log(datos_tema);
                datos_download = datos_tema[0][3].split("/");
                $('.descarga').attr("href",datos_tema[0][3]);
                $("#video").attr('src',datos_tema[0][0]);
                $(".descripcion-tema").html(datos_tema[0][2]);
                $('.descarga').attr("download",datos_download[2]);
            }
        });
    }

    $(document).on('click','.mostrar-tema',function(){
        if($(this).prev().hasClass("temas_vistos")){
            video = $(this).data("videotema");
            id_de_base = $(this).prev().data("idtemabase");
            obtenerMostrarDatosTema(id_de_base);
            id_actual_base = id_de_base;
            $("#video").attr('src',video);
        }
    });

          // MOSTRAR EXAMEN AL HACER CLIC EN EL ENLACE
          $(document).on("click",".mostrar-examen", function () {
            idExamen_seleccionado = $(this).attr("id");
            $('#'+idExamen_seleccionado).prev('label').prev('input').attr('checked','true');
            $("#cambio-examen-video").addClass("d-none");
            $("#contenido-examen").removeClass("d-none");
            $.ajax({
                url:"../controllers/dashboard.php",
                type:"POST",
                data:"examenBLoques="+$(this).data("idexamenbase"),

                success: function(response){
                    console.log(response);
                    datos = JSON.parse(response);
                    console.log(datos);
                    templete2 = `
                    <br>
                    <h3 class="h3">${datos[0][0]}</h3>
                    <hr>`;
                    $.each(datos, function (i, item) {
                        templete2 += `
                            <div class="pregresp flex justify-content-center d-inline-block">
                                <div class="pregunta">
                                    ${item[2]}<br />
                                </div>
                                <div class="respuestas d-inline-flex flex justify-content-between">`;
                                respuestas = item[3].split(',');
                                for(y = 0; y < respuestas.length; y++){
                                    nueva = respuestas[y].split('L904');
                                    if(nueva[0] == 'L904'){
                                 templete2 += `<li class="list-inline p-2"><input type="radio" name="preg1" value="${item[4]}">${nueva[1]}</li>`; 
                                    }else{
                                 templete2 += `<li class="list-inline p-2"><input type="radio" name="preg1" value="0">${respuestas[y]}</li>`; 
                                    }
                                }
                        templete2 +=`</div></div><hr>`;
                    });
                    templete2 +=`<button class="ir-actividad">Enviar respuestas</button>`;
                    $("#contenido-examen").html(templete2); 
                    console.log(templete2);
                }
            });
    });

    $(document).on('click','.temas_vistos',function(){
        $(this).prev().removeAttr("disabled");
        console.log($(this).data("idtemabase")); 
    });

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

    
    

/*     $(document).on('click', '.chk-examen', function () {
        ctrolId = $(this).attr("id");
        console.log(ctrolId);
        if ($("#" + ctrolId).is(':checked')) {
            $("." + ctrolId).slideToggle();

        } else {
            $("." + ctrolId).slideToggle();
        }
    }); */

/*     $(document).on('click','.cont-bloque',function(){
        console.log("llehoestamadre");
        $(this).show();
    }); */

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
            $(this).addClass("activo");
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

    // MOSTRAR ACTIVIDAD AL HACER CLIC EN EL ENLACE

    $(document).on("click",".mostrar-actividad", function () {
        console.log($(this).data("idactividad"));
        if($(this).data("idactividad") == 1){
            $("#contenido-examen").html("");
            $("#contenido-examen").addClass("d-none");
            $("#cambio-examen-video").removeClass("d-none");
            
        }
    });

    // MOSTRAR ACTIVIDAD AL COMPLETAR EL EXAMEN

    $(document).on("click",".ir-actividad", function () {
        $("#cambio-examen-video").removeClass("d-none");
        setTimeout(function() {$("#contenido-examen").html("");$("#contenido-examen").addClass("d-none");},200);
        
        
    });
});