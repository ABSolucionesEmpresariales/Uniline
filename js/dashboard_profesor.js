$(document).ready(function () {

  /* CARGA DE DATOS A LOS SELECT */


  /* SELECT CURSOS */
  actualizarSelectCursos();//CUANDO CARGUE LA PAGINA ACTUALIZARA EL SELECT CON TODOS LOS CURSOS DEL MAESTRO

  $(document).on('change', '#cursos-select', function () {
    $(this).removeClass('text-danger');
    actualizarSelectBloques(this.value.toString());
    if (this.value != 0) {
      $(this).addClass('text-primary');
      $('#bloques-select').addClass('text-danger');
      $('#aniadir-bloque').removeClass('disabled');
      $('#info-select-bloque').addClass('invisible');

    } else {
      $(this, '#bloques-select').addClass('text-danger');
      $('#info-select-bloque').removeClass('invisible');
      $('#aniadir-bloque, #aniadir-examen').addClass('disabled');
      $('#aniadir-bloque, #aniadir-examen, #collapseBloque, #collapseExamen').collapse('hide');
      $('#collapseBloque, #collapseExamen').removeClass('show in');
      console.log(document.getElementById('bloques-select').value.toString());
    }
  });


  /* SELECT BLOQUES */
  $(document).on('change', '#bloques-select', function () {
    $(this).removeClass('text-danger');

    if (this.value != 0) {
      $(this).addClass('text-primary');
      $('#aniadir-examen').removeClass('disabled');

    } else {
      $(this).addClass('text-danger');
      $('#aniadir-examen').addClass('disabled');
      $('#aniadir-examen').collapse('hide');
      $('#collapseExamen').collapse('hide');
      $('#collapseExamen').removeClass('show in');
    }
  });

  /**************FORMULARIOS */

  // CURSO FORM
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
          if (response) {
            $("#alerta").removeClass("d-none");
            $('#registrar-curso').trigger('reset');
            $('#foto-curso').attr('src', '../img/cursos/no_course.png');
            document.getElementById('image-name').innerHTML = 'Imagen del Curso';
            actualizarSelectCursos()//DESPUES DE REGISTRAR UN CURSO ACTUALIZA EL SELECT CON EL NUEVO CURSO AÑADIDO
            $('.spinner-border').addClass('d-none');
            $("#alerta").slideDown("slow");
            setTimeout(function () {
              $("#alerta").slideUp("slow");
            }, 3000);
          } else {
            alert("datos no enviados, hubo un error");
            $('.spinner-border').addClass('d-none');
          }
        }
      });
    }

  });

  $("#file-image").change(function () {//CARGA LA VISTA PREVIA DEL INPUT FILE DE CURSOS
    leerUrl(this);
  });

  //BLOQUES FORM
  $("#registrar-bloque").submit(function (e) {//INSERTAR BLOQUES A DB
    e.preventDefault();
    if (verificar_campos('bloque') == 'campo-vacio') {
      alert('Por favor llene todos los campos');
    } else {
      $('.spinner-border').removeClass('d-none');

      // Get some values from elements on the page:
      var $form = $(this),
        bloque = $form.find("input[name='nombre-bloque']").val(),
        curso = $('#cursos-select').val(),
        url = "../controllers/bloques_profesor.php";
      if (curso) {
        $.post(url, { nombre_bloque: bloque, id_curso: curso })
          .done(function (data) {
            if (data) {
              $('#registrar-bloque').trigger('reset');
              $('.spinner-border').addClass('d-none');
              $("#alerta-bloque").removeClass("d-none");
              $("#alerta-bloque").slideDown("slow");
              actualizarSelectBloques(curso)//DESPUES DE REGISTRAR UN CURSO ACTUALIZA EL SELECT CON EL NUEVO bloque AÑADIDO
              setTimeout(function () {
                $("#alerta-bloque").slideUp("slow");

              }, 3000);
            } else {
              alert('no se registro el bloque');
            }
          })
      }

    }

  });

  /* EXAMEN FORM */
  $("#registrar-examen").submit(function (e) {//INSERTAR BLOQUES A DB
    e.preventDefault();
    if (verificar_campos('examen') == 'campo-vacio') {
      alert('Por favor llene todos los campos');
    } else {
      $('.spinner-border').removeClass('d-none');

      // Get some values from elements on the page:
      var $form = $(this),
        nombre_examen = $form.find("input[name='nombre-examen']").val(),
        descripcion_examen = $form.find("textarea[name='descripcion-examen']").val(),
        bloque = bloque = $('#bloques-select').val(),
        url = "../controllers/examen_profesor.php";
      if (bloque) {
        $.post(url, {
          examen: nombre_examen,
          descripcion: descripcion_examen,
          nombre_bloque: bloque
        })
          .done(function (data) {

            if (data) {
              $('#registrar-bloque').trigger('reset');
              $('.spinner-border').addClass('d-none');
              $("#alerta-bloque").removeClass("d-none");
              $("#alerta-bloque").slideDown("slow");
              setTimeout(function () {
                $("#alerta-bloque").slideUp("slow");

              }, 3000);
            } else {
              alert('no se registro el examen');
            }
          })
      }

    }

  });

  /* FUNCIONES */

  /* VERIFICAR CAMPOS FORMULARIO */
  function verificar_campos(tipo) {
    for (i = 0; i < $('.input-' + tipo).length; i++) {
      if ($('.input-' + tipo).eq(i).val() == '') {
        return 'campo-vacio';
      }
    }
    return 'campos-llenos';
  }

  /* PREVISUALIZACION DE LA IMAGEN DEL CURSO */
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

  /* OBTENER CURSOS */
  function actualizarSelectCursos() {
    $.get("../controllers/select_cursos.php", function (data, status) {
      if (status) {
        $('#cursos-select').html(`<option value="0">Elige un curso</option>`);
        if (data) {
          const cursos = JSON.parse(data);

          cursos.map(curso => {
            $('#cursos-select').append(`<option value="${curso[0]}">${curso[1]}</option>`)
          });
        } else {
          $('#cursos-select').append(`<option value="no-course">No tienes ningun Curso</option>`)
        }

      }
    });
  }

  /* OBTENER BLOQUES */
  function actualizarSelectBloques(curso_value) {
    /* obtendremos el valor del select 
       curso como parametro 
       para pasarlo como dato a
       la peticion get */

    $.get("../controllers/select_bloques.php", { curso: curso_value })
      .done(function (data) {
        $('#bloques-select').html(`<option value="0">Elige un bloque</option>`);
        if (curso_value != 0) {
          if (data != 0) {
            const bloques = JSON.parse(data);

            bloques.map(bloque => {
              $('#bloques-select').append(`<option value="${bloque[0]}">${bloque[1]}</option>`)
            });
          } else {
            $('#bloques-select').html(`<option value="no-chapter">Curso no tiene bloques</option>`)
          }
        } else {
          $('#bloques-select').empty();//VACIAR EL SELECT SI NO HAY CURSO SELECCIONADO
        }

      });
  }

  function actualizarFormExamen(bloque_value) {



  }












  ///////////////////////// TABLAS //////////////////////////////////////////

  function renderizarTabla() {
  $.post('../controllers/tablas_dashboard_profesores.php', {tabla: "tabla_cursos", profesor: "2"}, function(response){
  const parseo =  JSON.parse(response);
  console.log(parseo);
  })
  }


renderizarTabla();

  $(document).on('click', '#nuevo-curso', function () {
    
  });
  $(document).on('click', '#aniadir-bloque', function () {
    
  });
  $(document).on('click', '#aniadir-examen', function () {
    
  });


})