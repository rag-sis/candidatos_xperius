<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div>
		<a class="float-right" href="/usuario/editar/{{$usuario->cod_u}}" title="Editar">
			<img src="{{asset('img/edit-icon.gif')}}" width="16" height="16" alt="edit" />
			Editar Usuario
		</a>
							
	</div>
	<div>
	<b>Nombre:</b> {{$usuario->getNombreCompleto()}}
	</div>
	<div>
	<b>Nombre de Usuario:</b> {{$usuario->usuario}}
	</div>
	<div>
	<b>Tipo de Usuario:</b> {{$usuario->tipo}}
	</div>
	<div>
	<b>E-mail:</b> {{$usuario->email_u}}
	</div>
	<div>
	<b>C.I.:</b> {{$usuario->ci_u}}
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