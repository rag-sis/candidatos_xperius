<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="{{asset('/datet/jquery.datetimepicker.css')}}"/>
<script src="{{ asset('/datet/build/jquery.datetimepicker.full.js') }}"></script>
<title></title>
</head>
<body>

	<span><h5>Candidato(a): </h5>{{$entrevista->postulacion->usuario->nom_u}}</span>
	<br/>
	<span><h5>Vacante: </h5>{{$entrevista->postulacion->vacante->titulo_v}}</span>
	<span><h5>Fecha de Entrevista: </h5>{{$entrevista->fecha_en}}</span>
	<span><h5>Estado : </h5>{{$entrevista->estado_en()}}</span>
	<span><h5>Descripción: </h5>{{$entrevista->descripcion_en}}</span>


</body>
</html>
