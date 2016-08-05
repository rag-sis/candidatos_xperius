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
			<td>
				<table class="table table-bordered">
					<thead>
						<tr><th>EXAMENES ASIGNADOS</th>
							<th>Acciones</th>
							</tr>
					</thead>
					<tbody>
						@forelse($asignaciones as $asig)
						<tr>
						<td>{{$asig->examen->titulo_e}}</td>
						<td> 
						
						@if( $asig->examen->ver_edicion_habilitado() == 0 )
						<a href="/desasignacion_examen/desasignar/{{$asig->examen->cod_e}}/{{$vacante->cod_v}}">des-asignar</a>
						@endif
						 </td>
						</tr>
						@empty
						<tr><td>Sin asignaciones</td><td></td></tr>
						@endforelse
						
					</tbody>

				</table>
				<a href="/asignacion_examen/asignar/{{$vacante->cod_v}}/{{$vacante->titulo_v}}" title="Asignar Exámen">
								Asignar Nuevos Exámenes
							</a>
			</td>
		</tr>
		<tr>
			<th valign="top">Descripción</th>
			<td>{{$vacante->descripcion_v}}</td>
		</tr>

	</table>

</body>
</html>