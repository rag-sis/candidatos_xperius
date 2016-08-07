@extends('inicio')
@section('contenido')
<head>
 <script type="text/javascript" src="{{asset('dest/jquery.countdown.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}" media="screen">

    <script type="text/javascript">
    
      $(document).ready(function() {
        var tiempo=parseInt($('#min_total_res').val());
        $('.countdown.callback').countdown({
               // $('#conta').html('<h6>TERMINADO</h6>');

               //var tiempo=parseInt($('#min_total_res').val());
               

          date: +(new Date) + (60000*(tiempo)),
          render: function(data) {
            
            $(this.el).text("Faltan: "+this.leadingZeros(data.min, 2)+ " min "+this.leadingZeros(data.sec, 2) + " sec");
            
          },
          onEnd: function() {
            $(this.el).addClass('ended');
            
            terminarExamen();
           
          }
        }).on("click", function() {
          //$(this).removeClass('ended').data('countdown').update(+(new Date) + 10000).start();
        });

       

      });
      function terminarExamen(){
        $('#boton_terminar').click();
      }
    </script>
    <!--<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">-->
</head>
<div class="heading">

                        <h3>Examen : <span class=" icomoon-icon-arrow-right blue"> {{$examen->titulo_e}}</span></h3>                    
                        
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
                            <li class="active">Exámenes </li>
                        </ul>

</div><!-- End .heading-->
<div>
    
</div>
<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4></h4>
		</div>
		{!! Form::model($examen, ['url' => '/candidato/terminar_examen', 'files' => true]) !!}
		@include('candidato.formulario_examen_candidato')			
		{!! Form::close() !!}
	</div>
</div>
@endsection