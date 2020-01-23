$(document).ready(function(){

    $.ajax({
        url:"../controllers/cursos_alumno.php",
        type:"POST",
        data:"cursos-contenido="+curso,success: function(response){

            let datos = JSON.parse(response);
            templete +=`                    
            <div class="row" style="width: 765px">
                <p class="h3 p-2 text-white" style="margin-left: 280px;">Contenido del curso</p>`;
            $.each(datos, function (i, item) {
                templete +=`
                    <div class="col-12 border-bottom">
                        <div class="row">
                            <div class="col-12">
                                <p style="cursor:pointer;" data-bloque="bloque-${item[0]}" class="h4 cursos-slide font-italic text-white">+ Contenido del bloque ${i + 1}</p>
                            </div>
                            <div data-temas="bloque-${item[2]}-${item[0]}" class="row ml-5 bloque-${item[0]}" style="display: none">
                            </div>
                        </div>
                    </div>
                `;
            });
templete +=`</div>`;
            $('.view-curso').html(templete);
            $('.boton-footer').html(`<button type="button" data-actcs="${curso}" class="btn btn-md btn-outline-secondary border border-secondary text-white" data-dismiss="modal">Comprar</button>`);
            $('#date-modal').click(); 
        }
    });
});