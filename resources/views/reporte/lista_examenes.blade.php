<!DOCTYPE html>
<head>

</head>
<body>
	<span><h5>Candidato(a):</h5>{{$postulacion->usuario->nom_u}}</span>
	<br/>
	<span><h5>Vacante:</h5>{{$postulacion->vacante->titulo_v}}</span>
<center>
<table class="table table-bordered">
	<thead>
	<tr width="200px">		
		<th>Exámenes</th>
	</tr>
	</thead>
<tbody>
@forelse($cal_examenes as $cal_exa)
<tr><td>
	<a href="/candidato/ver_examen_terminado/{{$cal_exa->cod_cae}}/{{$cal_exa->cod_e}}">{{ $cal_exa->examen->titulo_e }}</a>	
</td></tr>


@empty
<tr>
	<td>No existen Exámenes terminados.</td>
</tr>

@endforelse
</tbody>
</table>	
</center>

</body>