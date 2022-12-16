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
            if(res.productos_res != ''){
                $(".contenedor-producto").hide();
                $("#folio").val(res.folio);
                $("#fecha").val(res.fecha_creacion);
                $("#urgencia").val(res.id_urgencia);
                $("#descripcion").val(res.descripcion);
                $("#status-modal").val(res.status);
                var productos ="";
                $.each(res.productos_res, function (key, producto) { 
                    // Con el += concatenamos 
                    productos+=`<hr>
                                <div class="mb-3">
                                    <label for="producto" class="form-label">Producto:</label>
                                    <input type="text" class="form-control" id="producto" value='${producto.producto}' readonly='readonly'/>
                                </div>
                        
                                <div class="mb-3">
                                    <label for="codigoProducto" class="form-label">Codigo del Producto:</label>
                                    <input type="text" name="codigo-producto" class="form-control" id="codigo-producto" value="${producto.codigo_producto}" readonly='readonly'/>
                                </div>

                                <div class="mb-3">
                                    <label for="catidad" class="form-label">Cantidad:</label>
                                    <input type="text"  class="form-control" id="cantidad" value='${producto.codigo_producto}' readonly='readonly'/>
                                </div>
                        
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoria:</label>
                                    <input type="text" name="categoria" class="form-control" id="categoria" value='${producto.categoria}' readonly='readonly'/>
                                </div>`;
                });
                $(".multi-producto").html(productos)
                $("#modalVerSolicitud").modal("show");
            } else{
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
            }
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


