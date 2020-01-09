$(document).ready(function () {
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
                    console.log(response);
                    if (response == 1) {
                       window.location.replace('../views/confirmacion.html');
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