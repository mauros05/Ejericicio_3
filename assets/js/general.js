function peticionAjax2(datos){
    var respuesta;
    $.ajax({
        // headers: {"X-CSRF-TOKEN": window.CSRF_TOKEN},
        // headers: {"Authorization": localStorage.getItem('token')},
        headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content')},
        async: false,
        url: datos.url,
        data: datos.data,
        type: datos.type,
        dataType: "json",
        success: function (res) {
            respuesta = res
        },

        error: function(xhr, status){
            console.log("Algo salio mal")
        },

        complete: function (xhr, status) {  
            console.log("Peticion correcta");
        }
    })
    return respuesta
}


// function peticionAjax(datos){
//     return new Promise(function(resolve,reject){
//         $.ajax({
//             url: datos.url,
//             data: datos.data,
//             type: "GET",
//             dataType: "json",
//             success: function (res) {
//                 resolve(res)
//             },

//             error: function(xhr, status){
//                 reject(status)
//             },

//             complete: function (xhr, status) {  
//                 console.log("Peticion correcta");
//             }
//         })
//     })
// }