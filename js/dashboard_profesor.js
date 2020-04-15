$(document).ready(function () {

   $("#registrar-curso").submit(function (e) {//INSERTAR CURSOS A LA BASE DE DATOS 
      e.preventDefault();
      if (verificar_campos('curso') == 'campo-vacio') {
        alert('Por favor llene todos los campos');
      } else {
        $('.spinner-border').removeClass('d-none');
        var formData = new FormData(this);
        $.ajax({
          url: "../controllers/cursos_profesor.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
  
          success: function (response) {
            console.log(response);
            if (response == 1) {
            //   datosCursos();
              $('#registro-curso').trigger('reset');
              /* $('#preview-final2').show();
              $('#preview2').hide(); */
              $('.spinner-border').addClass('d-none');
              /* traerDatosCombo('bloque.php', 'select-curso'); */
              $('#idcurso').val('');
              $('#accion').val('insertar');
            }else if(response == "error"){
              console.log('errrorrrr');
            } else {
              alert("datos no enviados, hubo un error");
              $('.spinner-border').addClass('d-none');
            }
          }
        });
      }
  
    });

    function verificar_campos(tipo) {
      for (i = 0; i < $('.input-' + tipo).length; i++) {
        if ($('.input-' + tipo).eq(i).val() == '') {
          return 'campo-vacio';
        }
      }
      return 'campos-llenos';
    }

})