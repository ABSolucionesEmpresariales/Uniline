$(document).ready(function () {
    //lista_temas();
    lista();
    let id_actual_base = "";
    let id_control_direccionamiento = "";
    let cont_examen_preguntas = 0;
    let id_examen = "";
    let id_tarea = "";
    obtenerProgresoDelCurso();


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

    //Funcion que escucha cuando el video esta por terminar
    $("#video").on('ended', function () {
        //se separa el id actual para sumarle un numero mas (Para cambiar al siguiente tema)
        datos_redirect = id_control_direccionamiento.split("-");
        //Lo formamos el siguiente tema
        id_redirecionado = datos_redirect[0]+"-"+(parseInt(datos_redirect[1])+1);
        //verificaos si el tema existe
        if($("#tema-"+id_redirecionado).length > 0){
            //checkeamos el tema actual
            $("#tema-"+id_control_direccionamiento).prev().attr('checked','true');
            $("#tema-"+id_control_direccionamiento).next().removeClass("text-info");
            //Realizar registro del tema
            registrarTemaCompletado(id_actual_base);
            //obtenemos los datos del nuevo tema para pintarlos
            obtenerMostrarDatosTema($("#tema-"+id_redirecionado).data("idtemabase"));
            $("#tema-"+id_redirecionado).next().addClass("text-info");
            //igualamos la variable global a el tema actual
            id_control_direccionamiento = id_redirecionado;
            //tomamos el id de la base del tema actual
            id_actual_base = $("#tema-"+id_redirecionado).data("idtemabase");
        }else{
            //si el id siguiente no existe se brincara al examen
            $("#tema-"+id_control_direccionamiento).prev().attr('checked','true');
            registrarTemaCompletado(id_actual_base);
            id_examen = (parseInt(datos_redirect[0])+1)+"--1";
            $("#"+id_examen).click();
        }
    });

    function registrarTemaCompletado(tema){
        $.ajax({
            url:"../controllers/dashboard.php",
            type:"POST",
            data:"temaCompleto="+tema,

            success: function (response){
                console.log(response);
            }
        });
    }


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
                checkeo_final = ``;
                examen = "";
                bloque_tarea = "";
                for(i = 0; i < datos.length; i++){
                    for(y = 0; y < datos[i].length; y++){
                         if(y == 0){
                             //Verifico si el examen ya se realizo (si es 1 agrega atributo checked si es 0 el disabled)
                             //la clase temas vistos es para poder checkear los temas a voluntad por el usuario (Solo si el examen esta realizado)
                             if(datos[i][0][4] == 1){
                                control_seleccion = "checked";
                                control_del_chequeo = "temas_vistos";
                                examen = "realizado";
                                checkeo_final = "span-"+(i+1)+"-0";
                             }else{
                                control_del_chequeo = "";
                                control_seleccion = "disabled";
                                examen = "";
                                bloque_tarea = "d-none";
                             }
                             if(datos[0][0][4] != 1){
                                id_examen = "1--"+1;
                             }
                            template += `
                                <div class="demo row contenedor flex align-items-center cont-actividades">
                                    <input type="checkbox" class="chk-examen" id="customCheck-examen-${i+"-"+y}" name="example1" ${control_seleccion}>
                                    <label data-bloque="bloque-${(i+1)+"-"+(y-1)}" id="examen-${(i+1)}" for="customCheck-examen-${i+"-"+y}" class="col-2 flex align-items-center" ><span></span></label>
                                    <a id="${(i+1)+"-"+(parseInt(y-1))}" data-idexamenbase="${datos[i][0][0]}" data-desbloqueo="desbloqueo-${i}" style="cursor: pointer;" class="mostrar-examen col-10 nav-link font-actividades ${examen}">+${datos[i][0][1]}</a>
                                </div>`;
                        }else if(y == 1){
                            template += `
                            <div class="demo row contenedor flex align-items-center cont-actividades">
                                    <input type="checkbox" id="customCheck-bloque-${(i+1)+"-"+(y-1)}" name="example1" ${control_seleccion}>
                                    <label id="bloque-${(i+1)+"-"+(y-1)}" for="customCheck-bloque-${(i+1)+"-"+(y-1)}" class="col-2 flex align-items-center"><span class="registro_tema"></span></label>
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
                                            //guardo el id proviniente de la base de datos del tema
                                            id_actual_base = datos[i][3][z][0];
                                            control_seleccion = "checked";
                                            //guardo el link del video para mostrarlo
                                            control_video = datos[i][3][z][3];
                                            //guardo el id con el que se lleva el control del cambio de la infomacion del tema
                                            id_control_direccionamiento = (i+1)+"-"+(z+1);
                                            cont++;
                                    }else{
                                        control_seleccion = "disabled";
                                    }
                                    template +=
                                    `<div class="demo row pt-1 m-0 flex align-items-center">
                                        <input class="" type="checkbox" id="customCheck-${(i+1)+"-"+(z+1)}" name="example1" ${control_seleccion}>
                                        <label data-idtemabase="${datos[i][3][z][0]}" id="tema-${(i+1)+"-"+(z+1)}" for="customCheck-${(i+1)+"-"+(z+1)}" class="${control_del_chequeo} col-3 text-justify desbloqueo-${i} pl-4 flex align-items-center"><span class="registro_tema"></span></label>
                                        <a id="${(i+1) +"-"+(z+1)}" class="col-9 mostrar-tema" style="cursor: pointer; font-family: 'Poppins:100', sans-serif; font-size: 14px; color: rgb(87, 87, 87);">${datos[i][3][z][1]}</a>
                                     </div>`;  
                            }
                        }else if(y == 4){
                            for(z = 0; z< datos[i][4].length; z++){
                                template += `
                                        <div class="tarea-${(i+1)+"--"+1} ${bloque_tarea}">
                                        <a data-idtareabase="${datos[i][4][0][0]}" class="h5 mostrar-tareas" href="#seccion-tareas">Subir mi tarea</a>
                                        <h4 ></h4>
                                            <a data-idtarea="${y + 1}">
                                                <div class="ml-5">`;
                                                datdoles = "";
                                                tema = "";
                                                if(datos[i][4][0][3]){
                                                    datos_dow = datos[i][4][0][3].split("/");
                                                    datdoles = datos_dow[2];
                                                    tema = "Descargar Tarea"
                                                }else{
                                                    tema = "No hay archivo disponible";
                                                    datdoles = "";
                                                }
                                        template += ` <a href="${datos[i][4][0][3]}" download="${datdoles}">${tema}</a>
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
                if(id_actual_base != ""){
                    obtenerMostrarDatosTema(id_actual_base);
                    $("#"+checkeo_final).click();
                    console.log(checkeo_final);
                    $("#tema-"+id_control_direccionamiento).next().addClass("text-info");
                }else{
                    console.log(id_examen);
                    $("#"+id_examen).click();
                    $('.lista-curso-aside').addClass("d-none");
                }
            }
        });
    }

    function obtenerProgresoDelCurso(){
        $.ajax({
            url:"../controllers/dashboard.php",
            type:"POST",
            data:"progresoDelCurso=progresoDelCurso",

            success: function(response){
                progreso = "."+response;
                $('.loader').attr('data-perc',progreso);
                $('.loader').data("perc",progreso);
                console.log(progreso);
                console.log( $('.loader'));
            }
        })
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
                if(datos_tema[0][3]){
                datos_download = datos_tema[0][3].split("/");
                dat = datos_download;
                }else{
                dat = "no existe archivo";
                }
                $('.descarga').attr("href",datos_tema[0][3]);
                $("#video").attr('src',datos_tema[0][0]);
                $(".descripcion-tema").html(datos_tema[0][2]);
                $('.descarga').attr("download",dat);
            }
        });
    }

    $(document).on('click','.mostrar-tema',function(){
        if($(this).prev().hasClass("temas_vistos")){
            id_de_base = $(this).prev().data("idtemabase");
            obtenerMostrarDatosTema(id_de_base);
            $("#tema-"+id_control_direccionamiento).next().removeClass("text-info");
            id_actual_base = id_de_base;
            console.log(id_actual_base);
            datos = $(this).prev().attr("id").split("-");
            id_control_direccionamiento = datos[1]+"-"+datos[2];
            $(this).addClass("text-info");
        }
    });

    $(document).on("click",".temas_vistos",function(){
        $(this).prev().removeAttr("disabled");
        registrarTemaCompletado($(this).data("idtemabase"));

    });



          // MOSTRAR EXAMEN AL HACER CLIC EN EL ENLACE
          $(document).on("click",".mostrar-examen", function () {

            if($(this).hasClass('realizado') == false){
                idExamen_seleccionado = $(this).attr("id");
                //$('#'+idExamen_seleccionado).prev('label').prev('input').attr('checked','true');
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
                                    cont_examen_preguntas ++;
                                    for(y = 0; y < respuestas.length; y++){
                                        nueva = respuestas[y].split('#');
                                        console.log(nueva);
                                        if(nueva[0] == ''){
                                     templete2 += `<li class="list-inline p-2"><input data-idpregunta="${item[1]}" id="sal-${(i+1)+"-"+(y+1)}" class="examen" name="nombre-${i}" type="radio" value="${item[4]}"><span>${nueva[1]}</span></li>`; 
                                        }else{
                                     templete2 += `<li class="list-inline p-2"><input data-idpregunta="${item[1]}" id="sal-${(i+1)+"-"+(y+1)}" class="examen" name="nombre-${i}" type="radio" value="0"><span>${respuestas[y]}</span></li>`; 
                                        }
                                    }
                            templete2 +=`</div></div><hr>`;
                        });
                        templete2 +=`
                        <div class="alert alert-dark d-none alerta-examen" role="alert"></div>
                        <button class="ir-actividad">Enviar respuestas</button>`;
                        $("#contenido-examen").html(templete2); 
                    }
                });
            }
    });

    $(document).on('click','.examen',function(){
        console.log($(this).attr("id"));
        preguntas = $(this).attr("id").split("-");
       for(i=1; i<=4; i++){
            $("#sal-"+preguntas[1]+"-"+i).removeClass("selected-user");
        } 
        $(this).addClass("selected-user");
    });
    
    $(document).on('click','.ir-actividad',function(){
        preguntas_id = "";
        calificacion = 0;
        respuestas_examen = "";
        for(y=0; y < $('.selected-user').length; y++){
            preguntas_id += "$" + $(".selected-user").eq(y).data("idpregunta");
            respuestas_examen += "$" + $(".selected-user").eq(y).next("span").text();
            if($('.selected-user').eq(y).val() != '0'){
                calificacion++;
            }
        }
        console.log(preguntas_id);
        console.log(respuestas_examen);
        porsentaje = 100 / parseInt(cont_examen_preguntas);
        puntaje_alumno = porsentaje * parseFloat(calificacion);
        const postada = {
            respuestaExamen:"preguntas",
            preguntas_id:preguntas_id,
            respuestas_examen:respuestas_examen,
            puntaje_alumno:puntaje_alumno
        };
         $.ajax({
            url:"../controllers/dashboard.php",
            type:"POST",
            data:postada,
            success: function(response){
                console.log(response);
                $('.alerta-examen').removeClass("d-none");
                $('.ir-actividad').addClass("d-none");
                if(response != 0){
                    $('.alerta-examen').html("<p class='h3'>Tu califuacion es: <span>"+ puntaje_alumno +"</span><br><input class='seguir-curso btn btn-primary' value='seguir' type='button'></p>");       
                }else{
                    $('.alerta-examen').html("<p class='h3'>Tu califuacion es: <span>"+ puntaje_alumno +"</span><br><input class='seguir-curso btn btn-primary' value='seguir' type='button'></p>");
                }
            }
        }); 
    });

    $(document).on('click','.seguir-curso',function(){
        location.reload();
    });

    $("#subir-tareas").submit(function(e){
        $(".actuali-homework").val(id_tarea);
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "../controllers/dashboard.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            
            success: function (response) {
                if(response == 1){
                    $("#subir-tareas").trigger("reset");
                }
                console.log(response);
            }
          });
    });



    // MOSTRAR ACTIVIDAD AL COMPLETAR EL EXAMEN


    $(document).on('click',".nada",function(){
        $("#cambio-examen-video").removeClass("d-none");
        setTimeout(function() {$("#contenido-examen").html("");$("#contenido-examen").addClass("d-none");},200);
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
    $(document).on('click','.mostrar-tareas',function(e){
        atributo = $(this).attr('href');
        id_tarea = $(this).data("idtareabase");
        console.log(id_tarea);
        $(atributo).slideToggle();
        console.log(atributo);
        $("html, body").animate({ scrollTop: $(atributo).offset().top },1000);
        e.preventDefault();
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
});