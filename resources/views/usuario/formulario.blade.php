<div class="panel-body">
	@if($errors->has('nom_u'))
	<div class="alert alert-danger">
		{{ $errors->first('nom_u') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('nom_u', 'Nombres', ['class' => 'control-label']) !!}
		{!! Form::text('nom_u', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('ape_pat_u'))
	<div class="alert alert-danger">
		{{ $errors->first('ape_pat_u') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('ape_pat_u', 'Apellido paterno', ['class' => 'control-label']) !!}
		{!! Form::text('ape_pat_u', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('ape_mat_u'))
	<div class="alert alert-danger">
		{{ $errors->first('ape_mat_u') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('ape_mat_u', 'Apellido materno', ['class' => 'control-label']) !!}
		{!! Form::text('ape_mat_u', null, ['class' => 'form-control']) !!}
	</div>
	
	@if($errors->has('ci_u'))
	<div class="alert alert-danger">
		{{ $errors->first('ci_u') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('ci_u', 'Ci', ['class' => 'control-label']) !!}
		{!! Form::text('ci_u', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('email_u'))
	<div class="alert alert-danger">
		{{ $errors->first('email_u') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('email_u', 'Email', ['class' => 'control-label']) !!}
		{!! Form::email('email_u', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('direccion_u'))
	<div class="alert alert-danger">
		{{ $errors->first('direccion_u') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('direccion_u', 'Dirección de usuario', ['class' => 'control-label']) !!}
		{!! Form::text('direccion_u', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('telefono_u'))
	<div class="alert alert-danger">
		{{ $errors->first('telefono_u') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('telefono_u', 'Telefono', ['class' => 'control-label']) !!}
		{!! Form::text('telefono_u', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('celular_u'))
	<div class="alert alert-danger">
		{{ $errors->first('celular_u') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('celular_u', 'Celular', ['class' => 'control-label']) !!}
		{!! Form::text('celular_u', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('usuario'))
	<div class="alert alert-danger">
		{{ $errors->first('usuario') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('usuario', 'Nombre de usuario', ['class' => 'control-label']) !!}
		{!! Form::text('usuario', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('repetir'))
	<div class="alert alert-danger">
		{{ $errors->first('repetir') }}
	</div>
	@endif
	@if($errors->has('password'))
	<div class="alert alert-danger">
		{{ $errors->first('password') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('rpassword'))
	<div class="alert alert-danger">
		{{ $errors->first('rpassword') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('rpasswrod', 'Repita su contraseña', ['class' => 'control-label']) !!}
		{!! Form::password('rpassword', ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('tipo'))
	<div class="alert alert-danger">
		{{ $errors->first('tipo') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('tipo', 'Tipo de usuario') !!}
		{!! Form::select('tipo', ['pro' => 'Profesor', 'can' => 'Candidato' ], null, ['placeholder' => 'Seleccione un tipo de usuario', 'class' => 'form-control']) !!}
	</div>
</div>
<div class="panel-footer text-center">
	{!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
</div>