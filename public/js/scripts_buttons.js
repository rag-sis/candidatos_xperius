
$(document).ready(function(){
	$('.eliminar').click(function(evento){
		if(!confirm('¿Está seguro de eliminar este elemento?')){
			evento.preventDefault();
		}
	});

	 
	
   	$('#tipo_usuario').change(function(e) {
    	//perform AJAX call
    	
        var lista=document.getElementById("tipo_usuario");
    	var valorSeleccionado = lista.options[lista.selectedIndex].value;
    	
    	if(valorSeleccionado=='can'){
    		$("#curri").show("slow");
            $("#url_curri").show("slow");
    	}else{
    		$("#curri").hide("slow");		
            $("#url_curri").hide("slow");
    	}
   	});
   

    $('#btn_estado_v').on('click', function(e) {
        if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
        } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
        }
    });
						
    var lista=document.getElementById("tipo_usuario");
    	var valorSeleccionado = lista.options[lista.selectedIndex].value;
    	
    	if(valorSeleccionado=='can'){
    		$("#curri").show("slow");
            $("#url_curri").show("slow");
    	}else{
    		$("#curri").hide("slow");
            $("#url_curri").hide("slow");		
    	}
    //document.getElementById("tipo_usuario").disabled=true;
    
                            
                            
            

	
});
function boton_nuevo_usuario(){

	window.location = '/usuario/crear';
}
function boton_nuevo_vacante(){

	window.location = '/vacante/crear';
}
function cerrar_sesion(){

	window.location = '/usuario/logout';
}
function boton_eliminar(){
	if(!confirm('¿Está seguro de eliminar este elemento?')){
			evento.preventDefault();
		}
}
function mostrar_datos_usuario(id) {
        $(document).ready(function () {
            $("#result").hide("slow");
            $("#cargar_reporte").show("slow");
            $("#editar_resul").load("/usuario/ver_informacion_usuario/" + id, " ", function () {
                $("#editar_resul").show("slow");
                $("#cargar_reporte").hide("slow");
            });
        });
    }
 function mostrar_datos_vacante(id) {
        $(document).ready(function () {
            $("#result").hide("slow");
            $("#cargar_datos_vacante").show("slow");
            $("#datos_vacante").load("/vacante/ver_informacion_vacante/" + id, " ", function () {
                $("#datos_vacante").show("slow");
                $("#cargar_datos_vacante").hide("slow");
            });
        });
    }

    function enviar_email_vacante(id) {
        $(document).ready(function () {
            $("#result").hide("slow");
            $("#cargar_vista_invitar").show("slow");
            $("#datos_invitar").load("/vacante/enviar_invitacion/" + id, " ", function () {
                $("#datos_invitar").show("slow");
                $("#cargar_vista_invitar").hide("slow");
            });
        });
    }




