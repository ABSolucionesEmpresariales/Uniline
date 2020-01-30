$(document).ready(function () {
  pintar_Estados_Mexico('registrar-estado2');
  datosUsuario();

  $.ajax({
    url: "../controllers/registro-datos.php",
    type: "POST",
    data: {'peticion':'cargar_listas'},

    success: function (response) {
      datos=JSON.parse(response);
      $('#select_curso_tema').html(datos);
      
        console.log(datos);
     
      
    }
});


  function datosUsuario() {

    $(document).on('click','#btn-bloque-añadir', function(){
      var cantidad = $('#nombre-bloque').val();
      template = '';
      template +=
        `
        <tr class="del">
        <th scope="row">${cantidad}</th>
        <td>
        <button id="borrar-bloque">borrar</button>
        </td>
        </tr>
        
        `;
      $('#datos-bloque').append(template);
      $('#nombre-bloque').val("");

    });

    $(document).on('click','#borrar-bloque', function(){
      $(this).parent().parent().remove();
    });

    $(document).on('click','#btn-bloque', function(){
      var valores="";

        $('#datos-bloque').find("th").each(function(){
            valores+=$(this).html()+"\n";
        });

      $.ajax({
            url: "../controllers/registro-datos.php",
            type: "POST",
            data: 'valores='+valores,

            success: function (response) {
              if(response){
                console.log("entra: "+response);
              }
              
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