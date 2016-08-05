@extends('inicio')
@section('contenido')
<head>
 <script type="text/javascript" src="{{asset('dest/jquery.countdown.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}" media="screen">

    <script type="text/javascript">
    
      
      function terminarExamen(){
        $('#boton_terminar').click();
      }
    </script>
    <!--<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">-->
</head>
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

                            <li class="active">Exámenes </li>
                        </ul>

</div><!-- End .heading-->
<div>
    <a class="float-right" href="/resultados/examenes/{{$cal_exa->postulacion->vacante->cod_v}}" title="Ir Atras">
            <img src="{{asset('img/edit-icon.gif')}}" width="16" height="16" alt="Ir atras" />
            Atras
        </a>
</div>
<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4> </h4>
		</div>
		{!! Form::model($examen, ['url' => '/candidato/terminar_examen', 'files' => true]) !!}
		@include('candidato.examen_terminado')			
		{!! Form::close() !!}
	</div>
</div>
@endsection