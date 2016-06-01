@extends('inicio')

@section('contenido')
<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Editar Usuario</h4>
		</div>
		{!! Form::model($usuario, ['url' => '/usuario/actualizar/' . $usuario->cod_u]) !!}
		@include('usuario.formulario')			
		{!! Form::close() !!}
	</div>
</div>
@endsection