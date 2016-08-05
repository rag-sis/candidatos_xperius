<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('/datet/jquery.datetimepicker.css')}}"/>

<script src="{{ asset('/datet/build/jquery.datetimepicker.full.js') }}"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/



$.datetimepicker.setLocale('es');
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
	
	
	beforeShowDay: function(date) {
		/*
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}
		*/
		return [true, ""];
	}
});



</script>
</head>
<body>

	<span><h5>Candidato(a):</h5>{{$postulacion->usuario->nom_u}}</span>
	<br/>
	<span><h5>Vacante:</h5>{{$postulacion->vacante->titulo_v}}</span>
<center>
	<form action="/entrevista/almacenar" method="post">
		{!! csrf_field() !!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<label>Seleccionar Fecha y Hora</label>
		<input type="hidden" name="postulacion" value="{{ $postulacion->cod_po }}">
		<input type="hidden" name="vacante" value="{{ $postulacion->cod_v }}">
		<input type="text" name="fecha" id="datetimepicker11" value="<?php echo date("Y/m/d H:i");  ?>" />
		<label>Descripción :</label>
		<textarea name="descripcion"></textarea>
		<br>
		<button>REGISTRAR</button>

	</form>
</center>

</body>