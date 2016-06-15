@extends('inicio')

@section('contenido')
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
<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Editar Usuario</h4>
		</div>
		{!! Form::model($usuario, ['url' => '/usuario/actualizar/' . $usuario->cod_u , 'files' => true]) !!}
		@include('usuario.formulario')			
		{!! Form::close() !!}
	</div>
</div>
@endsection