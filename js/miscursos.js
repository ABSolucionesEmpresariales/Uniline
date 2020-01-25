$(document).ready(function () {
    datosUsuario();

    function datosUsuario() {
        $.ajax({
            url: "../controllers/cursos_alumno.php",
            type: "POST",
            data: 'datos=datos',

            success: function (response) {
                if(response == 'sin-alumnos'){
                    $('#hay-cursos').html('No tienes cursos');
                }
                let datos = JSON.parse(response);
                if(response){
                    $('#hay-cursos').html('Mis cursos');
                    template =
                    `
                <tr>
                    <th id="imagen-curso" class="align-middle" style="width: 12rem;" scope="row"><img src=${datos[0][3]} alt="logo-html5" width="100%"></th>
                    <td id="nombre-curso" class="align-middle"><h2 class="h3">${datos[0][1]}</h2></td>
                    <td id="descripcion-curso" class="align-middle"><h4 class="h4">${datos[0][2]}</h4></td>
                    <td id="progreso-curso" class="align-middle"><h3 class="h1"></h3></td>
                 </tr>

                    `;
                    $('#lista-tabla-cursos').html(template);
                }
            }
        });
    }
});