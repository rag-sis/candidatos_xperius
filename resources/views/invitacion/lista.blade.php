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

                        <h3>Invitación a Candidatos</h3>                    

                        
                        
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
                            <li class="active">Invitaciones</li>
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
				<!--<div class="top-bar">
						<button class="boton_nuevo" onClick="boton_nuevo_vacante()" type="button"><img src="{{ asset('img/add-icon.gif') }}" width="16" height="16"> Nuevo </button>
				
						</div><br />-->
				@endif
			
		  <form class="navbar navbar-form navbar-right espacio_contenido" method="post" action="/invitacion/lista">
					<div class="input-group">
						<input type="text" name="titulo_vacante" class="form-control" placeholder="Nombre" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">Buscar</button>
						</span>
					</div>
					</form>
		  <form class="navbar navbar-form navbar-right espacio_contenido" method="post" action="/invitacion/invitar">
					<div class="input-group">
						
						<!--
						<a href="/lista_v_pdf" class="float-right">
						<span class="box1">
                        <span aria-hidden="true" class="icomoon-icon-file-pdf"></span>
                        &nbsp;Descargar lista
                        </span>
                        </a>-->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="float-right btn btn-primary"   type="submit">
                        	<span class="icon16 icomoon-icon-mail-3 white"></span> Invitar </button>
							<br>
							<br>
					</div>
					<br>


				<div class="table-responsive">


				<table class="table table-bordered table-hover table-condensed" width="80%"  cellpadding="0" cellspacing="0" >
					<thead>
					<tr>
						<th class="first">Nombre</th>
						<th class="first">E-mail</th>
						
						<th class="first">Vacante</th>

						<th class="first">N° Exámenes</th>
						<th class="first">Invitar</th>
						
						
					</tr>
					</thead>
					<tbody>
					
					@forelse($invitaciones as $invitacion)

					<tr>
						<td>
							{{ $invitacion->getNombresUsuario($invitacion->cod_u) }}
							
						</td>
						<td width="200px">{{ $invitacion->usuario->email_u }}
							</td>
						
						<td>{{ $invitacion->vacante->titulo_v }}</td>
						<td>{{ $invitacion->vacante->nro_examenes_v }}</td>
						<td>

							
							@if($invitacion->vacante->nro_examenes_v > 0)
							<input type="checkbox" name="invitacion[]" value="{{ $invitacion->cod_i }}">
							@else
								Sin exámenes.
							@endif
						</td>
						
								
					</tr>
					@empty
				<tr class="text-center">
					<td colspan="5">No exiten Invitaciones</td>
				</tr>
				@endforelse
					</tbody>
				</form>
				</table>
				<div id="effect">
				</div>
				<div class="select">
				
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