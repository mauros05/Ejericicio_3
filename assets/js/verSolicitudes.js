// PETICION AJAX 2

$(document).ready(function(){
    var obj = {};
    $(".btn-ver").click(function(){
        var idSolicitud = $(this).data("id");

        // Asignamos los atributos a los botones de la modal
        $("#aceptar-modal").attr("data-id", idSolicitud)
        $("#cancelar-modal").attr("data-id", idSolicitud)

        obj.data   = {idSolicitud: idSolicitud, ac:"buscarSolicitud"};
        obj.url    = "compras.php";
        obj.type   = "GET";
        obj.accion = "verSolicitud";  
       var res = peticionAjax2(obj);
            // Ocultamos los botones
            if(res.id_status == "4" || res.id_status == "2"){
                $("#aceptar-modal").attr("hidden", "true")
                $("#cancelar-modal").attr("hidden", "true")
            } else {
                $("#aceptar-modal").removeAttr("hidden");
			    $("#cancelar-modal").removeAttr("hidden");
            }

            if(typeof res.productos_res !== 'undefined'){
                $(".contenedor-producto").hide();

                $("#folio").val(res.folio);
                $("#fecha").val(res.fecha_creacion);
                $("#urgencia").val(res.id_urgencia);
                $("#descripcion").val(res.descripcion);
                $("#status-modal").val(res.status);
                $(".solo-producto").attr("hidden", "true")
                var productos ="";

                $.each(res.productos_res, function (key, producto) { 
                    // Con el += concatenamos 
                    productos+=`<hr>
                                <div class="mb-3">
                                    <label for="codigoProducto" class="form-label">Codigo del Producto:</label>
                                    <input type="text" name="codigo-producto" class="form-control" id="codigo-producto" value="${producto.codigo_producto}" readonly='readonly'/>
                                </div>

                                <div class="mb-3">
                                    <label for="producto" class="form-label">Producto:</label>
                                    <input type="text" class="form-control" id="producto" value='${producto.producto}' readonly='readonly'/>
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
            } else if(typeof res.productos_res_arr !== 'undefined'){
				var productos_Arry = JSON.parse(res.productos_res_arr)
				$(".contenedor-producto").hide();
                $("#folio").val(res.folio);
                $("#fecha").val(res.fecha_creacion);
                $("#urgencia").val(res.id_urgencia);
                $("#descripcion").val(res.descripcion);
                $("#status-modal").val(res.status);
                $(".solo-producto").attr("hidden", "true")
                var productos ="";
                $.each(productos_Arry , function (key, producto) { 
                    // Con el += concatenamos 
                    productos+=`<hr>
                                <div class="mb-3">
                                    <label for="codigoProducto" class="form-label">Codigo del Producto:</label>
                                    <input type="text" name="codigo-producto" class="form-control" id="codigo-producto" value="${producto.codigo_producto}" readonly='readonly'/>
                                </div>

                                <div class="mb-3">
                                    <label for="producto" class="form-label">Producto:</label>
                                    <input type="text" class="form-control" id="producto" value='${producto.nomProducto}' readonly='readonly'/>
                                </div>
                        
                                <div class="mb-3">
                                    <label for="catidad" class="form-label">Cantidad:</label>
                                    <input type="text"  class="form-control" id="cantidad" value='${producto.cantidad}' readonly='readonly'/>
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
                $(".multi-producto").html("")
                $(".solo-producto").removeAttr("hidden");
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
           $("#aceptarSolicitud"+idSolicitud).attr('hidden','true');
           $("#modalVerSolicitud").modal("hide");
        }

    })

    $(".btn-aceptar").click(function(event) { 
        var idSolicitud = $(this).data("id");

        obj.data   = {idSolicitud: idSolicitud, accion: "enviarcompras" };
        obj.url    = "compras.php";
        obj.type   = "POST";
        obj.accion = "verSolicitud";
        var res = peticionAjax2(obj);
        
        if (res == true) {
           $("#status"+idSolicitud).attr("class", "bg-primary");
           $("#status"+idSolicitud).html("enviado a compras")
           $("#cancelarSolicitud"+idSolicitud).attr('hidden','true');
           $("#aceptarSolicitud"+idSolicitud).attr('hidden','true');
           $("#modalVerSolicitud").modal("hide");
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


