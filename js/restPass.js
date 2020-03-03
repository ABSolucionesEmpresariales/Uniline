$(document).ready(function(){
    $("#resetPass").submit(function(){
        primerPass = $("#new-pass").val();
        segundaPass = $("#confirm-new-pass").val();
        if(primerPass == segundaPass){
            const data = {
                newPass:primerPass,
                correo:$("#con_email").val()
            }
            $.ajax({
                url:"../controllers/reset_pass.php",
                type:"POST",
                data:data,

                success: function(response){
                    console.log(response);
                    if(response == "1"){
                        location.href ="mainpage.php";
                    }else{
                        $("#alert_pass").html("<p>Oh, oh parece que las contrasenas no coinciden</p>");
                    }
                }
            })
        }else{
            $("#alert_pass").html("<p>Oh, oh parece que las contrasenas no coinciden</p>");
        }
    });
});