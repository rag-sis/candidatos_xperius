@extends('inicio')
@section('contenido')
<div class="heading">

                        <h3>Vacantes</h3>                    

                        
                        
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
                            <li class="active">Vacantes</li>
                        </ul>

                    </div><!-- End .heading-->

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
			<div class="top-bar">
				<button class="boton_nuevo" onClick="boton_nuevo_vacante()" type="button"><img src="{{ asset('img/add-icon.gif') }}" width="16" height="16"> Nuevo </button>
				
			</div><br />
		  
		  <form class="navbar navbar-form navbar-right espacio_contenido" action="/vacante/lista">
					<div class="input-group">
						<input type="text" name="titulo_v" class="form-control" placeholder="Titulo" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default">Buscar</button>
						</span>

						<a href="/lista_v_pdf" class="float-right">
						<span class="box1">
                        <span aria-hidden="true" class="icomoon-icon-file-pdf"></span>
                        &nbsp;Descargar lista
                        </span>
                        </a>
					</div>
			</form>

			<div class="table-responsive">
				<img src="{{asset('img/bg-th-left.gif')}}" width="8" height="7" alt="" class="left" />
				<img src="{{asset('img/bg-th-right.gif')}}" width="7" height="7" alt="" class="right" />
				<table class="table table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0" >
					<thead>
					<tr>
				
						<th class="first">Titulo</th>
						<th class="first">Descripcion</th>
						<th class="first">Estado</th>
						<th class="last">Acciones</th>
					</tr>
					</thead>
					<tbody>
					@forelse($vacantes as $vacante)

					<tr>
				
						<td>{{ $vacante->titulo_v }}</td>
				
						<td>{{ $vacante->descripcion_v }}</td>
						<td>{{ $vacante->estado_v }}
							</td>
						<td class="last">
							<!--<img src="{{asset('img/add-icon.gif')}}" width="16" height="16" alt="add" />-->
							
							
							<a href="/vacante/editar/{{$vacante->cod_v}}" title="Editar">
								<img src="{{asset('img/edit-icon.gif')}}" width="16" height="16" alt="edit" />
							</a>
								
							<a class="eliminar" title="eliminar" href="/vacante/eliminar/{{$vacante->cod_v}}">
								<img src="{{asset('img/hr.gif')}}" width="16" height="16" alt="" />
								</a>
						</a>
							</td>
								
					</tr>
					@empty
				<tr class="text-center">
					<td colspan="5">No exiten Vacantes</td>
				</tr>
				@endforelse
					</tbody>
				</table>
				<div class="select">
				{!! $vacantes->appends(['titulo_v' => Request::input('titulo_v')])->render() !!}
				</div>
			
			</div>

			
		  

@endsection