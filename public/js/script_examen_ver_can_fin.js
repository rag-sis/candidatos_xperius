
$(document).on('ready',function(){
//$(document).ready(function(){
       // $('#num_preguntas_e').val('0');

    //var id_ex=document.getElementById("cod_e");
    var id_ex= $('#cod_ex').val();
    var cont_pre_act=parseInt($('#num_preguntas_e').val());
    //alert(cont_pre_act);
      //alert(ciu);
      
      //var lista_c=document.getElementById("sel_ciudad");
      //var tam=lista_c.options.length;
      var url = '/pregunta/lista_preguntas/'+id_ex;
      //'/vacante/act_es/'+id+'/'+val;
          $.ajax({
                'url': url,
                 'dataType': 'json',
                success: function(pregunta){
                    //lista_c.options[tam]=new Option(result,result);
                    var i=0;
                    var is=0;
                    var ban=false;
                    var cont_pre_a=i+1;
                        
                    jQuery.each(pregunta, function() {
                        var id_pregunta=pregunta[i].cod_p;
                        var valor_pre=pregunta[i].valor_p;
                        var tipo_pre=pregunta[i].tipo_p;
                        var puntaje_pre=pregunta[i].tipo_p;

                        var lugar= $('#automatic');

                        var h = document.createElement("H4")                // Create a <h1> element
                        var t = document.createTextNode("PREGUNTA #"+cont_pre_a);     // Create a text node
                        h.appendChild(t);

                        var hr = document.createElement("hr"); 
                        var div_pre = document.createElement('div');
                        div_pre.id = 'div_pre'+cont_pre_a;
                        div_pre.className = 'well well-large';
                        //div_pre.className = 'cname_pre'+cont_pre;
                        lugar.append(div_pre);

                        var div_pre_int = document.createElement('div');
                        div_pre_int.id = 'div_pre_int'+cont_pre_a;
                        div_pre_int.className = 'cname_pre_int'+cont_pre_a;
                        
                        //OBTENCION DEL NOTA OBTENIDA
                        var cod_cae=parseInt($('#cal_e').val());
                            var url = '/calificaciones/pregunta/'+cod_cae+'/'+id_pregunta;
                            //var resp_nota=1;
                            //var resp_nota=1;
                            $.ajax({
                                'url': url,
                                'dataType': 'json',
                                success: function(respuesta){

                                    var resp_nota=respuesta.nota_cap;
                                    var letra = document.createElement("H4") ;               // Create a <h1> element
                                    var cont_letra = document.createTextNode("PUNTAJE OBTENIDO : "+resp_nota);     // Create a text node
                                    letra.appendChild(cont_letra);
                                    div_pre.appendChild(letra);

                                    if(resp_nota == 0){
                                        letra.className='red derecha';
                                        var letra_error = document.createElement("H6") ;               // Create a <h1> element
                                        var cont_letra_error = document.createTextNode("Respuesta Incorrecta");     // Create a text node
                                        letra_error.className='red derecha';
                                        var br_e = document.createElement("br"); 
                                        letra_error.appendChild(cont_letra_error);
                                        //div_pre.appendChild(br_e);
                                        //div_pre.appendChild(letra_error);
                                    }else{
                                        letra.className='green derecha';    
                                    }
                                    //letra.className='green derecha';
                                    

                                    
                                    
                                }
                            });
                        div_pre.appendChild(h);
                        //div_pre.appendChild(hr);
                        div_pre.appendChild(div_pre_int);

                        var id_sel="#id_preg_"+cont_pre_a;
                        var ultimo_caracter=cont_pre_a;
            
                        var div_pre="div_pre"+ultimo_caracter;
                        var div_pre=document.getElementById(div_pre);

                        var div_pre_int="div_pre_int"+ultimo_caracter;
                        var div_pre_int=document.getElementById(div_pre_int);


                    if(tipo_pre == 'Falso o Verdadero'){

                             $(id_sel+" option[value='opc1']").prop('selected', 'selected');
                            

                            
                            var h = document.createElement("H4");                // Create a <h1> element
                            var t = document.createTextNode(valor_pre);     // Create a text node
                            h.appendChild(t);

                            var label_res = document.createElement("Label");
                            label_res.for = "n_res_inp" + ultimo_caracter;
                            label_res.innerHTML="Seleccione la respuesta:";

                            var respuesta_inp_f = document.createElement('input');
                            respuesta_inp_f.type="radio";
                            respuesta_inp_f.value="falso";
                            respuesta_inp_f.name=id_pregunta+"_res_1";
                            var text_f = document.createTextNode("Falso");
                            var respuesta_inp_v = document.createElement('input');
                            respuesta_inp_v.type="radio";
                            respuesta_inp_v.value="verdadero";
                            respuesta_inp_v.name=id_pregunta+"_res_1";
                            var text_v = document.createTextNode("Verdadero");

                            //Accediendo a obtener la repuesta de esta pregunta
                           
                            div_pre_int.appendChild(h);
                            div_pre_int.appendChild(label_res);
                            div_pre_int.appendChild(text_f);
                            div_pre_int.appendChild(respuesta_inp_f);
                            div_pre_int.appendChild(text_v);
                            div_pre_int.appendChild(respuesta_inp_v);



                            //OBTENIENDO LA NOTA OBTENIDO POR RENDIR EL EXAMEN
                            var cod_cae=parseInt($('#cal_e').val());
                            var url = '/calificaciones/pregunta/'+cod_cae+'/'+id_pregunta;
                            //var resp_nota=1;
                            //var resp_nota=1;
                            $.ajax({
                                'url': url,
                                'dataType': 'json',
                                success: function(respuesta){

                                    var resp_nota=parseInt(respuesta.nota_cap);
                                    
                                    
                                    //Nuevo Ajax
                                    var url = '/respuesta_correcta_fv/'+id_pregunta;
                                    $.ajax({
                                        'url': url,
                                        'dataType': 'json',
                                        success: function(respuesta){

                                        var resp=respuesta.valor_r;
                                        
                                            if(resp_nota != 0){

                                                console.log('correcto');
                                                 if(resp == 'verdadero'){
                                                        console.log('Verdadero'); 
                                                        respuesta_inp_v.checked='checked';
                                                    }else{
                                                        respuesta_inp_f.checked='checked';
                                                        console.log('Usuario ha seleccionado Falso, la respuesta es verdadero'); 
                                                    }    

                                            }else{
                                                console.log('incorrecto');
                                                if(resp == 'verdadero'){
                                                        console.log('Falso');
                                                        respuesta_inp_f.checked='checked'; 
                                                    }else{
                                                        respuesta_inp_v.checked='checked';
                                                        console.log('Usuario ha seleccionado Verdadero, la respuesta es falso'); 
                                                    }    


                                            }

                                           

                                               

                                        
                                    
                        
                                    
                                        }
                                    });
                                    //FIN AJAX     
                        
                                    
                                }
                            });
                            //FIN 

                            


                            
                            
                            
                            

                        }else if(tipo_pre =='Opcion de Llenado'){
                            
                            $(id_sel+" option[value='opc2']").prop('selected', 'selected');
                            
                            var h = document.createElement("H4")                // Create a <h1> element
                            var t = document.createTextNode(valor_pre);     // Create a text node
                            h.appendChild(t);

                        

                            var textArea = document.createElement("textarea");
                            textArea.setAttribute("name",id_pregunta+"_res_2");
                            textArea.setAttribute("id","id_preg_inp"+ultimo_caracter);
                            textArea.setAttribute("cols","20");
                            textArea.style.height = "42px";
                            textArea.style.width = "496px";

                            div_pre_int.appendChild(h);
                            div_pre_int.appendChild(textArea);

                            //OBTENCION DE LA RESPUESTA
                            var cod_cae=parseInt($('#cal_e').val());
                            var url = '/respuesta_opcion_llenado/'+cod_cae+'/'+id_pregunta;
                            //var resp_nota=1;
                            //var resp_nota=1;
                            $.ajax({
                                'url': url,
                                'dataType': 'json',
                                success: function(respuesta){

                                    if(respuesta != 'NULL'){
                                        var resp_nota=respuesta.valor_rr;
                                        textArea.value=resp_nota;
                                        console.log(resp_nota);

                                    }

                                    

                                    
                                    
                                }
                            });

                        }else if(tipo_pre =='Seleccion Simple'){
                            $(id_sel+" option[value='opc3']").prop('selected', 'selected');
                           
                            //Desde Aqui es copia del codigo anterior
                            var h = document.createElement("H4")                // Create a <h1> element
                            var t = document.createTextNode(valor_pre);     // Create a text node
                            h.appendChild(t);

                            var elemento_select = document.createElement('select');
                            elemento_select.name=id_pregunta+"_res_3";
                            elemento_select.id="id_preg_"+ultimo_caracter;

                            var option = document.createElement("option");
                            option.value = "0";
                            option.text = "Seleccione";
                            elemento_select.appendChild(option);

                
                            
                            div_pre_int.appendChild(h);
                            div_pre_int.appendChild(elemento_select);

                            //Accediendo a obtener la repuesta de esta pregunta
                            
                            var url = '/respuesta/lista_respuestas/'+id_pregunta;
      
                            $.ajax({
                                'url': url,
                                'dataType': 'json',
                                success: function(respuesta){
                        
                                var y=0;
                                var cont_opc=1;
                        
                                jQuery.each(respuesta, function() {
                                    var valor_iden=respuesta[y].cod_r;
                                    var valor_res=respuesta[y].valor_r;
                                    var valor_res_r=respuesta[y].result_r;
                                    
                                    var brn = document.createElement("br");
                                    var option = document.createElement("option");
                                    option.value = valor_iden;
                                    option.text = valor_res;
                                    elemento_select.appendChild(option);

                                    cont_opc++;
                                    y++; 
                                });
                                    
                                }
                            });


                            //OBTENCION DE LA RESPUESTA MARCADA POR EL CANDIDATO
                            var cod_cae=parseInt($('#cal_e').val());
                            var url = '/respuesta_opcion_simple/'+cod_cae+'/'+id_pregunta;
                            //var resp_nota=1;
                            //var resp_nota=1;
                            $.ajax({
                                'url': url,
                                'dataType': 'json',
                                success: function(respuesta){

                                    if(respuesta != 'NULL'){
                                        var cod_r=parseInt(respuesta.cod_r);
                                        console.log(cod_r);
                                        
                                        var id_sel=elemento_select.id;
                                        var dat="#"+id_sel+" option[value='"+cod_r+"']";
                                        $(dat).prop('selected', 'selected');
                                       
                                    }

                                }
                            });
                  
                        }else if(tipo_pre =='Seleccion Multiple'){
                           $(id_sel+" option[value='opc4']").prop('selected', 'selected');
                           
                
                            var h = document.createElement("H4")                // Create a <h1> element
                            var t = document.createTextNode(valor_pre);     // Create a text node
                            h.appendChild(t);



                            var label_opc_m = document.createElement("Label");
                            label_opc_m.for = "n_preg_opc_m" + ultimo_caracter;
                            label_opc_m.innerHTML="Seleccione la(s) respuesta(s):";

                            div_pre_int.appendChild(h);
                            div_pre_int.appendChild(label_opc_m);

                            //Accediendo a obtener la repuesta de esta pregunta
                            
                            var url = '/respuesta/lista_respuestas/'+id_pregunta;
      
                            $.ajax({
                                'url': url,
                                'dataType': 'json',
                                success: function(respuesta){
                        
                                var z=0;
                                var cont_opcm=1;
                                
                                jQuery.each(respuesta, function() {
                                    var valor_iden=respuesta[z].cod_r;
                                    var valor_res=respuesta[z].valor_r;
                                    var valor_res_r=respuesta[z].result_r;
                                 
                                    var brn = document.createElement("br");
                                    var text_opcn = document.createTextNode(""+cont_opcm+" : ");
                                    var text_val = document.createTextNode(" "+valor_res);

                                    
                                    var respuesta_opc_sn = document.createElement('input');
                                    respuesta_opc_sn.type="checkbox";
                                    respuesta_opc_sn.value=valor_iden;
                                    respuesta_opc_sn.name=id_pregunta+"_res_4[]";
                                    
                                    
                

                                    var id_opcm="#opc_contm"+ultimo_caracter;
                                    var val_nuevo_opcm=parseInt($(id_opcm).val()) +1;
                                    $(id_opcm).val(val_nuevo_opcm);

                                    cont_opcm++;
                                    div_pre_int.appendChild(brn);
                                    div_pre_int.appendChild(text_opcn);
                                    div_pre_int.appendChild(respuesta_opc_sn);
                                    div_pre_int.appendChild(text_val);
                                    
                                     z++;


                                     //OBTENCION DE LA RESPUESTA MARCADA POR EL CANDIDATO
                                    var cod_cae=parseInt($('#cal_e').val());
                                    var url = '/respuesta_opcion_multiple/'+cod_cae+'/'+id_pregunta;
                            
                                    $.ajax({
                                        'url': url,
                                        'dataType': 'json',
                                        success: function(respuesta){

                                        if(respuesta != 'NULL'){
                                        
                                            var z=0;
                                            jQuery.each(respuesta, function() {
                                                var cod_r=parseInt(respuesta[z].cod_r);

                                                if(valor_iden == cod_r){
                                                    respuesta_opc_sn.checked='checked';
                                                    console.log(cod_r);
                                                }
                                                

                                                z++;
                                            });

                                       
                                        }

                                        }
                                    });

                            //FIN AJAX 
                                });
                                    
                                }
                            });


                            

                        
                        }

                        
                        i++; cont_pre_a++;
                    });
                    
                }
            });  
    
});