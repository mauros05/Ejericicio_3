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
        var res = peticionAjax2(obj);
        if(res.error_msg != null){
			alert(res.error_msg);
			$("#nombreProveedor").val('');
			$("#direccion").val('');
		}else{
			$("#nombreProveedor").val(res.nombre);
			$("#direccion").val(res.direccion);
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

    function calcularTotalGeneral(){
        var totalGeneral = 0;
        
        $(".precioUnitario").each(function(){
            var id_producto = $(this).data("id_producto");

            if($(".checkboxProd"+id_producto).prop('checked')){
                var precio = $(this).val();
                var cantidad = $(this).data("cantidad");
                totalGeneral += precio * cantidad;
                
                $("#total_general").text(totalGeneral);
            }
        });
        if(totalGeneral == 0){
            $("#total_general").text(totalGeneral)
        }
    }

})

