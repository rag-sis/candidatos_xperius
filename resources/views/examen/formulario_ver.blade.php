<head>
<script type="text/javascript" src="{{ asset('js/script_examen_ver.js') }}"></script>
</head>
<!--<form method="post" action="/examen/almacenar" >-->
	
	
	


<div class="row-fluid">

                        

                        <div class="span8">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 icomoon-icon-equalizer-2"></span>
                                        <span>PREGUNTAS</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content">
                                    <div id="automatic"></div>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span3 -->

                       

                        <div class="span4">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 icomoon-icon-equalizer-2"></span>
                                        <span>EXAMEN</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content">
                                    @if($errors->has('titulo_e'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('titulo_e') }}
                                        </div>
                                    @endif
                                    
                                    <input type="hidden" name="cod_ex" id="cod_ex" value="{{ $examen->cod_e}}" readOnly>
                                    {!! Form::label('titulo_e', 'Título (*)', ['class' => 'control-label']) !!}
                                    {!! Form::text('titulo_e', null, ['class' => 'form-control','readonly']) !!}
                                    @if($errors->has('descripcion_e'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('descripcion_e') }}
                                        </div>
                                    @endif
                                    {!! Form::label('descripcion_e', 'Descripción', ['class' => 'control-label']) !!}
                                    {{ Form::textarea('descripcion_e',null, ['class' => 'form-control','readonly']) }}
                                    @if($errors->has('tiempo_minutos_e'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('tiempo_minutos_e') }}
                                        </div>
                                    @endif
                                    {!! Form::label('tiempo_minutos_e', 'Tiempo en Minutos (*)', ['class' => 'control-label']) !!}
                                    {!! Form::text('tiempo_minutos_e', null, ['class' => 'form-control','readonly']) !!}
                                    @if($errors->has('num_preguntas_e'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('num_preguntas_e') }}
                                        </div>
                                    @endif
                                    {!! Form::label('num_preguntas_e', 'N° Preguntas (*)', ['class' => 'control-label']) !!}
                                    {!! Form::text('num_preguntas_e', null, ['class' => 'form-control','readonly'],['id' => 'num_preguntas_e'],['readonly'=>'true']) !!}
                                    
                                    {!! csrf_field() !!}
                                    
                                    
                                    
                                    <hr />
                                    <center>
                                   
                                    </center>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span3 -->

                    </div><!-- End .row-fluid -->

</form>