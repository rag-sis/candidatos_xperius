function boton_nuevo_examen(){

	window.location = '/examen/crear';
}

$(document).ready(function(){
        $('#num_preguntas_e').val('0');

   var cont_pre=1;
   
	
	
    $('#add_pre').click( function(e) {
    	//alert('agregar pregunta');
        var val_nuevo=parseInt($('#num_preguntas_e').val()) +1;
        $('#num_preguntas_e').val(val_nuevo);
        //console.log(val_nuevo);

    	var lugar= $('#automatic');
        var h = document.createElement("H4")                // Create a <h1> element
        var t = document.createTextNode("PREGUNTA #"+cont_pre);     // Create a text node
        h.appendChild(t);
        var a_del_pre = document.createElement('a');
        var linkText = document.createTextNode("Eliminar Pregunta");
        a_del_pre.className = 'float-right';
        a_del_pre.appendChild(linkText);
        a_del_pre.title = "Eliminar Pregunta";
        a_del_pre.href = "#";
        
        var hr = document.createElement("hr"); 

    	var elemento_select = document.createElement('select');
		elemento_select.name="n_preg"+cont_pre;
		elemento_select.id="id_preg"+cont_pre;
		
		var div_pre = document.createElement('div');
		div_pre.id = 'div_pre'+cont_pre;
        div_pre.className = 'well well-large';
		//div_pre.className = 'cname_pre'+cont_pre;
		lugar.prepend(div_pre);

        var div_pre_int = document.createElement('div');
        div_pre_int.id = 'div_pre_int'+cont_pre;
        div_pre_int.className = 'cname_pre_int'+cont_pre;
        
        div_pre.appendChild(a_del_pre);
        div_pre.appendChild(h);
        div_pre.appendChild(hr);
		div_pre.appendChild(elemento_select);
        div_pre.appendChild(div_pre_int);
		
        $(a_del_pre).click(function(){
            div_pre.remove();
            var val_nuevo=parseInt($('#num_preguntas_e').val()) -1;
            $('#num_preguntas_e').val(val_nuevo);
        });

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

    	$(elemento_select).change("click", function(){
			var lista=elemento_select;
    		var valorSeleccionado = elemento_select.value;
    		var nombre_id=elemento_select.id;
    		var ultimo_caracter=nombre_id.substr(nombre_id.length - 1);
    		
    		//alert(ultimo_caracter);
            var div_pre="div_pre"+ultimo_caracter;
            var div_pre=document.getElementById(div_pre);

    		var div_pre_int="div_pre_int"+ultimo_caracter;
            //alert(document.getElementById(div_pre_int).length);
            var div_pre_int=document.getElementById(div_pre_int);
 			
 				
			

    		if(valorSeleccionado=='opc1'){
    		
    		$(div_pre_int).empty();

    		
				var label_inp = document.createElement("Label");
				label_inp.for = "n_preg_inp" + ultimo_caracter;
                label_inp.innerHTML="Ingrese la pregunta:";

    			var pregunta_inp = document.createElement('input');
    			pregunta_inp.type="text";
				pregunta_inp.name="n_preg_inp"+ultimo_caracter;
				pregunta_inp.id="id_preg_inp"+ultimo_caracter;

                var label_res = document.createElement("Label");
                label_res.for = "n_res_inp" + ultimo_caracter;
                label_res.innerHTML="Seleccione la respuesta:";

                var respuesta_inp_f = document.createElement('input');
                respuesta_inp_f.type="radio";
                respuesta_inp_f.value="falso";
                respuesta_inp_f.name="n_res_inp"+ultimo_caracter;
                var text_f = document.createTextNode("Falso");
                var respuesta_inp_v = document.createElement('input');
                respuesta_inp_v.type="radio";
                respuesta_inp_v.value="verdadero";
                respuesta_inp_v.name="n_res_inp"+ultimo_caracter;
                var text_v = document.createTextNode("Verdadero");


			 /*
			     var a_del_pre = document.createElement('a');
                var linkText = document.createTextNode("Eliminar Pregunta");
                a_del_pre.className = 'float-right';
                a_del_pre.appendChild(linkText);
                a_del_pre.title = "Eliminar Pregunta";
                a_del_pre.href = "#";
                $(a_del_pre).click(function(){

                    div_pre.remove();
                });
                */
				div_pre_int.appendChild(label_inp);
				div_pre_int.appendChild(pregunta_inp);
                div_pre_int.appendChild(label_res);
                div_pre_int.appendChild(text_f);
                div_pre_int.appendChild(respuesta_inp_f);
                div_pre_int.appendChild(text_v);
                div_pre_int.appendChild(respuesta_inp_v);

                //div_pre_int.appendChild(a_del_pre);
			
    		
			
    		
    		}else if(valorSeleccionado=='opc2'){
    		

                $(div_pre_int).empty();

                var label_inp = document.createElement("Label");
                label_inp.for = "n_preg_inp" + ultimo_caracter;
                label_inp.innerHTML="Ingrese la pregunta:";

                var pregunta_inp = document.createElement('input');
                pregunta_inp.type="text";
                pregunta_inp.name="n_preg_inp"+ultimo_caracter;
                pregunta_inp.id="id_preg_inp"+ultimo_caracter;

                div_pre_int.appendChild(label_inp);
                div_pre_int.appendChild(pregunta_inp);
    		
    		}else if(valorSeleccionado=='opc3'){
                $(div_pre_int).empty();

                var label_inp = document.createElement("Label");
                label_inp.for = "n_preg_inp" + ultimo_caracter;
                label_inp.innerHTML="Ingrese la pregunta:";

                var pregunta_inp = document.createElement('input');
                pregunta_inp.type="text";
                pregunta_inp.name="n_preg_inp"+ultimo_caracter;
                pregunta_inp.id="id_preg_inp"+ultimo_caracter;

                var label_opc = document.createElement("Label");
                label_opc.for = "n_preg_opc" + ultimo_caracter;
                label_opc.innerHTML="Ingrese las opciones y marque la respuesta correcta:";

                var text_opc1 = document.createTextNode("opcion 1 : ");
                var text_opc2 = document.createTextNode("opcion 2 : ");
                
                var opc_inp1 = document.createElement('input');
                opc_inp1.type="text";
                opc_inp1.name="1_opc_inp"+ultimo_caracter;
                opc_inp1.id="1_opc_inp"+ultimo_caracter;

                var respuesta_opc_s1 = document.createElement('input');
                respuesta_opc_s1.type="radio";
                respuesta_opc_s1.value="1";
                respuesta_opc_s1.name="n_res_opc"+ultimo_caracter;

                var opc_inp2 = document.createElement('input');
                opc_inp2.type="text";
                opc_inp2.name="2_opc_inp"+ultimo_caracter;
                opc_inp2.id="2_opc_inp"+ultimo_caracter;

                var respuesta_opc_s2 = document.createElement('input');
                respuesta_opc_s2.type="radio";
                respuesta_opc_s2.value="2";
                respuesta_opc_s2.name="n_res_opc"+ultimo_caracter;

                var br = document.createElement("br");
                var br2 = document.createElement("br");

                var a_add_opc_si = document.createElement('a');
                var linkTextOpc = document.createTextNode("Agregar opción");
                a_add_opc_si.className = 'float-left';
                a_add_opc_si.appendChild(linkTextOpc);
                a_add_opc_si.title = "Agregar opción";
                a_add_opc_si.href = "#";
                
                var cont_opc=3;
                $(a_add_opc_si).click(function(){
                var brn = document.createElement("br");
                var text_opcn = document.createTextNode("opcion "+cont_opc+" : ");
                var opc_inpn = document.createElement('input');
                opc_inpn.type="text";
                opc_inpn.name=cont_opc+"_opc_inp"+ultimo_caracter;
                opc_inpn.id=cont_opc+"_opc_inp"+ultimo_caracter;

                var respuesta_opc_sn = document.createElement('input');
                respuesta_opc_sn.type="radio";
                respuesta_opc_sn.value=cont_opc;
                respuesta_opc_sn.name="n_res_opc"+ultimo_caracter;
                
                var id_opc="#opc_cont"+ultimo_caracter;
                var val_nuevo_opc=parseInt($(id_opc).val()) +1;
                $(id_opc).val(val_nuevo_opc);

                cont_opc++;
                div_pre_int.appendChild(brn);
                div_pre_int.appendChild(text_opcn);
                div_pre_int.appendChild(opc_inpn);
                div_pre_int.appendChild(respuesta_opc_sn);
                });

                var opc_cont = document.createElement('input');
                opc_cont.type="hidden";
                opc_cont.value="2";
                opc_cont.name="opc_cont"+ultimo_caracter;
                opc_cont.id="opc_cont"+ultimo_caracter;
                opc_cont.readOnly=true;

                div_pre_int.appendChild(label_inp);
                div_pre_int.appendChild(pregunta_inp);
                div_pre_int.appendChild(label_opc);
                div_pre_int.appendChild(opc_cont);
                div_pre_int.appendChild(text_opc1);
                div_pre_int.appendChild(opc_inp1);
                div_pre_int.appendChild(respuesta_opc_s1);
                div_pre_int.appendChild(br);
                div_pre_int.appendChild(text_opc2);
                div_pre_int.appendChild(opc_inp2);
                div_pre_int.appendChild(respuesta_opc_s2);
                div_pre_int.appendChild(br2);
                div_pre_int.appendChild(a_add_opc_si);
    			
    		}else if(valorSeleccionado=='opc4'){
                $(div_pre_int).empty();

                var label_inp = document.createElement("Label");
                label_inp.for = "n_preg_inp" + ultimo_caracter;
                label_inp.innerHTML="Ingrese la pregunta:";

                var pregunta_inp = document.createElement('input');
                pregunta_inp.type="text";
                pregunta_inp.name="n_preg_inp"+ultimo_caracter;
                pregunta_inp.id="id_preg_inp"+ultimo_caracter;

                var label_opc_m = document.createElement("Label");
                label_opc_m.for = "n_preg_opc_m" + ultimo_caracter;
                label_opc_m.innerHTML="Ingrese las opciones y marque las respuestas correctas:";

                var text_opc_m1 = document.createTextNode("opcion 1 : ");
                var text_opc_m2 = document.createTextNode("opcion 2 : ");
                var text_opc_m3 = document.createTextNode("opcion 3 : ");
                var text_opc_m4 = document.createTextNode("opcion 4 : ");
                
                var opc_inp_m1 = document.createElement('input');
                opc_inp_m1.type="text";
                opc_inp_m1.name="1_opc_inp_m"+ultimo_caracter;
                opc_inp_m1.id="1_opc_inp_m"+ultimo_caracter;

                var respuesta_opc_m1 = document.createElement('input');
                respuesta_opc_m1.type="checkbox";
                respuesta_opc_m1.value="1";
                respuesta_opc_m1.name="n_res_opc_m"+ultimo_caracter+"[]";

                var opc_inp_m2 = document.createElement('input');
                opc_inp_m2.type="text";
                opc_inp_m2.name="2_opc_inp_m"+ultimo_caracter;
                opc_inp_m2.id="2_opc_inp_m"+ultimo_caracter;

                var respuesta_opc_m2 = document.createElement('input');
                respuesta_opc_m2.type="checkbox";
                respuesta_opc_m2.value="2";
                respuesta_opc_m2.name="n_res_opc_m"+ultimo_caracter+"[]";

                var opc_inp_m3 = document.createElement('input');
                opc_inp_m3.type="text";
                opc_inp_m3.value="Todas son correctas";
                opc_inp_m3.name="3_opc_inp_m"+ultimo_caracter;
                opc_inp_m3.id="3_opc_inp_m"+ultimo_caracter;
                opc_inp_m3.readOnly=true;

                var respuesta_opc_m3 = document.createElement('input');
                respuesta_opc_m3.type="checkbox";
                respuesta_opc_m3.value="3";
                respuesta_opc_m3.name="n_res_opc_m"+ultimo_caracter+"[]";

                var opc_inp_m4 = document.createElement('input');
                opc_inp_m4.type="text";
                opc_inp_m4.value="Ninguna es correcta";
                opc_inp_m4.name="4_opc_inp_m"+ultimo_caracter;
                opc_inp_m4.id="4_opc_inp_m"+ultimo_caracter;
                opc_inp_m4.readOnly=true;

                var respuesta_opc_m4 = document.createElement('input');
                respuesta_opc_m4.type="checkbox";
                respuesta_opc_m4.value="4";
                respuesta_opc_m4.name="n_res_opc_m"+ultimo_caracter+"[]";

                var br = document.createElement("br");
                var br2 = document.createElement("br");
                var br3 = document.createElement("br");
                var br4 = document.createElement("br");

                var a_add_opc_mu = document.createElement('a');
                var linkTextOpcM = document.createTextNode("Agregar opción");
                a_add_opc_mu.className = 'float-left';
                a_add_opc_mu.appendChild(linkTextOpcM);
                a_add_opc_mu.title = "Agregar opción";
                a_add_opc_mu.href = "#";
                
                var cont_opcm=5;
                $(a_add_opc_mu).click(function(){
                var brn = document.createElement("br");
                var text_opcn = document.createTextNode("opcion "+cont_opcm+" : ");
                var opc_inpn = document.createElement('input');
                opc_inpn.type="text";
                opc_inpn.name=cont_opcm+"_opc_inp_m"+ultimo_caracter;
                opc_inpn.id=cont_opcm+"_opc_inp_m"+ultimo_caracter;

                var respuesta_opc_sn = document.createElement('input');
                respuesta_opc_sn.type="checkbox";
                respuesta_opc_sn.value=cont_opcm;
                respuesta_opc_sn.name="n_res_opc_m"+ultimo_caracter+"[]";

                var id_opcm="#opc_contm"+ultimo_caracter;
                var val_nuevo_opcm=parseInt($(id_opcm).val()) +1;
                $(id_opcm).val(val_nuevo_opcm);

                cont_opcm++;
                div_pre_int.appendChild(brn);
                div_pre_int.appendChild(text_opcn);
                div_pre_int.appendChild(opc_inpn);
                div_pre_int.appendChild(respuesta_opc_sn);
                });

                var opc_contm = document.createElement('input');
                opc_contm.type="hidden";
                opc_contm.value="4";
                opc_contm.name="opc_contm"+ultimo_caracter;
                opc_contm.id="opc_contm"+ultimo_caracter;
                opc_contm.readOnly=true;

                div_pre_int.appendChild(label_inp);
                div_pre_int.appendChild(pregunta_inp);
                div_pre_int.appendChild(opc_contm);
                div_pre_int.appendChild(label_opc_m);
                div_pre_int.appendChild(text_opc_m1);
                div_pre_int.appendChild(opc_inp_m1);
                div_pre_int.appendChild(respuesta_opc_m1);
                div_pre_int.appendChild(br);
                div_pre_int.appendChild(text_opc_m2);
                div_pre_int.appendChild(opc_inp_m2);
                div_pre_int.appendChild(respuesta_opc_m2);
                div_pre_int.appendChild(br2);

                div_pre_int.appendChild(text_opc_m3);
                div_pre_int.appendChild(opc_inp_m3);
                div_pre_int.appendChild(respuesta_opc_m3);
                div_pre_int.appendChild(br3);

                div_pre_int.appendChild(text_opc_m4);
                div_pre_int.appendChild(opc_inp_m4);
                div_pre_int.appendChild(respuesta_opc_m4);
                div_pre_int.appendChild(br4);

                div_pre_int.appendChild(a_add_opc_mu);
    			
    		
    		}

		});
    	cont_pre++;
        
    });

    $('#seleccione_pre').change( function(e) {
    	
        
    });
						
   
	
});