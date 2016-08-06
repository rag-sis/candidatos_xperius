@extends('inicio')
@section('contenido')
<head>
<script type="text/javascript" src="{{ asset('js/script_vacante.js') }}"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="{{ asset('css/multi-switch.min.css') }}" rel="stylesheet" type="text/css">

</head>
<div class="heading">

                        <h3>Entrevistas Programadas</h3>                    

                        
                        
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
                            <li class="active">Entrevistas Programadas</li>
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
			<BR>

				<div class="table-responsive">


				<table class="table table-bordered table-hover table-condensed" width="80%"  cellpadding="0" cellspacing="0" >
					<thead>
					<tr>
				
						<th class="first">Nombre</th>
						<th class="first">Vacante</th>
						<th class="first">Fecha</th>
						<th class="first">Estado</th>
						<th class="last">Acciones</th>
							
						
						
					</tr>
					</thead>
					<tbody>
					@forelse($entrevistas as $entrevista)

					<tr>
				
						<td width="150px">{{ $entrevista->postulacion->usuario->nom_u }}</td>
				
						<td>{{ $entrevista->postulacion->vacante->titulo_v }}</td>
						<td>{{ $entrevista->fecha_en }}</td>
						<td>{{ $entrevista->estado_en() }}</td>
							
							
							
							<td class="last" width="100px">
							<a class="boton" href="#" title="Ver" data-toggle="modal" data-target="#ver_datos" onclick="mostrar_datos_usuario('')"> 
								<span class="icomoon-icon-grid-view-2"></span>
							</a>
							
							</td>
							
							
								
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
				{!! $entrevistas->appends(['titulo_v' => Request::input('titulo_v')])->render() !!}
				</div>

		</div>

			
		  

@endsection