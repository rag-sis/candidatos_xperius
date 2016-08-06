@extends('inicio')
@section('contenido')
<head>
<script type="text/javascript" src="{{ asset('js/script_resultado_examenes.js') }}"></script>
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

                        <h3>Resultados de Exámenes <span class=" icomoon-icon-arrow-right blue">  {{ $vacante->titulo_v}} </span></h3>                    

                        
                        
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
						<input type="text" name="titulo_v" class="form-control" placeholder="Nombre" />
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
				
						<th class="first">Nombre</th>
						<th class="first">Exámenes terminados</th>
						<th class="first">Exámenes pendientes</th>
						<th class="first">Puntaje Total</th>
						
							@if( ($tip === 'adm') or ($tip === 'pro') )
								
									<th class="last">Acciones</th>
								
							@endif
							
						
						
					</tr>
					</thead>
					<tbody>
					@forelse($postulacion as $pos)

					<tr>
				
						<td width="250px">{{ $pos->usuario->nom_u }}</td>
				
						<td>{{$pos->getNumeroExamenesTerminados()}}</td>
						<td>{{$pos->getNumeroExamenesPendientes()}}</td>
						<td>{{$pos->getPuntajeTotal()}}</td>
						
							
							
							@if( ($tip === 'adm') or ($tip === 'pro') )
							
							<td class="last" width="100px">
							<a class="boton" title="Ver Exámenes" href="#" data-toggle="modal" data-target="#pro_ex" onclick="mostrar_examenes('{{$pos->cod_po}}')"> 
								<span class="icomoon-icon-grid-view-2"></span>

							</a>
							
							@if( ($pos->getInvitado())=== false )
							<a class="boton" title="Programar Entrevista" href="#" data-toggle="modal" data-target="#pro_ent" onclick="mostrar_form_nueva_entrevista('{{$pos->cod_po}}')"> 
								<span class="icomoon-icon-calendar"></span>
								
							</a>
							@else
							Entrevista Programada
							@endif
							
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
				{!! $postulacion->appends(['titulo_v' => Request::input('titulo_v')])->render() !!}
				</div>

		</div>

	<div class="modal fade hide" id="pro_ent">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        		</button>
        		<h4 class="modal-title">PROGRAMACION DE ENTREVISTA</h4>
			</div>
			<div class="modal-body">
				
				 <div class="widget-body">
                            <div class="modal-body datagrid table-responsive" >
                                <center><div id="cargar_datos_pro_ent" >
                                        Espere!!! Cargando datos...
                                    </div></center>
 
                                <div class="panel-body" id="datos_pro_ent" >
 
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

	<div class="modal fade hide" id="pro_ex">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        		</button>
        		<h4 class="modal-title">EXÁMENES TERMINADOS</h4>
			</div>
			<div class="modal-body">
				
				 <div class="widget-body">
                            <div class="modal-body datagrid table-responsive" >
                                <center><div id="cargar_datos_pro_ex" >
                                        Espere!!! Cargando datos...
                                    </div></center>
 
                                <div class="panel-body" id="datos_pro_ex" >
 
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