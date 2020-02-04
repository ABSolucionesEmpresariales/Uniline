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

  ////////LLENAR COMBO PROFESOR//////////////                   
  function traerDatosProfe() {
    $.ajax({
      url: "../controllers/combo_profesores.php",
      type: "POST",
      data: 'info-cursos=cursos',

      success: function (response) {
        datos = JSON.parse(response);
        template_combo = '';
        for (i = 0; i < datos.length; i++) {
          template_combo +=
            `
              <option value="${datos[i][0]}">${datos[i][1]}</option>
            `;
        }
        $('#select-profe-tema').append(template_combo);

      }
    });
  }
  ////////PINTAR COMBO CURSO//////////////
  function traerDatosCombo(controllers,selector) {
    $.ajax({
      url: "../controllers/"+controllers,
      type: "POST",
      data: {'accion' : 'items' },

      success: function (response) {
        console.log(response);
        datos = JSON.parse(response);
        template = '<option value="0">Selecciona uno</option>';
        if (datos != '') {
          for (i = 0; i < datos.length; i++) {
            template += `<option value="${datos[i][0]}">${datos[i][1]}</option> `;
          }
          $('#'+selector).html(template);
        }
      }
    });
  }

  ////////LLEVAR SELECT PARA METER A SESSION//////////////
  function llevarSelectSession() {
    $(document).on('change', '#select-profe-tema', function () {//session al profe
      $.ajax({
        url: "../controllers/combo_profesores.php",
        type: "POST",
        data: 'SProfesor=' + $(this).val(),

        success: function (response) {
          console.log(response);
          if (response != '') {
            traerDatosCombo('bloque.php','select-curso');  
            
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
            traerDatosCombo('tema.php','select-bloque');  
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
            traerDatosCombo('examen.php','select-examen');  //pinta el combo con los cursos segun la sesion
            datosTemas();
            datosExamen();           
          }
        }
      });
    });
  }

  //////////////////////////////////////////////////////////### PINTAR TABLAS ##/////////////////////////

  

  function datosBloques() {//PINTAR TABLA BLOQUES
    $.ajax({
      url: "../controllers/bloque.php",
      type: "POST",
      data: {'accion': 'tabla'},
      
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

  $("#registro-bloques").submit(function(e) {//INSERTA DATOS A LA BD
      var idbloque = '';
      var nombre = $('#nombre-bloque').val();
      var curso = $('#select-curso-tema').val();
      $.ajax({
        url: "../controllers/bloque.php",
        type: "POST",
        data: {'idbloque': idbloque, 'TNombre': nombre, 'SCurso': curso,
        'accion': 'insertar'},
        
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

  ///////////////////////////////////////////////////////### REGISTRO DE TEMAS START ##/////////////////////////////

  function datosTemas() {//PINTAR TABLA TEMAS
    $.ajax({
      url: "../controllers/tema.php",
      type: "POST",
      data: {'accion': 'tabla'},
      
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
  

    $("#registro-temas").submit(function(e) {
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
  
  //                                                     ### REGISTRO DE EXAMEN START ##

  function datosExamen() {//PINTAR TABLA EXAMEN
    $.ajax({
      url: "../controllers/examen.php",
      type: "POST",
      data: {'accion': 'tabla'},
      
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
              <td scope="row" class="bloqueExamen">${datos[i][3]}</td>
            </tr>
            `;
        }
        $('#datos-examen').html(template);
      }
    });
  }
  

    $("#registro-examen").submit(function(e) {
      e.preventDefault();
      var idexamen = '';
      var nombre = $('#nombre-examen').val();
      var descripcion = $('#descripcion-examen').val();
      var bloque = $('#select-bloque').val();
      $.ajax({
        url: "../controllers/examen.php",
        type: "POST",
        data: {'idexamen': idexamen, 'TNombre': nombre, 'TADescripcion': descripcion, 'SBloque': bloque,
        'accion': 'insertar'},
        
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
});