$(document).ready(function () {
    datosUsuario();

    function datosUsuario() {
        $.ajax({
            url: "../controllers/cursos_alumno.php",
            type: "POST",
            data: 'datos=datos',

            success: function (response) {
                if (response == 'sin-alumnos') {
                    $('#hay-cursos').html('No tienes cursos');
                }
                let datos = JSON.parse(response);
                template = '';
                if (response) {
                    $('#hay-cursos').html('Mis cursos');

                    for (i = 0; i < datos.length; i++) {
                        template +=
                            `
                <tr>
                    <th id="imagen-curso" class="align-middle" style="width: 12rem;" scope="row"><img src=${datos[i][5]} alt="logo-html5" width="100%"></th>
                    <td id="nombre-curso" class="align-middle"><h2 class="h3">${datos[i][3]}</h2></td>
                    <td id="descripcion-curso" class="align-middle"><h4 class="h4">${datos[i][4]}</h4></td>
                    <td id="progreso-curso" class="align-middle"><h3 class="h1"></h3></td>
                 </tr>

                    `;
                    }
                    $('#lista-tabla-cursos').html(template);
                }
            }
        });
    }
});