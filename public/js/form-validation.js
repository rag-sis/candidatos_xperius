// document ready function
$(document).ready(function() { 	

	//------------- Select plugin -------------//
	$("#select1").select2();

	/*Wizard with validation*/
    $('#wizard-validation').smartWizard({
  		transitionEffect: 'fade', // Effect on navigation, none/fade/slide/
  		onLeaveStep:leaveAStepCallbackValidation,
        onFinish:onFinishCallbackValidaton
    });

    function leaveAStepCallbackValidation(obj){
        var step = obj;
        var stepN = step.attr('rel')
        
       /* if(stepN == 1) { return true;}     */  
        //validate step 1
        if(stepN == 1) {

        	if ($("#username1").valid() == true ) {
		        var validate = true;
		    } else {
		    	var validate = false;
		    }
		    if ($("#password1").valid() == true ) {
		        var validate1 = true;
		    } 
		    else {
		    	var validate1 = false;
		    }
		    if ($("#passwordConfirm1").valid() == true ) {
		        var validate2 = true;
		    } 
		    else {
		    	var validate2 = false;
		    }

	        if(validate == true && validate1 == true && validate2 == true) {
	        	step.find('.stepNumber').stop(true, true).remove();
        		step.find('.stepDesc').stop(true, true).before('<span class="stepNumber"><span class="icon16 iconic-icon-checkmark"></span></span>');
	        	return true;
	        } else {
	        	return false;
	        }
        }
        //validate step 2
        if(stepN == 2) {

        	if ($("#fname").valid() == true ) {
		        var validate3 = true;
		    } else {
		    	var validate3 = false;
		    }
		    if ($("#lname").valid() == true ) {
		        var validate4 = true;
		    } else {
		    	var validate4 = false;
		    }
		    if ($("#gender").valid() == true ) {
		        var validate5 = true;
		    } 
		    else {
		    	var validate5 = false;
		    }

	        if(validate3 == true && validate4 == true && validate5 == true) {
	        	step.find('.stepNumber').stop(true, true).remove();
        		step.find('.stepDesc').stop(true, true).before('<span class="stepNumber"><span class="icon16 iconic-icon-checkmark"></span></span>');
	        	return true;
	        } else {
	        	return false;
	        }
        }

        //validate step 2
        if(stepN == 3) {

        	if ($("#email1").valid() == true ) {
		        var validate6 = true;
		    } else {
		    	var validate6 = false;
		    }
		   
	        if(validate6 == true ) {
	        	step.find('.stepNumber').stop(true, true).remove();
        		step.find('.stepDesc').stop(true, true).before('<span class="stepNumber"><span class="icon16 iconic-icon-checkmark"></span></span>');
	        	return true;
	        } else {
	        	return false;
	        }
        }
       
    }
    function onFinishCallbackValidaton(obj){
    	var step = obj;
    	step.find('.stepNumber').stop(true, true).remove();
        step.find('.stepDesc').stop(true, true).before('<span class="stepNumber"><span class="icon16 iconic-icon-checkmark"></span></span>');
      	$.pnotify({
			type: 'success',
		    title: 'Done',
    		text: 'You finish the wizzard',
		    icon: 'picon icon16 iconic-icon-check-alt white',
		    opacity: 0.95,
		    history: false,
		    sticker: false
		});
		$('#wizzard-form').submit();
    }
    


	//--------------- Form validation ------------------//
	//$('#select1').select2({placeholder: "Select"});
$("#form_user").validate({
    	ignore: null,
    	ignore: 'input[type="hidden"]',

    	rules: {
    		select1: "required",
			required: "required",
			requiredArea: "required",
			required1: {
				required: true,
				minlength: 4
			},
			vac:{
				required:true,

			},
			nom_u:{
				required:true,
			},
			usuario:{
				required:true,
			},
			password:{
				required:true,
				minlength: 6
			},
			rpassword:{
				required:true,
				minlength: 6,
				equalTo: "#password"
			},
			tipo:{
				required:true,
			},
			email_u:{
				required:true,
				email: true
			},
			



			},
		messages: {
			required: "Please enter a something",
			peso_preg_1:{
				required:"campo requerido",
			},
			suma_puntajes:{
				max:"La Suma de puntajes tiene que ser 100",
				min:"La Suma de puntajes tiene que ser 100"
			},
			num_preguntas_e:{
				min:"Agregue preguntas al exámen.",
				max:"Cantidad máxima de preguntas debe ser 50"
			},
			required1: {
				required: "This field is required",
				minlength: "This field must consist of at least 4 characters"
			},
			password: {
				required: "Ingrese un password",
				minlength: "El password debe tener al menos 6 caracteres"
			},
			rpassword: {
				required: "Ingrese un password",
				minlength: "El password debe tener al menos 6 caracteres",
				equalTo: "Please enter the same password as above"
			},
			email_u: "Ingrese un email valido",
			agree: "Please accept our policy"
		}
    });

    $("#form-examen").validate({
    	ignore: null,
    	ignore: 'input[type="hidden"]',

    	rules: {
    		select1: "required",
			required: "required",
			requiredArea: "required",
			required1: {
				required: true,
				minlength: 4
			},
			tiempo_minutos_e:{
				required:true,
				max:240,

			},
			num_preguntas_e:{
				required:true,
				min:1,
				max:50,
			},
			peso_preg_1:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_2:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_3:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_4:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_5:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_6:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_7:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_8:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_9:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_10:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_11:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_12:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_13:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_14:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_15:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_16:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_17:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_18:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_19:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_20:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_21:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_22:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_23:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_24:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_25:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_26:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_27:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_28:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_29:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_30:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_31:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_32:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_33:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_34:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_35:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_36:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_37:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_38:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_39:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_40:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_41:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_42:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_43:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_44:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_45:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_46:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_47:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_48:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_49:{
				required:true,
				max:100,
				min:1,
			},
			peso_preg_50:{
				required:true,
				max:100,
				min:1,
			},
			n_preg1:{
				required:true,
			},
			n_preg2:{
				required:true,
			},
			n_preg3:{
				required:true,
			},
			n_preg4:{
				required:true,
			},
			n_preg5:{
				required:true,
			},
			n_preg6:{
				required:true,
			},
			n_preg7:{
				required:true,
			},
			n_preg8:{
				required:true,
			},
			n_preg9:{
				required:true,
			},
			n_preg10:{
				required:true,
			},
			n_preg11:{
				required:true,
			},
			n_preg12:{
				required:true,
			},
			n_preg13:{
				required:true,
			},
			n_preg14:{
				required:true,
			},
			n_preg15:{
				required:true,
			},
			n_preg16:{
				required:true,
			},
			n_preg17:{
				required:true,
			},
			n_preg18:{
				required:true,
			},
			n_preg19:{
				required:true,
			},
			n_preg20:{
				required:true,
			},
			n_preg21:{
				required:true,
			},
			n_preg22:{
				required:true,
			},
			n_preg23:{
				required:true,
			},
			n_preg24:{
				required:true,
			},
			n_preg25:{
				required:true,
			},
			n_preg26:{
				required:true,
			},
			n_preg27:{
				required:true,
			},
			n_preg28:{
				required:true,
			},
			n_preg29:{
				required:true,
			},
			n_preg30:{
				required:true,
			},
			n_preg31:{
				required:true,
			},
			n_preg32:{
				required:true,
			},
			n_preg33:{
				required:true,
			},
			n_preg34:{
				required:true,
			},
			n_preg35:{
				required:true,
			},
			n_preg36:{
				required:true,
			},
			n_preg37:{
				required:true,
			},
			n_preg38:{
				required:true,
			},
			n_preg39:{
				required:true,
			},
			n_preg40:{
				required:true,
			},
			n_preg41:{
				required:true,
			},
			n_preg42:{
				required:true,
			},
			n_preg43:{
				required:true,
			},
			n_preg44:{
				required:true,
			},
			n_preg45:{
				required:true,
			},
			n_preg46:{
				required:true,
			},
			n_preg47:{
				required:true,
			},
			n_preg48:{
				required:true,
			},
			n_preg49:{
				required:true,
			},
			n_preg50:{
				required:true,
			},
			//Validacion para ingreso de Preguntas
			n_preg_inp1:{
				required:true,
			},
			n_preg_inp2:{
				required:true,
			},
			n_preg_inp3:{
				required:true,
			},
			n_preg_inp4:{
				required:true,
			},
			n_preg_inp5:{
				required:true,
			},
			n_preg_inp6:{
				required:true,
			},
			n_preg_inp7:{
				required:true,
			},
			n_preg_inp8:{
				required:true,
			},
			n_preg_inp9:{
				required:true,
			},
			n_preg_inp10:{
				required:true,
			},
			n_preg_inp11:{
				required:true,
			},
			n_preg_inp12:{
				required:true,
			},
			n_preg_inp13:{
				required:true,
			},
			n_preg_inp14:{
				required:true,
			},
			n_preg_inp15:{
				required:true,
			},
			n_preg_inp16:{
				required:true,
			},
			n_preg_inp17:{
				required:true,
			},
			n_preg_inp18:{
				required:true,
			},
			n_preg_inp19:{
				required:true,
			},
			n_preg_inp20:{
				required:true,
			},
			n_preg_inp21:{
				required:true,
			},
			n_preg_inp22:{
				required:true,
			},
			n_preg_inp23:{
				required:true,
			},
			n_preg_inp24:{
				required:true,
			},
			n_preg_inp25:{
				required:true,
			},
			n_preg_inp26:{
				required:true,
			},
			n_preg_inp27:{
				required:true,
			},
			n_preg_inp28:{
				required:true,
			},
			n_preg_inp29:{
				required:true,
			},
			n_preg_inp30:{
				required:true,
			},
			n_preg_inp31:{
				required:true,
			},
			n_preg_inp32:{
				required:true,
			},
			n_preg_inp33:{
				required:true,
			},
			n_preg_inp34:{
				required:true,
			},
			n_preg_inp35:{
				required:true,
			},
			n_preg_inp36:{
				required:true,
			},
			n_preg_inp37:{
				required:true,
			},
			n_preg_inp38:{
				required:true,
			},
			n_preg_inp39:{
				required:true,
			},
			n_preg_inp40:{
				required:true,
			},
			n_preg_inp41:{
				required:true,
			},
			n_preg_inp42:{
				required:true,
			},
			n_preg_inp43:{
				required:true,
			},
			n_preg_inp44:{
				required:true,
			},
			n_preg_inp45:{
				required:true,
			},
			n_preg_inp46:{
				required:true,
			},
			n_preg_inp47:{
				required:true,
			},
			n_preg_inp48:{
				required:true,
			},
			n_preg_inp49:{
				required:true,
			},
			n_preg_inp50:{
				required:true,
			},
			//FALSO VERDADERO
			n_res_inp1:{
				required:true,
			},
			n_res_inp2:{
				required:true,
			},
			n_res_inp3:{
				required:true,
			},
			n_res_inp4:{
				required:true,
			},
			n_res_inp5:{
				required:true,
			},
			n_res_inp6:{
				required:true,
			},
			n_res_inp7:{
				required:true,
			},
			n_res_inp8:{
				required:true,
			},
			n_res_inp9:{
				required:true,
			},
			n_res_inp10:{
				required:true,
			},
			n_res_inp11:{
				required:true,
			},
			n_res_inp12:{
				required:true,
			},
			n_res_inp13:{
				required:true,
			},
			n_res_inp14:{
				required:true,
			},
			n_res_inp15:{
				required:true,
			},
			n_res_inp16:{
				required:true,
			},
			n_res_inp17:{
				required:true,
			},
			n_res_inp18:{
				required:true,
			},
			n_res_inp19:{
				required:true,
			},
			n_res_inp20:{
				required:true,
			},
			n_res_inp21:{
				required:true,
			},
			n_res_inp22:{
				required:true,
			},
			n_res_inp23:{
				required:true,
			},
			n_res_inp24:{
				required:true,
			},
			n_res_inp25:{
				required:true,
			},
			n_res_inp26:{
				required:true,
			},
			n_res_inp27:{
				required:true,
			},
			n_res_inp28:{
				required:true,
			},
			n_res_inp29:{
				required:true,
			},
			n_res_inp30:{
				required:true,
			},
			n_res_inp31:{
				required:true,
			},
			n_res_inp32:{
				required:true,
			},
			n_res_inp33:{
				required:true,
			},
			n_res_inp34:{
				required:true,
			},
			n_res_inp35:{
				required:true,
			},
			n_res_inp36:{
				required:true,
			},
			n_res_inp37:{
				required:true,
			},
			n_res_inp38:{
				required:true,
			},
			n_res_inp39:{
				required:true,
			},
			n_res_inp40:{
				required:true,
			},
			n_res_inp41:{
				required:true,
			},
			n_res_inp42:{
				required:true,
			},
			n_res_inp43:{
				required:true,
			},
			n_res_inp44:{
				required:true,
			},
			n_res_inp45:{
				required:true,
			},
			n_res_inp46:{
				required:true,
			},
			n_res_inp47:{
				required:true,
			},
			n_res_inp48:{
				required:true,
			},
			n_res_inp49:{
				required:true,
			},
			n_res_inp50:{
				required:true,
			},

			//OPCIONES DE LA OPC 3 inputs para las respuestas 

			'1_opc_inp1':{
				required:true,
			},

			'2_opc_inp1':{
				required:true,
			},
			'3_opc_inp1':{
				required:true,
			},
			'4_opc_inp1':{
				required:true,
			},
			'5_opc_inp1':{
				required:true,
			},
			'6_opc_inp1':{
				required:true,
			},
			'7_opc_inp1':{
				required:true,
			},
			'8_opc_inp1':{
				required:true,
			},
			'9_opc_inp1':{
				required:true,
			},
			'10_opc_inp1':{
				required:true,
			},

			/////
			'1_opc_inp2':{
				required:true,
			},
			'2_opc_inp2':{
				required:true,
			},
			'3_opc_inp2':{
				required:true,
			},
			'4_opc_inp2':{
				required:true,
			},
			'5_opc_inp2':{
				required:true,
			},
			'6_opc_inp2':{
				required:true,
			},
			'7_opc_inp2':{
				required:true,
			},
			'8_opc_inp2':{
				required:true,
			},
			'9_opc_inp2':{
				required:true,
			},
			'10_opc_inp2':{
				required:true,
			},

			/////
			'1_opc_inp3':{
				required:true,
			},
			'2_opc_inp3':{
				required:true,
			},
			'3_opc_inp3':{
				required:true,
			},
			'4_opc_inp3':{
				required:true,
			},
			'5_opc_inp3':{
				required:true,
			},
			'6_opc_inp3':{
				required:true,
			},
			'7_opc_inp3':{
				required:true,
			},
			'8_opc_inp3':{
				required:true,
			},
			'9_opc_inp3':{
				required:true,
			},
			'10_opc_inp3':{
				required:true,
			},

			/////4
			'1_opc_inp4':{
				required:true,
			},
			'2_opc_inp4':{
				required:true,
			},
			'3_opc_inp4':{
				required:true,
			},
			'4_opc_inp4':{
				required:true,
			},
			'5_opc_inp4':{
				required:true,
			},
			'6_opc_inp4':{
				required:true,
			},
			'7_opc_inp4':{
				required:true,
			},
			'8_opc_inp4':{
				required:true,
			},
			'9_opc_inp4':{
				required:true,
			},
			'10_opc_inp4':{
				required:true,
			},

			/////
			'1_opc_inp5':{
				required:true,
			},
			'2_opc_inp5':{
				required:true,
			},
			'3_opc_inp5':{
				required:true,
			},
			'4_opc_inp5':{
				required:true,
			},
			'5_opc_inp5':{
				required:true,
			},
			'6_opc_inp5':{
				required:true,
			},
			'7_opc_inp5':{
				required:true,
			},
			'8_opc_inp5':{
				required:true,
			},
			'9_opc_inp5':{
				required:true,
			},
			'10_opc_inp5':{
				required:true,
			},

			/////
			'1_opc_inp6':{
				required:true,
			},
			'2_opc_inp6':{
				required:true,
			},
			'3_opc_inp6':{
				required:true,
			},
			'4_opc_inp6':{
				required:true,
			},
			'5_opc_inp6':{
				required:true,
			},
			'6_opc_inp6':{
				required:true,
			},
			'7_opc_inp6':{
				required:true,
			},
			'8_opc_inp6':{
				required:true,
			},
			'9_opc_inp6':{
				required:true,
			},
			'10_opc_inp6':{
				required:true,
			},

			/////
			'1_opc_inp7':{
				required:true,
			},
			'2_opc_inp7':{
				required:true,
			},
			'3_opc_inp7':{
				required:true,
			},
			'4_opc_inp7':{
				required:true,
			},
			'5_opc_inp7':{
				required:true,
			},
			'6_opc_inp7':{
				required:true,
			},
			'7_opc_inp7':{
				required:true,
			},
			'8_opc_inp7':{
				required:true,
			},
			'9_opc_inp7':{
				required:true,
			},
			'10_opc_inp7':{
				required:true,
			},

			/////
			'1_opc_inp8':{
				required:true,
			},
			'2_opc_inp8':{
				required:true,
			},
			'3_opc_inp8':{
				required:true,
			},
			'4_opc_inp8':{
				required:true,
			},
			'5_opc_inp8':{
				required:true,
			},
			'6_opc_inp8':{
				required:true,
			},
			'7_opc_inp8':{
				required:true,
			},
			'8_opc_inp8':{
				required:true,
			},
			'9_opc_inp8':{
				required:true,
			},
			'10_opc_inp8':{
				required:true,
			},

			/////
			'1_opc_inp9':{
				required:true,
			},
			'2_opc_inp9':{
				required:true,
			},
			'3_opc_inp9':{
				required:true,
			},
			'4_opc_inp9':{
				required:true,
			},
			'5_opc_inp9':{
				required:true,
			},
			'6_opc_inp9':{
				required:true,
			},
			'7_opc_inp9':{
				required:true,
			},
			'8_opc_inp9':{
				required:true,
			},
			'9_opc_inp9':{
				required:true,
			},
			'10_opc_inp9':{
				required:true,
			},

			/////
			'1_opc_inp10':{
				required:true,
			},
			'2_opc_inp10':{
				required:true,
			},
			'3_opc_inp10':{
				required:true,
			},
			'4_opc_inp10':{
				required:true,
			},
			'5_opc_inp10':{
				required:true,
			},
			'6_opc_inp10':{
				required:true,
			},
			'7_opc_inp10':{
				required:true,
			},
			'8_opc_inp10':{
				required:true,
			},
			'9_opc_inp10':{
				required:true,
			},
			'10_opc_inp10':{
				required:true,
			},

			/////
			'1_opc_inp11':{
				required:true,
			},
			'2_opc_inp11':{
				required:true,
			},
			'3_opc_inp11':{
				required:true,
			},
			'4_opc_inp11':{
				required:true,
			},
			'5_opc_inp11':{
				required:true,
			},
			'6_opc_inp11':{
				required:true,
			},
			'7_opc_inp11':{
				required:true,
			},
			'8_opc_inp11':{
				required:true,
			},
			'9_opc_inp11':{
				required:true,
			},
			'10_opc_inp11':{
				required:true,
			},

			/////
			'1_opc_inp12':{
				required:true,
			},
			'2_opc_inp12':{
				required:true,
			},
			'3_opc_inp12':{
				required:true,
			},
			'4_opc_inp12':{
				required:true,
			},
			'5_opc_inp12':{
				required:true,
			},
			'6_opc_inp12':{
				required:true,
			},
			'7_opc_inp12':{
				required:true,
			},
			'8_opc_inp12':{
				required:true,
			},
			'9_opc_inp12':{
				required:true,
			},
			'10_opc_inp12':{
				required:true,
			},

			/////
			'1_opc_inp13':{
				required:true,
			},
			'2_opc_inp13':{
				required:true,
			},
			'3_opc_inp13':{
				required:true,
			},
			'4_opc_inp13':{
				required:true,
			},
			'5_opc_inp13':{
				required:true,
			},
			'6_opc_inp13':{
				required:true,
			},
			'7_opc_inp13':{
				required:true,
			},
			'8_opc_inp13':{
				required:true,
			},
			'9_opc_inp13':{
				required:true,
			},
			'10_opc_inp13':{
				required:true,
			},

			/////
			'1_opc_inp14':{
				required:true,
			},
			'2_opc_inp14':{
				required:true,
			},
			'3_opc_inp14':{
				required:true,
			},
			'4_opc_inp14':{
				required:true,
			},
			'5_opc_inp14':{
				required:true,
			},
			'6_opc_inp14':{
				required:true,
			},
			'7_opc_inp14':{
				required:true,
			},
			'8_opc_inp14':{
				required:true,
			},
			'9_opc_inp14':{
				required:true,
			},
			'10_opc_inp14':{
				required:true,
			},

			/////
			'1_opc_inp15':{
				required:true,
			},
			'2_opc_inp15':{
				required:true,
			},
			'3_opc_inp15':{
				required:true,
			},
			'4_opc_inp15':{
				required:true,
			},
			'5_opc_inp15':{
				required:true,
			},
			'6_opc_inp15':{
				required:true,
			},
			'7_opc_inp15':{
				required:true,
			},
			'8_opc_inp15':{
				required:true,
			},
			'9_opc_inp15':{
				required:true,
			},
			'10_opc_inp15':{
				required:true,
			},

			/////
			'1_opc_inp16':{
				required:true,
			},
			'2_opc_inp16':{
				required:true,
			},
			'3_opc_inp16':{
				required:true,
			},
			'4_opc_inp16':{
				required:true,
			},
			'5_opc_inp16':{
				required:true,
			},
			'6_opc_inp16':{
				required:true,
			},
			'7_opc_inp16':{
				required:true,
			},
			'8_opc_inp16':{
				required:true,
			},
			'9_opc_inp16':{
				required:true,
			},
			'10_opc_inp16':{
				required:true,
			},

			/////
			'1_opc_inp17':{
				required:true,
			},
			'2_opc_inp17':{
				required:true,
			},
			'3_opc_inp17':{
				required:true,
			},
			'4_opc_inp17':{
				required:true,
			},
			'5_opc_inp17':{
				required:true,
			},
			'6_opc_inp17':{
				required:true,
			},
			'7_opc_inp17':{
				required:true,
			},
			'8_opc_inp17':{
				required:true,
			},
			'9_opc_inp17':{
				required:true,
			},
			'10_opc_inp17':{
				required:true,
			},

			/////
			'1_opc_inp18':{
				required:true,
			},
			'2_opc_inp18':{
				required:true,
			},
			'3_opc_inp18':{
				required:true,
			},
			'4_opc_inp18':{
				required:true,
			},
			'5_opc_inp18':{
				required:true,
			},
			'6_opc_inp18':{
				required:true,
			},
			'7_opc_inp18':{
				required:true,
			},
			'8_opc_inp18':{
				required:true,
			},
			'9_opc_inp18':{
				required:true,
			},
			'10_opc_inp18':{
				required:true,
			},

			/////
			'1_opc_inp19':{
				required:true,
			},
			'2_opc_inp19':{
				required:true,
			},
			'3_opc_inp19':{
				required:true,
			},
			'4_opc_inp19':{
				required:true,
			},
			'5_opc_inp19':{
				required:true,
			},
			'6_opc_inp19':{
				required:true,
			},
			'7_opc_inp19':{
				required:true,
			},
			'8_opc_inp19':{
				required:true,
			},
			'9_opc_inp19':{
				required:true,
			},
			'10_opc_inp19':{
				required:true,
			},

			/////
			'1_opc_inp20':{
				required:true,
			},
			'2_opc_inp20':{
				required:true,
			},
			'3_opc_inp20':{
				required:true,
			},
			'4_opc_inp20':{
				required:true,
			},
			'5_opc_inp20':{
				required:true,
			},
			'6_opc_inp20':{
				required:true,
			},
			'7_opc_inp20':{
				required:true,
			},
			'8_opc_inp20':{
				required:true,
			},
			'9_opc_inp20':{
				required:true,
			},
			'10_opc_inp20':{
				required:true,
			},

			/////
			'1_opc_inp21':{
				required:true,
			},
			'2_opc_inp21':{
				required:true,
			},
			'3_opc_inp21':{
				required:true,
			},
			'4_opc_inp21':{
				required:true,
			},
			'5_opc_inp21':{
				required:true,
			},
			'6_opc_inp21':{
				required:true,
			},
			'7_opc_inp21':{
				required:true,
			},
			'8_opc_inp21':{
				required:true,
			},
			'9_opc_inp21':{
				required:true,
			},
			'10_opc_inp21':{
				required:true,
			},

			/////
			'1_opc_inp22':{
				required:true,
			},
			'2_opc_inp22':{
				required:true,
			},
			'3_opc_inp22':{
				required:true,
			},
			'4_opc_inp22':{
				required:true,
			},
			'5_opc_inp22':{
				required:true,
			},
			'6_opc_inp22':{
				required:true,
			},
			'7_opc_inp22':{
				required:true,
			},
			'8_opc_inp22':{
				required:true,
			},
			'9_opc_inp22':{
				required:true,
			},
			'10_opc_inp22':{
				required:true,
			},

			/////
			'1_opc_inp23':{
				required:true,
			},
			'2_opc_inp23':{
				required:true,
			},
			'3_opc_inp23':{
				required:true,
			},
			'4_opc_inp23':{
				required:true,
			},
			'5_opc_inp23':{
				required:true,
			},
			'6_opc_inp23':{
				required:true,
			},
			'7_opc_inp23':{
				required:true,
			},
			'8_opc_inp23':{
				required:true,
			},
			'9_opc_inp23':{
				required:true,
			},
			'10_opc_inp23':{
				required:true,
			},

			/////
			'1_opc_inp24':{
				required:true,
			},
			'2_opc_inp24':{
				required:true,
			},
			'3_opc_inp24':{
				required:true,
			},
			'4_opc_inp24':{
				required:true,
			},
			'5_opc_inp24':{
				required:true,
			},
			'6_opc_inp24':{
				required:true,
			},
			'7_opc_inp24':{
				required:true,
			},
			'8_opc_inp24':{
				required:true,
			},
			'9_opc_inp24':{
				required:true,
			},
			'10_opc_inp24':{
				required:true,
			},

			/////
			'1_opc_inp25':{
				required:true,
			},
			'2_opc_inp25':{
				required:true,
			},
			'3_opc_inp25':{
				required:true,
			},
			'4_opc_inp25':{
				required:true,
			},
			'5_opc_inp25':{
				required:true,
			},
			'6_opc_inp25':{
				required:true,
			},
			'7_opc_inp25':{
				required:true,
			},
			'8_opc_inp25':{
				required:true,
			},
			'9_opc_inp25':{
				required:true,
			},
			'10_opc_inp25':{
				required:true,
			},

			/////
			'1_opc_inp26':{
				required:true,
			},
			'2_opc_inp26':{
				required:true,
			},
			'3_opc_inp26':{
				required:true,
			},
			'4_opc_inp26':{
				required:true,
			},
			'5_opc_inp26':{
				required:true,
			},
			'6_opc_inp26':{
				required:true,
			},
			'7_opc_inp26':{
				required:true,
			},
			'8_opc_inp26':{
				required:true,
			},
			'9_opc_inp26':{
				required:true,
			},
			'10_opc_inp26':{
				required:true,
			},

			/////
			'1_opc_inp27':{
				required:true,
			},
			'2_opc_inp27':{
				required:true,
			},
			'3_opc_inp27':{
				required:true,
			},
			'4_opc_inp27':{
				required:true,
			},
			'5_opc_inp27':{
				required:true,
			},
			'6_opc_inp27':{
				required:true,
			},
			'7_opc_inp27':{
				required:true,
			},
			'8_opc_inp27':{
				required:true,
			},
			'9_opc_inp27':{
				required:true,
			},
			'10_opc_inp27':{
				required:true,
			},

			/////
			'1_opc_inp28':{
				required:true,
			},
			'2_opc_inp28':{
				required:true,
			},
			'3_opc_inp28':{
				required:true,
			},
			'4_opc_inp28':{
				required:true,
			},
			'5_opc_inp28':{
				required:true,
			},
			'6_opc_inp28':{
				required:true,
			},
			'7_opc_inp28':{
				required:true,
			},
			'8_opc_inp28':{
				required:true,
			},
			'9_opc_inp28':{
				required:true,
			},
			'10_opc_inp28':{
				required:true,
			},

			/////
			'1_opc_inp29':{
				required:true,
			},
			'2_opc_inp29':{
				required:true,
			},
			'3_opc_inp29':{
				required:true,
			},
			'4_opc_inp29':{
				required:true,
			},
			'5_opc_inp29':{
				required:true,
			},
			'6_opc_inp29':{
				required:true,
			},
			'7_opc_inp29':{
				required:true,
			},
			'8_opc_inp29':{
				required:true,
			},
			'9_opc_inp29':{
				required:true,
			},
			'10_opc_inp29':{
				required:true,
			},

			/////
			'1_opc_inp30':{
				required:true,
			},
			'2_opc_inp30':{
				required:true,
			},
			'3_opc_inp30':{
				required:true,
			},
			'4_opc_inp30':{
				required:true,
			},
			'5_opc_inp30':{
				required:true,
			},
			'6_opc_inp30':{
				required:true,
			},
			'7_opc_inp30':{
				required:true,
			},
			'8_opc_inp30':{
				required:true,
			},
			'9_opc_inp30':{
				required:true,
			},
			'10_opc_inp30':{
				required:true,
			},

			/////
			'1_opc_inp31':{
				required:true,
			},
			'2_opc_inp31':{
				required:true,
			},
			'3_opc_inp31':{
				required:true,
			},
			'4_opc_inp31':{
				required:true,
			},
			'5_opc_inp31':{
				required:true,
			},
			'6_opc_inp31':{
				required:true,
			},
			'7_opc_inp31':{
				required:true,
			},
			'8_opc_inp31':{
				required:true,
			},
			'9_opc_inp31':{
				required:true,
			},
			'10_opc_inp31':{
				required:true,
			},

			/////
			'1_opc_inp32':{
				required:true,
			},
			'2_opc_inp32':{
				required:true,
			},
			'3_opc_inp32':{
				required:true,
			},
			'4_opc_inp32':{
				required:true,
			},
			'5_opc_inp32':{
				required:true,
			},
			'6_opc_inp32':{
				required:true,
			},
			'7_opc_inp32':{
				required:true,
			},
			'8_opc_inp32':{
				required:true,
			},
			'9_opc_inp32':{
				required:true,
			},
			'10_opc_inp32':{
				required:true,
			},

			/////
			'1_opc_inp33':{
				required:true,
			},
			'2_opc_inp33':{
				required:true,
			},
			'3_opc_inp33':{
				required:true,
			},
			'4_opc_inp33':{
				required:true,
			},
			'5_opc_inp33':{
				required:true,
			},
			'6_opc_inp33':{
				required:true,
			},
			'7_opc_inp33':{
				required:true,
			},
			'8_opc_inp33':{
				required:true,
			},
			'9_opc_inp33':{
				required:true,
			},
			'10_opc_inp33':{
				required:true,
			},

			/////
			'1_opc_inp34':{
				required:true,
			},
			'2_opc_inp34':{
				required:true,
			},
			'3_opc_inp34':{
				required:true,
			},
			'4_opc_inp34':{
				required:true,
			},
			'5_opc_inp34':{
				required:true,
			},
			'6_opc_inp34':{
				required:true,
			},
			'7_opc_inp34':{
				required:true,
			},
			'8_opc_inp34':{
				required:true,
			},
			'9_opc_inp34':{
				required:true,
			},
			'10_opc_inp34':{
				required:true,
			},

			/////
			'1_opc_inp35':{
				required:true,
			},
			'2_opc_inp35':{
				required:true,
			},
			'3_opc_inp35':{
				required:true,
			},
			'4_opc_inp35':{
				required:true,
			},
			'5_opc_inp35':{
				required:true,
			},
			'6_opc_inp35':{
				required:true,
			},
			'7_opc_inp35':{
				required:true,
			},
			'8_opc_inp35':{
				required:true,
			},
			'9_opc_inp35':{
				required:true,
			},
			'10_opc_inp35':{
				required:true,
			},

			/////
			'1_opc_inp36':{
				required:true,
			},
			'2_opc_inp36':{
				required:true,
			},
			'3_opc_inp36':{
				required:true,
			},
			'4_opc_inp36':{
				required:true,
			},
			'5_opc_inp36':{
				required:true,
			},
			'6_opc_inp36':{
				required:true,
			},
			'7_opc_inp36':{
				required:true,
			},
			'8_opc_inp36':{
				required:true,
			},
			'9_opc_inp36':{
				required:true,
			},
			'10_opc_inp36':{
				required:true,
			},

			/////
			'1_opc_inp37':{
				required:true,
			},
			'2_opc_inp37':{
				required:true,
			},
			'3_opc_inp37':{
				required:true,
			},
			'4_opc_inp37':{
				required:true,
			},
			'5_opc_inp37':{
				required:true,
			},
			'6_opc_inp37':{
				required:true,
			},
			'7_opc_inp37':{
				required:true,
			},
			'8_opc_inp37':{
				required:true,
			},
			'9_opc_inp37':{
				required:true,
			},
			'10_opc_inp37':{
				required:true,
			},

			/////
			'1_opc_inp38':{
				required:true,
			},
			'2_opc_inp38':{
				required:true,
			},
			'3_opc_inp38':{
				required:true,
			},
			'4_opc_inp38':{
				required:true,
			},
			'5_opc_inp38':{
				required:true,
			},
			'6_opc_inp38':{
				required:true,
			},
			'7_opc_inp38':{
				required:true,
			},
			'8_opc_inp38':{
				required:true,
			},
			'9_opc_inp38':{
				required:true,
			},
			'10_opc_inp38':{
				required:true,
			},

			/////
			'1_opc_inp39':{
				required:true,
			},
			'2_opc_inp39':{
				required:true,
			},
			'3_opc_inp39':{
				required:true,
			},
			'4_opc_inp39':{
				required:true,
			},
			'5_opc_inp39':{
				required:true,
			},
			'6_opc_inp39':{
				required:true,
			},
			'7_opc_inp39':{
				required:true,
			},
			'8_opc_inp39':{
				required:true,
			},
			'9_opc_inp39':{
				required:true,
			},
			'10_opc_inp39':{
				required:true,
			},

			/////
			'1_opc_inp40':{
				required:true,
			},
			'2_opc_inp40':{
				required:true,
			},
			'3_opc_inp40':{
				required:true,
			},
			'4_opc_inp40':{
				required:true,
			},
			'5_opc_inp40':{
				required:true,
			},
			'6_opc_inp40':{
				required:true,
			},
			'7_opc_inp40':{
				required:true,
			},
			'8_opc_inp40':{
				required:true,
			},
			'9_opc_inp40':{
				required:true,
			},
			'10_opc_inp40':{
				required:true,
			},

			/////
			'1_opc_inp41':{
				required:true,
			},
			'2_opc_inp41':{
				required:true,
			},
			'3_opc_inp41':{
				required:true,
			},
			'4_opc_inp41':{
				required:true,
			},
			'5_opc_inp41':{
				required:true,
			},
			'6_opc_inp41':{
				required:true,
			},
			'7_opc_inp41':{
				required:true,
			},
			'8_opc_inp41':{
				required:true,
			},
			'9_opc_inp41':{
				required:true,
			},
			'10_opc_inp41':{
				required:true,
			},

			/////
			'1_opc_inp42':{
				required:true,
			},
			'2_opc_inp42':{
				required:true,
			},
			'3_opc_inp42':{
				required:true,
			},
			'4_opc_inp42':{
				required:true,
			},
			'5_opc_inp42':{
				required:true,
			},
			'6_opc_inp42':{
				required:true,
			},
			'7_opc_inp42':{
				required:true,
			},
			'8_opc_inp42':{
				required:true,
			},
			'9_opc_inp42':{
				required:true,
			},
			'10_opc_inp42':{
				required:true,
			},

			/////
			'1_opc_inp43':{
				required:true,
			},
			'2_opc_inp43':{
				required:true,
			},
			'3_opc_inp43':{
				required:true,
			},
			'4_opc_inp43':{
				required:true,
			},
			'5_opc_inp43':{
				required:true,
			},
			'6_opc_inp43':{
				required:true,
			},
			'7_opc_inp43':{
				required:true,
			},
			'8_opc_inp43':{
				required:true,
			},
			'9_opc_inp43':{
				required:true,
			},
			'10_opc_inp43':{
				required:true,
			},

			/////
			'1_opc_inp44':{
				required:true,
			},
			'2_opc_inp44':{
				required:true,
			},
			'3_opc_inp44':{
				required:true,
			},
			'4_opc_inp44':{
				required:true,
			},
			'5_opc_inp44':{
				required:true,
			},
			'6_opc_inp44':{
				required:true,
			},
			'7_opc_inp44':{
				required:true,
			},
			'8_opc_inp44':{
				required:true,
			},
			'9_opc_inp44':{
				required:true,
			},
			'10_opc_inp44':{
				required:true,
			},

			/////
			'1_opc_inp45':{
				required:true,
			},
			'2_opc_inp45':{
				required:true,
			},
			'3_opc_inp45':{
				required:true,
			},
			'4_opc_inp45':{
				required:true,
			},
			'5_opc_inp45':{
				required:true,
			},
			'6_opc_inp45':{
				required:true,
			},
			'7_opc_inp45':{
				required:true,
			},
			'8_opc_inp45':{
				required:true,
			},
			'9_opc_inp45':{
				required:true,
			},
			'10_opc_inp45':{
				required:true,
			},

			/////
			'1_opc_inp46':{
				required:true,
			},
			'2_opc_inp46':{
				required:true,
			},
			'3_opc_inp46':{
				required:true,
			},
			'4_opc_inp46':{
				required:true,
			},
			'5_opc_inp46':{
				required:true,
			},
			'6_opc_inp46':{
				required:true,
			},
			'7_opc_inp46':{
				required:true,
			},
			'8_opc_inp46':{
				required:true,
			},
			'9_opc_inp46':{
				required:true,
			},
			'10_opc_inp46':{
				required:true,
			},

			/////
			'1_opc_inp47':{
				required:true,
			},
			'2_opc_inp47':{
				required:true,
			},
			'3_opc_inp47':{
				required:true,
			},
			'4_opc_inp47':{
				required:true,
			},
			'5_opc_inp47':{
				required:true,
			},
			'6_opc_inp47':{
				required:true,
			},
			'7_opc_inp47':{
				required:true,
			},
			'8_opc_inp47':{
				required:true,
			},
			'9_opc_inp47':{
				required:true,
			},
			'10_opc_inp47':{
				required:true,
			},

			/////
			'1_opc_inp48':{
				required:true,
			},
			'2_opc_inp48':{
				required:true,
			},
			'3_opc_inp48':{
				required:true,
			},
			'4_opc_inp48':{
				required:true,
			},
			'5_opc_inp48':{
				required:true,
			},
			'6_opc_inp48':{
				required:true,
			},
			'7_opc_inp48':{
				required:true,
			},
			'8_opc_inp48':{
				required:true,
			},
			'9_opc_inp48':{
				required:true,
			},
			'10_opc_inp48':{
				required:true,
			},

			/////
			'1_opc_inp49':{
				required:true,
			},
			'2_opc_inp49':{
				required:true,
			},
			'3_opc_inp49':{
				required:true,
			},
			'4_opc_inp49':{
				required:true,
			},
			'5_opc_inp49':{
				required:true,
			},
			'6_opc_inp49':{
				required:true,
			},
			'7_opc_inp49':{
				required:true,
			},
			'8_opc_inp49':{
				required:true,
			},
			'9_opc_inp49':{
				required:true,
			},
			'10_opc_inp49':{
				required:true,
			},

			/////
			'1_opc_inp50':{
				required:true,
			},
			'2_opc_inp50':{
				required:true,
			},
			'3_opc_inp50':{
				required:true,
			},
			'4_opc_inp50':{
				required:true,
			},
			'5_opc_inp50':{
				required:true,
			},
			'6_opc_inp50':{
				required:true,
			},
			'7_opc_inp50':{
				required:true,
			},
			'8_opc_inp50':{
				required:true,
			},
			'9_opc_inp50':{
				required:true,
			},
			'10_opc_inp50':{
				required:true,
			},

			/////

			//FIN OPCION LLENADO RESPUESTAS INPUT OPCION 3
			//radio buton opcion simple
			'n_res_opc1':{
				required:true,
			},
			'n_res_opc2':{
				required:true,
			},
			'n_res_opc3':{
				required:true,
			},
			'n_res_opc4':{
				required:true,
			},
			'n_res_opc5':{
				required:true,
			},
			'n_res_opc6':{
				required:true,
			},
			'n_res_opc7':{
				required:true,
			},
			'n_res_opc8':{
				required:true,
			},
			'n_res_opc9':{
				required:true,
			},
			'n_res_opc10':{
				required:true,
			},
			'n_res_opc11':{
				required:true,
			},
			'n_res_opc12':{
				required:true,
			},
			'n_res_opc13':{
				required:true,
			},
			'n_res_opc14':{
				required:true,
			},
			'n_res_opc15':{
				required:true,
			},
			'n_res_opc16':{
				required:true,
			},
			'n_res_opc17':{
				required:true,
			},
			'n_res_opc18':{
				required:true,
			},
			'n_res_opc19':{
				required:true,
			},
			'n_res_opc20':{
				required:true,
			},
			'n_res_opc21':{
				required:true,
			},
			'n_res_opc22':{
				required:true,
			},
			'n_res_opc23':{
				required:true,
			},
			'n_res_opc24':{
				required:true,
			},
			'n_res_opc25':{
				required:true,
			},
			'n_res_opc26':{
				required:true,
			},
			'n_res_opc27':{
				required:true,
			},
			'n_res_opc28':{
				required:true,
			},
			'n_res_opc29':{
				required:true,
			},
			'n_res_opc30':{
				required:true,
			},
			'n_res_opc31':{
				required:true,
			},
			'n_res_opc32':{
				required:true,
			},
			'n_res_opc33':{
				required:true,
			},
			'n_res_opc34':{
				required:true,
			},
			'n_res_opc35':{
				required:true,
			},
			'n_res_opc36':{
				required:true,
			},
			'n_res_opc37':{
				required:true,
			},
			'n_res_opc38':{
				required:true,
			},
			'n_res_opc39':{
				required:true,
			},
			'n_res_opc40':{
				required:true,
			},
			'n_res_opc41':{
				required:true,
			},
			'n_res_opc42':{
				required:true,
			},
			'n_res_opc43':{
				required:true,
			},
			'n_res_opc44':{
				required:true,
			},
			'n_res_opc45':{
				required:true,
			},
			'n_res_opc46':{
				required:true,
			},
			'n_res_opc47':{
				required:true,
			},
			'n_res_opc48':{
				required:true,
			},
			'n_res_opc49':{
				required:true,
			},
			'n_res_opc50':{
				required:true,
			},

			//FIN radio buton opcion simple

			//Opcion multiple opciones input
			'1_opc_inp_m1':{
				required:true,
			},

			'2_opc_inp_m1':{
				required:true,
			},
			'3_opc_inp_m1':{
				required:true,
			},
			'4_opc_inp_m1':{
				required:true,
			},
			'5_opc_inp_m1':{
				required:true,
			},
			'6_opc_inp_m1':{
				required:true,
			},
			'7_opc_inp_m1':{
				required:true,
			},
			'8_opc_inp_m1':{
				required:true,
			},
			'9_opc_inp_m1':{
				required:true,
			},
			'10_opc_inp_m1':{
				required:true,
			},

			/////
			'1_opc_inp_m2':{
				required:true,
			},
			'2_opc_inp_m2':{
				required:true,
			},
			'3_opc_inp_m2':{
				required:true,
			},
			'4_opc_inp_m2':{
				required:true,
			},
			'5_opc_inp_m2':{
				required:true,
			},
			'6_opc_inp_m2':{
				required:true,
			},
			'7_opc_inp_m2':{
				required:true,
			},
			'8_opc_inp_m2':{
				required:true,
			},
			'9_opc_inp_m2':{
				required:true,
			},
			'10_opc_inp_m2':{
				required:true,
			},

			/////
			'1_opc_inp_m3':{
				required:true,
			},
			'2_opc_inp_m3':{
				required:true,
			},
			'3_opc_inp_m3':{
				required:true,
			},
			'4_opc_inp_m3':{
				required:true,
			},
			'5_opc_inp_m3':{
				required:true,
			},
			'6_opc_inp_m3':{
				required:true,
			},
			'7_opc_inp_m3':{
				required:true,
			},
			'8_opc_inp_m3':{
				required:true,
			},
			'9_opc_inp_m3':{
				required:true,
			},
			'10_opc_inp_m3':{
				required:true,
			},

			/////4
			'1_opc_inp_m4':{
				required:true,
			},
			'2_opc_inp_m4':{
				required:true,
			},
			'3_opc_inp_m4':{
				required:true,
			},
			'4_opc_inp_m4':{
				required:true,
			},
			'5_opc_inp_m4':{
				required:true,
			},
			'6_opc_inp_m4':{
				required:true,
			},
			'7_opc_inp_m4':{
				required:true,
			},
			'8_opc_inp_m4':{
				required:true,
			},
			'9_opc_inp_m4':{
				required:true,
			},
			'10_opc_inp_m4':{
				required:true,
			},

			/////
			'1_opc_inp_m5':{
				required:true,
			},
			'2_opc_inp_m5':{
				required:true,
			},
			'3_opc_inp_m5':{
				required:true,
			},
			'4_opc_inp_m5':{
				required:true,
			},
			'5_opc_inp_m5':{
				required:true,
			},
			'6_opc_inp_m5':{
				required:true,
			},
			'7_opc_inp_m5':{
				required:true,
			},
			'8_opc_inp_m5':{
				required:true,
			},
			'9_opc_inp_m5':{
				required:true,
			},
			'10_opc_inp_m5':{
				required:true,
			},

			/////
			'1_opc_inp_m6':{
				required:true,
			},
			'2_opc_inp_m6':{
				required:true,
			},
			'3_opc_inp_m6':{
				required:true,
			},
			'4_opc_inp_m6':{
				required:true,
			},
			'5_opc_inp_m6':{
				required:true,
			},
			'6_opc_inp_m6':{
				required:true,
			},
			'7_opc_inp_m6':{
				required:true,
			},
			'8_opc_inp_m6':{
				required:true,
			},
			'9_opc_inp_m6':{
				required:true,
			},
			'10_opc_inp_m6':{
				required:true,
			},

			/////
			'1_opc_inp_m7':{
				required:true,
			},
			'2_opc_inp_m7':{
				required:true,
			},
			'3_opc_inp_m7':{
				required:true,
			},
			'4_opc_inp_m7':{
				required:true,
			},
			'5_opc_inp_m7':{
				required:true,
			},
			'6_opc_inp_m7':{
				required:true,
			},
			'7_opc_inp_m7':{
				required:true,
			},
			'8_opc_inp_m7':{
				required:true,
			},
			'9_opc_inp_m7':{
				required:true,
			},
			'10_opc_inp_m7':{
				required:true,
			},

			/////
			'1_opc_inp_m8':{
				required:true,
			},
			'2_opc_inp_m8':{
				required:true,
			},
			'3_opc_inp_m8':{
				required:true,
			},
			'4_opc_inp_m8':{
				required:true,
			},
			'5_opc_inp_m8':{
				required:true,
			},
			'6_opc_inp_m8':{
				required:true,
			},
			'7_opc_inp_m8':{
				required:true,
			},
			'8_opc_inp_m8':{
				required:true,
			},
			'9_opc_inp_m8':{
				required:true,
			},
			'10_opc_inp_m8':{
				required:true,
			},

			/////
			'1_opc_inp_m9':{
				required:true,
			},
			'2_opc_inp_m9':{
				required:true,
			},
			'3_opc_inp_m9':{
				required:true,
			},
			'4_opc_inp_m9':{
				required:true,
			},
			'5_opc_inp_m9':{
				required:true,
			},
			'6_opc_inp_m9':{
				required:true,
			},
			'7_opc_inp_m9':{
				required:true,
			},
			'8_opc_inp_m9':{
				required:true,
			},
			'9_opc_inp_m9':{
				required:true,
			},
			'10_opc_inp_m9':{
				required:true,
			},

			/////
			'1_opc_inp_m10':{
				required:true,
			},
			'2_opc_inp_m10':{
				required:true,
			},
			'3_opc_inp_m10':{
				required:true,
			},
			'4_opc_inp_m10':{
				required:true,
			},
			'5_opc_inp_m10':{
				required:true,
			},
			'6_opc_inp_m10':{
				required:true,
			},
			'7_opc_inp_m10':{
				required:true,
			},
			'8_opc_inp_m10':{
				required:true,
			},
			'9_opc_inp_m10':{
				required:true,
			},
			'10_opc_inp_m10':{
				required:true,
			},

			/////
			'1_opc_inp_m11':{
				required:true,
			},
			'2_opc_inp_m11':{
				required:true,
			},
			'3_opc_inp_m11':{
				required:true,
			},
			'4_opc_inp_m11':{
				required:true,
			},
			'5_opc_inp_m11':{
				required:true,
			},
			'6_opc_inp_m11':{
				required:true,
			},
			'7_opc_inp_m11':{
				required:true,
			},
			'8_opc_inp_m11':{
				required:true,
			},
			'9_opc_inp_m11':{
				required:true,
			},
			'10_opc_inp_m11':{
				required:true,
			},

			/////
			'1_opc_inp_m12':{
				required:true,
			},
			'2_opc_inp_m12':{
				required:true,
			},
			'3_opc_inp_m12':{
				required:true,
			},
			'4_opc_inp_m12':{
				required:true,
			},
			'5_opc_inp_m12':{
				required:true,
			},
			'6_opc_inp_m12':{
				required:true,
			},
			'7_opc_inp_m12':{
				required:true,
			},
			'8_opc_inp_m12':{
				required:true,
			},
			'9_opc_inp_m12':{
				required:true,
			},
			'10_opc_inp_m12':{
				required:true,
			},

			/////
			'1_opc_inp_m13':{
				required:true,
			},
			'2_opc_inp_m13':{
				required:true,
			},
			'3_opc_inp_m13':{
				required:true,
			},
			'4_opc_inp_m13':{
				required:true,
			},
			'5_opc_inp_m13':{
				required:true,
			},
			'6_opc_inp_m13':{
				required:true,
			},
			'7_opc_inp_m13':{
				required:true,
			},
			'8_opc_inp_m13':{
				required:true,
			},
			'9_opc_inp_m13':{
				required:true,
			},
			'10_opc_inp_m13':{
				required:true,
			},

			/////
			'1_opc_inp_m14':{
				required:true,
			},
			'2_opc_inp_m14':{
				required:true,
			},
			'3_opc_inp_m14':{
				required:true,
			},
			'4_opc_inp_m14':{
				required:true,
			},
			'5_opc_inp_m14':{
				required:true,
			},
			'6_opc_inp_m14':{
				required:true,
			},
			'7_opc_inp_m14':{
				required:true,
			},
			'8_opc_inp_m14':{
				required:true,
			},
			'9_opc_inp_m14':{
				required:true,
			},
			'10_opc_inp_m14':{
				required:true,
			},

			/////
			'1_opc_inp_m15':{
				required:true,
			},
			'2_opc_inp_m15':{
				required:true,
			},
			'3_opc_inp_m15':{
				required:true,
			},
			'4_opc_inp_m15':{
				required:true,
			},
			'5_opc_inp_m15':{
				required:true,
			},
			'6_opc_inp_m15':{
				required:true,
			},
			'7_opc_inp_m15':{
				required:true,
			},
			'8_opc_inp_m15':{
				required:true,
			},
			'9_opc_inp_m15':{
				required:true,
			},
			'10_opc_inp_m15':{
				required:true,
			},

			/////
			'1_opc_inp_m16':{
				required:true,
			},
			'2_opc_inp_m16':{
				required:true,
			},
			'3_opc_inp_m16':{
				required:true,
			},
			'4_opc_inp_m16':{
				required:true,
			},
			'5_opc_inp_m16':{
				required:true,
			},
			'6_opc_inp_m16':{
				required:true,
			},
			'7_opc_inp_m16':{
				required:true,
			},
			'8_opc_inp_m16':{
				required:true,
			},
			'9_opc_inp_m16':{
				required:true,
			},
			'10_opc_inp_m16':{
				required:true,
			},

			/////
			'1_opc_inp_m17':{
				required:true,
			},
			'2_opc_inp_m17':{
				required:true,
			},
			'3_opc_inp_m17':{
				required:true,
			},
			'4_opc_inp_m17':{
				required:true,
			},
			'5_opc_inp_m17':{
				required:true,
			},
			'6_opc_inp_m17':{
				required:true,
			},
			'7_opc_inp_m17':{
				required:true,
			},
			'8_opc_inp_m17':{
				required:true,
			},
			'9_opc_inp_m17':{
				required:true,
			},
			'10_opc_inp_m17':{
				required:true,
			},

			/////
			'1_opc_inp_m18':{
				required:true,
			},
			'2_opc_inp_m18':{
				required:true,
			},
			'3_opc_inp_m18':{
				required:true,
			},
			'4_opc_inp_m18':{
				required:true,
			},
			'5_opc_inp_m18':{
				required:true,
			},
			'6_opc_inp_m18':{
				required:true,
			},
			'7_opc_inp_m18':{
				required:true,
			},
			'8_opc_inp_m18':{
				required:true,
			},
			'9_opc_inp_m18':{
				required:true,
			},
			'10_opc_inp_m18':{
				required:true,
			},

			/////
			'1_opc_inp_m19':{
				required:true,
			},
			'2_opc_inp_m19':{
				required:true,
			},
			'3_opc_inp_m19':{
				required:true,
			},
			'4_opc_inp_m19':{
				required:true,
			},
			'5_opc_inp_m19':{
				required:true,
			},
			'6_opc_inp_m19':{
				required:true,
			},
			'7_opc_inp_m19':{
				required:true,
			},
			'8_opc_inp_m19':{
				required:true,
			},
			'9_opc_inp_m19':{
				required:true,
			},
			'10_opc_inp_m19':{
				required:true,
			},

			/////
			'1_opc_inp_m20':{
				required:true,
			},
			'2_opc_inp_m20':{
				required:true,
			},
			'3_opc_inp_m20':{
				required:true,
			},
			'4_opc_inp_m20':{
				required:true,
			},
			'5_opc_inp_m20':{
				required:true,
			},
			'6_opc_inp_m20':{
				required:true,
			},
			'7_opc_inp_m20':{
				required:true,
			},
			'8_opc_inp_m20':{
				required:true,
			},
			'9_opc_inp_m20':{
				required:true,
			},
			'10_opc_inp_m20':{
				required:true,
			},

			/////
			'1_opc_inp_m21':{
				required:true,
			},
			'2_opc_inp_m21':{
				required:true,
			},
			'3_opc_inp_m21':{
				required:true,
			},
			'4_opc_inp_m21':{
				required:true,
			},
			'5_opc_inp_m21':{
				required:true,
			},
			'6_opc_inp_m21':{
				required:true,
			},
			'7_opc_inp_m21':{
				required:true,
			},
			'8_opc_inp_m21':{
				required:true,
			},
			'9_opc_inp_m21':{
				required:true,
			},
			'10_opc_inp_m21':{
				required:true,
			},

			/////
			'1_opc_inp_m22':{
				required:true,
			},
			'2_opc_inp_m22':{
				required:true,
			},
			'3_opc_inp_m22':{
				required:true,
			},
			'4_opc_inp_m22':{
				required:true,
			},
			'5_opc_inp_m22':{
				required:true,
			},
			'6_opc_inp_m22':{
				required:true,
			},
			'7_opc_inp_m22':{
				required:true,
			},
			'8_opc_inp_m22':{
				required:true,
			},
			'9_opc_inp_m22':{
				required:true,
			},
			'10_opc_inp_m22':{
				required:true,
			},

			/////
			'1_opc_inp_m23':{
				required:true,
			},
			'2_opc_inp_m23':{
				required:true,
			},
			'3_opc_inp_m23':{
				required:true,
			},
			'4_opc_inp_m23':{
				required:true,
			},
			'5_opc_inp_m23':{
				required:true,
			},
			'6_opc_inp_m23':{
				required:true,
			},
			'7_opc_inp_m23':{
				required:true,
			},
			'8_opc_inp_m23':{
				required:true,
			},
			'9_opc_inp_m23':{
				required:true,
			},
			'10_opc_inp_m23':{
				required:true,
			},

			/////
			'1_opc_inp_m24':{
				required:true,
			},
			'2_opc_inp_m24':{
				required:true,
			},
			'3_opc_inp_m24':{
				required:true,
			},
			'4_opc_inp_m24':{
				required:true,
			},
			'5_opc_inp_m24':{
				required:true,
			},
			'6_opc_inp_m24':{
				required:true,
			},
			'7_opc_inp_m24':{
				required:true,
			},
			'8_opc_inp_m24':{
				required:true,
			},
			'9_opc_inp_m24':{
				required:true,
			},
			'10_opc_inp_m24':{
				required:true,
			},

			/////
			'1_opc_inp_m25':{
				required:true,
			},
			'2_opc_inp_m25':{
				required:true,
			},
			'3_opc_inp_m25':{
				required:true,
			},
			'4_opc_inp_m25':{
				required:true,
			},
			'5_opc_inp_m25':{
				required:true,
			},
			'6_opc_inp_m25':{
				required:true,
			},
			'7_opc_inp_m25':{
				required:true,
			},
			'8_opc_inp_m25':{
				required:true,
			},
			'9_opc_inp_m25':{
				required:true,
			},
			'10_opc_inp_m25':{
				required:true,
			},

			/////
			'1_opc_inp_m26':{
				required:true,
			},
			'2_opc_inp_m26':{
				required:true,
			},
			'3_opc_inp_m26':{
				required:true,
			},
			'4_opc_inp_m26':{
				required:true,
			},
			'5_opc_inp_m26':{
				required:true,
			},
			'6_opc_inp_m26':{
				required:true,
			},
			'7_opc_inp_m26':{
				required:true,
			},
			'8_opc_inp_m26':{
				required:true,
			},
			'9_opc_inp_m26':{
				required:true,
			},
			'10_opc_inp_m26':{
				required:true,
			},

			/////
			'1_opc_inp_m27':{
				required:true,
			},
			'2_opc_inp_m27':{
				required:true,
			},
			'3_opc_inp_m27':{
				required:true,
			},
			'4_opc_inp_m27':{
				required:true,
			},
			'5_opc_inp_m27':{
				required:true,
			},
			'6_opc_inp_m27':{
				required:true,
			},
			'7_opc_inp_m27':{
				required:true,
			},
			'8_opc_inp_m27':{
				required:true,
			},
			'9_opc_inp_m27':{
				required:true,
			},
			'10_opc_inp_m27':{
				required:true,
			},

			/////
			'1_opc_inp_m28':{
				required:true,
			},
			'2_opc_inp_m28':{
				required:true,
			},
			'3_opc_inp_m28':{
				required:true,
			},
			'4_opc_inp_m28':{
				required:true,
			},
			'5_opc_inp_m28':{
				required:true,
			},
			'6_opc_inp_m28':{
				required:true,
			},
			'7_opc_inp_m28':{
				required:true,
			},
			'8_opc_inp_m28':{
				required:true,
			},
			'9_opc_inp_m28':{
				required:true,
			},
			'10_opc_inp_m28':{
				required:true,
			},

			/////
			'1_opc_inp_m29':{
				required:true,
			},
			'2_opc_inp_m29':{
				required:true,
			},
			'3_opc_inp_m29':{
				required:true,
			},
			'4_opc_inp_m29':{
				required:true,
			},
			'5_opc_inp_m29':{
				required:true,
			},
			'6_opc_inp_m29':{
				required:true,
			},
			'7_opc_inp_m29':{
				required:true,
			},
			'8_opc_inp_m29':{
				required:true,
			},
			'9_opc_inp_m29':{
				required:true,
			},
			'10_opc_inp_m29':{
				required:true,
			},

			/////
			'1_opc_inp_m30':{
				required:true,
			},
			'2_opc_inp_m30':{
				required:true,
			},
			'3_opc_inp_m30':{
				required:true,
			},
			'4_opc_inp_m30':{
				required:true,
			},
			'5_opc_inp_m30':{
				required:true,
			},
			'6_opc_inp_m30':{
				required:true,
			},
			'7_opc_inp_m30':{
				required:true,
			},
			'8_opc_inp_m30':{
				required:true,
			},
			'9_opc_inp_m30':{
				required:true,
			},
			'10_opc_inp_m30':{
				required:true,
			},

			/////
			'1_opc_inp_m31':{
				required:true,
			},
			'2_opc_inp_m31':{
				required:true,
			},
			'3_opc_inp_m31':{
				required:true,
			},
			'4_opc_inp_m31':{
				required:true,
			},
			'5_opc_inp_m31':{
				required:true,
			},
			'6_opc_inp_m31':{
				required:true,
			},
			'7_opc_inp_m31':{
				required:true,
			},
			'8_opc_inp_m31':{
				required:true,
			},
			'9_opc_inp_m31':{
				required:true,
			},
			'10_opc_inp_m31':{
				required:true,
			},

			/////
			'1_opc_inp_m32':{
				required:true,
			},
			'2_opc_inp_m32':{
				required:true,
			},
			'3_opc_inp_m32':{
				required:true,
			},
			'4_opc_inp_m32':{
				required:true,
			},
			'5_opc_inp_m32':{
				required:true,
			},
			'6_opc_inp_m32':{
				required:true,
			},
			'7_opc_inp_m32':{
				required:true,
			},
			'8_opc_inp_m32':{
				required:true,
			},
			'9_opc_inp_m32':{
				required:true,
			},
			'10_opc_inp_m32':{
				required:true,
			},

			/////
			'1_opc_inp_m33':{
				required:true,
			},
			'2_opc_inp_m33':{
				required:true,
			},
			'3_opc_inp_m33':{
				required:true,
			},
			'4_opc_inp_m33':{
				required:true,
			},
			'5_opc_inp_m33':{
				required:true,
			},
			'6_opc_inp_m33':{
				required:true,
			},
			'7_opc_inp_m33':{
				required:true,
			},
			'8_opc_inp_m33':{
				required:true,
			},
			'9_opc_inp_m33':{
				required:true,
			},
			'10_opc_inp_m33':{
				required:true,
			},

			/////
			'1_opc_inp_m34':{
				required:true,
			},
			'2_opc_inp_m34':{
				required:true,
			},
			'3_opc_inp_m34':{
				required:true,
			},
			'4_opc_inp_m34':{
				required:true,
			},
			'5_opc_inp_m34':{
				required:true,
			},
			'6_opc_inp_m34':{
				required:true,
			},
			'7_opc_inp_m34':{
				required:true,
			},
			'8_opc_inp_m34':{
				required:true,
			},
			'9_opc_inp_m34':{
				required:true,
			},
			'10_opc_inp_m34':{
				required:true,
			},

			/////
			'1_opc_inp_m35':{
				required:true,
			},
			'2_opc_inp_m35':{
				required:true,
			},
			'3_opc_inp_m35':{
				required:true,
			},
			'4_opc_inp_m35':{
				required:true,
			},
			'5_opc_inp_m35':{
				required:true,
			},
			'6_opc_inp_m35':{
				required:true,
			},
			'7_opc_inp_m35':{
				required:true,
			},
			'8_opc_inp_m35':{
				required:true,
			},
			'9_opc_inp_m35':{
				required:true,
			},
			'10_opc_inp_m35':{
				required:true,
			},

			/////
			'1_opc_inp_m36':{
				required:true,
			},
			'2_opc_inp_m36':{
				required:true,
			},
			'3_opc_inp_m36':{
				required:true,
			},
			'4_opc_inp_m36':{
				required:true,
			},
			'5_opc_inp_m36':{
				required:true,
			},
			'6_opc_inp_m36':{
				required:true,
			},
			'7_opc_inp_m36':{
				required:true,
			},
			'8_opc_inp_m36':{
				required:true,
			},
			'9_opc_inp_m36':{
				required:true,
			},
			'10_opc_inp_m36':{
				required:true,
			},

			/////
			'1_opc_inp_m37':{
				required:true,
			},
			'2_opc_inp_m37':{
				required:true,
			},
			'3_opc_inp_m37':{
				required:true,
			},
			'4_opc_inp_m37':{
				required:true,
			},
			'5_opc_inp_m37':{
				required:true,
			},
			'6_opc_inp_m37':{
				required:true,
			},
			'7_opc_inp_m37':{
				required:true,
			},
			'8_opc_inp_m37':{
				required:true,
			},
			'9_opc_inp_m37':{
				required:true,
			},
			'10_opc_inp_m37':{
				required:true,
			},

			/////
			'1_opc_inp_m38':{
				required:true,
			},
			'2_opc_inp_m38':{
				required:true,
			},
			'3_opc_inp_m38':{
				required:true,
			},
			'4_opc_inp_m38':{
				required:true,
			},
			'5_opc_inp_m38':{
				required:true,
			},
			'6_opc_inp_m38':{
				required:true,
			},
			'7_opc_inp_m38':{
				required:true,
			},
			'8_opc_inp_m38':{
				required:true,
			},
			'9_opc_inp_m38':{
				required:true,
			},
			'10_opc_inp_m38':{
				required:true,
			},

			/////
			'1_opc_inp_m39':{
				required:true,
			},
			'2_opc_inp_m39':{
				required:true,
			},
			'3_opc_inp_m39':{
				required:true,
			},
			'4_opc_inp_m39':{
				required:true,
			},
			'5_opc_inp_m39':{
				required:true,
			},
			'6_opc_inp_m39':{
				required:true,
			},
			'7_opc_inp_m39':{
				required:true,
			},
			'8_opc_inp_m39':{
				required:true,
			},
			'9_opc_inp_m39':{
				required:true,
			},
			'10_opc_inp_m39':{
				required:true,
			},

			/////
			'1_opc_inp_m40':{
				required:true,
			},
			'2_opc_inp_m40':{
				required:true,
			},
			'3_opc_inp_m40':{
				required:true,
			},
			'4_opc_inp_m40':{
				required:true,
			},
			'5_opc_inp_m40':{
				required:true,
			},
			'6_opc_inp_m40':{
				required:true,
			},
			'7_opc_inp_m40':{
				required:true,
			},
			'8_opc_inp_m40':{
				required:true,
			},
			'9_opc_inp_m40':{
				required:true,
			},
			'10_opc_inp_m40':{
				required:true,
			},

			/////
			'1_opc_inp_m41':{
				required:true,
			},
			'2_opc_inp_m41':{
				required:true,
			},
			'3_opc_inp_m41':{
				required:true,
			},
			'4_opc_inp_m41':{
				required:true,
			},
			'5_opc_inp_m41':{
				required:true,
			},
			'6_opc_inp_m41':{
				required:true,
			},
			'7_opc_inp_m41':{
				required:true,
			},
			'8_opc_inp_m41':{
				required:true,
			},
			'9_opc_inp_m41':{
				required:true,
			},
			'10_opc_inp_m41':{
				required:true,
			},

			/////
			'1_opc_inp_m42':{
				required:true,
			},
			'2_opc_inp_m42':{
				required:true,
			},
			'3_opc_inp_m42':{
				required:true,
			},
			'4_opc_inp_m42':{
				required:true,
			},
			'5_opc_inp_m42':{
				required:true,
			},
			'6_opc_inp_m42':{
				required:true,
			},
			'7_opc_inp_m42':{
				required:true,
			},
			'8_opc_inp_m42':{
				required:true,
			},
			'9_opc_inp_m42':{
				required:true,
			},
			'10_opc_inp_m42':{
				required:true,
			},

			/////
			'1_opc_inp_m43':{
				required:true,
			},
			'2_opc_inp_m43':{
				required:true,
			},
			'3_opc_inp_m43':{
				required:true,
			},
			'4_opc_inp_m43':{
				required:true,
			},
			'5_opc_inp_m43':{
				required:true,
			},
			'6_opc_inp_m43':{
				required:true,
			},
			'7_opc_inp_m43':{
				required:true,
			},
			'8_opc_inp_m43':{
				required:true,
			},
			'9_opc_inp_m43':{
				required:true,
			},
			'10_opc_inp_m43':{
				required:true,
			},

			/////
			'1_opc_inp_m44':{
				required:true,
			},
			'2_opc_inp_m44':{
				required:true,
			},
			'3_opc_inp_m44':{
				required:true,
			},
			'4_opc_inp_m44':{
				required:true,
			},
			'5_opc_inp_m44':{
				required:true,
			},
			'6_opc_inp_m44':{
				required:true,
			},
			'7_opc_inp_m44':{
				required:true,
			},
			'8_opc_inp_m44':{
				required:true,
			},
			'9_opc_inp_m44':{
				required:true,
			},
			'10_opc_inp_m44':{
				required:true,
			},

			/////
			'1_opc_inp_m45':{
				required:true,
			},
			'2_opc_inp_m45':{
				required:true,
			},
			'3_opc_inp_m45':{
				required:true,
			},
			'4_opc_inp_m45':{
				required:true,
			},
			'5_opc_inp_m45':{
				required:true,
			},
			'6_opc_inp_m45':{
				required:true,
			},
			'7_opc_inp_m45':{
				required:true,
			},
			'8_opc_inp_m45':{
				required:true,
			},
			'9_opc_inp_m45':{
				required:true,
			},
			'10_opc_inp_m45':{
				required:true,
			},

			/////
			'1_opc_inp_m46':{
				required:true,
			},
			'2_opc_inp_m46':{
				required:true,
			},
			'3_opc_inp_m46':{
				required:true,
			},
			'4_opc_inp_m46':{
				required:true,
			},
			'5_opc_inp_m46':{
				required:true,
			},
			'6_opc_inp_m46':{
				required:true,
			},
			'7_opc_inp_m46':{
				required:true,
			},
			'8_opc_inp_m46':{
				required:true,
			},
			'9_opc_inp_m46':{
				required:true,
			},
			'10_opc_inp_m46':{
				required:true,
			},

			/////
			'1_opc_inp_m47':{
				required:true,
			},
			'2_opc_inp_m47':{
				required:true,
			},
			'3_opc_inp_m47':{
				required:true,
			},
			'4_opc_inp_m47':{
				required:true,
			},
			'5_opc_inp_m47':{
				required:true,
			},
			'6_opc_inp_m47':{
				required:true,
			},
			'7_opc_inp_m47':{
				required:true,
			},
			'8_opc_inp_m47':{
				required:true,
			},
			'9_opc_inp_m47':{
				required:true,
			},
			'10_opc_inp_m47':{
				required:true,
			},

			/////
			'1_opc_inp_m48':{
				required:true,
			},
			'2_opc_inp_m48':{
				required:true,
			},
			'3_opc_inp_m48':{
				required:true,
			},
			'4_opc_inp_m48':{
				required:true,
			},
			'5_opc_inp_m48':{
				required:true,
			},
			'6_opc_inp_m48':{
				required:true,
			},
			'7_opc_inp_m48':{
				required:true,
			},
			'8_opc_inp_m48':{
				required:true,
			},
			'9_opc_inp_m48':{
				required:true,
			},
			'10_opc_inp_m48':{
				required:true,
			},

			/////
			'1_opc_inp_m49':{
				required:true,
			},
			'2_opc_inp_m49':{
				required:true,
			},
			'3_opc_inp_m49':{
				required:true,
			},
			'4_opc_inp_m49':{
				required:true,
			},
			'5_opc_inp_m49':{
				required:true,
			},
			'6_opc_inp_m49':{
				required:true,
			},
			'7_opc_inp_m49':{
				required:true,
			},
			'8_opc_inp_m49':{
				required:true,
			},
			'9_opc_inp_m49':{
				required:true,
			},
			'10_opc_inp_m49':{
				required:true,
			},

			/////
			'1_opc_inp_m50':{
				required:true,
			},
			'2_opc_inp_m50':{
				required:true,
			},
			'3_opc_inp_m50':{
				required:true,
			},
			'4_opc_inp_m50':{
				required:true,
			},
			'5_opc_inp_m50':{
				required:true,
			},
			'6_opc_inp_m50':{
				required:true,
			},
			'7_opc_inp_m50':{
				required:true,
			},
			'8_opc_inp_m50':{
				required:true,
			},
			'9_opc_inp_m50':{
				required:true,
			},
			'10_opc_inp_m50':{
				required:true,
			},
			// Checbox respuesta opcion multiple
			'n_res_opc_m1[]':{
				required:true,
			},
			'n_res_opc_m2[]':{
				required:true,
			},
			'n_res_opc_m3[]':{
				required:true,
			},
			'n_res_opc_m4[]':{
				required:true,
			},
			'n_res_opc_m5[]':{
				required:true,
			},
			'n_res_opc_m6[]':{
				required:true,
			},
			'n_res_opc_m7[]':{
				required:true,
			},
			'n_res_opc_m8[]':{
				required:true,
			},
			'n_res_opc_m9[]':{
				required:true,
			},
			'n_res_opc_m10[]':{
				required:true,
			},
			'n_res_opc_m11[]':{
				required:true,
			},
			'n_res_opc_m12[]':{
				required:true,
			},
			'n_res_opc_m13[]':{
				required:true,
			},
			'n_res_opc_m14[]':{
				required:true,
			},
			'n_res_opc_m15[]':{
				required:true,
			},
			'n_res_opc_m16[]':{
				required:true,
			},
			'n_res_opc_m17[]':{
				required:true,
			},
			'n_res_opc_m18[]':{
				required:true,
			},
			'n_res_opc_m19[]':{
				required:true,
			},
			'n_res_opc_m20[]':{
				required:true,
			},
			'n_res_opc_m21[]':{
				required:true,
			},
			'n_res_opc_m22[]':{
				required:true,
			},
			'n_res_opc_m23[]':{
				required:true,
			},
			'n_res_opc_m24[]':{
				required:true,
			},
			'n_res_opc_m25[]':{
				required:true,
			},
			'n_res_opc_m26[]':{
				required:true,
			},
			'n_res_opc_m27[]':{
				required:true,
			},
			'n_res_opc_m28[]':{
				required:true,
			},
			'n_res_opc_m29[]':{
				required:true,
			},
			'n_res_opc_m30[]':{
				required:true,
			},
			'n_res_opc_m31[]':{
				required:true,
			},
			'n_res_opc_m32[]':{
				required:true,
			},
			'n_res_opc_m33[]':{
				required:true,
			},
			'n_res_opc_m34[]':{
				required:true,
			},
			'n_res_opc_m35[]':{
				required:true,
			},
			'n_res_opc_m36[]':{
				required:true,
			},
			'n_res_opc_m37[]':{
				required:true,
			},
			'n_res_opc_m38[]':{
				required:true,
			},
			'n_res_opc_m39[]':{
				required:true,
			},
			'n_res_opc_m40[]':{
				required:true,
			},
			'n_res_opc_m41[]':{
				required:true,
			},
			'n_res_opc_m42[]':{
				required:true,
			},
			'n_res_opc_m43[]':{
				required:true,
			},
			'n_res_opc_m44[]':{
				required:true,
			},
			'n_res_opc_m45[]':{
				required:true,
			},
			'n_res_opc_m46[]':{
				required:true,
			},
			'n_res_opc_m47[]':{
				required:true,
			},
			'n_res_opc_m48[]':{
				required:true,
			},
			'n_res_opc_m49[]':{
				required:true,
			},
			'n_res_opc_m50[]':{
				required:true,
			},


			suma_puntajes:{
				required:true,
				max:100,
				min:100,
			},
			titulo_e:{
				required:true,
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			maxLenght: {
				required: true,
      			maxlength: 10
			},
			rangelenght: {
		      required: true,
		      rangelength: [10, 20]
		    },
		    minval: {
		      required: true,
		      min: 13
		    },
		    maxval: {
		      required: true,
		      max: 13
		    },
		    range: {
		      required: true,
		      range: [5, 10]
		    },
		    url: {
		      required: true,
		      url: true
		    },
		    date: {
		      required: true,
		      date: true
		    },
		    number: {
		      required: true,
		      number: true
		    },
		    digits: {
		      required: true,
		      digits: true
		    },
		    ccard: {
		      required: true,
		      creditcard: true
		    },
			agree: "required"
		},
		messages: {
			required: "Please enter a something",
			peso_preg_1:{
				required:"campo requerido",
			},
			suma_puntajes:{
				max:"La Suma de puntajes tiene que ser 100",
				min:"La Suma de puntajes tiene que ser 100"
			},
			num_preguntas_e:{
				min:"Agregue preguntas al exámen.",
				max:"Cantidad máxima de preguntas debe ser 50"
			},
			required1: {
				required: "This field is required",
				minlength: "This field must consist of at least 4 characters"
			},
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			agree: "Please accept our policy"
		}
    });

	$("#wizzard-form").validate({
    	rules: {
    		fname: {
				required: true,
				minlength: 4
			},
			lname: {
				required: true,
				minlength: 4
			},
			gender: {
				required: true
			},
			username1: {
				required: true,
				minlength: 4
			},
			password1: {
				required: true,
				minlength: 5
			},
			confirm_password1: {
				required: true,
				minlength: 5,
				equalTo: "#password1"
			},
			email1: {
				required: true,
				email: true
			}
		},
		messages: {

			fname: {
				required: "This field is required",
				minlength: "This field must consist of at least 4 characters"
			},
			lname: {
				required: "This field is required",
				minlength: "This field must consist of at least 4 characters"
			},
			password1: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password1: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email1: "Please enter a valid email address",
			gender: "Choise a gender"
		}	
    });

//------------- Combobox  -------------//
    (function( $ ) {
        $.widget( "ui.combobox", {
            _create: function() {
                var input,
                    self = this,
                    select = this.element.hide(),
                    selected = select.children( ":selected" ),
                    value = selected.val() ? selected.text() : "",
                    wrapper = this.wrapper = $( "<span>" )
                        .addClass( "ui-combobox" )
                        .insertAfter( select );

                input = $( "<input>" )
                    .appendTo( wrapper )
                    .val( value )
                    .addClass( "ui-state-default ui-combobox-input" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: function( request, response ) {
                            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                            response( select.children( "option" ).map(function() {
                                var text = $( this ).text();
                                if ( this.value && ( !request.term || matcher.test(text) ) )
                                    return {
                                        label: text.replace(
                                            new RegExp(
                                                "(?![^&;]+;)(?!<[^<>]*)(" +
                                                $.ui.autocomplete.escapeRegex(request.term) +
                                                ")(?![^<>]*>)(?![^&;]+;)", "gi"
                                            ), "<strong>$1</strong>" ),
                                        value: text,
                                        option: this
                                    };
                            }) );
                        },
                        select: function( event, ui ) {
                            ui.item.option.selected = true;
                            self._trigger( "selected", event, {
                                item: ui.item.option
                            });
                        },
                        change: function( event, ui ) {
                            if ( !ui.item ) {
                                var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
                                    valid = false;
                                select.children( "option" ).each(function() {
                                    if ( $( this ).text().match( matcher ) ) {
                                        this.selected = valid = true;
                                        return false;
                                    }
                                });
                                if ( !valid ) {
                                    // remove invalid value, as it didn't match anything
                                    $( this ).val( "" );
                                    select.val( "" );
                                    input.data( "autocomplete" ).term = "";
                                    return false;
                                }
                            }
                        }
                    })
                    .addClass( "ui-widget ui-widget-content ui-corner-left" );

                input.data( "autocomplete" )._renderItem = function( ul, item ) {
                    return $( "<li></li>" )
                        .data( "item.autocomplete", item )
                        .append( "<a>" + item.label + "</a>" )
                        .appendTo( ul );
                };

                $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Show All Items" )
                    .appendTo( wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "ui-corner-right ui-combobox-toggle" )
                    .click(function() {
                        // close if already visible
                        if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
                            input.autocomplete( "close" );
                            return;
                        }

                        // work around a bug (likely same cause as #5265)
                        $( this ).blur();

                        // pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                        input.focus();
                    });
            },

            destroy: function() {
                this.wrapper.remove();
                this.element.show();
                $.Widget.prototype.destroy.call( this );
            }
        });
    })( jQuery );

    if($("#combobox").length) {
    	$( "#combobox" ).combobox();
    }

	//Boostrap modal
	$('#myModal').modal({ show: false});
	
	//add event to modal after closed
	$('#myModal').on('hidden', function () {
	  	console.log('modal is closed');
	})

});//End document ready functions

