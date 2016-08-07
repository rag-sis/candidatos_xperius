<head>
<script type="text/javascript" src="{{ asset('js/script_examen_ver_can_fin.js') }}"></script>

   
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


                                    <h4>Candidato(a):</h4>
                                    <h5><span class="blue">{{$cal_exa->postulacion->usuario->nom_u}}</span></h5>
                                    <h4>Vacante:</h4>
                                    <h5><span class="blue">{{$cal_exa->postulacion->vacante->titulo_v}}</span></h5>
                                    <h4>Título de exámen:</h4>
                                    <h5><span class="blue">{{$cal_exa->examen->titulo_e}}</span></h5>
                                    <h4>Nº de Preguntas:</h4>
                                    <h5><span class="blue">{{$cal_exa->examen->num_preguntas_e}}</span></h5>
                                    <h4>Nota de Exámen:</h4>
                                    <h5><span class="blue">{{$cal_exa->nota_cae}} / 100</span></h5>

                                    <input type="hidden" name="cod_ex" id="cod_ex" value="{{ $examen->cod_e}}" readOnly>
                                   
                                    {!! Form::hidden('num_preguntas_e', null, ['class' => 'form-control','readonly'],['id' => 'num_preguntas_e'],['readonly'=>'true']) !!}
                                    
                                    {!! csrf_field() !!}
                                    
                                    
                                    
                                    <hr />
                                    <center>
                                        
                                        <input type="hidden" id="cal_e" value="{{$cal_e}}"/>
                                        <!--<input type="submit" id="boton_terminar" value="Terminar Exámen" />-->
                                    
                                    </center>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span3 -->

                    </div><!-- End .row-fluid -->

</form>