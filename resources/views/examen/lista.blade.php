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
						<button class="boton_nuevo" onClick="boton_nuevo_examen()" type="button"><span class="cut-icon-plus-2"></span> Nuevo </button>
				
						</div><br />
				@endif
			
		  
		  <form class="navbar navbar-form navbar-right espacio_contenido" action="/examen/lista">
					<div class="input-group">
						<input type="text" name="titulo_e" class="form-control" placeholder="Titulo" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">Buscar</button>
						</span>

						<a href="/lista_e_pdf" class="float-right">
						<span class="box1">
                        <span aria-hidden="true" class="icomoon-icon-file-pdf"></span>
                        &nbsp;Descargar lista
                        </span>
                        </a>
					</div>
			</form>
<br>
				<div class="table-responsive">

				

				<table class="table table-bordered table-hover table-condensed" width="80%"  cellpadding="0" cellspacing="0" >
					<thead>
					<tr>
				
						<th class="first">Titulo</th>
						<th class="first">Evaluador</th>
						<th class="first">Tiempo</th>
						<th class="first">N° de preguntas</th>
						
							@if( ($tip === 'adm') or ($tip === 'pro') )
									<th class="last" width="120px">Acciones</th>
								
							@endif
							
						
						
					</tr>
					</thead>
					<tbody>
					@forelse($examenes as $examen)

					<tr>
				
						<td width="200px">{{ $examen->titulo_e }}</td>
						<td>{{ $examen->evaluador->nom_u }}</td>
						<td>{{ $examen->tiempo_minutos_e }} min.</td>
						<td>{{ $examen->num_preguntas_e }}</td>
							
							
							@if( ($tip === 'adm') or ($tip === 'pro') )
							<td class="last" width="100px">
							
							<a href="/examen/ver/{{$examen->cod_e}}" title="Ver">
								<span class="icomoon-icon-grid-view-2"></span>
							</a>
							

							
							<a 
							@if(($examen->ver_edicion_habilitado()) === 0)
								href="/examen/editar/{{$examen->cod_e}}"
								title="Editar"
							@else
							title="Este exámen no esta disponible para su edición"
							@endif
							
							 
							 >
								<span 
								@if(($examen->ver_edicion_habilitado()) === 0)
								class="icon-pencil "
								@else
								class="icon-pencil"
								@endif
								>
							</span>
							</a>
							
							<a href="/examen/editar_reutilizar/{{$examen->cod_e}}" title="Reutilizar examen">
								<span class="eco-pencil-2"></span>
							</a>
							
								
							<a class="deshabilitar" title="eliminar" href="/examen/deshabilitar/{{$examen->cod_e}}">
								<span class=" icon-remove"></span>
								</a>
							
							</td>
							@endif
							
								
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
				{!! $examenes->appends(['titulo_e' => Request::input('titulo_e')])->render() !!}
				</div>

		</div>
			
		  

@endsection