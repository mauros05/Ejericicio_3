// PETICION AJAX 2

$(document).ready(function(){
    var obj = {};
    $(".btn-ver").click(function(){
        var idSolicitud = $(this).data("id");
        obj.data   = {idSolicitud: idSolicitud, ac:"buscarSolicitud"};
        obj.url    = "compras.php";
        obj.type   = "GET";
        obj.accion = "verSolicitud";  
       var res = peticionAjax2(obj);
            $("#folio").val(res.folio);
            $("#fecha").val(res.fecha_creacion);
            $("#cantidad").val(res.cantidad);
            $("#descripcion").val(res.descripcion);
            $("#urgencia").val(res.id_urgencia);
            $("#producto").val(res.producto);
            $("#codigo-producto").val(res.codigo_producto);
            $("#categoria").val(res.categoria);
            $("#status-modal").val(res.status);
            $("#modalVerSolicitud").modal("show");
    })

    $(".btn-cancel").click(function(event) { 
        var idSolicitud = $(this).data("id");
        obj.data   = {idSolicitud: idSolicitud, accion: "cancelar" };
        obj.url    = "compras.php";
        obj.type   = "POST";
        obj.accion = "verSolicitud";
        var res = peticionAjax2(obj);
        if (res == true) {
           $("#status"+idSolicitud).attr("class", "bg-danger");
           $("#status"+idSolicitud).html("cancelado")
           $("#cancelarSolicitud"+idSolicitud).attr('hidden','true');
        }

    })

});

// PETICION AJAX 

// $(document).ready(function(){
//     var obj = {};
//     $(".btn-ver").click(async function(){
//         var idSolicitud = $(this).data("id");
//         obj.data   = {idSolicitud: idSolicitud, ac:"buscarSolicitud"};
//         obj.url    = "compras.php";
//         obj.accion = "verSolicitud"   
//        var res = await peticionAjax(obj);
//             $("#folio").val(res.folio);
//             $("#fecha").val(res.fecha_creacion);
//             $("#cantidad").val(res.cantidad);
//             $("#descripcion").val(res.descripcion);
//             $("#urgencia").val(res.id_urgencia);
//             $("#producto").val(res.producto);
//             $("#codigo-producto").val(res.codigo_producto);
//             $("#categoria").val(res.categoria);
//             $("#status").val(res.status);
//             $("#status").addClass(res.color);
//             $("#modalVerSolicitud").modal("show");
//     })
// });


