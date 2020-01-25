$(document).ready(function () {
$(document).on('click', '.compras', function(event){
    $.post("../controllers/checkout.php", {idcurso: '1'}, function(response){
       var stripe = Stripe('pk_test_OTcbgHS4tbxZaWVcZ1IjcUt900jFHDsOdd');
       stripe.redirectToCheckout({
           sessionId: response
         }).then(function (result) {
           // If `redirectToCheckout` fails due to a browser or network
           // error, display the localized error message to your customer
           // using `result.error.message`.
         });
      });
});
});