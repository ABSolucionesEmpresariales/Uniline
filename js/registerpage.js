$(document).ready(function () {
  pintar_Estados_Mexico('registrar-estado2');
  datosUsuario();
  traerDatosCurso();

  ////////LLENAR COMBO CURSO//////////////
  function traerDatosCurso() {
    $.ajax({
      url: "../controllers/registro-datos.php",
      type: "POST",
      data: 'info-cursos=cursos',

      success: function (response) {
        datos = JSON.parse(response);
        template = '';
        for (i = 0; i < datos.length; i++) {
          template +=
            `
                  <option value="${datos[i][0]}">${datos[i][1]}</option>

                        `;
        }
        $('#select-curso-tema').append(template);
      }
    });
  }

  function datosUsuario() {

    ///////////////////AGREGAR A LA TABLA ANTES DE ENVIAR////////////////////////////
    $(document).on('click', '#btn-bloque-añadir', function () {
      var nombre = $('#nombre-bloque').val();
      var curso = $('#select-curso-tema').val();
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

      ////////////MANDAR ARRAY A BACK(PHP)//////////////

      let arrayCursos = [];

      document.querySelectorAll('#tabla tbody tr').forEach(function (e) {
        let fila = [
          e.querySelector('.idbloque').innerText,
          e.querySelector('.nombrebloque').innerText,
          e.querySelector('.idcurso').innerText,

         ];
        arrayCursos.push(fila);
      });

     // console.debug(arrayCursos);

      $.ajax({
        url: "../controllers/bloque.php",
        type: "POST",
        data: {
          'JSON': JSON.stringify(arrayCursos),
          'accion': 'insertar'
        },

        success: function (response) {

          console.log("entra: " + response);


        }
      });

    });

  }

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

});