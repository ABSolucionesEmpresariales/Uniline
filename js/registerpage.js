$(document).ready(function () {
  pintar_Estados_Mexico('registrar-estado2');
  traerDatosProfe(); //trae a los combos informacion del profesor para mandarla por sesion
  traerDatosCurso();  //pinta el combo con los cursos segun la sesion
  llevarSelectSession(); //lleva a session lo que esta en ese momento en el select
  insertarBloques(); //inserta bloques a la BD


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
  function traerDatosCurso() {
    $.ajax({
      url: "../controllers/bloque.php",
      type: "POST",
      data: {'accion' : 'items' },

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
            datosBloques();
          }
        }
      });
    });
  }

  //////////////////////////////////////////////////////////### REGISTRO DE BLOQUES START ##/////////////////////////

  

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
  function insertarBloques() { //INSERTA DATOS A LA BD

    $(document).on('click', '#btn-bloque', function () {
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

  }

  //                                                     ### REGISTRO DE TEMAS START ##

  //                                                     ### REGISTRO DE EXAMEN START ##

  
});