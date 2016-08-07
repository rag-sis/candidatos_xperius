@extends('inicio')
@section('contenido')
<head>
<script type="text/javascript" src="{{ asset('js/script_examen.js') }}"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="{{ asset('css/multi-switch.min.css') }}" rel="stylesheet" type="text/css">


<!--<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>-->
<!--<script src="{{ asset('src/multi-switch.js') }}"></script>
<script>
$(document).ready(function(){
                $('.multi-switch').multiSwitch({
			//		functionOnChange: function ($element) {
            	//algo
           // }
        });
            });
        </script>-->
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
                            <li class="active">examenes</li>
                        </ul>

                    </div><!-- End .heading-->
              @if(Session::has('message'))
			<div class="alert alert-success">
				{{ Session::get('message') }}
			</div>
			@endif
             @if(Session::has('exa_cre'))
			<div class="alert alert-success">
				{{ Session::get('exa_cre') }}
			</div>
			@endif
			@if(Session::has('exa_edi'))
			<div class="alert alert-info">
				{{ Session::get('exa_edi') }}
			</div>
			@endif
			@if(Session::has('exa_eli'))
			<div class="alert alert-warning">
				{{ Session::get('exa_eli') }}
			</div>
			@endif
			@if(Session::has('exa_des'))
			<div class="alert alert-warning">
				{{ Session::get('exa_des') }}
			</div>
			@endif

			<?php 
				$tip=Auth::user()->tipo;
				?>
				@if( ($tip === 'adm') or ($tip === 'pro') )
				<div class="top-bar">
						<button class="boton_nuevo" onClick="boton_nuevo_examen()" type="button"><img src="{{ asset('img/add-icon.gif') }}" width="16" height="16"> Nuevo </button>
				
						</div><br />
				@endif
			
		  
		  <form class="navbar navbar-form navbar-right espacio_contenido" action="/examen/lista">
					<div class="input-group">
						<input type="text" name="titulo_e" class="form-control" placeholder="Titulo" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">Buscar</button>
						</span>

						
					</div>
			</form>
<br>
				<div class="table-responsive">


				<table class="table table-bordered table-hover table-condensed" width="80%"  cellpadding="0" cellspacing="0" >
					<thead>
					<tr>
				
						<th class="first">Titulo</th>
						
						<th class="first">Tiempo</th>
						<th class="first">N° de preguntas</th>
						<th class="first">Nota</th>
						
							
									<th class="last" width="120px">Acciones</th>
								
							
						
						
					</tr>
					</thead>
					<tbody>
					@forelse($asignaciones as $asig)

					<tr>
				
						<td width="200px" >{{ $asig->examen->titulo_e }}</td>
						
						<td>{{ $asig->examen->tiempo_minutos_e }} min.</td>
						<td>{{ $asig->examen->num_preguntas_e }}</td>
						<td>
							@if($asig->estado_terminado() )
								{{ $asig->nota_examen() }}
							@else
								
							@endif
							</td>
							
							
							<td class="last" width="100px" valign="top">
							@if($asig->estado_tiempo_terminado() )
							<a title="Exámen Terminado" href="#">
								
								<button type="submit" title="Exámen Terminado" disabled class="btn btn-info marginT10 entypo-icon-clock white"></button>
							</a>
							@else
							<form class="form-horizontal" action="/candidato/rendir_examen" method="post">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="exa" value="{{$asig->examen->cod_e}}"/>
                                                <input type="hidden" name="inv" value="{{$asig->cod_invitacion()}}"/>
                                                <button type="submit" title="Empezar Examen" class="btn btn-info marginT10 entypo-icon-clock white"></button>
                                                <!--<a type="submit" title="Rendir examen" href="#">
													<span class=" entypo-icon-clock"></span>
												</a>-->
                            </form>
							
							@endif
							</td>
							
							
								
					</tr>
					@empty
				<tr class="text-center">
					<td colspan="5">No exiten examenes</td>
				</tr>
				@endforelse
					</tbody>
				</table>
				<div id="effect">
				</div>
				<div class="select">
				
				</div>

		</div>
			
		  

@endsection