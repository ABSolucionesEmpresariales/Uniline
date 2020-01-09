$(document).ready(function () {

  $('#myLogin').submit(function (e) {
    if ($('#ingresar-usuario').val() == '' || $('#ingresar-password').val() == '') {
        console.log('si llego');
        $('.alerta-login').html('<h2 class="alert alert-danger">*Llene todos los campos</h2>')
    } else {
        $.ajax({
            url: "../controllers/login.php",
            type: "POST",
            data: $('#myLogin').serialize(),

            success: function (response) {
                if (response == 1) {
                    window.location.replace('../views/profile.html');
                    console.log("ingresado")
                    
                }else if(response == "NoVerificado"){
                  $('.alerta-login').html('<h2 class="alert alert-danger">*Cuenta no verificada</h2>')
                }else if(response == "passwordIncorrecta"){
                  $('.alerta-login').html('<h2 class="alert alert-danger">*Contraseña incorrecta</h2>')
                }else{
                  $('.alerta-login').html('<h2 class="alert alert-danger">*Este usuario no existe</h2>')
                }
            }
        });
        e.preventDefault();
    }
  });

  
});
