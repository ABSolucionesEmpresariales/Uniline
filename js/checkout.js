$(document).ready(function () {
  $(document).on('click', '.compras', function (event) {
    let idcurso = $(this).val();
    $.post("../controllers/checkout.php", { idcurso: idcurso}, function (response) {
   
      if (response == "pagado") {
        window.location.replace('../Views/dashboard.php?idcurso='+idcurso);
      } else {
        console.log(response);
        var stripe = Stripe('pk_test_OTcbgHS4tbxZaWVcZ1IjcUt900jFHDsOdd');
        stripe.redirectToCheckout({
          sessionId: response
        }).then(function (response) {
        
          swal("Alerta!", "La compra ha fallado intente de nuevo o contacte a soporte técnico", "info");
           //imprimir mensaje ocurrio un problema
          // si elgo sale mal usar aqui para debuggear: `result.error.message`para informarle el error al usuario
       
        });
      }
    });
  });
});