$(document).ready(function(){
    $("#codigoProducto").change(function(e) { 
        e.preventDefault();
        var cod_producto = $("#codigoProducto").val()
        
        $.ajax({
            url: "compras.php",
            data: {
                cod_producto: cod_producto
            },
            type: "POST",
            dataType: "json",
            success: function (res) {
                if(res.producto != null){
                    $("#nomProducto").val(res.producto);
                    $("#categoria").val(res.categoria);
                } else{
                    alert(res.msg_producto);
                    $("#nomProducto").val(' ');
                    $("#categoria").val(' ');
                }
            },
            error: function(xhr, status){
                console.log("Algo salio mal :(");
            },

            complete: function (xhr, status) {  
                console.log("Peticion correcta");
            }
        });
    });
});