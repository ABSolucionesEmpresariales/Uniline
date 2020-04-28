$(document).ready(function () {
  let correcta = '';
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
      cargarFormExamen(this.value);
      $('#aniadir-examen, #aniadir-tema, #aniadir-tarea').removeClass('disabled');

    } else {
      $(this).addClass('text-danger');
      $('#aniadir-examen, #aniadir-tema, #aniadir-pregunta, #aniadir-tarea').addClass('disabled');
      $('#aniadir-examen, #aniadir-tema, #aniadir-pregunta, #aniadir-tarea').collapse('hide');
      $('#collapseExamen, #collapseTema, #collapsePregunta, #collapseTarea').collapse('hide');
      $('#collapseExamen, #collapseTema, #collapsePregunta, #collapseTarea').removeClass('show in');
    }
  });

  /*FORMULARIOS: */

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
          if (response != 0) {
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
              $('#bloques-select').removeClass('text-primary');
              $('#bloques-select').addClass('text-danger');
              $('#aniadir-examen, #aniadir-tema, #aniadir-pregunta, #aniadir-tarea').addClass('disabled');
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

  //EXAMEN FORM
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

      $.post(url, {
        examen: nombre_examen,
        descripcion: descripcion_examen,
        nombre_bloque: bloque
      })
        .done(function (data) {

          switch (data) {

            case 'creado':
              $('#registrar-examen').trigger('reset');
              $('.spinner-border').addClass('d-none');
              $("#alerta-examen").removeClass("d-none");
              $("#alerta-examen").slideDown("slow");
              setTimeout(function () {
                $("#alerta-examen").slideUp("slow");
              }, 3000);
              const bloque = $('#bloques-select').val();
              cargarFormExamen(bloque);
              break;

            case 'actualizado':
              //Agregar aqui la info de success cuando se haya actualizado
              alert('se ha actualizado');
              break;
          }

        })

    }

  });


  //TEMAS FORM
  $("#registrar-tema").submit(function (e) {//INSERTAR TEMAS A LA BASE DE DATOS 
    e.preventDefault();
    if (verificar_campos('tema') == 'campo-vacio') {

      alert('Por favor llene todos los campos');

    } else {

      $('.spinner-border').removeClass('d-none');

      const formData = new FormData(this);
      const bloque = $('#bloques-select').val();
      formData.append("bloque", bloque);

      $.ajax({
        url: '../controllers/tema_profesor.php',
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
          if (data) {
            console.log(data);
            $('#archivo-tarea-name').text('Subir Archivo');
            $("#alerta-tema").removeClass("d-none");
            $('#registrar-tema').trigger('reset');
            $('.spinner-border').addClass('d-none');
            $("#alerta-tema").slideDown("slow");
            setTimeout(function () {
              $("#alerta-tema").slideUp("slow");
            }, 3000);
          } else {
            $('.spinner-border').addClass('d-none');
            alert("datos no enviados, hubo un error");
          }

        }
      });

    }

  });

  $('#archivo-tema').change(function () {//CARGA LA VISTA PREVIA DEL INPUT FILE DE CURSOS
    if (this.files && this.files[0]) {
      $('#archivo-tema-name').text(this.files[0].name);
    }
  });


  //PREGUNTAS DE EXAMEN FORM
  $(document).on('click', '.radio-in', function () { //INDICA QUE AL CLICKEAR UN RADIO SERA LA CORRECTA
    correcta = $(this).data('correcta');
  });

  $("#registrar-pregunta").submit(function (e) {//INSERTAR PREGUNTAS A DB
    e.preventDefault();
    if (verificar_campos('preg-resp') == 'campo-vacio') {
      alert('Por favor llene todos los campos');
    } else if (verificar_radios('pregunta') == 'radio-uncheck') {
      alert('Por favor seleccione cual sera la respuesta correcta');
    } else {
      $('.spinner-border').removeClass('d-none');

      let respuestas = '';
      for (i = 1; i <= 4; i++) {
        if (i == correcta && i == 4) {
          respuestas += '###' + $('#respuesta' + i).val();
        } else if (i == 4) {
          respuestas += $('#respuesta' + i).val();
        } else if (i == correcta) {
          respuestas += '###' + $('#respuesta' + i).val() + '-*3';
        } else {
          respuestas += $('#respuesta' + i).val() + '-*3';
        }
      }

      // Get some values from elements on the page:
      var $form = $(this),
        pregunta_examen = $form.find("input[name='pregunta-examen']").val(),
        bloque = bloque = $('#bloques-select').val(),
        url = "../controllers/preguntas_profesor.php";

      $.post(url, {
        pregunta: pregunta_examen,
        respuesta: respuestas,
        nombre_bloque: bloque
      })
        .done(function (data) {
          console.log(data);
          if (data == 'creado') {

            $('#registrar-pregunta').trigger('reset');
            $('.spinner-border').addClass('d-none');
            $("#alerta-pregunta").removeClass("d-none");
            $("#alerta-pregunta").slideDown("slow");
            setTimeout(function () {
              $("#alerta-pregunta").slideUp("slow");

            }, 3000);
          } else {
            alert(data);
          }
        })

    }

  });


  //TAREAS FORM
  $('#registrar-tarea').submit(function (e) {
    e.preventDefault();

    if (verificar_campos('tarea') == 'campo-vacio') {

      alert('Por favor llene todos los campos');

    } else {

      $('.spinner-border').removeClass('d-none');

      const formData = new FormData(this);
      const bloque = $('#bloques-select').val();
      formData.append("bloque", bloque);

      $.ajax({
        url: '../controllers/tarea_profesor.php',
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
          console.log(data);
          if (data == 1) {

            $('#archivo-tarea-name').text('Subir Archivo');
            $("#alerta-tarea").removeClass("d-none");
            $('#registrar-tarea').trigger('reset');
            $('.spinner-border').addClass('d-none');
            $("#alerta-tarea").slideDown("slow");
            setTimeout(function () {
              $("#alerta-tarea").slideUp("slow");
            }, 3000);
          } else {
            $('.spinner-border').addClass('d-none');
            alert(data);
          }

        }
      });


    }

  });

  $('#archivo-tarea').change(function () {//CARGA LA VISTA PREVIA DEL INPUT FILE DE CURSOS
    if (this.files && this.files[0]) {
      $('#archivo-tarea-name').text(this.files[0].name);
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

  }

  /* VERIFICAR RADIO BUTTON  */
  function verificar_radios(clase_radio) {
    for (i = 0; i < $('.radio-' + clase_radio).length; i++) {
      if ($('.radio-' + clase_radio).eq(i).is(':checked')) {
        return 'radio-checked';
      }
    }
    return 'radio-uncheck';
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
          $('#cursos-select').html(`<option value="no-course">No tienes ningun Curso</option>`)
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

  function cargarFormExamen(bloque_value) {

    $.get("../controllers/select_examen.php", { bloque: bloque_value })
      .done(function (data) {
        if (data != 0) {
          const datos_examen = JSON.parse(data);
          $("input[name='nombre-examen'").val(datos_examen[0][0]);
          $("textarea[name='descripcion-examen'").val(datos_examen[0][1]);
          $("button[name='submit-examen'").removeClass('btn-success');
          $("button[name='submit-examen'").addClass('btn-primary');
          $("button[name='submit-examen'").html('Actualizar');
          $("#aniadir-pregunta").removeClass('disabled');

        } else {
          $("input[name='nombre-examen'").val('');
          $("textarea[name='descripcion-examen'").val('');
          $("button[name='submit-examen'").removeClass('btn-primary');
          $("button[name='submit-examen'").addClass('btn-success');
          $("button[name='submit-examen'").html('Crear');
          $("#aniadir-pregunta").addClass('disabled');
          $('#aniadir-pregunta').collapse('hide');
          $('#collapsePregunta').collapse('hide');
          $('#collapsePregunta').removeClass('show in');
        }

      });

  }












  ///////////////////////// TABLAS //////////////////////////////////////////

  function renderizarTabla(objeto_peticion, idtr, idtbody) {
    $.post('../controllers/tablas_dashboard_profesores.php', objeto_peticion, function (response) {
      const datos = JSON.parse(response);
      let nombrescolumnas = [];
      let trhead = ``;
      let tbody = ``;
      let botones = `<td><button class = "btn btn-danger">Eliminar</button></td>`;

      datos.forEach(function (objeto_renglon_tabla, posicion) {
        if (posicion === 0) { //se renderizan el thead de la tabla
          nombrescolumnas = Object.keys(objeto_renglon_tabla);
          nombrescolumnas.forEach(function (valor, posicion) {
            if (valor != "publicacion") trhead += `<th scope="col" class="text-light ${posicion === 0 ? " d-none" : ""}">${valor.charAt(0).toLocaleUpperCase() + valor.slice(1)}</th>`
          })
        }
        tbody += `<tr>`;
        nombrescolumnas.forEach(function (nombre_propiedad_objeto, posicion) {
          if (nombre_propiedad_objeto === "publicacion") {
            if (objeto_renglon_tabla[nombre_propiedad_objeto] === 1) {
              botones = `<td>
                          <button class = "btn btn-success btnestado" value="${objeto_renglon_tabla.idcurso + '=' + objeto_renglon_tabla.publicacion}">Ocultar</button>
                          <button class = "btn btn-danger">Eliminar</button>
                        </td>`;
            } else {
              botones = `<td>
                          <button class = "btn btn-warning btnestado" value="${objeto_renglon_tabla.idcurso + '=' + objeto_renglon_tabla.publicacion}">Publicar</button>
                          <button class = "btn btn-danger">Eliminar</button>
                         </td>`;
            }

          } else {
            tbody += `<td class=${posicion === 0 ? "d-none" : ""}>${objeto_renglon_tabla[nombre_propiedad_objeto]}</td>`;
          }
        })

        tbody += botones + `</tr>`;
      });
      $(idtr).html(trhead);
      $(idtbody).html(tbody);
    })
  }


  renderizarTabla({ tabla: 'tabla_cursos' }, '#tr-tablagrupo1', '#tbodygrupo1');

  $(document).on('click', '#nuevo-curso', function () {
    renderizarTabla({ tabla: 'tabla_cursos' }, '#tr-tablagrupo1', '#tbodygrupo1');
  });

  $(document).on('click', '#aniadir-bloque', function () {
    const objeto_peticion = {
      tabla: "tabla_bloques",
      curso: $('#cursos-select').val()
    };
    renderizarTabla(objeto_peticion, '#tr-tablagrupo1', '#tbodygrupo1');
  });

  $(document).on('click', '#aniadir-examen', function () {
    const objeto_peticion = {
      tabla: "tabla_examenes",
      bloque: $('#bloques-select').val()
    };
    renderizarTabla(objeto_peticion, '#tr-tablagrupo1', '#tbodygrupo1');
  });

  //ACTUALIZAR EL ESTADO DE LA PUBLICACION DEL CURSO
  $(document).on('click', '.btnestado', function () {
    const datos = $(this).val().split('=');
    const recursosactualizacion = {
      idcurso: datos[0],
      publicacion: datos[1] != 0 ? datos[1] = 0 : datos[1] = 1,
      accion: 'editarpublicacion'
    }
    $.post('../controllers/cursos.php', recursosactualizacion, (response) => { })
    renderizarTabla({ tabla: 'tabla_cursos' }, '#tr-tablagrupo1', '#tbodygrupo1');

  });

})

