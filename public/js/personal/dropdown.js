$("#anoPagoParqueo").change(function(event){
    $.get("/Personal/SIGRECOFERO/public/admin/mesesParqueo/"+event.target.value+"",function(response, anoPagoParqueo1){
        console.log(response);
        $('#MesParqueo').empty();
        
        for (i=0; i<response.length; i++) {
            
                $("#MesParqueo").append("<option value'"+response[i].mes+"'>"+response[i].mes+"</option>"); 
            
        }
    });
});

$("#anoPagoAdmin").change(function(event){
    $.get("/Personal/SIGRECOFERO/public/admin/mesesAdmin/"+event.target.value+"",function(response, anoPagoAdmin1){
        // console.log(response);
        $('#MesAdmin').empty();
        for (i=0; i<response.length; i++) {
            $("#MesAdmin").append("<option value'"+response[i].mes+"'>"+response[i].mes+"</option>");
            
        }
    });
});



// $('#anoPagoAdmin').on('change',function(e){
    
//     var obtener=$('#anoPagoAdmin').find('option:selected');
//     var meses=$('#Mes');
//     var idAno =obtener.val();
//     if (idAno!=0) {
        
//         var ruta="/Personal/SIGRECOFERO/public/admin/mesesAdmin/"+idAno;
//         $.get(ruta,function(res){
//             if (res=='false') {
//                 meses.empty();
//             }else{
//                 meses.empty();
//                 $(res).each(function(key,value){
                    
//                     cadena= "<option value='"+value.mes+"'>"+value.mes+"</option>";
//                     meses.append(cadena);
//                 });
//             };
//         });
//     }else{
//         meses.empty();
//     };
// });