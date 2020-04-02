$(document).ready(function() {
  let id = "";
  obtener_Cursos();

  function obtener_Cursos() {
    $.ajax({
      url: "../controllers/contenido_index.php",
      type: "POST",
      data: "cursos=cursos",
      success: function(response) {
        let datos = JSON.parse(response);
        id = datos[0][0];
        console.log(id);
      }
    });
  }
  /* <--------------------- Generar checkout de pago de stripe -----------------------> */
  $(document).on("click", ".compras", function (event) {
    let idcurso = $(this).val();
    templete = "";
    templete = `<iframe class="responsive-video" src="" width="640" height="346" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>`;
    $("#videoModal").html(templete);
    $.post("../controllers/checkout.php", { idcurso: idcurso }, function (
        response
    ) {
        switch (response) {
            case "login":
                        swal(
                            "Alerta!",
                            "Es necesario registrarse",
                            "info"
                        );
                break;

            case "pagado":
                window.location.replace("../views/dashboard.php?idcurso=" + idcurso);
                break;

            default:
                var stripe = Stripe("pk_live_eDjWfiO9ESs6N7s7tAek4d2n00bEJUW51W");
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
  /* <---------------------Se pintan el titulo y otros datos del curso-----------------------> */
  $(document).ready(function() {
    templateImagen = "";
    templateTitulo = "";
    templateInfo = "";
    templateVideo = "";
    templateContenido = "";
    $.ajax({
      url: "../controllers/contenido_index.php",
      type: "POST",
      data: "cursos-descripcion=" + id,

      success: function(response) {
        console.log(response);
        let datos = JSON.parse(response);
        console.log(datos);
        $.each(datos, function(i, item) {
          separar = datos[0][9].split("###");
          templateImagen += `<img src="" alt="curso" width="100%" style="border-radius: 1rem;">`;
          templateTitulo += `<h1 class="h1 text-white strong" style="font-size: 50px;">${item[1]}</h1>`;
          templateInfo += `
                    <button value="${id}" class="boton-comprar-cursos primary-btn compras">Comprar curso</button>
                        <div class="contenido-maestro">
                            <h2 class="h4 pt-5">Curso impartido por:</h2>
                            <div class="maestro row">
                                <div class="col-3">
                                    <img src="../img/diego.jpg" alt="profesor" style="border-radius: 100%;">
                                </div>
                                <div class="col-8 flex align-items-center">
                                    <div>
                                        <h3 class="h5">${item[5]}</h3>
                                        <p class="h6">${separar[0]}, ${separar[1]}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contenido-detalles">
                            <h2 class="h4 pt-5">Este curso incluye</h2>
                            <br>
                            <ul>
                                <li><i class="fas fa-check-circle" style="color: LightGray;"></i> 5 horas de vídeo bajo demanda</li>
                                <li><i class="fas fa-check-circle" style="color: LightGray;"></i> 17 artículos</li>
                                <li><i class="fas fa-check-circle" style="color: LightGray;"></i> 11 recursos descargables</li>
                                <li><i class="fas fa-check-circle" style="color: LightGray;"></i> Acceso de por vida</li>
                                <li><i class="fas fa-check-circle" style="color: LightGray;"></i> Acceso en dispositivos móviles y TV</li>
                                <li><i class="fas fa-check-circle" style="color: LightGray;"></i> Certificado de finalización</li>
                            </ul>
                        </div>`;
          templateVideo += `
                        <div>
                            <div class="contenido-video text-center">
                                <iframe class="embed-responsive-item" src="${item[8]}" width="640" height="346" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            </div>
                        </div>
                        <br>
                        <div class="contenido-descripcion">
                            <div class="titulo-descripcion">
                                <h2 class="h3 text-center titulo-descripcion">Descripcion</h2>
                            </div>
                            <div class="descripcion text-justify">
                                ${item[2]}
                            </div>
                        </div>
                    `;
        });
        /* <---------------------Se pinta los capitulos o bloques-----------------------> */
        $.ajax({
          url: "../controllers/contenido_index.php",
          type: "POST",
          data: "cursos-contenido=" + id,
          success: function(response) {
            let datos = JSON.parse(response);
            console.log(datos);
            $.each(datos, function(i, item) {
              templateContenido += `
                                <li data-toggle="collapse" data-bloque="bloque-${item[0]}" class="mb-2 curso" style="cursor:pointer;>
                                    <h3 class="h4">Capitulo ${i + 1}</h3>
                                </li>
                                <div data-temas="bloque-${item[2]}-${item[0]}" class="collapse bloque-${item[0]}">
                                </div>`;              
            });
            $("#titulo-curso").html(templateTitulo);
            $("#informacion-curso").html(templateInfo);
            $("#contenido-video").html(templateVideo);
            $("#contenido-contenido").html(templateContenido);
          }
        });
      }
    });
    /* <---------------------Desplegar el contenido del curso e imprime los temas -----------------------> */
    $(document).on("click", ".curso", function () {
        contenido = $(this).data("bloque");
        temas = $("." + contenido).data("temas");
        datos_tema = temas.split("-");
        $.ajax({
            url: "../controllers/contenido_index.php",
            type: "POST",
            data: "temas-bloque=" + datos_tema[2],
            success: function (response) {
                let datos2 = JSON.parse(response);
                templateTemas = "";
                $.each(datos2, function (y, item2) {
                    templateTemas += `     
                            <li>${item2[1]}</li>
                            `;
                });
                $("." + contenido).html(templateTemas);
            }
        });
        setTimeout(function () {
            $("." + contenido).slideToggle("slow");
        }, 150);
    });
  });
});
