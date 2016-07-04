<div class="panel-body">
	@if($errors->has('nom_u'))
	<div class="alert alert-danger span6">
		{{ $errors->first('nom_u') }}
	</div>
	@endif

	<div class="form-label span6">
		
		{!! Form::label('nom_u', 'Nombre y Apellido (*)', ['style' => 'float:rigth']) !!}
		{!! Form::text('nom_u', null, ['class' => '']) !!}		
	</div>
	
	
	@if($errors->has('usuario'))
	<div class="alert alert-danger span6">
		{{ $errors->first('usuario') }}
	</div>
	@endif
	<div class="form-label span6">
		{!! Form::label('usuario', 'Nombre de usuario (*)', ['class' => 'control-label']) !!}
		{!! Form::text('usuario', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('repetir'))
	<div class="alert alert-danger span6">
		{{ $errors->first('repetir') }}
	</div>
	@endif
	@if($errors->has('password'))
	<div class="alert alert-danger span6">
		{{ $errors->first('password') }}
	</div>
	@endif
	<div class="form-label span6">
		{!! Form::label('password', 'Contraseña (*)', ['class' => 'control-label']) !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('rpassword'))
	<div class="alert alert-danger span6">
		{{ $errors->first('rpassword') }}
	</div>
	@endif
	<div class="form-label span6">
		{!! Form::label('rpasswrod', 'Repita su contraseña (*)', ['class' => 'control-label']) !!}
		{!! Form::password('rpassword', ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('tipo'))
	<div class="alert alert-danger span6">
		{{ $errors->first('tipo') }}
	</div>
	@endif
	<div class="form-label span6">
		<div class="seleccionador">

		{!! Form::label('tipo', 'Tipo de usuario (*)') !!}
		{!! Form::select('tipo', ['pro' => 'Profesor', 'can' => 'Candidato' ], null, ['placeholder' => 'Seleccione un tipo de usuario' ,'class' => 'form-label span6 seleccionador','id'=>'tipo_usuario']) !!}
		</div>
	</div>
	
	@if($errors->has('vac'))
	<div class="alert alert-danger span6">
		{{ $errors->first('vac') }}
	</div>
	@endif
	<div class="form-label span6" id="vac">
		<br />
		<div class="seleccionador">
		{!! Form::label('vac', 'Vacante (*)') !!}
		{!! Form::select('vac', [ ], null, ['placeholder' => 'Seleccione una vacante' ,'class' => 'form-label span6 seleccionador','id'=>'sel_vacante']) !!}
		</div>
	</div>
	@if($errors->has('curriculum'))
	<div class="alert alert-danger span6">
		{{ $errors->first('curriculum') }}
	</div>
	@endif

	<div class="form-label span6" id="curri">
		<br />
		{!! Form::label('curriculum', 'Archivo Curriculum', ['class' => 'control-label']) !!}
		{!! Form::file('curriculum') !!}
	</div>
	
	@if($errors->has('url_curriculum'))
	<div class="alert alert-danger span6">
		{{ $errors->first('url_curriculum') }}
	</div>
	@endif
	<div class="form-label span6" id="url_curri">
		<br />
		{!! Form::label('url_curriculum', 'Dirección URL de Curriculum', ['class' => 'form-label']) !!}
		{!! Form::text('url_curriculum', null, ['class' => 'form-control']) !!}
	</div>
	
	@if($errors->has('email_u'))
	<div class="alert alert-danger span6">
		{{ $errors->first('email_u') }}
	</div>
	@endif
	<div class="form-label span6">
		{!! Form::label('email_u', 'Email (*)', ['class' => 'control-label']) !!}
		{!! Form::email('email_u', null, ['class' => 'form-control']) !!}
	</div>

	@if($errors->has('celular_u'))
	<div class="alert alert-danger span6">
		{{ $errors->first('celular_u') }}
	</div>
	@endif
	<div class="form-label span6">
		{!! Form::label('celular_u', 'Celular', ['class' => 'control-label']) !!}
		{!! Form::text('celular_u', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('telefono_u'))
	<div class="alert alert-danger span6">
		{{ $errors->first('telefono_u') }}
	</div>
	@endif
	<div class="form-label span6">
		{!! Form::label('telefono_u', 'Telefono', ['class' => 'control-label']) !!}
		{!! Form::text('telefono_u', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('direccion_u'))
	<div class="alert alert-danger span6">
		{{ $errors->first('direccion_u') }}
	</div>
	@endif
	<div class="form-label span6">
		{!! Form::label('direccion_u', 'Dirección de usuario', ['class' => 'control-label']) !!}
		{!! Form::text('direccion_u', null, ['class' => 'form-control']) !!}
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

</div>
<br />

<div class="form-label span6">
	<br />
	{!! Form::submit('Guardar', ['class' => 'btn marginR10']) !!}


</div>
