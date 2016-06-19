<head>
<link href="{{asset('/plugins/forms/select/select2.css')}}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{asset('js/form-validation.js')}}"></script>
</head>
<div>
<form method="post" action="/vacante/enviar_email" >
	
	<select name="select1" id="select1" class="nostyle" style="width:100%;" >
        <option></option>
     <optgroup label="Seleccione el Candidato">
     	@forelse($usuarios as $usuario)
     		@if($usuario->tipo === 'can')
           <option value="{{ $usuario->email_u }}">{{ $usuario->getNombreCompleto() }}</option>
           @endif
           @empty
		<option>No existe Usuarios</option>
		@endforelse
    </optgroup>
    </select>
	@if(Session::has('id_vc'))
			<input type="hidden" value="{{ Session::get('id_vc') }}" />
	@endif
	{!! csrf_field() !!}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<center>
	<input class="btn btn-default" type="submit" value="invitar" name="invitar"/>
	</center>
</form>
</div>