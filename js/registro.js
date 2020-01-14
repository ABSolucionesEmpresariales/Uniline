$(document).ready(function () {

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

    //// animacion para todos los enlaces que te lleven a un div dentro de la misma pagina
    $('#btn-registrate').click(function(e){				
		e.preventDefault();		//evitar el eventos del enlace normal
		var strAncla=$(this).attr('href'); //id del ancla
			$('body,html').stop(true,true).animate({				
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