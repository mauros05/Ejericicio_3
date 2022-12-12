$(document).ready(function(){
    var obj = {};
    $("#codigoProducto").change(function(e) { 
        e.preventDefault();
        var cod_producto = $("#codigoProducto").val()

        obj.data   = { cod_producto: cod_producto}
        obj.url    = "compras.php";
        obj.accion = "buscarProducto"   
        peticionAjax(obj);
    });


    $("#crearSolicitud").click(function(e){
        e.preventDefault();
        var datos = $("#crear-solicitud").serialize();

        if($("#codigoProducto").val() == '' || $("#cantidad").val() == '' || $("#descripcion").val() == '' ){
           if($("#codigoProducto").val() == '') {
                $("#codigoAlert").html("Campo Requerido");
                $("#codigoAlert").removeAttr("hidden");
            }

            if($("#cantidad").val() == '') {
                $("#cantidadAlert").html("Campo Requerido");
                $("#cantidadAlert").removeAttr("hidden");
            }

            if($("#descripcion").html() == '') {
                $("#descripcionAlert").html("Campo Requerido");
                $("#descripcionAlert").removeAttr("hidden");
            }
        } else {
            obj.data = datos;
            obj.url = "compras.php";
            obj.accion = "guardarSolicitud"
            peticionAjax(obj);
        }
    })
});

    function peticionAjax (datos){
        $.ajax({
            url: datos.url,
                data: datos.data,
                type: "POST",
                dataType: "json",
            success: function (res) {
                switch(datos.accion){

                case "buscarProducto":
                    if(res.producto != null){
                        $("#nomProducto").val(res.producto);
                        $("#categoria").val(res.categoria);
                    } else{
                        alert(res.msg_producto);
                        $("#nomProducto").val(' ');
                        $("#categoria").val(' ');
                    }
                break;

                case "guardarSolicitud":
                    $("#div-message").html(res);
                    $("#modalSolicitud").modal("show");
                    setTimeout(function(){
                        window.location = "compras.php?ac=ms"
                    }, 5000);
                break;
                }

            },

            error: function(xhr, status){
                console.log("Algo salio mal :(");
            },

            complete: function (xhr, status) {  
                console.log("Peticion correcta");
            }
        });
    }