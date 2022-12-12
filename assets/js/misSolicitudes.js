$(document).ready(function(){
    var obj = {};
    $(".btn-ver").click(function(){
        var idSolicitud = $(this).data("id");
        obj.data   = {idSolicitud: idSolicitud, ac:"buscarSolicitud"};
        obj.url    = "compras.php";
        obj.accion = "verSolicitud"   
        peticionAjax(obj);
    })
});

function peticionAjax (datos){
    $.ajax({
        url: datos.url,
            data: datos.data,
            type: "GET",
            dataType: "json",
        success: function (res) {
            switch(datos.accion){

            case "verSolicitud":
                $("#folio").val(res.folio);
                $("#fecha").val(res.fecha_creacion);
                $("#cantidad").val(res.cantidad);
                $("#descripcion").val(res.descripcion);
                $("#urgencia").val(res.id_urgencia);
                $("#producto").val(res.producto);
                $("#codigo-producto").val(res.codigo_producto);
                $("#categoria").val(res.categoria);
                $("#status").val(res.status);
                $("#modalVerSolicitud").modal("show");
            break;

            case "guardarSolicitud":
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