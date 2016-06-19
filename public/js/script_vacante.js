$(document).ready(function(){
   

    $('#btn_estado_v').change( function(e) {

        
    });
						
   
	
});

function upd_estado(id){
var val=0;
var vid="#btn_estado_v"+id;

    if( $(vid).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        val=1;
        }else{
            val=0;
        }
    var url = '/vacante/act_es/'+id+'/'+val;
          $.ajax({
                'url': url,
                success: function(result){
                    //alert(result);
                }
            });



}