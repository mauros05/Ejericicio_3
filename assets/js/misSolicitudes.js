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

// PETICION AJAX 2

$(document).ready(function(){
    var obj = {};
    $(".btn-ver").click(function(){
        var idSolicitud = $(this).data("id");
        obj.data   = {idSolicitud: idSolicitud, ac:"buscarSolicitud"};
        obj.url    = "compras.php";
        obj.accion = "verSolicitud"   
       var res = peticionAjax2(obj);
            $("#folio").val(res.folio);
            $("#fecha").val(res.fecha_creacion);
            $("#cantidad").val(res.cantidad);
            $("#descripcion").val(res.descripcion);
            $("#urgencia").val(res.id_urgencia);
            $("#producto").val(res.producto);
            $("#codigo-producto").val(res.codigo_producto);
            $("#categoria").val(res.categoria);
            $("#status").val(res.status);
            $("#status").addClass(res.color);
            $("#modalVerSolicitud").modal("show");
    })
});

