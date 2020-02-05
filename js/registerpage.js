$(document).ready(function () {
  pintar_Estados_Mexico('registrar-estado2');
  traerDatosProfe(); //trae a los combos informacion del profesor para mandarla por sesion
  llevarSelectSession(); //lleva a session lo que esta en ese momento en el select

  function pintar_Estados_Mexico(comboBox) {
    var datos_estado_mexico = [];
    var i = 0;
    datos_estado_mexico = ["Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Chiapas", "Chihuahua",
      "Ciudad de México", "Coahuila de Zaragoza", "Colima", "Durango", "México", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco",
      "Michoacán de Ocampo", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo", "San Luis Potosí",
      "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz de Ignacio de la Llave", "Yucatán", "Zacatecas"
    ];
    let templete = `<option value="">Elejir</option>`;
    for (i = 0; i < datos_estado_mexico.length; i++) {
      templete += `<option value="${datos_estado_mexico[i]}">${datos_estado_mexico[i]}</option>`;
    }
    $('#' + comboBox).html(templete);
  }

  var touchtime = 0;
  $(document).on("click", "td", function () {
    $("#divpass").css('display', 'none');
    $("#contrasena").removeAttr('required');
    if (touchtime == 0) {
      touchtime = new Date().getTime();
    } else {
      // compare first click to this click and see if they occurred within double click threshold
      if (new Date().getTime() - touchtime < 300) {
        // double click occurred
        var valores = "";
        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        idtabla = $(this).parents("tr").parents('tbody').parents('table').attr('id');
        console.log(idtabla);
        $(this).parents("tr").find("td").each(function () {
          valores += $(this).html() + "?";
        });
        valor = valores.split('?');
        console.log(valor);
        if (idtabla == 'tabla-profesores') {
          
          
        }else if(idtabla == 'tabla-cursos'){

        }else if(idtabla == 'tabla-bloques'){
          $('#nombre-bloque').val(valor[1]); 
          accion = 'editar';         
        }else if(idtabla == 'tabla-temas'){
          $('#nombre-tema').val(valor[1]);
          $('#descripcion-tema').val(valor[2]);
          $('#video-tema').val(valor[3]);
          $('#accion-tema').val('editar');
          $('#idtema').val(valor[0]);
        }else if(idtabla == 'tabla-examen'){
          $('#nombre-examen').val(valor[1]);
          $('#descripcion-examen').val(valor[2]);
          accion = 'editar';
        }else if(idtabla == 'tabla-preguntas'){
          resp = valor[2].split('-*3');
          console.log(resp);
          $('#pregunta').val(valor[1]);
          for(i = 0; i<4; i++){
            resp_correcta = resp[i].split('###');
            console.log(resp_correcta);
            if(resp_correcta[0] == ''){
              $('#respuesta'+(parseInt(i)+1)).val(resp_correcta[1]);
              $('#respuesta'+(parseInt(i)+1)).parent().prev().attr('checked', true);
            }else{
              $('#respuesta'+(parseInt(i)+1)).val(resp_correcta[0]);
            }
          }
          accion = 'editar';

        }else if(idtabla == 'tabla-tareas'){
          $('#nombre-tarea').val(valor[1]);
          $('#descripcion-tarea').val(valor[2]);
          $('#accion-tarea').val('editar');
          $('#idtarea').val(valor[0]);
        }
        
      } else {
        // not a double click so set as a new first click
        touchtime = new Date().getTime();
      }
    }
  });

  ////////PINTAR COMBO PROFESOR//////////////                   
  function traerDatosProfe() {
    $.ajax({
      url: "../controllers/combo_profesores.php",
      type: "POST",
      data: 'info-cursos=cursos',

      success: function (response) {
        datos = JSON.parse(response);
        template_tabla = '';
        template_combo = '';
        for (i = 0; i < datos.length; i++) {
          template_tabla +=
            `
          <tr class="profes">
            <td scope="row" style="display: none;">${datos[i][0]}</td>
            <td scope="row">${datos[i][1]}</td>
            <td scope="row">${datos[i][2]}</td>
            <td scope="row">${datos[i][3]}</td>
            <td scope="row">${datos[i][3]}</td>
            <td scope="row">${datos[i][5]}</td>
            <td scope="row">${datos[i][6]}</td>
            <td scope="row">${datos[i][11]}</td>
            <td scope="row">${datos[i][12]}</td>
            <td scope="row">${datos[i][13]}</td>
          </tr>
            `;
          template_combo +=
            `
              <option value="${datos[i][0]}">${datos[i][1]}</option>
            `;
        }
        $('#select-profe-tema').append(template_combo);
        $('#datos-profesores').append(template_tabla);

      }
    });
  }

  ////////PINTAR COMBOS//////////////
  function traerDatosCombo(controllers, selector) {
    $.ajax({
      url: "../controllers/" + controllers,
      type: "POST",
      data: { 'accion': 'items' },

      success: function (response) {
        console.log(response);
        datos = JSON.parse(response);
        template = '<option value="0">Selecciona uno</option>';
        if (datos != '') {
          for (i = 0; i < datos.length; i++) {
            template += `<option value="${datos[i][0]}">${datos[i][1]}</option> `;
          }
          $('#' + selector).html(template);
        }
      }
    });
  }

  ////////METER A SESSION LOS SELECT//////////////
  function llevarSelectSession() {
    $(document).on('change', '#select-profe-tema', function () {//session al profe
      $.ajax({
        url: "../controllers/combo_profesores.php",
        type: "POST",
        data: 'SProfesor=' + $(this).val(),

        success: function (response) {
          console.log(response);
          if (response != '') {
            traerDatosCombo('bloque.php', 'select-curso');

          }
        }
      });
    });
    $(document).on('change', '#select-curso', function () { //session al curso
      $.ajax({
        url: "../controllers/combo_profesores.php",
        type: "POST",
        data: 'SCurso=' + $(this).val(),

        success: function (response) {
          console.log(response);
          if (response != '') {
            traerDatosCombo('tema.php', 'select-bloque');
            datosBloques();
          }
        }
      });
    });
    $(document).on('change', '#select-bloque', function () { //session al bloque
      $.ajax({
        url: "../controllers/combo_profesores.php",
        type: "POST",
        data: 'SBloque=' + $(this).val(),

        success: function (response) {
          console.log(response);
          if (response != '') {
            traerDatosCombo('pregunta.php', 'select-examen');
            datosTemas();
            datosExamen();
            datosTareas();
          }
        }
      });
    });
    $(document).on('change', '#select-examen', function () { //session al examen
      $.ajax({
        url: "../controllers/combo_profesores.php",
        type: "POST",
        data: 'SExamen=' + $(this).val(),

        success: function (response) {
          console.log(response);
          if (response != '') {
            datosPreguntas();
          }
        }
      });
    });
  }

  //////////////////////////////////////////////////////////### PINTAR TABLAS ##//////////////////////////////////////////////



  function datosBloques() {//PINTAR TABLA BLOQUES
    $.ajax({
      url: "../controllers/bloque.php",
      type: "POST",
      data: { 'accion': 'tabla' },

      success: function (response) {
        template = '';
        datos = JSON.parse(response);
        console.log(datos);
        for (i = 0; i < datos.length; i++) {
          template +=
            `
            <tr class="examen">
              <td scope="row" class="idbloque" style="display: none;">${datos[i][0]}</td>
              <td scope="row" class="nombreBloque">${datos[i][1]}</td>
              <td scope="row" class="CursoBloque">${datos[i][3]}</td>
            </tr>
            `;
        }
        $('#datos-bloque').html(template);
      }
    });
  }

  function datosTemas() {//PINTAR TABLA TEMAS
    $.ajax({
      url: "../controllers/tema.php",
      type: "POST",
      data: { 'accion': 'tabla' },

      success: function (response) {
        template = '';
        datos = JSON.parse(response);
        console.log(datos);
        for (i = 0; i < datos.length; i++) {
          template +=
            `
            <tr class="tema">
              <td scope="row" class="idtema" style="display: none;">${datos[i][0]}</td>
              <td scope="row" class="nombreTema">${datos[i][1]}</td>
              <td scope="row" class="DescripcionTema">${datos[i][2]}</td>
              <td scope="row" class="videoTema">${datos[i][3]}</td>
              <td scope="row" class="ArchivoTema">${datos[i][4]}</td>
            </tr>
            `;
        }
        $('#datos-tema').html(template);
      }
    });
  }

  function datosExamen() {//PINTAR TABLA EXAMEN
    $.ajax({
      url: "../controllers/examen.php",
      type: "POST",
      data: { 'accion': 'tabla' },

      success: function (response) {
        template = '';
        datos = JSON.parse(response);
        console.log(datos);
        for (i = 0; i < datos.length; i++) {
          template +=
            `
            <tr class="tema">
              <td scope="row" class="idexamen" style="display: none;">${datos[i][0]}</td>
              <td scope="row" class="nombreExamen">${datos[i][1]}</td>
              <td scope="row" class="DescripcionExamen">${datos[i][2]}</td>
            </tr>
            `;
        }
        $('#datos-examen').html(template);
      }
    });
  }
  function datosPreguntas() {//PINTAR TABLA PREGUNTAS EXAMEN
    $.ajax({
      url: "../controllers/pregunta.php",
      type: "POST",
      data: { 'accion': 'tabla' },

      success: function (response) {
        template = '';
        datos = JSON.parse(response);
        console.log(datos);
        for (i = 0; i < datos.length; i++) {
          template +=
            `
            <tr class="tema">
              <td scope="row" class="idpregunta" style="display: none;">${datos[i][0]}</td>
              <td scope="row" class="pregunta">${datos[i][1]}</td>
              <td scope="row" class="respuestas">${datos[i][2]}</td>
              <td scope="row" class="respuestaCorrecta">${datos[i][3]}</td>
            </tr>
            `;
        }
        $('#datos-preguntas').html(template);
      }
    });
  }
  function datosTareas() {//PINTAR TABLA TAREAS
    $.ajax({
      url: "../controllers/tarea.php",
      type: "POST",
      data: { 'accion': 'tabla' },

      success: function (response) {
        template = '';
        datos = JSON.parse(response);
        console.log(datos);
        for (i = 0; i < datos.length; i++) {
          template +=
            `
            <tr class="tema">
              <td scope="row" class="idtarea" style="display: none;">${datos[i][0]}</td>
              <td scope="row" class="nombreTarea">${datos[i][1]}</td>
              <td scope="row" class="DescripcionTarea">${datos[i][2]}</td>
              <td scope="row" class="ArchivoTarea">${datos[i][3]}</td>
            </tr>
            `;
        }
        $('#datos-tarea').html(template);
      }
    });
  }

  //////////////////////////////////////////////////////////### INSERTAR DATOS ##///////////////////////////////////////////

  $('#registro-profesor').submit(function (e) { //INSERTAR PROFESORES
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "../controllers/registro.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,

      success: function (response) {
        if (response == "Existe") {
          console.log(response);
          $("#alertas").removeClass('alert-success');
          $("#alertas").addClass('alert-danger');
          $("#alertas").html('<h4>Este correo ya esta registrado</h4>');
          $("#alertas").slideDown("slow");
          setTimeout(function () {
            $("#alertas").slideUp("slow");
          }, 3000);

        } else if (response == 'error') {
          console.log(response);
          $("#alertas").removeClass('alert-success');
          $("#alertas").addClass('alert-danger');
          $("#alertas").html('<h4>Ups! hubo un error, intentelo de nuevo</h4>');
          $("#alertas").slideDown("slow");
          setTimeout(function () {
            $("#alertas").slideUp("slow");
          }, 3000);

        } else {
          console.log(response);
          traerDatosProfe();
          /* $("#alertas").removeClass('alert-danger');
          $("#alertas").addClass('alert-success');                       
          $("#alertas").html('<h4>¡Listo! te enviamos un e-mail a tu correo para verificar tu cuenta</>');
          $("#alertas").slideDown("slow");
          setTimeout(function(){
              $("#alertas").slideUp("slow");
          }, 3000); */

        }
      }
    });
  });

  $("#registro-bloques").submit(function (e) {//INSERTAR BLOQUES A LA BASE DE DATOS
    e.preventDefault();
    var idbloque = '';
    var nombre = $('#nombre-bloque').val();
    var curso = $('#select-curso').val();
    $.ajax({
      url: "../controllers/bloque.php",
      type: "POST",
      data: {
        'idbloque': idbloque, 'TNombre': nombre, 'SCurso': curso,
        'accion': 'insertar'
      },

      success: function (response) {
        console.log(response);

        if (response == 1) {
          datosBloques();
          $('#nombre-bloque').val("");
        } else {
          alert("datos no enviados, hubo un error");
        }
      }
    });
  });

  $("#registro-temas").submit(function (e) {//INSERTAR TEMAS A LA BASE DE DATOS
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "../controllers/tema.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,

      success: function (response) {
        console.log(response);

        if (response == 1) {
          datosTemas();
          $('#nombre-bloque').val("");
        } else {
          alert("datos no enviados, hubo un error");
        }
      }
    });
  });

  $("#registro-examen").submit(function (e) {//INSERTAR EXAMENES A LA BASE DE DATOS
    e.preventDefault();
    var idexamen = '';
    var nombre = $('#nombre-examen').val();
    var descripcion = $('#descripcion-examen').val();
    var bloque = $('#select-bloque').val();
    $.ajax({
      url: "../controllers/examen.php",
      type: "POST",
      data: {
        'idexamen': idexamen, 'TNombre': nombre, 'TADescripcion': descripcion, 'SBloque': bloque,
        'accion': 'insertar'
      },

      success: function (response) {
        console.log(response);

        if (response == 1) {
          datosExamen();
          $('#nombre-examen').val("");
          $('#descripcion-examen').val("");
        } else {
          alert("datos no enviados, hubo un error");
        }
      }
    });
  });

  let accion = '';
  let correcta = '';
  $(document).on('click', '.radio-in', function () {
    correcta = $(this).data('correcta');
    console.log(correcta);

  });

  $("#registro-preguntas").submit(function (e) {//INSERTAR PREGUNTAS A LA BASE DE DATOS
    e.preventDefault();
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

    var idpregunta = '';
    var pregunta = $('#pregunta').val();
    var examen = $('#select-examen').val();
    accion = 'insertar';

    $.ajax({
      url: "../controllers/pregunta.php",
      type: "POST",
      data: {
        'idpregunta': idpregunta, 'TPregunta': pregunta, 'respuestas': respuestas,
        'SExamen': examen,
        'accion': accion
      },

      success: function (response) {
        console.log(response);

        if (response == 1) {
          datosPreguntas();
          $('#pregunta').val("");
          $('input[name=TRespuesta]').val("");
        } else {
          alert("datos no enviados, hubo un error");
        }
      }
    });
  });

  $("#registro-tarea").submit(function (e) {//INSERTAR TAREAS A LA BASE DE DATOS
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "../controllers/tarea.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,

      success: function (response) {
        console.log(response);

        if (response == 1) {
          datosTareas();
          $('#nombre-tarea').val("");
          $('#descripcion-tarea').val("");
          $('#archivo-tarea').val("");
        } else {
          alert("datos no enviados, hubo un error");
        }
      }
    });
  });
});