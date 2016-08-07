
@extends('inicio')

@section('contenido')
<div class="heading">

                        <h3>Usuarios</h3>                    
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
                            <li class="active">Usuarios</li>
                        </ul>

                    </div><!-- End .heading-->

             @if(Session::has('usu_cre'))
			<div class="alert alert-success">
				{{ Session::get('usu_cre') }}
			</div>
			@endif
			@if(Session::has('usu_edi'))
			<div class="alert alert-info">
				{{ Session::get('usu_edi') }}
			</div>
			@endif
			@if(Session::has('usu_eli'))
			<div class="alert alert-warning">
				{{ Session::get('usu_eli') }}
			</div>
			@endif

			@if(Session::has('asig_valido'))
			<div class="alert alert-success">
				{{ Session::get('asig_valido') }}
			</div>
			@endif
			<div class="top-bar">
				<button class="boton_nuevo" onClick="boton_nuevo_usuario()" type="button"><span class="cut-icon-plus-2"></span> Nuevo </button>
				
			</div><br />
		  
		  <form class="navbar navbar-form navbar-right espacio_contenido" action="/usuario/lista">
					<div class="input-group">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">Buscar</button>
						</span>

						<a href="/lista_usr_pdf" class="float-right">
						<span class="box1">
                        <span aria-hidden="true" class="icomoon-icon-file-pdf"></span>
                        &nbsp;Descargar lista
                        </span>
                        </a>
					</div>
			</form>
<br>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0" >
					<thead>
					<tr>
				
						<th class="first">Nombre</th>
						<th class="first">E-mail</th>
						<th class="first">Rol</th>
						<th class="last">Acciones</th>
					</tr>
					</thead>
					<tbody>
					@forelse($usuarios as $usuario)

					<tr>
				
						<td>{{ $usuario->nom_u }}</td>
				
						<td>{{ $usuario->email_u }}</td>
						<td>
							@if($usuario->tipo === 'can')
							Candidato
							@elseif($usuario->tipo === 'pro')
							Evaluador
							@elseif($usuario->tipo === 'adm')
							Administrador
							@endif
							</td>
						<td class="last">

							<a class="boton" href="#" title="Ver" data-toggle="modal" data-target="#ver_datos" onclick="mostrar_datos_usuario('{{$usuario->cod_u}}')"> 
								<span class="icomoon-icon-grid-view-2"></span>
							</a>
							@if($usuario->tipo === 'can')
							@if($usuario->habilitado_asignacion())
								
								<a class="boton" href="#" title="Asignar Vacante" data-toggle="modal" data-target="#asig_vac" onclick="asignar_vacante('{{$usuario->cod_u}}')"> 
								<span class=" iconic-icon-transfer"></span>
							</a>
							@else
								<a href="#" title="Ya fue asignado una vacante a este usuario">
								<span class=" iconic-icon-transfer gray"></span>
							</a>
							@endif
							
							@else
							<a href="#" title="No permitido">
								<span class=" iconic-icon-transfer gray"></span>
							</a>
							@endif
							<a href="/usuario/editar/{{$usuario->cod_u}}" title="Editar">
								<span class=" icon-pencil"></span>
							</a>
							
								
							<a class="eliminar" title="Eliminar" href="/usuario/eliminar/{{$usuario->cod_u}}">
								<span class=" icon-remove"></span>
								</a>

								
						


							</td>
								
					</tr>
					@empty
				<tr class="text-center">
					<td colspan="5">No exiten Usuarios</td>
				</tr>
				@endforelse
					</tbody>
				</table>
				<div class="select">
				{!! $usuarios->appends(['nombre' => Request::input('nombre')])->render() !!}
				</div>
				<!--
				<div class="select">
					<strong>Other Pages: </strong>
					<select>
						<option></option>
					</select>
			  </div>-->
			</div>



<div class="modal fade hide" id="ver_datos">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        		</button>
        		<h4 class="modal-title">DATOS DE USUARIO</h4>
			</div>
			<div class="modal-body">
				
				 <div class="widget-body">
                            <div class="modal-body datagrid table-responsive" >
                                <center><div id="cargar_reporte" >
                                        Espere!!! Cargando datos...
                                    </div></center>
 
                                <div class="panel-body" id="editar_resul" >
 
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

<div class="modal fade hide" id="asig_vac">
 	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        		</button>
        		<h4 class="modal-title">ASIGNAR VACANTE</h4>
			</div>
			<div class="modal-body">
				
				 <div class="widget-body">
                            <div class="modal-body datagrid table-responsive" >
                                <center><div id="cargar_datos" >
                                        Espere!!! Cargando datos...
                                    </div></center>
 
                                <div class="panel-body" id="asignar_resul" >
 
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