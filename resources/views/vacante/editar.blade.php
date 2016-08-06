
@extends('inicio')

@section('contenido')
<head>
<script type="text/javascript" src="{{ asset('js/scripts_edt_vac.js') }}"></script>
</head>
<div class="heading">

                        <h3>Vacantes<span class=" icomoon-icon-arrow-right blue"></span>Editar</h3>                    
                        
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
                            <li class="active">Vacantes</li>
                        </ul>

</div><!-- End .heading-->
<div>
    <a class="float-right" href="/vacante/lista" title="Atras">
                <span class="icomoon-icon-undo-2 green"></span>
                Atras
    </a>
</div>
<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			
		</div>
		{!! Form::model($vacante, ['url' => '/vacante/actualizar/' . $vacante->cod_v]) !!}
		@include('vacante.formulario_edt')			
		{!! Form::close() !!}
	</div>
</div>
@endsection