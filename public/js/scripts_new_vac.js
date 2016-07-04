$(document).ready(function(){
	

	//Script para cargar datos al seleccionable de ciudades
      
      var lista_c=document.getElementById("sel_ciudad");
      var tam=lista_c.options.length;
      var url = '/ciudad/lista_ciudades';
          $.ajax({
                'url': url,
                 'dataType': 'json',
                success: function(result){
                    //lista_c.options[tam]=new Option(result,result);
                    var i=0;
                    jQuery.each(result, function() {
                        
                            lista_c.options[tam+i]=new Option(result[i].nom_c,result[i].nom_c);    
                        i++;
                    });

                    
                }
            });                      
            


	
	});