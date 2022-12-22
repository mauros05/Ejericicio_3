$(document).ready(function(){
    var obj = {};
    init();
    function init(){
        event.preventDefault
    }

    $(".buscarProveedor").change(function(event){
        event.preventDefault();
        var cod_prov = $("#codigoProveedor").val();
        obj.data   = { cod_prov: cod_prov, ac: "bp"}
        obj.url    = "compras.php";
        obj.type = "GET"   
        var res = peticionAjax2(obj);
        if(res.error_msg != null){
			alert(res.error_msg);
			$("#nombreProveedor").val('');
			$("#direccion").val('');
            $("#id_proveedor").val('');
		}else{
			$("#nombreProveedor").val(res.nombre);
			$("#direccion").val(res.direccion);
            $("#id_proveedor").val(res.id_proveedor);
		}
    });

    $(".precioUnitario").change(function(){
        var precio = $(this).val()
        var cantidad = $(this).data("cantidad")
        var id_producto = $(this).data("id_producto")
        var total = precio * cantidad;

        $("#total"+id_producto).html(total)

        calcularTotalGeneral()
    });

    $(".checkTotal").change(function(){
		if($(this).prop('checked')){
			calcularTotalGeneral();
		}else{
			calcularTotalGeneral();
		}
	});

    $("#aceptar").click(function(){
        var data = $("#ordenS").serialize()
        obj.data = data
        obj.type = "POST"
        obj.url  = "complement/compras";   
        var res = peticionAjax2(obj);
    })

    function calcularTotalGeneral(){
        var totalGeneral = 0;
        
        $(".precioUnitario").each(function(){
            var id_producto = $(this).data("id_producto");

            if($(".checkboxProd"+id_producto).prop('checked')){
                $("#nombreProducto"+id_producto).attr("name", "nombreProducto"+id_producto);
                $("#codigoProducto"+id_producto).attr("name", "codigoProducto"+id_producto);
                $("#Categoria"+id_producto).attr("name", "Categoria"+id_producto);
                $("#Cantidad"+id_producto).attr("name", "Cantidad"+id_producto);
                $("#idProducto"+id_producto).attr("name", "id_producto"+id_producto);
                $(".precioU"+id_producto).removeAttr("disabled");
                
                var precio = $(this).val();
                var cantidad = $(this).data("cantidad");
                totalGeneral += precio * cantidad;
                
                $("#total_general").text(totalGeneral);
            }else{
                $("#nombreProducto"+id_producto).removeAttr("name");
                $("#codigoProducto"+id_producto).removeAttr("name");
                $("#Categoria"+id_producto).removeAttr("name");
                $("#Cantidad"+id_producto).removeAttr("name");
                $("#idProducto"+id_producto).removeAttr("name");
                $(".precioU"+id_producto).attr("disabled", true);
            }
        });

        if(totalGeneral == 0){
            $("#total_general").text(totalGeneral)
        }
    }

})

