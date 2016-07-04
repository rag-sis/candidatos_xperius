$(document).ready(function(){
	
	
   	$('#tipo_usuario').change(function(e) {
    	//perform AJAX call
    	
        var lista=document.getElementById("tipo_usuario");
    	var valorSeleccionado = lista.options[lista.selectedIndex].value;
    	
    	if(valorSeleccionado=='can'){
    		$("#curri").show("slow");
            $("#url_curri").show("slow");
            $("#vac").show("slow");
    	}else{
    		$("#curri").hide("slow");		
            $("#url_curri").hide("slow");
            $("#vac").hide("slow");
    	}
   	});
   

    					
    var lista=document.getElementById("tipo_usuario");
    	var valorSeleccionado = lista.options[lista.selectedIndex].value;
    	
    	if(valorSeleccionado=='can'){
    		$("#curri").show("slow");
            $("#url_curri").show("slow");
            $("#vac").show("slow");
    	}else{
    		$("#curri").hide("slow");
            $("#url_curri").hide("slow");
            $("#vac").hide("slow");		
    	}
        
    //Script para cargar datos al seleccionable de vacantes
      
      var lista_c=document.getElementById("sel_vacante");
      var tam=lista_c.options.length;
      var url = '/vacante/lista_vacantes';
          $.ajax({
                'url': url,
                 'dataType': 'json',
                success: function(result){
                    //lista_c.options[tam]=new Option(result,result);
                    var i=0;
                    jQuery.each(result, function() {
                            if(result[i].estado_v == 1){
                                lista_c.options[tam+i]=new Option(result[i].titulo_v,result[i].cod_v);
                                        
                            }
                            
                        i++;
                    });

                    
                }
            });
    
	
});