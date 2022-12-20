$(document).ready(function(){
    var obj = {};
    init();
    function init(){
        event.preventDefault
        console.log("Saludos")
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
    })

})