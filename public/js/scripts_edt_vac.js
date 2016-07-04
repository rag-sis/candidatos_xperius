$(document).ready(function(){
	

	//Script para cargar datos al seleccionable de ciudades
      
      var ciu= $('#l_v').val();
      //alert(ciu);
      var lista_c=document.getElementById("sel_ciudad");
      var tam=lista_c.options.length;
      var url = '/ciudad/lista_ciudades';
          $.ajax({
                'url': url,
                 'dataType': 'json',
                success: function(result){
                    //lista_c.options[tam]=new Option(result,result);
                    var i=0;
                    var is=0;
                    var ban=false;    
                    jQuery.each(result, function() {
                        if(ciu == result[i].nom_c){
                            lista_c.options[tam+i]=new Option(result[i].nom_c,result[i].nom_c ,true,true);
                            is=i;
                            ban=true;
                        }else{
                            lista_c.options[tam+i]=new Option(result[i].nom_c,result[i].nom_c);    
                        }
                        
                        //alert(result[1].nom_c);
                        i++;
                    });

                    if(ban){
                        lista_c.selectedIndex=tam+is;
                    }
                    
                }
            });                      
            



	});