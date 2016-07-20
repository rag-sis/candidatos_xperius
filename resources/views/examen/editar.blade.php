@extends('inicio')
@section('contenido')

<div class="heading">

                        <h3>Exámenes</h3>                    
                        
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
                            <li class="active">Exámenes</li>
                        </ul>

</div><!-- End .heading-->
<div>
    <a class="float-right" href="/examen/lista" title="Editar">
            <img src="{{asset('img/edit-icon.gif')}}" width="16" height="16" alt="edit" />
            Atras
        </a>
</div>
<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Editar Examén</h4>
		</div>
		{!! Form::model($examen, ['url' => '/examen/actualizar/' . $examen->cod_e , 'files' => true]) !!}
		@include('examen.formulario_editar')			
		{!! Form::close() !!}
	</div>
</div>
@endsection