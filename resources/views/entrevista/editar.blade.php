<!DOCTYPE html>
<html>
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
	<title></title>
</head>
<body>

	<span><h5>Candidato(a):</h5>{{$entrevista->postulacion->usuario->nom_u}}</span>
	<br/>
	<span><h5>Vacante:</h5>{{$entrevista->postulacion->vacante->titulo_v}}</span>
<center>
	<form action="/entrevista/editar" method="post">
		{!! csrf_field() !!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<label>Seleccionar Fecha y Hora</label>
		<input type="hidden" name="postulacion" value="{{ $entrevista->postulacion->cod_po }}">
		<input type="hidden" name="vacante" value="{{ $entrevista->postulacion->cod_v }}">
		<input type="hidden" name="entre" value="{{ $entrevista->cod_en }}" />
		<label>Fecha Anterior: {{ $entrevista->fecha_en}}</label>
		<input type="text" name="fecha" id="datetimepicker11" value="<?php echo date("Y/m/d H:i");  ?>" />
		<label>Descripción :</label>
		<textarea name="descripcion">{{$entrevista->descripcion_en}}</textarea>
		<br>
		<button>REPROGRAMAR</button>

	</form>
</center>

</body>
</html>
