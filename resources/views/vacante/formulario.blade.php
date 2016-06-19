<div class="panel-body">
	@if($errors->has('titulo_v'))
	<div class="alert alert-danger">
		{{ $errors->first('titulo_v') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('titulo_v', 'Título', ['class' => 'control-label']) !!}
		{!! Form::text('titulo_v', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('lugar_v'))
	<div class="alert alert-danger">
		{{ $errors->first('lugar_v') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('lugar_v', 'Lugar', ['class' => 'control-label']) !!}
		{!! Form::select('lugar_v', ['Cochabamba' => 'Cochabamba', 'La Paz' => 'La Paz', 'Santa Cruz' => 'Santa Cruz', 'Oruro' => 'Oruro', 'Chuquisaca' => 'Chuquisaca', 'Beni' => 'Beni', 'Potosi' => 'Potosi', 'Tarija' => 'Tarija', 'Pando' => 'Pando' ], null, ['placeholder' => 'Seleccione una ciudad', 'class' => 'form-control']) !!}
		
	</div>
	@if($errors->has('posicion_v'))
	<div class="alert alert-danger">
		{{ $errors->first('posicion_v') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('posicion_v', 'Posición', ['class' => 'control-label']) !!}
		{!! Form::text('posicion_v', null, ['class' => 'form-control']) !!}
	</div>
	@if($errors->has('tiempo_trabajo_v'))
	<div class="alert alert-danger">
		{{ $errors->first('tiempo_trabajo_v') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('tiempo_trabajo_v', 'Tiempo de Trabajo') !!}
		{!! Form::select('tiempo_trabajo_v', ['Tiempo Completo' => 'Tiempo completo', 'Medio Tiempo' => 'Medio tiempo' ], null, ['placeholder' => 'Seleccione:', 'class' => 'form-control']) !!}
	</div>
	@if($errors->has('tipo_trabajo_v'))
	<div class="alert alert-danger">
		{{ $errors->first('tipo_trabajo_v') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('tipo_trabajo_v', 'Tipo de trabajo') !!}
		{!! Form::select('tipo_trabajo_v', ['Fuera de Oficina' => 'Fuera de Oficina', 'Dentro de Oficina' => 'Dentro de Oficina' ], null, ['placeholder' => 'Seleccione:', 'class' => 'form-control']) !!}
	</div>
	@if($errors->has('descripcion_v'))
	<div class="alert alert-danger">
		{{ $errors->first('descripcion_v') }}
	</div>
	@endif
	
	<!--<div class="form-group">
		{!! Form::label('descripcion_v', 'Descripción', ['class' => 'control-label']) !!}
		{!! Form::text('descripcion_v', null, ['class' => 'form-control']) !!}
	</div>-->
	<!--<div class="form-group">
		<label for="descripcion_v">Descripción</label>
		<textarea name="descripcion_v" id="descripcion_v" class="form-control"></textarea>
	</div>-->
	<div class="form-group">
		{!! Form::label('descripcion_v', 'Descripción', ['class' => 'control-label']) !!}
	{{ Form::textarea('descripcion_v',null, ['class' => 'form-control']) }}
	</div>
	@if($errors->has('estado_v'))
	<div class="alert alert-danger">
		{{ $errors->first('estado_v') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('estado_v', 'Estado') !!}
		{!! Form::select('estado_v', ['1' => 'Habilitado', '0' => 'Deshabilitado' ], null, ['placeholder' => 'Seleccione:', 'class' => 'form-control']) !!}
	</div>
	
</div>
<div class="panel-footer text-center">
	{!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
</div>