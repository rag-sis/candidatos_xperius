@extends('inicio')
@section('contenido')
<head>
<!--<script type="text/javascript" src="{{ asset('js/scripts_form_usr.js') }}"></script>-->
</head>
<div class="heading">

                        <h3>Inicio</h3>                    
                        
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
@if(isset($cal_ex))
    <h3 class="">Candidato(a): {{$cal_ex->postulacion->usuario->nom_u}}</h3>
	<h3 class="">Vacante: {{$cal_ex->postulacion->vacante->titulo_v}}</h3>
	
	
@else
	No existe datos
@endif
<form class="form-horizontal" action="/examen/calificar" method="post">

<div>

                            <div class="box gradient">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 icomoon-icon-pie"></span>
                                        <span>{{$cal_ex->examen->titulo_e}}</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content">
                                    <?php
                                        $cont=0;
                                    ?>
                                    @forelse($respuestas as $res)
                                    <div class="well well-large">
                                        <h4>PREGUNTA: {{$res->pregunta->valor_p}}</h4>
                                        <span></span>
                                        <textarea disabled="disabled" class="span8" >{{$res->valor_rr}}</textarea>
                                        <br>
                                        <div>
                                        SELECCIONAR EL PUNTAJE:
                                        <table>
                                            <tr>
                                                <td><input type="radio" checked name="puntaje_{{$cont}}" value="0" /></td>
                                                <td><input type="radio" name="puntaje_{{$cont}}" value="20" /></td>
                                                <td><input type="radio" name="puntaje_{{$cont}}" value="40" /></td>
                                                <td><input type="radio" name="puntaje_{{$cont}}" value="60" /></td>
                                                <td><input type="radio" name="puntaje_{{$cont}}" value="80" /></td>
                                                <td><input type="radio" name="puntaje_{{$cont}}" value="100" /></td>
                                            </tr>
                                            <tr>
                                                <td>0</td>
                                                <td>20</td>
                                                <td>40</td>
                                                <td>60</td>
                                                <td>80</td>
                                                <td>100</td>
                                            </tr>
                                        </table>
                                        </div>
                                      </div>
                                      <input type="hidden" name="pregunta_{{$cont}}" value="{{$res->pregunta->cod_p}}"/>
                                      <?php $cont++; ?>
                                      @empty
                                      @endforelse
                                    <span></span>
                                    
                                	<center>
									
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="cant_pre" value="{{ $cont }}">
                                                <input type="hidden" name="cae" value="{{$cal_ex->cod_cae}}"/>
                                                
                                   
                                   
                                    </center>
                                </div>

                            </div><!-- End .box -->

                         
                        </div><!-- End .span4 -->



<center>
<button type="submit" class="btn btn-info marginT10">Calificar</button>
</center>
 </form>
</div>
@endsection