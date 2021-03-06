@extends('inicio')
@section('contenido')
<head>
<script type="text/javascript" src="{{ asset('js/script_vacante.js') }}"></script>
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

                        <h3>Resultados de Exámenes</h3>                    

                        
                        
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
                            <li class="active">Resultados de Exámenes</li>
                        </ul>

                    </div><!-- End .heading-->
              @if(Session::has('message'))
			<div class="alert alert-success">
				{{ Session::get('message') }}
			</div>
			@endif
             @if(Session::has('vac_cre'))
			<div class="alert alert-success">
				{{ Session::get('vac_cre') }}
			</div>
			@endif
			@if(Session::has('vac_edi'))
			<div class="alert alert-info">
				{{ Session::get('vac_edi') }}
			</div>
			@endif
			@if(Session::has('vac_eli'))
			<div class="alert alert-warning">
				{{ Session::get('vac_eli') }}
			</div>
			@endif

			<?php 
				$tip=Auth::user()->tipo;
				?>
				@if( ($tip === 'adm') or ($tip === 'pro') )
				
				@endif
			
		  
		  <form class="navbar navbar-form navbar-right espacio_contenido" action="/vacante/lista">
					<div class="input-group">
						<input type="text" name="titulo_v" class="form-control" placeholder="Titulo" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">Buscar</button>
						</span>

					</div>
					<br>
			</form>

				<div class="table-responsive">


				<table class="table table-bordered table-hover table-condensed" width="80%"  cellpadding="0" cellspacing="0" >
					<thead>
					<tr>
				
						<th class="first">Título</th>
						<th class="first">Candidatos registrados</th>
						
						
							@if( ($tip === 'adm') or ($tip === 'pro') )
									<th class="last">Acciones</th>
								
							@endif
							
						
						
					</tr>
					</thead>
					<tbody>
					@forelse($vacantes as $vacante)

					<tr>
				
						<td width="400px">{{ $vacante->titulo_v }}</td>
				
						<td width="200px">{{$vacante->getCantidadCandidatos()}}</td>
						
							
							
							@if( ($tip === 'adm') or ($tip === 'pro') )
							<td class="last" width="200px">
							<a  href="/resultados/examenes/{{$vacante->cod_v}}"title="Ver resultados de Exámenes" > 
								<span class="iconic-icon-magnifying-glass"></span>Ver resultados
							</a>
							<!--<a class="boton" href="#" data-toggle="modal" data-target="#enviar_email_vacante" onclick="enviar_email_vacante('{{$vacante->cod_v}}')"> Invitar</a>-->
							<!--
							<a href="/resultados/entrevistas/{{$vacante->cod_v}}" title="Ver reporte de Entrevistas">
								Ver reporte de Entrevistas
							</a>
							-->
							</td>
							@endif
							
								
					</tr>
					@empty
				<tr class="text-center">
					<td colspan="5">No exiten Registros</td>
				</tr>
				@endforelse
					</tbody>
				</table>
				<div id="effect">
				</div>
				<div class="select">
				{!! $vacantes->appends(['titulo_v' => Request::input('titulo_v')])->render() !!}
				</div>

		</div>

	<div class="modal fade hide" id="ver_datos_vacante">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        		</button>
        		<h4 class="modal-title">Datos de Vacante</h4>
			</div>
			<div class="modal-body">
				
				 <div class="widget-body">
                            <div class="modal-body datagrid table-responsive" >
                                <center><div id="cargar_datos_vacante" >
                                        Espere!!! Cargando datos...
                                    </div></center>
 
                                <div class="panel-body" id="datos_vacante" >
 
                                </div>
                            </div>
                        </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
			</div>
		</div>
</div>

<div class="modal fade hide" id="enviar_email_vacante">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        		</button>
        		<h4 class="modal-title">Enviar Invitación</h4>
			</div>
			<div class="modal-body">
				
				 <div class="widget-body">
                            <div class="modal-body datagrid table-responsive" >
                                <center><div id="cargar_vista_invitar" >
                                        Espere!!! Cargando datos...
                                    </div></center>
 
                                <div class="panel-body" id="datos_invitar" >
 
                                </div>
                            </div>
                        </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
			</div>
		</div>
</div>			
		  

@endsection