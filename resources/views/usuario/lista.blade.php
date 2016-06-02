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


			<div class="top-bar">
				<button class="boton_nuevo" onClick="boton_nuevo_click()" type="button"><img src="{{ asset('img/add-icon.gif') }}" width="16" height="16"> Nuevo </button>
				
			</div><br />
		  
		  <form class="navbar navbar-form navbar-right espacio_contenido" action="/usuario/lista">
					<div class="input-group">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default">Buscar</button>
						</span>
					</div>
			</form>

			<div class="table-responsive">
				<img src="{{asset('img/bg-th-left.gif')}}" width="8" height="7" alt="" class="left" />
				<img src="{{asset('img/bg-th-right.gif')}}" width="7" height="7" alt="" class="right" />
				<table class="table table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0" >
					<thead>
					<tr>
				
						<th class="first">Nombre</th>
						<th class="first">E-mail</th>
						<th class="first">Tipo</th>
						<th class="last">Acciones</th>
					</tr>
					</thead>
					<tbody>
					@forelse($usuarios as $usuario)

					<tr>
				
						<td>{{ $usuario->getNombreCompleto() }}</td>
				
						<td>{{ $usuario->email_u }}</td>
						<td>{{ $usuario->tipo }}
							</td>
						<td class="last">
							<img src="{{asset('img/add-icon.gif')}}" width="16" height="16" alt="add" />
							
							
							<a href="/usuario/editar/{{$usuario->cod_u}}" title="Editar">
								<img src="{{asset('img/edit-icon.gif')}}" width="16" height="16" alt="edit" />
							</a>
								
							<a class="eliminar" title="eliminar" href="/usuario/eliminar/{{$usuario->cod_u}}">
								<img src="{{asset('img/hr.gif')}}" width="16" height="16" alt="" />
								</a>
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

			
		  

@endsection