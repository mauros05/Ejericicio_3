$(document).ready(function(){
    $("#Login").click(function(){
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
               if(res.validar == 0){
                   $("#div-message").html(res.mensaje);
                   $("#modalLogin").modal("show")
               } else {
                    window.location = "home.php";
               }
            },

            error: function(xhr, status){
                //alert("Algo salio mal :(");
            },

            complete: function (xhr, status) {  
                //alert("Peticion correcta");
            }
        });
    })



});