$(document).ready(function(){
    $("").submit(function(){
        primerPass = $("").val();
        segundaPass = $("").val();
        if(primerPass == segundaPass){
            const data = {
                newPass:primerPass,
                correo:$("").val()
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
                        $("").html("<p>Oh, oh parece que las contrasenas no coinciden</p>");
                    }
                }
            })
        }else{
            $("").html("<p>Oh, oh parece que las contrasenas no coinciden</p>");
        }
    });
});