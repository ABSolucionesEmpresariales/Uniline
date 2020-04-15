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
          } else if (response == "error") {

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

  function leerUrl(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      const image_name = document.getElementById('image-name');
      reader.onload = (e) => {
        $('#foto-curso').attr('src', e.target.result);
        image_name.innerHTML = input.files[0].name;
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string

    }
  }

  $("#file-image").change(function() {
    leerUrl(this);
  });

})