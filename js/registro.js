$(document).ready(function () {

    obtener_Cursos();
    //// algunos modales 
    $('.closeCon').on("click", function (e) {
        location.reload();
    });
    $('#btn-registrate').on("click", function (e) {
        $('#login').modal('hide');
    });

    $(document).on('click', '#idprueba', function(){
        $('#autobtn').click();
    });
    /* <---------------------Desplegar el contenido del curso-----------------------> */
    $(document).on('click','.cursos-slide',function(){
        contenido = $(this).data("bloque");
        $('.'+contenido).slideToggle("slow");
    });
    /* <---------------------Pintar el body del modal-----------------------> */
    $(document).on('click','.curso',function(){
        curso = $(this).data("curso");
        let templete = ``;
        $.ajax({
            url:"../controllers/contenido_index.php",
            type:"POST",
            data:"cursos-modal="+curso,

            success: function(response){
                
                let datos = JSON.parse(response);
                console.log(datos);
                $.each(datos, function (i, item) {
                    templete += `
                    <div class="row">
                        <video src="${item[8]}" controls preload="auto" autoplay width="67%" height="67%" controlslist="nodownload"></video> 
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <p class="h3">${item[1]}</p>
                        </div>
                        <div class="col-5 ">
                            <p class="h3" style="margin-left: -13px;"><strong>${item[4]} horas</strong></p>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <p class="h5">Descripcion</p>
                            <p class="h5">${item[2]}</p>
                        </div>
                    </div>
                    <div class="row" style="width: 765px">
                        <div class="col-3 p-3">
                            <img class="rounded-circle" width="160" height="160" src="${item[6]}" alt="Fotografia del profesor ">
                        </div>
                        <div class="col-9">
                            <p class="h4 mt-5"><strong>Maestro:</strong></p>
                            <p class="h4">${item[5]}</p>                   
                        </div>
                    </div>
                    `;
                });
                $('.view-curso').html(templete);
                $('#date-modal').click();
            }
        });
/*         $.ajax({
            url:"../controllers/contenido_index.php",
            type:"POST",
            data:"cursos-contenido="+curso,

            success: function(response){
                console.log(response);
                templete +=`
                <div class="row" style="width: 765px">
                    <p class="h3 p-2" style="margin-left: 280px;">Contenido del curso</p>
                    <div class="col-12 h-scroll border-bottom">
                        <div class="row">
                            <div class="col-12">
                                <p style="cursor:pointer;" data-bloque="bloque-1" class="h4 cursos-slide">+ Contenido del bloque uno</p>
                            </div>
                            <div class="row ml-5 bloque-1" style="display: none">
                                <div class="col-12">
                                    <p class="h5">- Tema 1.1 Priemweos temas delc urso </p>
                                </div>
                                <div class="col-12">
                                    <p class="h5">- Tema 1.1 Priemweos temas delc urso </p>
                                </div>
                                <div class="col-12">
                                    <p class="h5">- Tema 1.1 Priemweos temas delc urso </p>
                                </div>
                                <div class="col-12">
                                    <p class="h5">- Tema 1.1 Priemweos temas delc urso </p>
                                </div>
                                <div class="col-12">
                                    <p class="h5">- Tema 1.1 Priemweos temas delc urso </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }
        }); */

    });
    /* <---------------------Mostrar el div seleccionado del curso-----------------------> */
    $(document).on('click','.mostrar',function(e){
        e.preventDefault();
        controlId = $(this).attr("id");
        $('.page-activo').addClass('d-none');
        $('.row').removeClass('page-activo');
        $('.'+controlId).addClass("page-activo");
        $('.'+controlId).removeClass("d-none");
    });
    /* <---------------------Pintar los cursos-----------------------> */
    function obtener_Cursos(){
        $.ajax({
            url: "../controllers/contenido_index.php",
            type: "POST",
            data: "cursos=cursos",
            success: function (response) {
                console.log(response);
                let datos = JSON.parse(response);
                console.log(datos);
                let templete = ``;
                ocultar ="";
                contdador_page = 0;
                cont = 0;
                total = 0;
                totaldatos = datos.length;
                console.log(totaldatos);
                if(datos.length % 4 == 0){
                    total = Math.round(datos.length / 4);
                }else{
                    total = Math.round((datos.length + 1) / 4);
                }
                console.log(total);

                for(i = 0; i < datos.length; i++){
                    cont++;
                    if(i != 0){
                        ocultar = "d-none";
                    }
                    console.log(i);
                    if(i % 4 == 0){
                        contdador_page ++;
                        templete +=`<div class="row course_boxes page-${contdador_page} ${ocultar} page-activo">`;
                        console.log('llego'+contdador_page);
                    }
                                    templete += `
                                        <div class="col-lg-3 course_box">
                                            <div class="card">
                                                <img  width="250px" height="200px"  src="${datos[i][3]}" alt="Imagen del curso ${datos[i][1]}">
                                                <div class="card-body text-center mt-0">
                                                    <div style="width: 100%; height: 70px;" class="card-title mt-3"><p class="h4" >${datos[i][1]}</p></div>
                                                    <div class="card-text"><strong>${datos[i][5]} Hrs</strong></div>
                                                    <div class="card-text mt-3"><a class="curso text-primary" data-curso="${datos[i][0]}" style="cursor: pointer;">Ver mas</a></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-center pt-3">
                                                        <div class="star" style="color: yellow">
                                                            <i class="fas fa-star" style="cursor: pointer;"></i>
                                                            <i class="fas fa-star" style="cursor: pointer;"></i>
                                                            <i class="fas fa-star" style="cursor: pointer;"></i>
                                                            <i class="fas fa-star" style="cursor: pointer;"></i>
                                                            <i class="far fa-star" style="cursor: pointer;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price_box d-flex flex-row align-items-center">
                                                    <div class="course_author_image">
                                                        <img src="${datos[i][7]}" alt="Imagen del profesor ${datos[i][6]}">
                                                    </div>
                                                    <div class="course_author_name">
                                                        <span>${datos[i][6]}</span>
                                                    </div>
                                                    <div class="course_price d-flex flex-column align-items-center justify-content-center">
                                                        <span>$${datos[i][8]}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        `;
                    if(cont % 4 == 0 || totaldatos == cont){
                        templete +=`</div>`;
                    }
                }
                console.log(cont);
                templete +=  `                
                <div class="row mt-5">
                    <div class="col-12 text-center">`;
                for(y=0; y < contdador_page; y++){
                    templete +=  `<a id="page-${y+1}" class="m-2 mostrar" href="#">${y+1}</a>`;
                }
                templete +=  `
                    </div>
                </div>`;
                $('.cursos').html(templete);
            }
        });
    }

    //// animacion para todos los enlaces que te lleven a un div dentro de la misma pagina
    $(document).on('click','.cambiarRegistro',function(e){
		e.preventDefault();		//evitar el eventos del enlace normal
		var strAncla = $(this).attr('href'); //id del ancla
			$('body,html,header').stop(true,true).animate({				
				scrollTop: $(strAncla).offset().top
			},500);
    });

    $('#registro').submit(function (e) {
        if ($('#registrar-nombre').val() == '' || $('#registrar-tel').val() == '' || $('#registrar-correo').val() == '' || $('#registrar-pass').val() == '') {
            console.log('si llego');
            $('.alertas').html('<h2 class="alert alert-danger">*Llene todos los campos</h2>')
            e.preventDefault();
        } else {
            $.ajax({
                url: "../controllers/registro.php",
                type: "POST",
                data: $('#registro').serialize(),

                success: function (response) {
                    
                    if (response != 0) {
                        $('#confirmar').modal({show:true});
                    }else if(response == "Existe"){
                        $('.alertas').html('<h2 class="alert alert-danger">*Este correo ya esta registrado</h2>')
                    }else {
                        console.log("fallo3");
                    }
                }
            });
            e.preventDefault();
        }
    });
});