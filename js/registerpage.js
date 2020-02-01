$(document).ready(function () {
  pintar_Estados_Mexico('registrar-estado2');
  traerDatosProfe();
  traerDatosCurso();
  datosUsuario();
  llevarSelectSession();


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
        console.log(response);
        datos = JSON.parse(response);
        template_combo = '';
        template_tabla = '';
        for (i = 0; i < datos.length; i++) {
          template_combo +=
            `
              <option value="${datos[i][0]}">${datos[i][1]}</option>
            `;
            template_tabla +=
            `
            <tr class="profesores">
            <td scope="row" class="idusuario" style="display: none;">${datos[i][0]}</td>
            <td scope="row" class="nombreU">${datos[i][1]}</td>
            <td scope="row" class="edadU">${datos[i][2]}</td>
            <td scope="row" class="escolaridadU">${datos[i][3]}</td>
            <td scope="row" class="imagenU">${datos[i][4]}</td>
            <td scope="row" class="telefonoU">${datos[i][5]}</td>
            <td scope="row" class="emailU">${datos[i][6]}</td>
            <td scope="row" class="estadoU">${datos[i][11]}</td>
            <td scope="row" class="municipioU">${datos[i][12]}</td>
            <td scope="row" class="trabajoU">${datos[i][13]}</td>
            </tr>
            `;
        }
        $('#select-profe-tema').append(template_combo);
        $('#datos-profesores').append(template_tabla);

      }
    });
  }
  ////////PINTAR COMBO CURSO//////////////
  function traerDatosCurso() {
    $.ajax({
      url: "../controllers/bloque.php",
      type: "POST",
      data: { 'accion': 'items' },

      success: function (response) {
        console.log(response);
        datos = JSON.parse(response);
        if (datos != '') {

          template = '';
          for (i = 0; i < datos.length; i++) {
            template += `<option value="${datos[i][0]}">${datos[i][1]}</option> `;
          }
          $('#select-curso-tema').append(template);
        }
        else {
          $('#select-curso-tema').html('<option value="0">Selecciona un curso</option>');
        }

      }
    });
  }

  ////////LLEVAR SELECT PARA METER A SESSION//////////////
  function llevarSelectSession() {
    $(document).on('change', '#select-profe-tema', function () {
      $.ajax({
        url: "../controllers/combo_profesores.php",
        type: "POST",
        data: 'SProfesor=' + $(this).val(),

        success: function (response) {
          console.log(response);
          if (response != '') {
            traerDatosCurso();
          }

        }
      });
    });
    $(document).on('change', '#select-curso-tema', function () {
      $.ajax({
        url: "../controllers/combo_profesores.php",
        type: "POST",
        data: 'SCurso=' + $(this).val(),

        success: function (response) {
          console.log(response);
          if (response != '') {
            datosExamen();
          }

        }
      });
    });

  }

  //                                                     ### REGISTRO DE BLOQUES START ##

  //AGREGAR A LA TABLA ANTES DE ENVIAR

  function datosUsuario() {





    $(document).on('click', '#btn-bloque', function () {//RESTABLECE VALORES A NULL AL AGREGAR A LA TABLA
      var valores = "";


      //MANDAR ARRAY A BACK(PHP)

      let arrayCursos = [];

      document.querySelectorAll('#tabla tbody tr').forEach(function (e) {
        let fila = [
          e.querySelector('.idbloque').innerText,
          e.querySelector('.nombrebloque').innerText,
          e.querySelector('.idcurso').innerText,

        ];
        arrayCursos.push(fila);
      });
      $.ajax({
        url: "../controllers/bloque.php",
        type: "POST",
        data: {
          'JSON': JSON.stringify(arrayCursos),
          'accion': 'insertar'
        },

        success: function (response) {

          if (response == 1) {
            alert("enviado con exito");
            $('#datos-bloque tr').remove();
          } else {
            alert("datos no enviados, hubo un error");
          }


        }
      });

    });

  }

  //                                                     ### REGISTRO DE TEMAS START ##

  //                                                     ### REGISTRO DE EXAMEN START ##

  function datosExamen() {
    $.ajax({
      url: "../controllers/combo_profesores.php",
      type: "POST",
      data: 'info-examen=examen',

      success: function (response) {

        datos = JSON.parse(response);
        console.log(datos);
        template = '';
        for (i = 0; i < datos.length; i++) {
          template +=
            `
            <tr class="del">
            <td scope="row" class="idexamen" style="display: none;">${datos[i][0]}</td>
            <td scope="row" class="nombreExamen">${datos[i][1]}</td>
            <td scope="row" class="descripcionExamen">${datos[i][2]}</td>
            <td scope="row">${datos[i][3]}</td>
            <td>
            `;
        }
        $('#datos-examen').append(template);

      }
    });

    $(document).on('click', '#btn-examen-añadir', function () {
      var nombre = $('#nombre-bloque').val();
      var bloque = $('#select-bloque-tema').val();
      var text = $('#select-curso-tema option:selected').text();
      template = '';
      template +=
        `
        <tr class="del">
        <td scope="row" class="idbloque" style="display: none;"></td>
        <td scope="row" class="idcurso" style="display: none;">${curso}</td>
        <td scope="row" class="nombrebloque">${nombre}</td>
        <td scope="row">${text}</td>
        <td>
        <button id="borrar-bloque">borrar</button>
        </td>
        </tr>
        
        `;
      $('#datos-bloque').append(template);
      $('#nombre-bloque').val("");

    });

    $(document).on('click', '#borrar-bloque', function () {//BORRA CONTENIDO ANTES DE ENVIAR
      $(this).parent().parent().remove();
    });

    $(document).on('click', '#btn-bloque', function () {//RESTABLECE VALORES A NULL AL AGREGAR A LA TABLA
      var valores = "";

      $('#datos-bloque').find("th").each(function () {
        valores += $(this).html() + "\n";
      });

      //MANDAR ARRAY A BACK(PHP)

      let arrayCursos = [];

      document.querySelectorAll('#tabla tbody tr').forEach(function (e) {
        let fila = [
          e.querySelector('.idbloque').innerText,
          e.querySelector('.nombrebloque').innerText,
          e.querySelector('.idcurso').innerText,

        ];
        arrayCursos.push(fila);
      });
      $.ajax({
        url: "../controllers/bloque.php",
        type: "POST",
        data: {
          'JSON': JSON.stringify(arrayCursos),
          'accion': 'insertar'
        },

        success: function (response) {

          if (response == 1) {
            alert("enviado con exito");
            $('#datos-bloque tr').remove();
          } else {
            alert("datos no enviados, hubo un error");
          }


        }
      });

    });

  }
});