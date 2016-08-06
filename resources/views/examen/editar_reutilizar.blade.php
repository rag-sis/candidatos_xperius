@extends('inicio')
@section('contenido')

<div class="heading">

                        <h3>Reutilizar Examen</h3>                    
                        
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
                            <li class="active">Reutilizar Examen</li>
                        </ul>

</div><!-- End .heading-->
<div>
    <a class="float-right" href="/examen/lista" title="Editar">
            <span class="icomoon-icon-undo-2 green"></span>
            Atras
        </a>
</div>
<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
		</div>
		{!! Form::model($examen, ['url' => '/examen/guardar_nuevo/' . $examen->cod_e ,'id' => 'form-examen', 'files' => true]) !!}
		@include('examen.formulario_editar_reutilizar')			
		{!! Form::close() !!}
	</div>
</div>
@endsection