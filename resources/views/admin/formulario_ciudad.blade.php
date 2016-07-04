<div class="panel-body">
	@if($errors->has('nom_c'))
	<div class="alert alert-danger">
		{{ $errors->first('nom_c') }}
	</div>
	@endif
	<div class="form-group">
		{!! Form::label('nom_c', 'Nombre de Ciudad', ['class' => 'control-label']) !!}
		{!! Form::text('nom_c', null, ['class' => 'form-control']) !!}
	</div>
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

</div>
<div class="panel-footer text-center">
	{!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
</div>