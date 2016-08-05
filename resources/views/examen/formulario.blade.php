<head>

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
                                    {!! Form::label('titulo_e', 'Título (*)', ['class' => 'control-label']) !!}
                                    {!! Form::text('titulo_e', null, ['class' => 'form-control']) !!}
                                    @if($errors->has('descripcion_e'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('descripcion_e') }}
                                        </div>
                                    @endif
                                    {!! Form::label('descripcion_e', 'Descripción', ['class' => 'control-label']) !!}
                                    {{ Form::textarea('descripcion_e',null, ['class' => 'form-control']) }}
                                    @if($errors->has('tiempo_minutos_e'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('tiempo_minutos_e') }}
                                        </div>
                                    @endif
                                    {!! Form::label('tiempo_minutos_e', 'Tiempo en Minutos (*)', ['class' => 'control-label']) !!}
                                    {!! Form::text('tiempo_minutos_e', null, ['class' => 'form-control']) !!}
                                    @if($errors->has('num_preguntas_e'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('num_preguntas_e') }}
                                        </div>
                                    @endif
                                    {!! Form::label('num_preguntas_e', 'N° Preguntas (*)', ['class' => 'control-label']) !!}
                                    {!! Form::text('num_preguntas_e', 0, ['class' => 'form-control','readonly'],['id' => 'num_preguntas_e'],['readonly'=>'true']) !!}
                                    {!! csrf_field() !!}

                                    {!! Form::label('suma_puntajes', 'Suma de Puntajes (*)', ['class' => 'control-label']) !!}
                                    {!! Form::text('suma_puntajes', 0, ['class' => 'form-control','readonly'],['id' => 'suma_puntajes'],['readonly'=>'true']) !!}
                                    
                                    <!--
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label>Título</label>
                                    <input type="text" name="titulo" id="titulo" />
									<label>Descripción</label>
									<textarea name="descripcion" id="descripcion"></textarea>

									<label>Tiempo en minutos</label>
									<input type="text" name="tiempo" id="tiempo">
									

									<label>Preguntas</label>
									<input type="text" id="nro_pre" name="nro_pre" value="0" readOnly>
									<a href="#" id="add_pre">Agregar Pregunta</a>
									<hr />
									<center>
									<input class="btn btn-default" type="submit" value="invitar" name="invitar"/>
									</center>-->
                                    <a href="#" id="add_pre">Agregar Pregunta</a>
                                    <hr />
                                    <center>
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                                    </center>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span3 -->

                    </div><!-- End .row-fluid -->

</form>