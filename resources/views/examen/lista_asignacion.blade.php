@extends('inicio')
@section('contenido')
<?php
  $valor_v='';
  $valor_t='';
?>
@if(Session::has('vacante_id'))
      <?php
        $valor_v=Session::get('vacante_id');
        $valor_t=Session::get('vacante_titulo');
      ?>
@endif
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

                        <h3>Asignación de Exámenes</h3>                    

                        
                        
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
				
			
		  <div>
		  	<h3>Se asignarán los exámenes para la vacante: <span class="blue">{{$valor_t}}</span>
			 </h3>
		  	
		  	
		  	
		  </div>


		  

		  <form class="navbar navbar-form navbar-right espacio_contenido" action="/asignacion_examen/asignar/{{$valor_v}}/{{$valor_t}}">
					<div class="input-group">
						<input type="text" name="titulo_e" class="form-control" placeholder="Titulo" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">Buscar</button>
						</span>

					</div>
			</form>
			<form class="navbar navbar-form navbar-right espacio_contenido" method="post" action="/asignacion_examen/asignar_e">
				<div class="input-group">
						<input type="hidden" name="vacante_id" value="{{$valor_v}}" />
						<input type="hidden" name="vacante_ti" value="{{$valor_t}}" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="float-right btn btn-primary"  type="submit"> Asignar Exámenes </button>

							
					</div>
					<br />
				<div class="table-responsive">

				<!--class="table table-bordered table-hover table-condensed"-->
				

				<table class="table table-bordered table-hover table-condensed" width="80%"  cellpadding="0" cellspacing="0" >
					<thead>
					<tr>
				
						<th class="first">Titulo</th>
						<th class="first">Descripcion</th>
						<th class="first">Puntuación</th>
						
							
						
						
					</tr>
					</thead>
					<tbody>
					<?php
						$i=1;
					?>	
					@forelse($examenes as $examen)
					<!--<form action="/asignacion_examen/asignar_e/" method="get" >-->
					<tr>
				
						<td width="200px">{{ $examen->titulo_e }}</td>
				
						<td>{{ $examen->descripcion_e }}</td>
						<td width="50px">
							
								<input type="hidden" name="examen_id_{{$i}}" value="{{$examen->cod_e}}" />
								
								<input class="span1" type="text" name="valor_puntual_{{$i}}"  />
							

							 	
						</td>
							
							
						<?php
							$i++;
						?>	
								
					</tr>
					
					@empty
				<tr class="text-center">
					<td colspan="5">No exiten examenes</td>
				</tr>

				@endforelse
				<input type="hidden" name="cantidad_items" value="{{$i=$i-1}}" />
				</form>
				</tbody>
				</table>
				<div id="effect">
				</div>
				<div class="select">
				{!! $examenes->appends(['titulo_e' => Request::input('titulo_e')])->render() !!}
				</div>

		</div>
			
		  

@endsection