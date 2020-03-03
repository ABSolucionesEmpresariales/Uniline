$(document).ready(function () {

  $('#myLogin').submit(function (e) {
    if ($('#ingresar-email').val() == '' || $('#ingresar-password').val() == '') {
        console.log('si llego');
        $('.alerta-login').html('<h2 class="alert alert-danger">*Llene todos los campos</h2>')
    } else {
        $.ajax({
            url: "../controllers/login.php",
            type: "POST",
            data: $('#myLogin').serialize(),

            success: function (response) {
              console.log(response);
                if (response == 1) {
                    window.location.replace('../views/misCursos.php');
                    console.log("ingresado");
                    
                }else if(response == 'ceo'){
                  window.location.replace('../views/registro.php');
                  console.log("ingresado como CEO");
                }else if(response == "NoVerificado"){
                  $('.alerta-login').html('<h2 class="alert alert-danger">*Cuenta no verificada</h2>')
                }else if(response == "passwordIncorrecta"){
                  $('.alerta-login').html('<h2 class="alert alert-danger">*Contraseña incorrecta</h2>')
                }else{
                  $('.alerta-login').html('<h2 class="alert alert-danger">*Este correo no esta registrado</h2>')
                }
            }
        });
        e.preventDefault();
    }
  });

  $("#show-pass-reset").click(function(e){
    $("#reset-pass-div").slideToggle();
  });
  
});
