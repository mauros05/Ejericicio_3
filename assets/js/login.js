$(document).ready(function(){
    $("#Login").click(function(event){
        event.preventDefault();
    
        var usu = $("#email").val();
        var pass = $("#password").val();

        $.ajax({
            url: "index.php",
            data: {
                    usuario: usu,
                    password: pass
                },
            type: "POST",
            dataType: "json",

            success: function (res) {
                if(res.validar_user == 'valuser'){
                    $("#validationUser").html(res.usuario);
                    $("#validationUser").removeAttr("hidden");
                } else {
                    $("#validationUser").attr("hidden", "true");
                }

                if(res.validar_password == 'valpass'){
                    $("#validationPassword").html(res.password);
                    $("#validationPassword").removeAttr("hidden");
                } else {
                    $("#validationPassword").attr("hidden", "true");
                }

               if(res.validar == 0){
                   $("#div-message").html(res.mensaje);
                   $("#modalLogin").modal("show")
                } else {
                    window.location = "home.php";
                }
            },

            error: function(xhr, status){
                console.log("Algo salio mal :(");
            },

            complete: function (xhr, status) {  
                console.log("Peticion correcta");
            }
        });
    })



});