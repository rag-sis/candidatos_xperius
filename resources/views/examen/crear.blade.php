@extends('inicio')
@section('contenido')
<head>
    <script type="text/javascript" src="{{ asset('js/script_examen.js') }}"></script>
</head>
<div class="heading">

                        <h3>Examenes</h3>                    
                        
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
                            <li class="active">Examenes</li>
                        </ul>

</div><!-- End .heading-->
<div>
    <a class="float-right" href="/examen/lista" title="Editar">
            <span class="icomoon-icon-undo-2 green"></span>
                Atras
        </a>
</div>
<div class="col-lg-6 col-lg-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Crear Examén</h4>
		</div>
        <div class="well scroll" style="overflow:auto; margin-top:10px;">
		{!! Form::open(['url' => '/examen/almacenar','id' => 'form-examen', 'files' => true]) !!}
		@include('examen.formulario')
		{!! Form::close() !!}
        </div>
	</div>
</div>
@endsection