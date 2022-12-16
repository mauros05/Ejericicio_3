$(document).ready(function(){
    var obj = {};
    var i   = 1;
    
    $(".buscarProductoCod").change(function(event) { 
        event.preventDefault();
        var cod_producto = $(".codigoProducto_0").val()
        
        obj.data   = { cod_producto: cod_producto}
        obj.url    = "compras.php";
        obj.accion = "buscarProducto"   
        obj.inc    = 0
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

    $("#add-Producto").click(function(){
        var n = $('.contenedor').length;
            n = n + parseInt(1)

        var valor = `<div id="dupProdcuto`+n+`" class="contenedor">       
        
            <div class="mb-3">
                <label for="codigoProducto" class="form-label">Codigo del Producto:</label>
                <input type="text" name="codigoProducto[]" class="form-control buscarProductoCod codigoProducto_`+n+`" id="codigoProducto" value=""/>
                <div id="codigoAlert" style="color: red" hidden></div>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Nombre del Producto:</label>
                <input type="text" name="nomProducto" class="form-control nomProducto_`+n+`" id="nomProducto" value='' readonly='readonly'/>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <input type="text" name="categoria" class="form-control categoria_`+n+`" id="categoria" value='' readonly='readonly'/>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" name="cantidad[]" class="form-control cantidad_`+n+`" id="cantidad" value=''/>
                <div id="cantidadAlert" style="color: red" hidden></div>
            </div>

            <button type="button" class="btn btn-danger mt-3 mb-3 borrarElemento" data-increment="`+n+`" id="borrar-Producto">Borrar Producto</button>
        </div>`;
        
        $("#contentProducto").append(valor);
        
        $(".buscarProductoCod").change(function(event) { 
            n = $(".contenedor").length;
    
            event.preventDefault();
            var cod_producto = $(".codigoProducto_"+n).val()

            obj.data   = { cod_producto: cod_producto}
            obj.url    = "compras.php";
            obj.accion = "buscarProducto"   
            obj.inc    = n
            peticionAjax(obj);
        });

        $(".borrarElemento").click(function(){
            var n = $(this).data("increment")
            var s = "#dupProdcuto"+n;
     
            $(s).remove();
         })
     
    });
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
                        $(".nomProducto_"+datos.inc).val(res.producto);
                        $(".categoria_"+datos.inc).val(res.categoria);
                    } else{
                        alert(res.msg_producto);
                        $(".nomProducto_"+datos.inc).val(' ');
                        $(".categoria_"+datos.inc).val(' ');
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