<center>
	<div class="box datos_box" >
		<div class="title">

         <h4>
                <span class="icon16 icomoon-icon-equalizer-2"></span>
                <span>FORMULARIO DE REGISTRO</span>
         </h4>
                                    
        </div>

<div class="content datos_content">


	
	@if($errors->has('usuario'))
	<div class="alert alert-danger">
		{{ $errors->first('usuario') }}
	</div>
	@endif
	
	@if($errors->has('error_vac'))
	<div class="alert alert-danger ">
		{{ $errors->first('error_vac') }}
	</div>
	@endif
	@if($errors->has('error_pwd'))
	<div class="alert alert-danger ">
		{{ $errors->first('error_pwd') }}
		<p><a href="/">Ingrese al Sistema</a></p>
	</div>
	@endif
	@if($errors->has('error_user'))
	<div class="alert alert-danger ">
		{{ $errors->first('error_user') }}
	</div>
	@endif
	@if($errors->has('repetir'))
	<div class="alert alert-danger ">
		{{ $errors->first('repetir') }}
	</div>
	@endif
	@if($errors->has('password'))
	<div class="alert alert-danger ">
		{{ $errors->first('password') }}
	</div>
	@endif
	@if($errors->has('rpassword'))
	<div class="alert alert-danger ">
		{{ $errors->first('rpassword') }}
	</div>
	@endif
	<input type="hidden" name="inv" value="{{$inv}}" />
	<div class="form-label ">
		{!! Form::label('usuario', 'Ingrese el Nombre de usuario que se le asignó , verifique en su correo (*)', ['class' => 'control-label']) !!}
		{!! Form::text('usuario', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-label ">
		{!! Form::label('password', 'Contraseña (*)', ['class' => 'control-label datos_f']) !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-label ">
		{!! Form::label('rpasswrod', 'Repita su contraseña (*)', ['class' => 'control-label datos_f']) !!}
		{!! Form::password('rpassword', ['class' => 'form-control']) !!}
	</div>
	
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="form-label ">
	<br />
	{!! Form::submit('Guardar', ['class' => 'btn marginR10']) !!}


</div>
</div>
</div>
</center>
