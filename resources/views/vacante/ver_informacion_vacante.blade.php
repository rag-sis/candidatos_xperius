<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>
</head>
<body>
	<div>

</div>
	<table class=" table-condensed text-left vacante_datos" cellpadding="0" cellspacing="0">
		<tr>
			<th width="150px">Título</th>
			<td>{{$vacante->titulo_v}}</td>
		</tr>
		<tr>
			<th >Lugar</th>
			<td>{{$vacante->lugar_v}}</td>
		</tr>
		
		<tr>
			<th>Posición</th>
			<td>{{$vacante->posicion_v}}</td>
		</tr>
		<tr>
			<th>Tiempo de Trabajo</th>
			<td>{{$vacante->tiempo_trabajo_v}}</td>
		</tr>
		<tr>
			<th>Tipo de Trabajo</th>
			<td>{{$vacante->tipo_trabajo_v}}</td>
		</tr>
		<tr>
			<th>Examenes</th>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Descripción</th>
			<td>{{$vacante->descripcion_v}}</td>
		</tr>

	</table>

</body>
</html>