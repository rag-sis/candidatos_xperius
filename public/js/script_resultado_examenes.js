function mostrar_form_nueva_entrevista(id) {
        //$(document).ready(function () {
            $("#pro_ent").hide("slow");
            $("#cargar_datos_pro_ent").show("slow");
            $("#datos_pro_ent").load("/entrevista/formulario_crear/" + id, " ", function () {
                $("#datos_pro_ent").show("slow");
                $("#cargar_datos_pro_ent").hide("slow");
            });
        //});
    }

 function mostrar_examenes(id){

 	$("#pro_ex").hide("slow");
            $("#cargar_datos_pro_ex").show("slow");
            $("#datos_pro_ex").load("/examen/lista_terminados/" + id, " ", function () {
                $("#datos_pro_ex").show("slow");
                $("#cargar_datos_pro_ex").hide("slow");
            });


 }