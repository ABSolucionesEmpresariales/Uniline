$(document).ready(function() {
    pintar_Estados_Mexico('registrar-estado2');
    function pintar_Estados_Mexico(comboBox){
        var datos_estado_mexico = [];
        var i = 0;
      datos_estado_mexico = ["Aguascalientes","Baja California","Baja California Sur","Campeche","Chiapas","Chihuahua",
      "Ciudad de México","Coahuila de Zaragoza","Colima","Durango","México","Guanajuato","Guerrero","Hidalgo","Jalisco",
      "Michoacán de Ocampo","Morelos","Nayarit","Nuevo León","Oaxaca","Puebla","Querétaro","Quintana Roo","San Luis Potosí",
      "Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz de Ignacio de la Llave","Yucatán","Zacatecas"
      ];
      let templete = `<option value="">Elejir</option>`;
      for(i = 0; i < datos_estado_mexico.length; i++){
        templete +=  `<option value="${datos_estado_mexico[i]}">${datos_estado_mexico[i]}</option>`;
      }
      $('#'+comboBox).html(templete);

    }

});