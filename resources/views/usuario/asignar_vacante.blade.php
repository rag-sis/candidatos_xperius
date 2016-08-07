<!DOCTYPE html>
<html>
<head>
	 <script type="text/javascript" src="{{ asset('js/form-validation.js') }}"></script>
	 <link href="{{ asset('css/estilos_asig_vac.css') }}" rel="stylesheet" type="text/css">
	<title></title>
</head>
<body>

	
	<h4>Candidato(a): <span class="blue"> {{$user->nom_u}}</span></h4>
	<br>
	<form id="form-asignar-vacante" method="post" action="/usuario/asignar_vacante">
		<label for="vac"> Seleccione una Vacante</label>
		<center>
		<table >
			<tr>
				<td valign="top">
					<select name="vac" id="vac" style="width: 300px">
					<option value="">Seleccione</option>
					@forelse($vacantes as $vac)
					<option value="{{ $vac->cod_v }}">{{ $vac->titulo_v }}</option>
					@empty
					@endforelse
					</select>
				</td>
				<td width="50px"></td>
				<td valign="top"> <input type="submit" value="Asignar" name="asignar"></td>
			</tr>
		</table>
		
	
		<input type="hidden" name="user" value="{{ $user->cod_u }}" />
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<br><br>
		
		</center>
	</form>

</body>
</html>