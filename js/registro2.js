$(document).ready(function () {
    let templete2 = ``;
    obtener_Cursos();
    //// algunos modales
    $(".closeCon").on("click", function (e) {
        location.reload();
    });
    $("#ir-a-registro").on("click", function (e) {
        $("#login").modal("hide");
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });

    $(document).on("click", "#idprueba", function () {
        $("#autobtn").click();
    });
    $("#confirmar").hide("slow");

    /* <---------------------Pintar el body del modal y los loques del curso-----------------------> */
    $(document).on("click", ".curso", function () {
        curso = $(this).data("curso");
        templete = "";
        $.ajax({
            url: "../controllers/contenido_index.php",
            type: "POST",
            data: "cursos-modal=" + curso,

            success: function (response) {
                let datos = JSON.parse(response);
                console.log(datos);
                $.each(datos, function (i, item) {
                    templete += `
                    <div class="row mt-0" style="width: 765px"> 
                        <iframe class="responsive-video" src="${item[8]}" width="640" height="346" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe> 
                    </div>
                    <div class="row border-bottom mb-2 title-responsive"  style="width: 765px">
                        <div class="col-lg-9 col-sm-12 ml-0">
                            <p class="h3 text-bold text-white">- ${item[1]}</p>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <p class="h3 "><strong class="text-white">Precio </strong><strong class="text-info">$${item[7]}</strong></p>
                        </div>
                    </div>
                
                    <div class="row border-bottom  title-responsive"  style="width: 765px">
                        <div class="col-lg-9 col-sm-12">
                            <p class="h3 mt-5 text-white text-info"><strong>-Descripcion:</strong></p>
                            <p class="h4 text-justify text-white inter">${item[2]}</p>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <p class="h3 mt-5 text-white text-info"><strong>-Maestro:</strong></p>
                            <p class="h4 text-white">-${item[5]}</p> 
                            <p class="h3 text-white mt-0 text-info"><i class="far fa-clock"></i> ${item[4]} Hrs</p> 
                        </div>
                    </div>
                    `;
                });
                $.ajax({
                    url: "../controllers/contenido_index.php",
                    type: "POST",
                    data: "cursos-contenido=" + curso,
                    success: function (response) {
                        let datos = JSON.parse(response);
                        templete += `                    
                        <div class="row title-responsive" style="width: 765px">
                            <p class="h3 p-2 text-white cont-curso-responsive" style="margin-left: 280px;">Contenido del curso</p>`;
                        $.each(datos, function (i, item) {
                            templete += `
                                <div class="col-12 border-bottom">
                                    <div class="row">
                                        <div class="col-12">
                                            <p style="cursor:pointer;" data-bloque="bloque-${
                                item[0]
                                }" class="h4 cursos-slide font-italic text-white">+ Contenido del bloque ${i +
                                1}</p>
                                        </div>
                                        <div data-temas="bloque-${item[2]}-${
                                item[0]
                                }" class="row ml-5 bloque-${item[0]}" style="display: none">
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        templete += `</div>`;
                        $(".view-curso").html(templete);
                        $(".boton-footer").html(
                            `<button type="button" value="${curso}" class="btn btn-md btn-outline-secondary border border-secondary text-white botton-responsive compras" data-dismiss="modal">Comprar</button>`
                        );
                        $("#date-modal").click();
                    }
                });
            }
        });
    });

    /* <--------------------- Generar checkout de pago de stripe -----------------------> */
    $(document).on("click", ".compras", function (event) {
        let idcurso = $(this).val();
        $.post("../controllers/checkout.php", { idcurso: idcurso }, function (
            response
        ) {
            switch (response) {
                case "login":
                    swal("Para comprar este curso debe registrarse o iniciar sesión");
                    break;

                case "pagado":
                    window.location.replace("../views/dashboard.php?idcurso=" + idcurso);
                    break;

                default:
                    var stripe = Stripe("pk_test_E6v1YWAS84dvDDlDeDkywm6y00gd15Xrmm");
                    stripe
                        .redirectToCheckout({
                            sessionId: response
                        })
                        .then(function (response) {
                            swal(
                                "Alerta!",
                                "La compra ha fallado intente de nuevo o contacte a soporte técnico",
                                "info"
                            );
                            //imprimir mensaje ocurrio un problema
                            // si elgo sale mal usar aqui para debuggear: `result.error.message`para informarle el error al usuario
                        });
                    break;
            }
        });
    });

    function CierraPopup() {
        $("#modal-cursos").modal("hide"); //ocultamos el modal
        $("body").removeClass("modal-open"); //eliminamos la clase del body para poder hacer scroll
        $(".modal-backdrop").remove(); //eliminamos el backdrop del modal
    }

    /* <---------------------Desplegar el contenido del curso e imprime los temas -----------------------> */
    $(document).on("click", ".cursos-slide", function () {
        contenido = $(this).data("bloque");
        temas = $("." + contenido).data("temas");
        datos_tema = temas.split("-");
        $.ajax({
            url: "../controllers/contenido_index.php",
            type: "POST",
            data: "temas-bloque=" + datos_tema[2],
            success: function (response) {
                let datos2 = JSON.parse(response);
                templete2 = "";
                $.each(datos2, function (y, item2) {
                    templete2 += `     
                            <div class="col-12 temas-curso-responsive">
                                <p class="h5 text-justify text-light font-italic ml-2 text-center text-lg-left margin-responsive">- ${item2[1]}</p>
                            </div>
                            `;
                });
                $("." + contenido).html(templete2);
            }
        });
        setTimeout(function () {
            $("." + contenido).slideToggle("slow");
        }, 150);
    });
    /* <---------------------Mostrar el div seleccionado del curso-----------------------> */
    $(document).on("click", ".mostrar", function (e) {
        e.preventDefault();
        controlId = $(this).attr("id");
        $(".page-activo").addClass("d-none");
        $(".row").removeClass("page-activo");
        $("." + controlId).addClass("page-activo");
        $("." + controlId).removeClass("d-none");
    });
    /* <---------------------Pintar los cursos-----------------------> */
    function obtener_Cursos() {
        $.ajax({
            url: "../controllers/contenido_index.php",
            type: "POST",
            data: "cursos=cursos",
            success: function (response) {
                console.log(response);
                let datos = JSON.parse(response);
                console.log(datos);
                let templete = ``;
                ocultar = "";
                contdador_page = 0;
                cont = 0;
                total = 0;
                totaldatos = datos.length;
                console.log(totaldatos);
                if (datos.length % 4 == 0) {
                    total = Math.round(datos.length / 4);
                } else {
                    total = Math.round((datos.length + 1) / 4);
                }
                console.log(total);

                for (i = 0; i < datos.length; i++) {
                    cont++;
                    if (i != 0) {
                        ocultar = "d-none";
                    }
                    console.log(i);
                    if (i % 4 == 0) {
                        url = datos[i][7].split("/");
                        url_2 = url[0]+"/"+url[1]+"/min_"+url[2];
                        url3 = datos[i][3].split("/");
                        url_3 = url[0]+"/"+url3[1]+"/res_"+url3[2];
                        contdador_page++;
                        templete += `<div class="row course_boxes page-${contdador_page} ${ocultar} page-activo">`;
                        console.log("llego" + contdador_page);
                    }
                    templete += `
                                        <div class="col-lg-3 course_box bor-responsive">
                                            <div class="card">
                                                <img class="responsive-image"  width="250px" height="200px"  src="${url_3}" alt="Imagen del curso ${datos[i][1]}">
                                                <div class="card-body text-center mt-0">
                                                    <div style="width: 100%; height: 70px;" class="card-title"><p class="h4 font-weight-bold" >${datos[i][1]}</p></div>
                                                    <div class="card-text"><strong>${datos[i][5]} Hrs</strong></div>
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
                                                <div class="card-text mt-3 text-center">
                                                    <a class="curso text-primary h4 more-cursos-responsive" data-curso="${datos[i][0]}" style="cursor: pointer;">Ver mas</a>
                                                </div>
                                                <div class="price_box d-flex flex-row align-items-center">
                                                    <div>
                                                        <img src="${url_2}" class="course_author_image"  alt="Imagen del profesor ${datos[i][6]}">
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
                    if (cont % 4 == 0 || totaldatos == cont) {
                        templete += `</div>`;
                    }
                }
                console.log(cont);
                templete += `                
                <div class="row m-5">
                    <div class="col-12 text-center">
                    << `;
                for (y = 0; y < contdador_page; y++) {
                    if (y == 0) {
                        templete += `<a id="page-${y +
                            1}" class="m-2 mostrar h4 estado-activo" href="#">${y + 1}</a>`;
                    } else {
                        templete += `<a id="page-${y +
                            1}" class="m-2 mostrar h4" href="#">${y + 1}</a>`;
                    }
                }
                templete += ` >>
                    </div>
                </div>`;

                $(".cursos").html(templete);
            }
        });
    }

    //// animacion para todos los enlaces que te lleven a un div dentro de la misma pagina
    $(document).on("click", ".cambiarContacto", function (e) {
        e.preventDefault(); //evitar el eventos del enlace normal
        var strAncla = $(this).attr("href"); //id del ancla
        $("body,html,header")
            .stop(true, true)
            .animate(
                {
                    scrollTop: $(strAncla).offset().top
                },
                2000
            );
    });


    $("#registro").submit(function (e) {
        e.preventDefault();
        $("#btnSubmit").attr("disabled", true);
        if (
            $("#registrar-nombre").val() == "" ||
            $("#registrar-tel").val() == "" ||
            $("#registrar-correo").val() == "" ||
            $("#registrar-pass").val() == ""
        ) {
            console.log("si llego");
            $("#alertas").removeClass("alert-success");
            $("#alertas").addClass("alert-danger");
            $("#alertas").html("<h4>Por favor llene todos los campos</>");
            $("#alertas").slideDown("slow");
            setTimeout(function () {
                $("#alertas").slideUp("slow");
            }, 3000);
        } else {
            $("#hope").removeClass("d-none");
            $.ajax({
                url: "../controllers/registro.php",
                type: "POST",
                data: $("#registro").serialize(),

                success: function (response) {
                    $("#hope").addClass("d-none");
                    if (response == "Existe") {
                        console.log(response);
                        $("#alertas").removeClass("alert-success");
                        $("#alertas").addClass("alert-danger");
                        $("#alertas").html("<h4>Este usuario ya esta registrado</h4>");
                        $("#alertas").slideDown("slow");
                        setTimeout(function () {
                            $("#alertas").slideUp("slow");
                        }, 3000);
                    } else if (response == "error") {
                        console.log(response);
                        $("#alertas").removeClass("alert-success");
                        $("#alertas").addClass("alert-danger");
                        $("#alertas").html(
                            "<h4>Ups! hubo un error, intentelo de nuevo</h4>"
                        );
                        $("#alertas").slideDown("slow");
                        setTimeout(function () {
                            $("#alertas").slideUp("slow");
                        }, 3000);
                    } else {
                        $("#registro").trigger("reset");
                        console.log(response);
                        $("#alertas").removeClass("alert-danger");
                        $("#alertas").addClass("alert-success");
                        $("#alertas").html(
                            "<h4>¡Listo! te enviamos un e-mail a tu correo para verificar tu cuenta</>"
                        );
                        $("#alertas").slideDown("slow");
                        setTimeout(function () {
                            $("#alertas").slideUp("slow");
                        }, 3000);
                    }
                    $("#btnSubmit").attr("disabled", false);
                }
            });
        }
    });
});
