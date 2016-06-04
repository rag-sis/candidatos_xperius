
$(document).ready(function(){
	$('.eliminar').click(function(evento){
		if(!confirm('¿Está seguro de eliminar este elemento?')){
			evento.preventDefault();
		}
	});
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