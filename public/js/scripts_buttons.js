
$(document).ready(function(){
	$('.eliminar').click(function(evento){
		if(!confirm('¿Está seguro de eliminar este elemento?')){
			evento.preventDefault();
		}
	});

	$('#ver_datos').blur(function(){
		var a = $_GET("us");
		//alert(a);
		console.log(a);

		//var idp = $('#dia-add-item #idprod').val();
		//var url = '/producto/ver/' + idp;
		/*$.ajax({
			'url': url,
			success: function(datos){
				var producto = JSON.parse(datos);
				$('#dia-add-item #nombre').val(producto.nombre);
				$('#dia-add-item #precio').val(producto.precio);
			}
		});*/
	});

	$('#ver_dt').click(function(){

		var a = $_GET['us'];
		alert(a);
		console.log(a);
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