//sparkline in sidebar area
var positive = [1,5,3,7,8,6,10];
var negative = [10,6,8,7,3,5,1]
var negative1 = [7,6,8,7,6,5,4]

$('#stat1').sparkline(positive,{
	height:15,
	spotRadius: 0,
	barColor: '#9FC569',
	type: 'bar'
});
$('#stat2').sparkline(negative,{
	height:15,
	spotRadius: 0,
	barColor: '#ED7A53',
	type: 'bar'
});
$('#stat3').sparkline(negative1,{
	height:15,
	spotRadius: 0,
	barColor: '#ED7A53',
	type: 'bar'
});
$('#stat4').sparkline(positive,{
	height:15,
	spotRadius: 0,
	barColor: '#9FC569',
	type: 'bar'
});
//sparkline in widget
$('#stat5').sparkline(positive,{
	height:15,
	spotRadius: 0,
	barColor: '#9FC569',
	type: 'bar'
});

$('#stat6').sparkline(positive, { 
	width: 70,//Width of the chart - Defaults to 'auto' - May be any valid css width - 1.5em, 20px, etc (using a number without a unit specifier won't do what you want) - This option does nothing for bar and tristate chars (see barWidth)
	height: 20,//Height of the chart - Defaults to 'auto' (line height of the containing tag)
	lineColor: '#88bbc8',//Used by line and discrete charts to specify the colour of the line drawn as a CSS values string
	fillColor: '#f2f7f9',//Specify the colour used to fill the area under the graph as a CSS value. Set to false to disable fill
	spotColor: '#e72828',//The CSS colour of the final value marker. Set to false or an empty string to hide it
	maxSpotColor: '#005e20',//The CSS colour of the marker displayed for the maximum value. Set to false or an empty string to hide it
	minSpotColor: '#f7941d',//The CSS colour of the marker displayed for the mimum value. Set to false or an empty string to hide it
	spotRadius: 3,//Radius of all spot markers, In pixels (default: 1.5) - Integer
	lineWidth: 2//In pixels (default: 1) - Integer
});