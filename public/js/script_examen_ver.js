
$(document).ready(function(){
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
                        var puntaje_pre=pregunta[i].puntaje_p;

                        var lugar= $('#automatic');

        var h = document.createElement("H4")                // Create a <h1> element
        var t = document.createTextNode("PREGUNTA #"+cont_pre_a);     // Create a text node
        h.appendChild(t);
        
        
        var hr = document.createElement("hr");

        var div_peso = document.createElement('div');
        div_peso.id = 'div_peso'+cont_pre_a;
        div_peso.className = 'float-right';

        var text_peso = document.createTextNode("Puntaje: ");
        
        var peso_pregunta = document.createElement('input');
        peso_pregunta.type="text";
        peso_pregunta.name="peso_preg_"+cont_pre_a;
        peso_pregunta.id="id_peso_preg_"+cont_pre_a;
        peso_pregunta.className="right inp2";
        peso_pregunta.value=puntaje_pre;
        div_peso.appendChild(text_peso);
        div_peso.appendChild(peso_pregunta); 

        var elemento_select = document.createElement('select');
        elemento_select.name="n_preg"+cont_pre_a;
        elemento_select.id="id_preg_"+cont_pre_a;
        elemento_select.readOnly=true;
        
        var div_pre = document.createElement('div');
        div_pre.id = 'div_pre'+cont_pre_a;
        div_pre.className = 'well well-large';
        //div_pre.className = 'cname_pre'+cont_pre;
        lugar.append(div_pre);

        var div_pre_int = document.createElement('div');
        div_pre_int.id = 'div_pre_int'+cont_pre_a;
        div_pre_int.className = 'cname_pre_int'+cont_pre_a;
        
        div_pre.appendChild(h);
        div_pre.appendChild(hr);
        div_pre.appendChild(div_peso);
        div_pre.appendChild(elemento_select);
        div_pre.appendChild(div_pre_int);

        

        var option = document.createElement("option");
        option.value = "opc0";
        option.text = "Seleccione";
        elemento_select.appendChild(option);
        var option = document.createElement("option");
        option.value = "opc1";
        option.text = "Falso/Verdadero";
        elemento_select.appendChild(option);
        var option = document.createElement("option");
        option.value = "opc2";
        option.text = "Opción de Llenado";
        elemento_select.appendChild(option);
        var option = document.createElement("option");
        option.value = "opc3";
        option.text = "Selección Simple";
        elemento_select.appendChild(option);
        var option = document.createElement("option");
        option.value = "opc4";
        option.text = "Selección Multiple";
        elemento_select.appendChild(option);

        
                        var id_sel="#id_preg_"+cont_pre_a;
                        var ultimo_caracter=cont_pre_a;
            
                        var div_pre="div_pre"+ultimo_caracter;
                        var div_pre=document.getElementById(div_pre);

                        var div_pre_int="div_pre_int"+ultimo_caracter;
                        var div_pre_int=document.getElementById(div_pre_int);

                        if(tipo_pre == 'Falso o Verdadero'){
                            
                            $(id_sel+" option[value='opc1']").prop('selected', 'selected');
                            

                            
            
                var label_inp = document.createElement("Label");
                label_inp.for = "n_preg_inp" + ultimo_caracter;
                label_inp.innerHTML="Pregunta:";

                var pregunta_inp = document.createElement('input');
                pregunta_inp.type="text";
                pregunta_inp.name="n_preg_inp"+ultimo_caracter;
                pregunta_inp.id="id_preg_inp"+ultimo_caracter;
                pregunta_inp.value=valor_pre;

                var label_res = document.createElement("Label");
                label_res.for = "n_res_inp" + ultimo_caracter;
                label_res.innerHTML="Respuesta:";

                var respuesta_inp_f = document.createElement('input');
                respuesta_inp_f.type="radio";
                respuesta_inp_f.value="falso";
                respuesta_inp_f.name="n_res_inp"+ultimo_caracter;
                respuesta_inp_f.readOnly=true;
                var text_f = document.createTextNode("Falso");
                var respuesta_inp_v = document.createElement('input');
                respuesta_inp_v.type="radio";
                respuesta_inp_v.value="verdadero";
                respuesta_inp_v.name="n_res_inp"+ultimo_caracter;
                respuesta_inp_v.readOnly=true;
                var text_v = document.createTextNode("Verdadero");

                //Accediendo a obtener la repuesta de esta pregunta
                            var url = '/respuesta/lista_respuestas/'+id_pregunta;
      
                            $.ajax({
                                'url': url,
                                'dataType': 'json',
                                success: function(respuesta){
                        
                                var x=0;
                                var is=0;
                                var ban=false;
                                //var cont_res_a=x+1;
                        
                                jQuery.each(respuesta, function() {
                                    var valor_res=respuesta[x].valor_r;

                                    //alert(valor_res);
                                    if(valor_res == 'falso'){
                                        respuesta_inp_f.checked='checked';
                                    }else if(valor_res == 'verdadero'){
                                        respuesta_inp_v.checked='checked';
                                    }
                                    
                                    x++;
                                });
                                }
                            });
                div_pre_int.appendChild(label_inp);
                div_pre_int.appendChild(pregunta_inp);
                div_pre_int.appendChild(label_res);
                div_pre_int.appendChild(text_f);
                div_pre_int.appendChild(respuesta_inp_f);
                div_pre_int.appendChild(text_v);
                div_pre_int.appendChild(respuesta_inp_v);
                            
                            

                        }else if(tipo_pre =='Opcion de Llenado'){
                            
                            $(id_sel+" option[value='opc2']").prop('selected', 'selected');
                            var label_inp = document.createElement("Label");
                            label_inp.for = "n_preg_inp" + ultimo_caracter;
                            label_inp.innerHTML="Pregunta:";


                            var pregunta_inp = document.createElement('input');
                            pregunta_inp.type="text";
                            pregunta_inp.name="n_preg_inp"+ultimo_caracter;
                            pregunta_inp.id="id_preg_inp"+ultimo_caracter;
                            pregunta_inp.value=valor_pre;

                            div_pre_int.appendChild(label_inp);
                            div_pre_int.appendChild(pregunta_inp);

                        }else if(tipo_pre =='Seleccion Simple'){
                            $(id_sel+" option[value='opc3']").prop('selected', 'selected');
                           
                            //Desde Aqui es copia del codigo anterior
                            var label_inp = document.createElement("Label");
                            label_inp.for = "n_preg_inp" + ultimo_caracter;
                            label_inp.innerHTML="Pregunta:";

                            var pregunta_inp = document.createElement('input');
                            pregunta_inp.type="text";
                            pregunta_inp.name="n_preg_inp"+ultimo_caracter;
                            pregunta_inp.id="id_preg_inp"+ultimo_caracter;
                            pregunta_inp.value=valor_pre;

                            var label_opc = document.createElement("Label");
                            label_opc.for = "n_preg_opc" + ultimo_caracter;
                            label_opc.innerHTML="Opciones y respuesta correcta:";
              
                
                            var br = document.createElement("br");
                            var br2 = document.createElement("br");

                           

                            var opc_cont = document.createElement('input');
                            opc_cont.type="hidden";
                            opc_cont.value="0";
                            opc_cont.name="opc_cont"+ultimo_caracter;
                            opc_cont.id="opc_cont"+ultimo_caracter;
                            opc_cont.readOnly=true;

                  
                            div_pre_int.appendChild(label_inp);
                            div_pre_int.appendChild(pregunta_inp);
                            div_pre_int.appendChild(label_opc);
                             div_pre_int.appendChild(opc_cont);

                //Accediendo a obtener la repuesta de esta pregunta
                            
                            var url = '/respuesta/lista_respuestas/'+id_pregunta;
      
                            $.ajax({
                                'url': url,
                                'dataType': 'json',
                                success: function(respuesta){
                        
                                var y=0;
                                var cont_opc=1;
                        
                                jQuery.each(respuesta, function() {
                                    var valor_res=respuesta[y].valor_r;
                                    var valor_res_r=respuesta[y].result_r;
                                    
                                    var brn = document.createElement("br");
                                    var text_opcn = document.createTextNode("opcion "+cont_opc+" : ");
                                    var opc_inpn = document.createElement('input');
                                    opc_inpn.type="text";
                                    opc_inpn.name=cont_opc+"_opc_inp"+ultimo_caracter;
                                    opc_inpn.id=cont_opc+"_opc_inp"+ultimo_caracter;
                                    opc_inpn.value=valor_res;

                                    var respuesta_opc_sn = document.createElement('input');
                                    respuesta_opc_sn.type="radio";
                                    respuesta_opc_sn.value=cont_opc;
                                    respuesta_opc_sn.name="n_res_opc"+ultimo_caracter;
                                    respuesta_opc_sn.readOnly=true;
                                    if(valor_res_r == 'correcto'){
                                        respuesta_opc_sn.checked='checked';
                                    }
                
                                    var id_opc="#opc_cont"+ultimo_caracter;
                                    var val_nuevo_opc=parseInt($(id_opc).val()) +1;
                                    $(id_opc).val(val_nuevo_opc);

                                    cont_opc++;
                                    div_pre_int.appendChild(brn);
                                    div_pre_int.appendChild(text_opcn);
                                    div_pre_int.appendChild(opc_inpn);
                                    div_pre_int.appendChild(respuesta_opc_sn);
                                    y++; 
                                });
                                    
                                }
                            });
                //
                
                
               

                 
                        }else if(tipo_pre =='Seleccion Multiple'){
                           $(id_sel+" option[value='opc4']").prop('selected', 'selected');
                           var lista=elemento_select;
                            var valorSeleccionado = elemento_select.value;
                           
                //Desde Aqui es copia del anterior codigo
                var label_inp = document.createElement("Label");
                label_inp.for = "n_preg_inp" + ultimo_caracter;
                label_inp.innerHTML="Pregunta:";

                var pregunta_inp = document.createElement('input');
                pregunta_inp.type="text";
                pregunta_inp.name="n_preg_inp"+ultimo_caracter;
                pregunta_inp.id="id_preg_inp"+ultimo_caracter;
                pregunta_inp.value=valor_pre;

                var label_opc_m = document.createElement("Label");
                label_opc_m.for = "n_preg_opc_m" + ultimo_caracter;
                label_opc_m.innerHTML="Opciones y Respuestas correctas:";


                var br = document.createElement("br");

                
                var opc_contm = document.createElement('input');
                opc_contm.type="hidden";
                opc_contm.value="0";
                opc_contm.name="opc_contm"+ultimo_caracter;
                opc_contm.id="opc_contm"+ultimo_caracter;
                opc_contm.readOnly=true;

                div_pre_int.appendChild(label_inp);
                div_pre_int.appendChild(pregunta_inp);
                div_pre_int.appendChild(opc_contm);
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
                                    var valor_res=respuesta[z].valor_r;
                                    var valor_res_r=respuesta[z].result_r;
                                 
                                    var brn = document.createElement("br");
                                    var text_opcn = document.createTextNode("opcion "+cont_opcm+" : ");
                                    var opc_inpn = document.createElement('input');
                                    opc_inpn.type="text";
                                    opc_inpn.name=cont_opcm+"_opc_inp_m"+ultimo_caracter;
                                    opc_inpn.id=cont_opcm+"_opc_inp_m"+ultimo_caracter;
                                    opc_inpn.value=valor_res;
                                    if((valor_res == 'Ninguna es correcta' ) || (valor_res == 'Todas son correctas' ) ){
                                        opc_inpn.readOnly=true;
                                    }

                                    var respuesta_opc_sn = document.createElement('input');
                                    respuesta_opc_sn.type="checkbox";
                                    respuesta_opc_sn.value=cont_opcm;
                                    respuesta_opc_sn.name="n_res_opc_m"+ultimo_caracter+"[]";
                                    respuesta_opc_sn.readOnly=true;
                                    if(valor_res_r == 'correcto'){
                                        respuesta_opc_sn.checked='checked';
                                    }
                                    
                

                                    var id_opcm="#opc_contm"+ultimo_caracter;
                                    var val_nuevo_opcm=parseInt($(id_opcm).val()) +1;
                                    $(id_opcm).val(val_nuevo_opcm);

                                    cont_opcm++;
                                    div_pre_int.appendChild(brn);
                                    div_pre_int.appendChild(text_opcn);
                                    div_pre_int.appendChild(opc_inpn);
                                    div_pre_int.appendChild(respuesta_opc_sn);
                                     z++; 
                                });
                                    
                                }
                            });
                        
                        }

                        
                        i++; cont_pre_a++;
                    });
                    
                }
            });  
    
});