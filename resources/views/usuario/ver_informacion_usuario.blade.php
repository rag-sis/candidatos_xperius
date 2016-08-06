<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div>
		
							
	</div>
	<div>
	<b>Nombre:</b> {{$usuario->nom_u}}
	</div>
	<div>
	<b>Nombre de Usuario:</b> {{$usuario->usuario}}
	</div>
	<div>
	<b>Tipo de Usuario:</b> 
	@if($usuario->tipo == 'can')
	Candidato
	@endif
	@if($usuario->tipo == 'pro')
	Evaluador
	@endif
	@if($usuario->tipo == 'adm')
	Administrador
	@endif
	</div>
	<div>
	<b>E-mail:</b> {{$usuario->email_u}}
	</div>
	<div>
	<b>Dirección:</b> {{$usuario->direccion_u}}
	</div>
	<div>
	<b>Teléfono:</b> {{$usuario->telefono_u}}
	</div>
	<div>
	<b>Celular:</b> {{$usuario->celular_u}}
	</div>
	<div >
	@if($usuario->tipo === 'can')	
	<b>Curriculum:</b> 
	<a href="/usuario/ver_curriculum/{{$usuario->curriculum}}" target="_blank">{{$usuario->curriculum}}</a>
	</div>
	<div>
	<b>Dirección URL de Curriculum:</b> <a href="{{$usuario->url_curriculum}}" target="_blank">{{$usuario->url_curriculum}}</a>
	</div>
	@endif
	

</body>
</html>