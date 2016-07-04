@extends('inicio')
@section('contenido')
<head>
<script type="text/javascript" src="{{ asset('js/scripts_form_usr.js') }}"></script>
</head>
<div class="heading">

                        <h3>Usuarios</h3>                    
                        
                        <ul class="breadcrumb">
                            <li>Tu estas en:</li>
                            <li>
                                <a href="#" class="tip" title="Ir a Inicio">
                                    <span class="icon16 icomoon-icon-screen-2"></span>
                                </a> 
                                <span class="divider">
                                    <span class="icon16 icomoon-icon-arrow-right-2"></span>
                                </span>
                            </li>
                            <li class="active">Usuarios</li>
                        </ul>

</div><!-- End .heading-->
<div>
    <a class="float-right" href="/usuario/lista" title="Editar">
            <img src="{{asset('img/edit-icon.gif')}}" width="16" height="16" alt="edit" />
            Atras
        </a>
</div>
<div class="col-lg-6 col-lg-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Crear Usuario</h4>
		</div>
        <div class="well scroll" style="overflow:auto; margin-top:10px;">
		{!! Form::open(['url' => '/usuario/almacenar', 'files' => true]) !!}
		@include('usuario.formulario')
		{!! Form::close() !!}
        </div>
	</div>
</div>
@endsection