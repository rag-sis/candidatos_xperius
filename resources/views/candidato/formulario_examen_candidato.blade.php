<head>
<script type="text/javascript" src="{{ asset('js/script_examen_ver_can.js') }}"></script>

   
</head>
<!--<form method="post" action="/examen/almacenar" >-->
	
	
	


<div class="row-fluid">

                        

                        <div class="span8">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 icomoon-icon-equalizer-2"></span>
                                        <span>{{$examen->titulo_e}}</span>
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
                                        <span>Datos</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content">
                                    @if($errors->has('titulo_e'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('titulo_e') }}
                                        </div>
                                    @endif
                                    
                                    <div class="countdown callback" id="crono"></div>

                                    <input type="hidden" name="cod_ex" id="cod_ex" value="{{ $examen->cod_e}}" readOnly>
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
                                        <input type="hidden" value="{{$cod_inv}}" name="cod_inv"/>
                                        <input type="hidden" id="min_total_res" value="{{$min_total}}"/>
                                        <input type="hidden" id="min_total" value="{{$examen->tiempo_minutos_e}}"/>
                                        <input type="hidden" id="tiempo_start" value="{{$tiempo_comienzo}}"/>
                                        <input type="hidden" id="tiempo_end" value="{{$tiempo_final}}"/>
                                        <input type="submit" id="boton_terminar" value="Terminar Exámen" />
                                    
                                    </center>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span3 -->

                    </div><!-- End .row-fluid -->

</form>