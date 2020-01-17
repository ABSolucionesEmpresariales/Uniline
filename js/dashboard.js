$(document).ready(function(){
    lista_temas();

    $("#video").on('ended', function(){
        $(this).attr('src','../videos/Turntable - 10857.mp4');
    });
    

    $(document).on('click','.spam',function(){
        controlId = $(this).attr("id");
        console.log(controlId);
        $("."+controlId).slideToggle("slow");
    });

    $(document).on('click','.estrella',function(){
        controlStart = $(this).attr("id");
        if(controlStart == 1 && $('#'+controlStart).hasClass("checked") == true && $('#2').hasClass("checked") == false){
            $('#'+controlStart).removeClass('checked');
        }else{
            for(i=1; i<=5; i++){
                if(i <= controlStart){
                    $('#'+i).addClass('checked');
                }else{
                    $('#'+i).removeClass('checked');
                }
            }
        }
    });

    function lista_temas () {
    datos_actividad = ["Activiad 1.  Creacion de bases de datos en MySQL y PHP",
    "Tema 1.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
    "Tema 1.2 .- la mota no es adiccion",
    "Tema 1.3 .- la mota no es adiccion",
    "Tema 1.4 .- la mota no es adiccion",
    "Tema 1.5 .- la mota no es adiccion",
    "Tema 1.6 .- la mota no es adiccion",
    "Tema 1.7 .- la mota no es adiccion",
    ];
    datos_actividad2 = ["Activiad 2.  Creacion de bases de datos",
    "Tema 2.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
    "Tema 2.2 .- la mota no es adiccion",
    "Tema 2.3 .- la mota no es adiccion",
    "Tema 2.4 .- la mota no es adiccion",
    "Tema 2.5 .- la mota no es adiccion",
    "Tema 2.6 .- la mota no es adiccion",
    "Tema 2.7 .- la mota no es adiccion",
    ];
    datos_actividad3 = ["Activiad 3.   Creacion de bases de datos",
    "Tema 3.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
    "Tema 3.2 .- la mota no es adiccion",
    "Tema 3.3 .- la mota no es adiccion",
    "Tema 3.4 .- la mota no es adiccion",
    "Tema 3.5 .- la mota no es adiccion",
    "Tema 3.6 .- la mota no es adiccion",
    "Tema 3.7 .- la mota no es adiccion",
    ];
    datos_actividad4 = ["Activiad 4.   Creacion de bases de datos",
    "Tema 4.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
    "Tema 4.2 .- la mota no es adiccion",
    "Tema 4.3 .- la mota no es adiccion",
    "Tema 4.4 .- la mota no es adiccion",
    "Tema 4.5 .- la mota no es adiccion",
    "Tema 4.6 .- la mota no es adiccion",
    "Tema 4.7 .- la mota no es adiccion",
    ];
    datos_actividad5 = ["Activiad 5.   Creacion de bases de datos",
    "Tema 5.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
    "Tema 5.2 .- la mota no es adiccion",
    "Tema 5.3 .- la mota no es adiccion",
    "Tema 5.4 .- la mota no es adiccion",
    "Tema 5.5 .- la mota no es adiccion",
    "Tema 5.6 .- la mota no es adiccion",
    "Tema 5.7 .- la mota no es adiccion",
    ];
    datos_actividad6 = ["Activiad 6.   Creacion de bases de datos",
    "Tema 6.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
    "Tema 6.2 .- la mota no es adiccion",
    "Tema 6.3 .- la mota no es adiccion",
    "Tema 6.4 .- la mota no es adiccion",
    "Tema 6.5 .- la mota no es adiccion",
    "Tema 6.6 .- la mota no es adiccion",
    "Tema 7.7 .- la mota no es adiccion",
    ];
    datos_actividad7 = ["Activiad 7.   Creacion de bases de datos",
    "Tema 7.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
    "Tema 7.2 .- la mota no es adiccion",
    "Tema 7.3 .- la mota no es adiccion",
    "Tema 7.4 .- la mota no es adiccion",
    "Tema 7.5 .- la mota no es adiccion",
    "Tema 7.6 .- la mota no es adiccion",
    "Tema 7.7 .- la mota no es adiccion",
    ];
    datos_actividad8 = ["Activiad 8.   Creacion de bases de datos",
    "Tema 8.1.- la mota no es adiccion es un tema delicado por ver safffsfs",
    "Tema 8.2 .- la mota no es adiccion",
    "Tema 8.3 .- la mota no es adiccion",
    "Tema 8.4 .- la mota no es adiccion",
    "Tema 8.5 .- la mota no es adiccion",
    "Tema 8.6 .- la mota no es adiccion",
    "Tema 8.7 .- la mota no es adiccion",
    ];
    
    datos = [datos_actividad,datos_actividad2,datos_actividad3,datos_actividad4,datos_actividad5,datos_actividad6,datos_actividad7,datos_actividad8];
    template = `<h4 style="padding: 1rem;" class="h4 text-center widget_title mb-0">Contenido del curso</h4>`;
    $.each(datos, function (i, item) {
        for(y=0; y < datos[i].length; y++){
            if(y == 0){
                template += `
                <div class="row contenedor flex align-items-center" style="padding: .5rem; border-top:solid 1px; border-color: rgb(220, 220, 220);">
                            <input type="checkbox" id="customCheck-bloque-${i+1}" name="example1">
                            <label class="col-11"><div id="span-${i+1}" class="spam"><a style="font-family: 'Poppins:100', sans-serif; font-size: 16px; color: rgb(87, 87, 87);" class="nav-link">${item[y]}</a></div></label>
                            
                    <div class="span-${i+1} p-0 mt-0" style="display: none;">`;
            }else{
                template += 
                `<div class="custom-checkbox pt-1 m-0">
                    <input type="checkbox" class="" id="customCheck${i+1+"-"+y}" name="example1">
                    <label class="text-justify pl-4 align-middle"><astyle="font-family: 'Poppins:100', sans-serif; font-size: 16px; color: rgb(87, 87, 87);">${item[y]}</astyle="font-family:></label>
                </div>`;
            }
        }
    template +=`
            </div>
        </div>
        `;
    });
    $('.lista-curso-aside').html(template);
    }

    contenido = `<li class="nav-item rem-nav">
                        <a class="nav-link active" data-toggle="tab" href="#contenido-cursos">Contenido del curso</a>
                      </li>`;

$(window).resize(function() {
    if ($(window).width() < 768) {

        if($(".rem-nav").length != 1){
           $(contenido).prependTo("#nav-barra");  
           $("#nav-status").removeClass("active");
           $("#descripcion").removeClass("active");
           $("#contenido-cursos").removeClass("fade");
           $("#contenido-cursos").addClass("active");      
           $("#mov-div").detach().appendTo('#contenido-cursos');
           $("#scroll-responsive").addClass("scroll");
           $("#nav-barra").addClass("scrollmenu");
        }
        
    }
    if ($(window).width() > 768){
        $("#nav-status").addClass("active");
        $("#descripcion").addClass("active");
        $(".rem-nav").remove();
        $("#mov-div").detach().appendTo('#div-original');
        $("#scroll-responsive").removeClass("scroll");
        $("#nav-barra").removeClass("scrollmenu");
    }
});

if ($(window).width() < 768) {
       $(contenido).prependTo("#nav-barra");        
       $("#mov-div").detach().appendTo('#contenido-cursos'); 
       $("#nav-status").removeClass("active");
       $("#descripcion").removeClass("active");
       $("#contenido-cursos").removeClass("fade");
       $("#contenido-cursos").addClass("active");
       $("#scroll-responsive").addClass("scroll");
       $("#nav-barra").addClass("scrollmenu");
}
if ($(window).width() > 768){
    $("#nav-status").addClass("active");
    $("#descripcion").addClass("active");
    $(".rem-nav").remove();  
    $("#mov-div").detach().appendTo('#div-original');
    $("#scroll-responsive").removeClass("scroll");
    $("#nav-barra").removeClass("scrollmenu");
}
        
   
});