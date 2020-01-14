$(document).ready(function () {
    let id = '';

    $("#mostrar").on( "click", function() {//mostrar carga de fotos
        $('#cargaFoto').show(500,"linear"); 
     });
    $("#mostrarPass").on( "click", function() {//mostrar cambio de contraseña
        $('#cambiarPass').show(500,"linear"); 
     });

/////////////////////// modificar perfil //////////////////////////////

    datosUsuario();
    
    $("#actualizar").on("click",function(e){
        $.ajax({
            url: "../controllers/actualizar-perfil.php",
            type: "POST",
            data: $('#actualizar-perfil').serialize()+'&id'+id,
    
            success: function (response) {
                console.log(response);
            }
        });
        e.preventDefault();
    });
/////////////////////// llevar datos al form //////////////////////////////

    function datosUsuario(){
        $.ajax({
        url: "../controllers/actualizar-perfil.php",
        type: "POST",
        data: 'datos=datos',

        success: function (response) {
            let datos = JSON.parse(response);
            id = datos[0][0];
            $('#registrar-nombre').val(datos[0][1]);
            $('#registrar-tel').val(datos[0][5]);
            $('#registrar-correo').val(datos[0][6]);
            $('#registrar-edad').val(datos[0][2]);
        }
    });
    
    }

    $("#actualizar").submit(function (e) {
    
        var formData = new FormData(this);

        $.ajax({
          url: "../Controllers/actualizar-perfil.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
    
          
          success: function (response) {
            console.log(response);
            if (response == "1") {
              $("#registrar-nombre").text("Registro Exitoso");
              $("#registrar-telefono").css("color", "green");
              $("#registrar-correo").focus();
              $("#registrar-edad").trigger("reset");
              $("#registrar-grado").trigger("reset");
            } else {
              $(".alertas").text("Registro fallido");
              $(".alertas").css("color", "red");
            }
            obtenerAcceso();
            obtenerProductosInventario();
          }
        });
        e.preventDefault();
      });
   
  });