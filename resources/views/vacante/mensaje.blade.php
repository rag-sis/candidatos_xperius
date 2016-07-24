<html>
<head>
	<title>

			Invitación para el proceso de seleccíón 
	</title>
</head>
<body>
	

							
			
	<h1>XPerius</h1>
	<h4>Software Solutions S.R.L</h4>
	<img src="https://media.licdn.com/media/AAEAAQAAAAAAAAfLAAAAJDhlN2Y5ODI4LWEyYzktNDI5NC1iYWRlLWU3NGNlNjY4NWI1Zg.png"/>
	<h3>Estimad(o/a): Sr(a). {{ $invitacion->getNombresUsuario($invitacion->cod_u) }} .</h3>
	<br />
	<h4>Usted ha sido seleccionado para poder rendir los exámenes para el puesto: <span class="blue">{{ $invitacion->vacante->titulo_v }}</span></h4>
	<h5>Debe ingresar al sistema para poder empezar a resolver a los exámenes </h5>
	<p>Para poder obtener acceso al sistema debe verificarse y agregar su contraseña,
	Su nombre de usuario es: <span class="blue"> {{$invitacion->usuario->usuario}}</span>
	</p>

	<a href="http://localhost:8001/registrar_pwd/{{$invitacion->cod_i}}">Acceso al Sistema</a>
	<br /><br />
	
	
	<p>En caso de no poder ingresar al sistema , puede comunicarse a los 
		números 78336781, 591-4567389 ó apersonarse a nuestra oficina en la calle Bolivar entre Av.Oquendo y C.Pasteur N° #42343.</p> 
	Gracias por su atención.


</body>
</html>