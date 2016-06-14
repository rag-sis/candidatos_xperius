<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
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
	

</body>
</html>