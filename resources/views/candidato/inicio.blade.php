@extends('inicio')
@section('contenido')
<head>
<!--<script type="text/javascript" src="{{ asset('js/scripts_form_usr.js') }}"></script>-->
</head>
<div class="heading">

                        <h3>Bienvenido al Sistema</h3>                    
                        
                        <ul class="breadcrumb">
                            <li>Tu estas en:</li>
                            <li>
                                <a href="/" class="tip" title="Ir a Inicio">
                                    <span class="icon16 icomoon-icon-screen-2"></span>
                                </a> 
                                <span class="divider">
                                    <span class="icon16 icomoon-icon-arrow-right-2"></span>
                                </span>
                            </li>
                            <li class="active">Inicio</li>
                        </ul>

</div><!-- End .heading-->



<div class="">
@if(isset($invitacion))
    <h3 class="">Vacante: {{$invitacion->vacante->titulo_v}}</h3>
	<h3 class="">Candidato(a): {{$invitacion->usuario->nom_u}}</h3>
	<h3 class="">Numero de Exámenes: {{$invitacion->vacante->nro_examenes_v}}</h3>
	
@else
	No existen nuevas invitaciones
@endif
@if(isset($asignaciones))
@forelse($asignaciones as $asig)
<div class="span4">

                            <div class="box gradient">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 icomoon-icon-pie"></span>
                                        <span>{{$asig->examen->titulo_e}}</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content">
                                	<?php
                                		$por=((100*((int)($asig->valor_puntaje_ae)))/$suma_p_e);
                                	?>
                                
                                	 Porcentaje de Puntaje: {{$por}} %
									<br />
									Nro de Preguntas: {{$asig->examen->num_preguntas_e}}
									<br />
                                    Tiempo: {{$asig->examen->tiempo_minutos_e}} min.
									<center>
                                    <?php
                                        $cal_exa=$asig->getCalificacionExamen($asig->examen->cod_e,$invitacion->cod_i);
                                        if($cal_exa === null){

                                        }
                                        
                                    ?>
                                    @if($cal_exa === null)
									<form class="form-horizontal" action="/candidato/rendir_examen" method="post">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="exa" value="{{$asig->examen->cod_e}}"/>
                                                <input type="hidden" name="inv" value="{{$invitacion->cod_i}}"/>
                                                <button type="submit" class="btn btn-info marginT10">Empezar exámen</button>
                                    </form>
                                    @else
                                        <br>
                                        <h3 class="red">Exámen Terminado</h3>
                                        {{$cal_exa->getPuntaje()}}
                                    @endif
                                    </center>
                                </div>

                            </div><!-- End .box -->

                         
                        </div><!-- End .span4 -->


@empty
@endforelse
</div>
@endif
@endsection