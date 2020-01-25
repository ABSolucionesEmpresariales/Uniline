$(document).ready(function(){
    $("#mostrar").hide();
    $("#mostrar").toggle(700);
});

$(window).resize(function () {
    if ($(window).width() < 768) {
        $("#ventana-alerta").removeClass("alertaspago");
        $("#ventana-alerta").addClass("alertaspago-responsive");
        $(".overlay-bg").addClass("over-bg");

    }
    if ($(window).width() > 768 && $(window).width() < 1400) {
        $("#ventana-alerta").removeClass("alertaspago-responsive");
        $("#ventana-alerta").addClass("alertaspago");
        $(".overlay-bg").removeClass("over-bg");
    }
    if ($(window).width() >= 1440) {
        $("#ventana-alerta").removeClass("alertaspago-responsive");
        $("#ventana-alerta").removeClass("alertaspago");
        $(".overlay-bg").removeClass("over-bg");
        $("#ventana-alerta").addClass("alertaspago-xl");
        $(".overlay-bg").addClass("over-bg-xl");

    }
});

if ($(window).width() < 768) {
    $("#ventana-alerta").removeClass("alertaspago");
    $("#ventana-alerta").addClass("alertaspago-responsive");
    $(".overlay-bg").addClass("over-bg");
}
if ($(window).width() > 768) {
    $("#ventana-alerta").removeClass("alertaspago-responsive");
    $("#ventana-alerta").addClass("alertaspago");
    $(".overlay-bg").removeClass("over-bg");
}
if ($(window).width() >= 1440) {
    $("#ventana-alerta").removeClass("alertaspago-responsive");
        $("#ventana-alerta").removeClass("alertaspago");
        $(".overlay-bg").removeClass("over-bg");
        $("#ventana-alerta").addClass("alertaspago-xl");
        $(".overlay-bg").addClass("over-bg-xl");
}
    
    
