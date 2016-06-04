@extends('inicio')

@section('contenido')
<div class="heading">

                        <h3>Vacantes</h3>                    
                        
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
<div class="col-lg-6 col-lg-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Crear Vacante</h4>
		</div>
		{!! Form::open(['url' => '/vacante/almacenar', 'files' => true]) !!}
		@include('vacante.formulario')
		{!! Form::close() !!}
	</div>
</div>
@endsection